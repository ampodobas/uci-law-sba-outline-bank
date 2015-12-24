@extends('app')
@section('content')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#entries_by_professor').dataTable();
		} );
	</script>

	<div class="row page_title_icon_container">
		<h2>Outlines By Professor</h2>
	</div>

	<div class="row">
		
		<!-- Left -->
		<div class="col-sm-6">
			<div class="col-sm-12 clinic_grey_section">
				<h3>Specific Professor</h3>
				<img src="{{ asset('/img/single_professor_blue.png') }}" class="page_icon" />
				
				<div class="form-group">
					<form method="POST" action="{{ url('browse_search_professors') }}" id="browse_search_professors">
						
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<select class="form-control" name="professor_name">
						    <option value="">Select A Professor</option>
							<!-- Include: professor Titles Array -->
							@include('partials.partial_professor_names')
							<!-- Include: professor Titles Array -->
						</select>
						
						<button type="submit" form="browse_search_professors" class="btn btn-block btn-primary center_this browse_submit_btn">Search <i class="fa fa-search"></i></button>
					
					</form>
				</div><!-- ./form-group -->

			</div><!-- ./col-sm-12 .clinic_grey_section -->
		</div>
		<!-- Left -->
		
		<!-- Right -->
		<div class="col-sm-6">
			<div class="col-sm-12 clinic_grey_section">
				<h3>Browse All professors</h3>
				<img src="{{ asset('/img/multiple_professors_blue.png') }}" class="page_icon" />
				<a class="btn btn-block btn-primary center_this browse_collapse_btn" role="button" data-toggle="collapse" href="#collapseSpecificprofessor" aria-expanded="false" aria-controls="collapseSpecificprofessor"><i class="fa fa-caret-square-o-down"></i> Browse</a>
			</div><!-- ./col-sm-12 .clinic_grey_section -->
		</div>
		<!-- Right -->
	</div><!-- ./row -->
	
	
	<!-- Collapse Content -->
	<div class="collapse browse_collapse" id="collapseSpecificprofessor">
		
		<h3>Browse All Professors</h3>
		
		<div class="clinic_grey_section">
			<table id="entries_by_professor" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid">
				<thead>
					<th><strong>Professor</strong></th>
					<th>Download</th>
					<th>Course</th>
					<th>Student</th>
					<th>Uploaded</th>
				</thead>
				<tbody>		
					@foreach($entries_by_professor as $item)
					<tr>
						<td><strong>{{$item->professor_name}}</strong></td>
						<td><a href="{{route('getentry', $item->filename)}}" download>{{$item->original_filename}}</a></td>
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
		</div><!-- ./clinic_grey_section -->
		
	</div><!-- ./collapse -->
	<!-- Collapse Content -->

@endsection