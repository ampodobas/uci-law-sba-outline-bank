@extends('app')
@section('content')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#search_results').dataTable();
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
			@include('partials.partial_table_1of3')
				@foreach($entries_by_professor as $item)
					@include('partials.partial_table_2of3')
				@endforeach
			@include('partials.partial_table_3of3')
		</div><!-- ./clinic_grey_section -->
		
	</div><!-- ./collapse -->
	<!-- Collapse Content -->

@endsection