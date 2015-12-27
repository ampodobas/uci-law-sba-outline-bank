@extends('app')
@section('content')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#entries_by_course').dataTable();
		} );
	</script>

	<div class="row page_title_icon_container">
		<h2>Outlines By Student</h2>
	</div>

	<div class="row">
		
		<!-- Left -->
		<div class="col-sm-6">
			<div class="col-sm-12 clinic_grey_section">
				<h3>Specific Student</h3>
				<img src="{{ asset('/img/single_student_blue.png') }}" class="page_icon" />
				
				<div class="form-group">
					<form method="POST" action="{{ url('browse_search_students') }}" id="browse_search_students">
						
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<select class="form-control" name="student_name">
						    <option value="">Select A Student</option>
							<!-- Include: Course Titles Array -->
							@include('partials.partial_student_name')
							<!-- Include: Course Titles Array -->
						</select>
						
						<button type="submit" form="browse_search_students" class="btn btn-block btn-primary center_this browse_submit_btn">Search <i class="fa fa-search"></i></button>
					
					</form>
				</div><!-- ./form-group -->

			</div><!-- ./col-sm-12 .clinic_grey_section -->
		</div>
		<!-- Left -->
		
		<!-- Right -->
		<div class="col-sm-6">
			<div class="col-sm-12 clinic_grey_section">
				<h3>Browse All Students</h3>
				<img src="{{ asset('/img/student_blue.png') }}" class="page_icon" />
				<a class="btn btn-block btn-primary center_this browse_collapse_btn" role="button" data-toggle="collapse" href="#collapseSpecificCourse" aria-expanded="false" aria-controls="collapseSpecificCourse"><i class="fa fa-caret-square-o-down"></i> Browse</a>
			</div><!-- ./col-sm-12 .clinic_grey_section -->
		</div>
		<!-- Right -->
	</div><!-- ./row -->
	
	
	<!-- Collapse Content -->
	<div class="collapse browse_collapse" id="collapseSpecificCourse">
		
		<h3>Browse All Students</h3>
		
		
		<!-- Row: browse_by_student_row -->
		<div class="row browse_by_student_row">
			
			
		</div>
		<!-- Row: browse_by_student_row -->
		
		
		
		
	</div><!-- ./collapse -->
	<!-- Collapse Content -->

@endsection