<?php
	
	$wtw_professors = DB::table('who_taught_what')
		->where('who_taught_what.wtw_type', '=', 'professor')
		->select('who_taught_what.*')
		->orderBy('who_taught_what.wtw_value', 'asc')
		->get();
			
	foreach ($wtw_professors as $item) {
		echo '<option value="'.$item->wtw_value.'">'.$item->wtw_value.'</option>';
	}
	
				
?>