@extends('app')
@section('content')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#entries_by_course').dataTable();
		} );
	</script>

	<div class="row page_title_icon_container">
		<h2>Outlines By Course</h2>
	</div>

	<div class="row">
		
		<!-- Left -->
		<div class="col-sm-6">
			<div class="col-sm-12 clinic_grey_section">
				<h3>Specific Course</h3>
				<img src="{{ asset('/img/single_course_blue.png') }}" class="page_icon" />
				
				<div class="form-group">
					<form method="POST" action="{{ url('browse_search_courses') }}" id="browse_search_courses">
						
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div class="col-md-12">
							<select class="form-control" name="academic_term">
							    <option value="">Select A Course</option>
								<!-- Include: Course Titles Array -->
								@include('partials.partial_course_titles')
								<!-- Include: Course Titles Array -->
							</select>
						</div><!-- ./col-md-12 -->
						
						<div class="col-md-12">
							<select class="form-control" name="course_name">
							    <option value="">Select A Course</option>
								<!-- Include: Course Titles Array -->
								@include('partials.partial_course_titles')
								<!-- Include: Course Titles Array -->
							</select>
						</div><!-- ./col-md-12 -->
						
						<button type="submit" form="browse_search_courses" class="btn btn-block btn-primary center_this browse_submit_btn">Search <i class="fa fa-search"></i></button>
					
					</form>
				</div><!-- ./form-group -->

			</div><!-- ./col-sm-12 .clinic_grey_section -->
		</div>
		<!-- Left -->
		
		<!-- Right -->
		<div class="col-sm-6">
			<div class="col-sm-12 clinic_grey_section">
				<h3>Browse All Courses</h3>
				<img src="{{ asset('/img/multiple_courses_blue_3.png') }}" class="page_icon" />
				<a class="btn btn-block btn-primary center_this browse_collapse_btn" role="button" data-toggle="collapse" href="#collapseSpecificCourse" aria-expanded="false" aria-controls="collapseSpecificCourse"><i class="fa fa-caret-square-o-down"></i> Browse</a>
			</div><!-- ./col-sm-12 .clinic_grey_section -->
		</div>
		<!-- Right -->
	</div><!-- ./row -->
	
	
	<!-- Collapse Content -->
	<div class="collapse browse_collapse" id="collapseSpecificCourse">
		
		<h3>Browse All Courses</h3>
		
		<div class="clinic_grey_section">
			@include('partials.partial_table_1of3')
				@foreach($entries_by_course as $item)
					@include('partials.partial_table_2of3')
				@endforeach
			@include('partials.partial_table_3of3')
		</div><!-- ./clinic_grey_section -->

	</div><!-- ./collapse -->
	<!-- Collapse Content -->

@endsection