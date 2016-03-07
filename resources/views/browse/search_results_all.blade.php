@extends('app')
@section('content')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#search_results').dataTable();
		} );
	</script>
	
	<?
		var_dump($query);
		
	?>

	<div class="row page_title_icon_container">
		<h2>Search Results</h2>
		
		<hr/>
		
		<?php if (!(empty($professor_name))) { echo '<p class="search_all_p"><span class="stronger">Professor</span>:  '.$professor_name.'</p>'; } ?>
		
		<?php if (!(empty($course_name))) { echo '<p class="search_all_p">+</p>'; } ?>
		<?php if (!(empty($course_name))) { echo '<p class="search_all_p"><span class="stronger">Course</span>:  '.$course_name.'</p>'; } ?>
		
		<?php if (!(empty($academic_term))) { echo '<p class="search_all_p">+</p>'; } ?>
		<?php 
			
			if (!(empty($academic_term))) {
				//switch
				switch ($academic_term) {
					case 'spring_semester';
						echo '<p class="search_all_p"><span class="stronger">Academic Term</span>: Spring Semester</p>'; 
					break;
					case 'fall_semester';
						echo '<p class="search_all_p"><span class="stronger">Academic Term</span>: Fall Semester</p>'; 
					break;
					case 'short_session';
						echo '<p class="search_all_p"><span class="stronger">Academic Term</span>: Short Session</p>'; 
					break;
					
				}
				//switch
			}//if
		?>
		
		<?php if (!(empty($year))) { echo '<p class="search_all_p">+</p>'; } ?>
		<?php if (!(empty($year))) { echo '<p class="search_all_p"><span class="stronger">Year</span>:  '.$year.'</p>'; } ?>
		<br class="clear" />
	</div>
	
	<div class="clinic_grey_section">
		@include('partials.partial_table_1of3')
			@foreach($query as $item)
				@include('partials.partial_table_2of3')
			@endforeach
		@include('partials.partial_table_3of3')
	</div><!-- ./clinic_grey_section -->
	

@endsection