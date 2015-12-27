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
	
		<h2>{{ Auth::user()->user_last_name }}, {{ Auth::user()->user_first_name }}</div>

	</div><!-- ./row .page_title_icon_container -->

	<div class="row">
		<div class="col-sm-12">
			<div class="col-sm-12 clinic_grey_section">
				<h3>Outlines Uploaded By Me</h3>
				<img src="{{ asset('/img/cloud_documents.png') }}" class="page_icon" />
					@include('partials.partial_table_1of3')
					@foreach($query as $item)
						@include('partials.partial_table_2of3')
					@endforeach
				@include('partials.partial_table_3of3')

			</div><!-- ./col-sm-12 .clinic_grey_section -->
		</div>
	</div><!-- ./row -->


@endsection