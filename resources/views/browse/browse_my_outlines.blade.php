
<?php

namespace App\Http\Controllers;

use App\FileEntry;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Carbon\Carbon;
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
		<h2>Outlines That I've Uploaded</h2>
	</div>
	
	<?php
		//Get user first and last name and retrieve outlines that this user has uploaded
		$this_user_id = Auth::user()->id;
		$query = FileEntry::where('submitting_user_id', '=', ''.$this_user_id.'')->get();
	?>

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

	

@endsection