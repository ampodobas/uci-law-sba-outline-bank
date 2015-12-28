<tr>
	<td><strong>{{$item->professor_name}}</strong></td>
	<td><a href="{{route('getentry', $item->filename)}}" download>Download</a></td>
	<td>{{$item->course_name}}</td>
	<td>
		@foreach($join_get_full_name as $name)
			{{$name->user_last_name}}, {{$name->user_first_name}}
		@endforeach
	</td>
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
		     	echo '<td></td>';
		     	break;
		}
	?>
	<td>{{$item->year}}</td>				
	<td>{{$item->created_at}}</td>
</tr>