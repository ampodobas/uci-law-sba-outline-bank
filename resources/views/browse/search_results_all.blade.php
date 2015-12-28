@extends('app')
@section('content')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#search_results').dataTable();
		} );
	</script>

	<div class="row page_title_icon_container">
		<h2>Search Results</h2>
		
		<?php if (!(empty($course_name))) { echo '<p class="lead centered">Course:  '.$course_name.'</p>'; } ?>
		<?php if (!(empty($professor_name))) { echo '<p class="lead centered">Professor:  '.$professor_name.'</p>'; } ?>
		<?php if (!(empty($academic_term))) { echo '<p class="lead centered">Academic Term:  '.$academic_term.'</p>'; } ?>
		<?php if (!(empty($year))) { echo '<p class="lead centered">Year:  '.$year.'</p>'; } ?>

	</div>
	
	<div class="clinic_grey_section">
		@include('partials.partial_table_1of3')
			@foreach($query as $item)
				@include('partials.partial_table_2of3')
			@endforeach
		@include('partials.partial_table_3of3')
	</div><!-- ./clinic_grey_section -->
	

@endsection