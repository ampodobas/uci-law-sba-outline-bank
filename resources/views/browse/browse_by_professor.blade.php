@extends('app')
@section('content')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#entries_by_professor').dataTable();
		} );
	</script>

	<div class="row page_title_icon_container">
		<div class="col-md-4"><img src="{{ asset('/img/professor_blue.png') }}" class="page_icon" /></div>
		<div class="col-md-8"><h2>Outlines By Professor</h2></div>
	</div>
	
	<table id="entries_by_professor" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid">
		<thead>
			<th>Download</th>
			<th>Professor</th>
			<th>Course</th>
			<th>Uploaded By</th>
			<th>Date Submitted</th>
		</thead>
		<tbody>		
			@foreach($entries_by_professor as $item)
			<tr>
				<td><a href="{{route('getentry', $item->filename)}}" download>{{$item->original_filename}}</a></td>
				<td>{{$item->professor_name}}</td>
				<td>{{$item->course_name}}</td>
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