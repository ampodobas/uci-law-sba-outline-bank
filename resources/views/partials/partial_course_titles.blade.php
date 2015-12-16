<?php
	
	$course_titles=array("Torts",
		"Statutory Interpretation (Criminal Law)",
		"Constitutional Law",
		"Contracts",
		"Civil Procedure",
		"Lawyering Skills",
		"Federal Courts",
	);
		
		foreach ($course_titles as $item) {
			echo '<option value="'.$item.'">'.$item.'</option>';
		}
				
?>