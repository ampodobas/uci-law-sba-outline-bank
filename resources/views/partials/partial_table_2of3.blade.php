<tr>
	<td><strong>{{$item->professor_name}}</strong></td>
	<td><a href="{{route('getentry', $item->filename)}}" download>{{$item->original_filename}}</a></td>
	<td>{{$item->course_name}}</td>
	<td>
		@foreach($join_get_full_name as $name)
			{{$name->user_last_name}}, {{$name->user_first_name}}
		@endforeach
	</td>
	<td>{{$item->academic_term}}</td>
	<td>{{$item->year}}</td>				
	<td>{{$item->created_at}}</td>
</tr>