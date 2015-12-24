@extends('app')
@section('content')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#search_results').dataTable();
		} );
	</script>

	<div class="row page_title_icon_container">
		<h2>Search Results:</h2>
		
		<?php if (!(is_null($course_name))) { echo '<p class="lead centered">'.$course_name.' Outlines</p>'; } ?>	
	</div>
	
	<table id="search_results" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid">
		<thead>
			<th><strong>Course</strong></th>
			<th>Download</th>
			<th>Professor</th>
			<th>Student</th>
			<th>Uploaded</th>
		</thead>
		<tbody>		
			@foreach($query as $item)
			<tr>
				<td><strong>{{$item->course_name}}</strong></td>
				<td><a href="{{route('getentry', $item->filename)}}" download>{{$item->original_filename}}</a></td>
				<td>{{$item->professor_name}}</td>
				<td>
					@foreach($join_get_full_name as $name)
						{{$name->user_last_name}}, {{$name->user_first_name}}
					@endforeach
				</td>
				<td>{{$item->created_at}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@endsection