## UC Irvine School of Law: SBA Outline Bank

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)

This is the official repository for the UCI Law SBA Outline Bank Laravel 5 application forthcoming in Fall 2015.

Note #1: If you already have an LAMP or nginx+PHP+MySQL stack running on localhost, skip Setup (1/4) and Setup (2/4) to skip to Setup (3/4), which instructs how to install Laravel 5.

Note #2: The following four setup steps were done on a 2015 MacBook Pro and a 2015 MacBook, each running OS X El Capital 10.11.2.
Note #3: For security purposes, the application keys and any salts will be changed prior to the production push. 

###Setup (1/4): Setup OS Environment (Brew + Cask Tap + PHP + MySQL)

	1) Open Terminal.app (/Applications/Utilities/Terminal.app)
	2) Run the following script:
		xcode-select --install \
		&& ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)" \
		&& brew doctor \
		&& brew install Caskroom/cask/xquartz \
		&& brew tap homebrew/dupes \
		&& brew tap josegonzalez/homebrew-php \
		&& brew install gtk+ git autoconf automake apple-gcc42 libksba libtool pkg-config libyaml node tree \
		&& sudo apachectl restart \
		&& brew doctor \
		&& brew update \
		&& brew install php54 --with-mysql \
		&& brew install php54-xdebug \
		&& brew install mcrypt php54-mcrypt \
		&& sudo apachectl restart \
		&& echo "export PATH="$(brew --prefix josegonzalez/php/php54)/bin:$PATH"" >> ~/.bash_profile \
		&& echo "export export PATH="/usr/local/mysql/bin:$PATH"" >> ~/.bash_profile \
		&& source ~/.bash_profile \
		&& brew install mysql \
		&& mkdir -p ~/Library/LaunchAgents \
		&& ln -sfv /usr/local/opt/mysql/*.plist ~/Library/LaunchAgents \
		&& launchctl load -w ~/Library/LaunchAgents/homebrew.mxcl.mysql.plist \
		&& mysql_secure_installation \
		&& then run mysql.server start

###Setup (2/4): Apache Web Server

	1) sudo vi /etc/apache2/httpd.conf
	2) Change: ServerName localhost 
	3) Ensure listen set to 80: Listen 80
	4) Comment out: #LoadModule php5_module libexec/apache2/libphp5.so
	5) Add: LoadModule php5_module /usr/local/Cellar/php54/5.4.40/libexec/apache2/libphp5.so. Note: ensure that the version (5.4.12 here) you actually install from Brew matches the absolute path with the PHP version number)
	6) Comment out: LoadModule hfs_apple_module libexec/apache2/mod_hfs_apple.so
	7) Uncomment: LoadModule userdir_module libexec/apache2/mod_userdir.so
	8) Uncomment: Include /private/etc/apache2/extra/httpd-userdir.conf
	9) Uncomment: Include /private/etc/apache2/users/*.conf

		Add somewhere BELOW Listen 80:
		<Directory "/Users/ampodobas/Sites/">
		    AddLanguage en .en
		    LanguagePriority en fr de
		    ForceLanguagePriority Fallback
		    Options Indexes MultiViews
		    AllowOverride All
		    Order allow,deny
		    Allow from localhost
		    Require all granted
		</Directory>

### Setup (3/4): Laravel 5 Installation

	1)	curl -sS https://getcomposer.org/installer | php
	2)	mv composer.phar /usr/local/bin/composer
	3)	composer global require "laravel/installer=~1.1"
	4)	echo 'alias laravel='~/.composer/vendor/bin/laravel'' > ~/.bash_profile
	5)	source ~/.bash_profile
	6)	laravel new uci-law-sba-outline-bank
	7)	cd /Users/ampodobas/Sites/uci-law-sba-outline-bank/ && chmod -R 777 storage
	8)	Chage ‘url’ in config/app.php to 'url' => 'http://localhost/uci-law-sba-outline-bank/',
	9)	Change ‘timezone’ in config/app.php to PST
	10)	add to .env (top-level directory):
	⁃	DB_HOST=localhost
	⁃	DB_DATABASE=sba-outline-bank
	⁃	DB_USERNAME=root
	⁃	DB_PASSWORD=toor
	11)	Ensnure that mod_rewrite is uncommented
	12)	Remove .htaccess in public and add this:

	Options +FollowSymLinks
	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule ^ index.php [L]
	
	13)	To enable column alterations through Migrations, add to the require block of composer.json: "doctrine/dbal": "~2.3"
	14) run “composer update”

##Setup (4/4): Checkout Repo

Option 1: git clone  git@github.com:ampodobas/uci-law-sba-outline-bank.git /Users/{your username}/Sites/

Option 2: cd /Users/{your username}/Sites/ && mkdir uci-law-sba-outline-bank && cd uci-law-sba-outline-bank && wget https://github.com/ampodobas/uci-law-sba-outline-bank/archive/master.zip && unzip master.zip



