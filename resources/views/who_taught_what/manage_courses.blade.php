@extends('app')
@section('content')

	<div class="page_title_icon_container">
		<img src="{{ asset('/img/settings_blue.png') }}" class="page_icon" />
		<h2>Manage Courses</h2>
	</div>
	
	<div class="btn-group sba_btn_group" role="group" aria-label="...">
		<a href="{{ url('manage-courses') }}" class="btn btn-primary active">Manage Courses</a>
		<a href="{{ url('manage-professors') }}" class="btn btn-primary">Manage Professors</a>
	</div>
	
	<a class="btn btn-default wtw_add" data-toggle="modal" data-target="#ModalAddCourse"><span class="glyphicon glyphicon-plus"></span>Add New Course</a>

	
	<?php 
	
		$wtw_courses = DB::table('who_taught_what')
			->where('who_taught_what.wtw_type', '=', 'course')
			->select('who_taught_what.*')
			 ->orderBy('who_taught_what.wtw_value', 'asc')
			->get();
			
	?>
	
	<table class="table">
		<thead>
			<th>Course Name</th>
			<th>Created On</th>
			<th>Revoke</th>
		</thead>
		<tbody>
			<?php foreach ($wtw_courses as $item) { ?>
				<tr>
					<td><?php echo $item->wtw_value; ?></td>	
					<td><?php echo $item->created_at; ?></td>
					<td>
						<button type="button" class="btn btn-danger width_100" data-toggle="modal" data-target="#deleteRecordModal<?php echo $item->id; ?>">Remove Course</button>
					</td>	
				</tr>				
			<?php } ?>
		</tbody>
	</table>

	<?php foreach ($wtw_courses as $item) { ?>
		<!-- Delete Modal -->
		<div class="modal fade" id="deleteRecordModal<?php echo $item->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
		      </div>
		      <div class="modal-body">
		        <p class="lead centered">{{ $item->wtw_value }}
		      </div>
		      <div class="modal-footer">
			      
			    <div class="row">
					<div class="col-md-6">
						<button type="button" class="btn btn-default width_100" data-dismiss="modal">Cancel and Go Back</button>
					</div><!-- ./col-md-6 -->
					
					<div class="col-md-6">
						 {!! Form::model($item, ['method' => 'DELETE', 'route' => ['wtw.destroy', $item->id]]) !!}
						 	{!! Form::submit('Yes, Delete Course', ['class' => 'btn btn-danger width_100']) !!}
						 {!! Form::close() !!}
					</div><!-- ./col-md-6 -->
				</div><!-- ./row -->
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Delete Modal -->
	<?php } ?>

<!-- Modal: Add New Course -->
<div class="modal fade" id="ModalAddCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title modal_search" id="myModalLabel"><i class="fa fa-plus"></i> Add New Course</h4>
			</div><!-- ./modal-header -->
			
			<div class="modal-body">
				
				<form method="POST" action="{{ url('add_new_course') }}" id="add_new_course">
					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<input type="hidden" name="wtw_type" value="course">
					
					<!-- Input Course Name -->
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label clinics_form_label">New Course Name:</label>
								<input type="text" class="form-control input-lg" name="wtw_value">
							</div>
						</div>	
					</div><!-- ./row -->
					<!-- Input Course Name -->
				
					<button type="submit" form="add_new_course" class="btn btn-block btn-primary center_this browse_submit_btn">Submit New Course</button>
					
				</form>
			</div><!-- modal-body -->
		</div><!-- ./modal-content -->
	</div><!-- ./modal-dialog -->
</div><!-- ./modal .fade -->
<!-- Modal: Add New Course -->


@endsection