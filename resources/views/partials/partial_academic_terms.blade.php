<?php
	
	$academic_term=array("fall_semester" => "Fall Semester",
		"spring_semester" => "Spring Semester",
		"short_session" => "Short Session"
	);
		
	foreach ($academic_term as $key=>$value) {
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
				
?>