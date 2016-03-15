<?php

namespace App\Http\Controllers;

use App\FileEntry;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Form;
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
		<h2>Welcome, {{ Auth::user()->user_first_name }}</h2>
		<p class="centered"><strong>E-Mail:</strong> {{ Auth::user()->email }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<strong>Joined On:</strong> {{ Auth::user()->created_at }}</p>		
	</div><!-- ./row .page_title_icon_container -->

<!--
<div class="well">

	 {!! Form::open(array('url' => 'post_non_admin_pass_change', 'class' => 'form-horizontal', 'method' => 'POST')) !!}

    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', 'Password confirmation') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
</div><!-- ./well -->


<div class="row">
	
	<div class="col-sm-6">
		
		<p class="lead centered">Outlines By Term</p>
		<br class="clear" />

		<?php
			
			$query_spring_2013=DB::table('file_entries')->where('academic_term', 'spring_semester')->where('year', '2013')->count();
			$query_fall_2013=DB::table('file_entries')->where('academic_term', 'fall_semester')->where('year', '2013')->count();
			$query_spring_2014=DB::table('file_entries')->where('academic_term', 'spring_semester')->where('year', '2014')->count();
			$query_fall_2014=DB::table('file_entries')->where('academic_term', 'fall_semester')->where('year', '2014')->count();
			$query_spring_2015=DB::table('file_entries')->where('academic_term', 'spring_semester')->where('year', '2015')->count();
			$query_fall_2015=DB::table('file_entries')->where('academic_term', 'fall_semester')->where('year', '2015')->count();
			$query_spring_2016=DB::table('file_entries')->where('academic_term', 'spring_semester')->where('year', '2016 ')->count();
		
		?>
		
		<div id="chart_percentage_by_term" class="c3"></div>

		<script type="text/javascript">		
			var chart = c3.generate({
				bindto: '#chart_percentage_by_term',
			    data: {
			        columns: [
				        ["Spring Semester 2013", <?php echo $query_spring_2013; ?>],
				        ["Fall Semester 2013", <?php echo $query_fall_2013; ?>],
				        ["Spring Semester 2014", <?php echo $query_spring_2014; ?>],
			            ["Fall Semester 2014", <?php echo $query_fall_2014; ?>],
			            ["Spring Semester 2015", <?php echo $query_spring_2015; ?>],
			            ["Fall Semester 2015", <?php echo $query_fall_2015; ?>],
			            ["Spring Semester 2016", <?php echo $query_spring_2016; ?>],
			        ],
			        type : 'donut',
					onclick: function (d, i) { console.log("onclick", d, i); },
			        onmouseover: function (d, i) { console.log("onmouseover", d, i); },
			        onmouseout: function (d, i) { console.log("onmouseout", d, i); }
			    },
			    donut: {
			        title: "Outlines By Term"
			    }
			});
		</script>
	</div><!-- ./col-sm-6 -->
	
	<div class="col-sm-6">
		
		<p class="lead centered">Outlines Uploaded Per Month</p>
		<br class="clear" />
		
		<?php
			
			#x-axis: year
			#y axis: 1L, 2L, 3L
			
			$posts_by_month = FileEntry::all()->groupBy(function($date) {
				return Carbon::parse($date->created_at)->format('Ym');
			});
			
			/*
				
			Raw Results: 
			foreach ($posts_by_month as $data_year_month=>$count_year_month) {
				echo $data_year_month.':'.count($count_year_month).'<br/>';
			}
			*/

			//Create the arrays ($data_year_month for Dec-2015, $count_year_month for sum of created_at per each $data_year_month) 
			$array_data_year_month = [];
			$array_count_year_month = [];
			
			foreach($posts_by_month as $data_year_month=>$count_year_month)
			{	
				// Assign each value to the array outside the foreach loop as you cycle through the foreach loop.
			    $array_data_year_month[] = "'".$data_year_month."'";  
			    $array_count_year_month[] = count($count_year_month);
			}
			$imploded_data_year_month = implode(",", $array_data_year_month);
			$imploded_count_year_month = implode(",", $array_count_year_month);		
			/* data_year_month */
		
		?>
		
		<div id="chart_total_by_month" class="c3"></div>
				
		<script type="text/javascript">
			
		var chart = c3.generate({
			bindto: '#chart_total_by_month',
		    data: {
			    x: 'x',
				xFormat: '%Y%m', 
				// 'xFormat' can be used as custom format of 'x'
		        columns: [
		            ['x', <?php echo $imploded_data_year_month; ?>],
		            ['Outlines Uploaded', <?php echo $imploded_count_year_month; ?>],
		        ]
		    },
		    axis: {
		        x: {
		            type: 'timeseries',
		            tick: {
		                format: '%Y-%m'
		            }
		        }
		    }
		});
		</script>
		
	</div><!-- ./col-sm-6 -->
	
@endsection