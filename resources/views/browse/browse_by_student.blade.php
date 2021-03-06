<?php

namespace App\Http\Controllers;

use App\Fileentry;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Redirect;
use DB;
		
?>
	
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
	

	<!-- Last Names -->
	<div class="row">

		<?php 
			
			//Alphabet
			$array_alphabet = array_merge(range('A', 'Z'));
			
			foreach ($array_alphabet as $item)
			{
				#$query = DB::table('file_entries')->where('submitting_user_last_name', 'like', ''.$item.'%')->get();
				$query = FileEntry::where('submitting_user_last_name', 'like', ''.$item.'%')->where('submitting_user_reveal_id', '=', 'yes')->get();
				
				$array_alphabet_2 = [];
				
				echo '<div class="browse_by_student_row">';
					
					echo '<div class="col-md-4">';
						echo '<h1 class="last_name_initial">'.$item.'</h1>';
					echo '</div>';
					foreach ($query as $letter[$item]) {
						#print_r($letter['B']);
						
						echo '<div class="col-md-8 last_names">';
							$array_alphabet_2[]= $query;
							
							echo '<div class="row">';
								foreach ($array_alphabet_2 as $item2) {
									foreach ($item2 as $item3) {	
										echo '<p class="lead"><a data-toggle="modal" data-target="#ModalStudentOutlines'.$item3->submitting_user_id.'">'.$item3->submitting_user_last_name.', '.$item3->submitting_user_first_name.'</a> (Class of '.$item3->submitting_user_projected_graduation_year.')</p>';
										break;
									} ?>
						
									<!-- Modal -->
									<div class="modal fade" id="ModalStudentOutlines<?php echo $item3->submitting_user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header browse_by_student_modal_header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Outlines: <span class="gold"><?php echo $item3->submitting_user_last_name.', '.$item3->submitting_user_first_name; ?></span></h4>
									      </div><!-- ./modal-header -->
									      <div class="modal-body">
									      
									      	
									      		<table class="table">
										      		<tr>
											      		<th>Outline</th>
											      		<th>Professor</th>
											      		<th>Course Name</th>
											      		<th>Academic Term</th>
											      		<th>Year</th>
										      		</tr>
											      	<?php foreach ($item2 as $item3) { ?>
											      		<tr>
															<!-- Professor Name -->
															<?php 	
																if (isset($item3->professor_name)) {
																	echo '<td>'.$item3->professor_name.'</td>';	
																} else {
																	echo '<td><label class="label label-danger">Not Provided</danger></td>';
																}
															?>
															<!-- Professor Name -->
															
															<!-- Filename -->
															<td><a href="{{route('getentry', $item3->filename)}}" download>Download</a></td>
															<!-- Filename -->
															
															<!-- Course Name -->
															<?php 	
																if (isset($item3->course_name)) {
																	echo '<td>'.$item3->course_name.'</td>';	
																} else {
																	echo '<td><label class="label label-danger">Not Provided</danger></td>';
																}
															?>
															<!-- Course Name -->
															
															<!-- Academic Term -->
															<?php 
																switch ($item3->academic_term) {
																    case "fall_semester":
																        echo '<td>Fall Semester</td>';
																        break;
																    case "spring_semester":
																        echo '<td>Spring Semester</td>';
																        break;
																    case "short_session":
																        echo '<td>Short Session</td>';
																        break;
																     case "":
																     	echo '<td><label class="label label-danger">Not Provided</danger></td>';
																     	break;
																}
															?>
															<!-- Academic Term -->
															
															<!-- Year -->
															<?php 	
																if (isset($item3->year)) {
																	echo '<td>'.$item3->year.'</td>';	
																} else {
																	echo '<td><label class="label label-danger">Not Provided</danger></td>';
																}
															?>
															<!-- Year -->
																	
														</tr>	
													<?php } //$item3 ?>
									      		</table>
									      		
									      </div><!-- ./modal-body -->
									    </div><!-- ./modal-content -->
									  </div><!-- ./modal-dialog -->
									</div><!-- ./modal .fade -->
									<!-- Modal -->
								
								<?php  } ?>									
																
								<?php
						
							echo '</div>';
						echo '</div>';
						break;
						
					}
				echo '</div>';
	
			}
			//Alphabet

		?>
	</div>
	<!-- Last Names -->
		

@endsection