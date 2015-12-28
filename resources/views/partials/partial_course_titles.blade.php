<?php

	$wtw_courses = DB::table('who_taught_what')
		->where('who_taught_what.wtw_type', '=', 'course')
		->select('who_taught_what.*')
		 ->orderBy('who_taught_what.wtw_value', 'asc')
		->get();

	foreach ($wtw_courses as $item) {
		echo '<option value="'.$item->wtw_value.'">'.$item->wtw_value.'</option>';
	}
	
?>