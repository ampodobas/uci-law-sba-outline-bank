<?php
	
	$years=array("2009",
		"2010",
		"2011",
		"2012",
		"2013",
		"2014",
		"2015",
		"2016",
		"2017",
		"2018",
		"2019"
	);
		
	foreach ($years as $item) {
		echo '<option value="'.$item.'">'.$item.'</option>';
	}
				
?>