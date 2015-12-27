<tr>
	<td><strong>{{$item->professor_name}}</strong></td>
	<td><a href="{{route('getentry', $item->filename)}}" download>{{$item->original_filename}}</a></td>
	<td>{{$item->course_name}}</td>
	<td>{{ Auth::user()->user_last_name }}, {{ Auth::user()->user_first_name }}</td>
	<td>{{$item->academic_term}}</td>
	<td>{{$item->year}}</td>				
	<td>{{$item->created_at}}</td>
</tr>