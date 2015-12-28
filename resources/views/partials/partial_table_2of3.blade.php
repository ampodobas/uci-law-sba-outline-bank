<tr>
	<!-- Professor Name -->
	<?php 	
		if (isset($item->professor_name)) {
			echo '<td>'.$item->professor_name.'</td>';	
		} else {
			echo '<td><label class="label label-danger">Not Provided</danger></td>';
		}
	?>
	<!-- Professor Name -->
	
	<!-- Filename -->
	<td><a href="{{route('getentry', $item->filename)}}" download>Download</a></td>
	<!-- Filename -->
	
	<!-- Course Name -->
	<?php 	
		if (isset($item->course_name)) {
			echo '<td>'.$item->course_name.'</td>';	
		} else {
			echo '<td><label class="label label-danger">Not Provided</danger></td>';
		}
	?>
	<!-- Course Name -->
	
	<!-- Submitting User (Last Name, First Name) -->
	<?php 	
		if (isset($item->course_name)) {
			echo '<td>'.$item->submitting_user_last_name.', '.$item->submitting_user_first_name.'</td>';	
		} else {
			echo '<td><label class="label label-danger">Not Provided</danger></td>';
		}
	?>
	<!-- Submitting User (Last Name, First Name) -->

	<!-- Academic Term -->
	<?php 
		switch ($item->academic_term) {
		    case "fall_semester":
		        echo '<td>Fall Semester</td>';
		        break;
		    case "spring_semester":
		        echo '<td>Spring Semester</td>';
		        break;
		    case "short_session":
		        echo '<td>Short Session</td>';
		        break;
		     case "":
		     	echo '<td><label class="label label-danger">Not Provided</danger></td>';
		     	break;
		}
	?>
	<!-- Academic Term -->
	
	<!-- Year -->
	<?php 	
		if (isset($item->year)) {
			echo '<td>'.$item->year.'</td>';	
		} else {
			echo '<td><label class="label label-danger">Not Provided</danger></td>';
		}
	?>
	<!-- Year -->
</tr>