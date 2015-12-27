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
			@include('partials.partial_table_1of3')
				@foreach($query as $item)
					@include('partials.partial_table_2of3')
				@endforeach
			@include('partials.partial_table_3of3')
		</div><!-- ./clinic_grey_section -->
		
	</div><!-- ./collapse -->
	<!-- Collapse Content -->


@endsection