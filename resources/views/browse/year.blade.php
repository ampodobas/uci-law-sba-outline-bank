@extends('app')
@section('content')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#search_results').dataTable();
		} );
	</script>
	
	<div class="row page_title_icon_container">
		<img src="{{ asset('/img/academic_term_year.png') }}" class="page_icon" />
		<h2>Browse By Year</h2>
	</div>
	
	<!-- Nav tabs -->
	<div class="row">
	  <ul class="nav nav-pills year_ul" role="tablist">
	    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">2016<label class="label label-warning pull-right label_count"><?php echo $count_year_2016; ?></a></li>
	    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">2015<label class="label label-warning pull-right label_count"><?php echo $count_year_2015; ?></a></li>
	    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">2014<label class="label label-warning pull-right label_count"><?php echo $count_year_2014; ?></a></li>
	    <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">2013<label class="label label-warning pull-right label_count"><?php echo $count_year_2013; ?></a></li>
	    <li role="presentation"><a href="#tab5" aria-controls="tab4" role="tab" data-toggle="tab">2012<label class="label label-warning pull-right label_count"><?php echo $count_year_2012; ?></a></li>
	    <li role="presentation"><a href="#tab6" aria-controls="tab4" role="tab" data-toggle="tab">2011<label class="label label-warning pull-right label_count"><?php echo $count_year_2011; ?></a></li>
	    <li role="presentation"><a href="#tab7" aria-controls="tab4" role="tab" data-toggle="tab">2010<label class="label label-warning pull-right label_count"><?php echo $count_year_2010; ?></a></li>
	    <li role="presentation"><a href="#tab8" aria-controls="tab4" role="tab" data-toggle="tab">2009<label class="label label-warning pull-right label_count"><?php echo $count_year_2009; ?></a></li>
	  </ul>
	</div>

	<!-- Tab Panes -->
	<div class="tab-content">
		
		<!-- Tab 1: 2016 -->
		<div role="tabpanel" class="tab-pane active" id="tab1">
			<div class="year_tabs_container">
				<p class="lead year">2016</p>
				@include('partials.partial_table_1of3')
					@foreach($year_2016 as $item)
						@include('partials.partial_table_2of3')
					@endforeach
				@include('partials.partial_table_3of3')	
			</div><!-- ./year_tabs_container -->
		</div>
		<!-- Tab 1: 2016 -->
		
		<!-- Tab 2: 2015 -->
		<div role="tabpanel" class="tab-pane" id="tab2">
			<div class="year_tabs_container">
				<p class="lead year">2015</p>
				@include('partials.partial_table_1of3')
					@foreach($year_2015 as $item)
						@include('partials.partial_table_2of3')
					@endforeach
				@include('partials.partial_table_3of3')	
			</div><!-- ./year_tabs_container -->
		</div>
		<!-- Tab 2: 2015 -->
		
		<!-- Tab 3: 2014 -->
		<div role="tabpanel" class="tab-pane" id="tab3">
			<div class="year_tabs_container">
				<p class="lead year">2014</p>
				@include('partials.partial_table_1of3')
					@foreach($year_2014 as $item)
						@include('partials.partial_table_2of3')
					@endforeach
				@include('partials.partial_table_3of3')	
			</div><!-- ./year_tabs_container -->
		</div>
		<!-- Tab 3: 2014 -->
		
		<!-- Tab 4: 2013 -->
		<div role="tabpanel" class="tab-pane" id="tab4">
			<div class="year_tabs_container">
				<p class="lead year">2013</p>
				@include('partials.partial_table_1of3')
					@foreach($year_2013 as $item)
						@include('partials.partial_table_2of3')
					@endforeach
				@include('partials.partial_table_3of3')	
			</div><!-- ./year_tabs_container -->
		</div>
		<!-- Tab 4: 2013 -->
		
		<!-- Tab 5: 2012 -->
		<div role="tabpanel" class="tab-pane" id="tab5">
			<div class="year_tabs_container">
				<p class="lead year">2012</p>
				@include('partials.partial_table_1of3')
					@foreach($year_2012 as $item)
						@include('partials.partial_table_2of3')
					@endforeach
				@include('partials.partial_table_3of3')	
			</div><!-- ./year_tabs_container -->
		</div>
		<!-- Tab 5: 2012 -->
		
		<!-- Tab 6: 2011 -->
		<div role="tabpanel" class="tab-pane" id="tab6">
			<div class="year_tabs_container">
				<p class="lead year">2011</p>
				@include('partials.partial_table_1of3')
					@foreach($year_2011 as $item)
						@include('partials.partial_table_2of3')
					@endforeach
				@include('partials.partial_table_3of3')	
			</div><!-- ./year_tabs_container -->
		</div>
		<!-- Tab 6: 2011 -->
		
		<!-- Tab 7: 2010 -->
		<div role="tabpanel" class="tab-pane" id="tab7">
			<div class="year_tabs_container">
				<p class="lead year">2010</p>
				@include('partials.partial_table_1of3')
					@foreach($year_2010 as $item)
						@include('partials.partial_table_2of3')
					@endforeach
				@include('partials.partial_table_3of3')	
			</div><!-- ./year_tabs_container -->
		</div>
		<!-- Tab 7: 2010 -->
		
		<!-- Tab 8: 2009 -->
		<div role="tabpanel" class="tab-pane" id="tab8">
			<div class="year_tabs_container">
				<p class="lead year">2009</p>
				@include('partials.partial_table_1of3')
					@foreach($year_2009 as $item)
						@include('partials.partial_table_2of3')
					@endforeach
				@include('partials.partial_table_3of3')	
			</div><!-- ./year_tabs_container -->
		</div>
		<!-- Tab 8: 2009 -->

	</div>
	<!-- Tab Panes -->



@endsection