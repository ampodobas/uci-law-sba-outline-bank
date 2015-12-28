<?php

	$wtw_courses = DB::table('who_taught_what')
		->where('who_taught_what.wtw_type', '=', 'course')
		->select('who_taught_what.*')
		 ->orderBy('who_taught_what.wtw_value', 'asc')
		->get();

	foreach ($wtw_courses as $item) {
		echo '<option value="'.$item->wtw_value.'">'.$item->wtw_value.'</option>';
	}
			
/*
				
Administrative Law
Adv Legal Writing: Business Drafting
Advanced Civil Rights Litigation Clinic
Advanced Community & Economic Development Clinic
Advanced Criminal Procedure
Advanced Domestic Violence Clinic
Advanced Environmental Law Clinic
Advanced Flowthrough Taxation
Advanced Immigrant Rights Clinic
Advanced Intellectual Property Clinic
Advanced International Human Rights Clinic
Advanced International Justice Clinic
Advanced Legal Research
Advanced Torts
Advanced Veterans Clinic
Alternative Field Placement
Antitrust
Antitrust Law & IP Rights
Appellate Litigation
Appellate Litigation Clinic
Applied Lawyering and Law Practice Management
Banking Regulation
Bankruptcy Law
Biotechnology and The Law
Business Associations
Business Associations: Private Companies
Business Principles for Lawyers
Chinese Law, Politics and Business
Civil Rights Litigation Clinic
Climate Change Seminar
Common Law Analysis: Contracts
Common Law Analysis: Torts
Community & Economic Development Clinic
Community Property
Community Scholars Program
Comparative Legal Traditions in a Globalized World
Conflict of Laws
Constitutional Analysis
Constitutional Analysis II
Constitutional Law: First Amendment
Constitutional Rights at the US Border
Consumer Law
Copyright Law
Copyright Practicum
Corporate Finance
Corporate Tax
Creative Lawyering
Criminal Procedure
Criminal Trial Advocacy: Prosecution and Defense Perspectives
Criminology, Law & Society Graduate Student Workshop
Critical Identity Theory
Cross-Border Trade in IP
Current Issues in Tax Law and Policy
Deliberative Democracy
Digital Copyright
Domestic Violence Clinic
Drug Discovery, Development & Commercialization
Education Law & Policy
Election Law
Electronic Discovery
Employment Discrimination Law
Employment Law
Entertainment Law
Environmental Law
Environmental Law Clinic
Environmental Law Practicum
Estate and Gift Tax
European Union Law and Its Influence
Evidence
Externship - UCDC
Externship - UCDC Course
Fact Investigation
Fair Employment & Housing Clinic
Family Law
Federal Courts
Federal Income Tax
Federal Indian Law
Full-Time Externship
Global Justice Summit
Global Justice Summit II
Graduate Legal Studies
Health Law
House of Cards: Attorneys General at the Intersection of Law, Politics and Policy
Identity, Crime & Justice
Immigrant Rights Clinic
Immigration Law & the Constitutional Rights of Non-Citizens
Insurance Law & Policy
Intellectual Property Clinic
Intellectual Property Survey
International Business Transactions
International Criminal Law
International Human Rights Clinic
International Justice Clinic
International Legal Analysis
International Trade and Investment Law
Jessup Moot Court
Judging in the American Democracy
Jurisprudence
Labor Law
Land Use and Development Control Law
Law & Society II
Law and Access to Higher Education
Law and Behavior: Compliance and Enforcement
Law and Popular Culture: How Films Shape our Image of the Law
Law and Social Movements
Lawyering Skills I
Lawyering Skills II
Legal Analysis of Evidence
Legal Profession I
Legal Profession II
Legal Profession: Advanced Topics
Legal Research
Legal and Social Responses to Domestic Violence
Legislation and Statutory Interpretation
Local Government Law
Memory & the Law
Mental Health Law
Mergers & Acquisitions
Motion Picture Financing: Traditional and Emerging Methods
Multi- and Interdisciplinary Perspectives on Law
Negotiation
Noncitizens in the Criminal Justice System
Part-Time Externship Only
Part-Time Externship SUM
Part-Time Externship WCC
Partnership Taxation
Patent Law
Patent Law Drafting
Pretrial Advocacy
Preventive Detention
Privacy and Security in the Modern Age
Private Equity and Venture Capital
Procedural Analysis
Products Liability
Property
Public Interest Litigation
Race and the Criminal Justice System
Real Estate Law
Remedies
Reproductive Justice Clinic
Role and Practice of the Entrepreneurial General Counsel
SEC Enforcement and Parallel Investigations
Secured Credit
Securities Regulation
Sex, Guns, Drugs, and Video/Audio Tapes: Expectations of Digital Privacy in Criminal Law
Sexual Orientation and the Law
So You Want to Change the Law? Mastering the Legislative and Congressional Process and Politics
Sociology of Legal Globalization
Space Law: Regulating and Incentivizing Private Commercial Activities in Outer Space
Statistics for Lawyers
Statutory Analysis
Technology, Law, and the Public Interest: An Exploration Through Film
The Art of Appellate Decisionmaking
The Art of Taking and Defending Effective Depositions
The Food We Eat and the People Who Feed Us
The Law and Policies of Financial Crises
The Law and Policy of Financial Crises
The Law of Habeas Corpus
Title
Trademark Law
Transition to Practice
Transitional Justice: Law After War and Dictatorship
Trial Advocacy
Trial Evidence Workshop
U.S. International Taxation
Uberlaw: Innovation and Regulation in the New "Sharing Economy"
Veterans Clinic
Wills & Trusts
Written Legal Analysis
*/
	
?>