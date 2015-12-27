@extends('app')
@section('content')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#search_results').dataTable();
		} );
	</script>

	<div class="row page_title_icon_container">
		<h2>Search Results</h2>
		
		<?php //var_dump($query); ?>
		
	
		<?php if (!(empty($course_name))) { echo '<p class="lead centered">Course:  '.$course_name.'</p>'; } ?>
		<?php if (!(empty($professor_name))) { echo '<p class="lead centered">Professor:  '.$professor_name.'</p>'; } ?>
		<?php if (!(empty($academic_term))) { echo '<p class="lead centered">Academic Term:  '.$academic_term.'</p>'; } ?>
		<?php if (!(empty($year))) { echo '<p class="lead centered">Academic Term:  '.$year.'</p>'; } ?>

	</div>
	
	<div class="clinic_grey_section">
		<table id="search_results" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid">
			<thead>
				<th><strong>Professor</strong></th>
				<th>Download</th>
				<th>Course</th>
				<th>Student</th>
				<th>Academic Term</th>
				<th>Year</th>
				<th>Uploaded</th>
			</thead>
			<tbody>		
				@foreach($query as $item)
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
				@endforeach
			</tbody>
		</table>
	</div><!-- ./clinic_grey_section -->

@endsection