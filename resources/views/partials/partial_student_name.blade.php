<?php
	
	$join_get_full_name = DB::table('file_entries')
        ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
        ->select('users.id', 'users.user_first_name', 'users.user_last_name')
        ->take(1)
        ->get();
        
        var_dump($join_get_full_name);
            
		
	foreach ($join_get_full_name as $item) {
		echo '<option value="'.$item->id.'">'.$item->user_last_name.', '.$item->user_first_name.'</option>';
	}
				
?>