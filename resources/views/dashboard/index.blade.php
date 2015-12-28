<?php

namespace App\Http\Controllers;

use App\FileEntry;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Redirect;
use DB;
use Auth;
		
?>

@extends('app')
@section('content')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#search_results').dataTable();
		} );
	</script>

	<div class="row page_title_icon_container">
		
		<?php
			
			//Get user first and last name and retrieve outlines that this user has uploaded

			$this_user_id = Auth::user()->id;

			$query = FileEntry::where('submitting_user_id', '=', ''.$this_user_id.'')->get();
		?>
	
		<h2>Welcome, {{ Auth::user()->user_last_name }}, {{ Auth::user()->user_first_name }}</div>

	</div><!-- ./row .page_title_icon_container -->


	<div class="row">
		
		<!-- Left -->
		<div class="col-sm-6">
			<div class="col-sm-12 clinic_grey_section">
				<h3>Me</h3>
				
				<hr/>
				
				<img src="{{ asset('/img/me_blue.png') }}" class="page_icon" />
				<div class="row dashboard_me">
					<div class="col-md-6">
						<p><strong>E-Mail:</strong></p>
						<p>{{ Auth::user()->email }}</p>
					</div><!-- ./col-md-6 -->
					
					<div class="col-md-6">
						<p><strong>Joined On:</strong></p>
						<p>{{ Auth::user()->created_at }}</p>
					</div><!-- ./col-md-6 -->
				</div>

			</div><!-- ./col-sm-12 .clinic_grey_section -->
		</div>
		<!-- Left -->
		
		<!-- Right -->
		<div class="col-sm-6">
			<div class="col-sm-12 clinic_grey_section">
				<h3>My Outlines</h3>
				<img src="{{ asset('/img/outlines_blue.png') }}" class="page_icon" />
				<a class="btn btn-block btn-primary center_this browse_collapse_btn" role="button" data-toggle="collapse" href="#collapseMyOutlines" aria-expanded="false" aria-controls="collapseMyOutlines"><i class="fa fa-caret-square-o-down"></i> Browse</a>
			</div><!-- ./col-sm-12 .clinic_grey_section -->
		</div>
		<!-- Right -->
	</div><!-- ./row -->
	
	
	<!-- Collapse Content -->
	<div class="collapse browse_collapse" id="collapseMyOutlines">
		
		<h3>Outlines That I've Uploaded</h3>
		
		<div class="clinic_grey_section">
			<table id="search_results" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid">
				<thead>
					<th><strong>Professor</strong></th>
					<th>Download</th>
					<th>Course</th>		
					<th>Academic Term</th>
					<th>Year</th>
					<th>Uploaded</th>
				</thead>
				<tbody>	
					@foreach($query as $item)
						<tr>
							<td><strong>{{$item->professor_name}}</strong></td>
							<td><a href="{{route('getentry', $item->filename)}}" download>Download</a></td>
							<td>{{$item->course_name}}</td>
							<?php 
								switch ($item->academic_term) {
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
								     	echo '<td></td>';
								     	break;
								}
							?>
							<td>{{$item->year}}</td>				
							<td>{{$item->created_at}}</td>
						</tr>
					@endforeach
				</tbody>
		</table>
		</div><!-- ./clinic_grey_section -->
		
	</div><!-- ./collapse -->
	<!-- Collapse Content -->


@endsection