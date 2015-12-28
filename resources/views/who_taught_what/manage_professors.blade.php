@extends('app')
@section('content')

	<div class="page_title_icon_container">
		<img src="{{ asset('/img/settings_blue.png') }}" class="page_icon" />
		<h2>Manage Professors</h2>
	</div>
	
	<div class="btn-group sba_btn_group" role="group" aria-label="...">
		<a href="{{ url('manage-courses') }}" class="btn btn-primary">Manage Courses</a>
		<a href="{{ url('manage-professors') }}" class="btn btn-primary active">Manage Professors</a>
	</div>
	
	<a class="btn btn-default wtw_add" data-toggle="modal" data-target="#ModalAddProfessor"><span class="glyphicon glyphicon-plus"></span>Add New Professor</a>

	<?php 
	
		$wtw_professors = DB::table('who_taught_what')
			->where('who_taught_what.wtw_type', '=', 'professor')
			->select('who_taught_what.*')
			 ->orderBy('who_taught_what.wtw_value', 'asc')
			->get();
			
	?>
	
	<table class="table">
		<thead>
			<th>Professor Name</th>
			<th>Created On</th>
			<th>Revoke</th>
		</thead>
		<tbody>
			<?php foreach ($wtw_professors as $item) { ?>
				<tr>
					<td><?php echo $item->wtw_value; ?></td>	
					<td><?php echo $item->created_at; ?></td>
					<td>
						<button type="button" class="btn btn-danger width_100" data-toggle="modal" data-target="#deleteRecordModal<?php echo $item->id; ?>">Remove Professor</button>
					</td>	
				</tr>				
			<?php } ?>
		</tbody>
	</table>

	<?php foreach ($wtw_professors as $item) { ?>
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
						 	{!! Form::submit('Yes, Delete Professor', ['class' => 'btn btn-danger width_100']) !!}
						 {!! Form::close() !!}
					</div><!-- ./col-md-6 -->
				</div><!-- ./row -->
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Delete Modal -->
	<?php } ?>

<!-- Modal: Add New Professor -->
<div class="modal fade" id="ModalAddProfessor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title modal_search" id="myModalLabel"><i class="fa fa-plus"></i> Add New Professor</h4>
			</div><!-- ./modal-header -->
			
			<div class="modal-body">
				
				<form method="POST" action="{{ url('add_new_professor') }}" id="add_new_professor">
					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<input type="hidden" name="wtw_type" value="professor">
					
					<!-- Input Professor Name -->
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label clinics_form_label">New Professor (Preferred Naming Convention is all-capitalized Last Name, First Name):</label>
								<input type="text" class="form-control input-lg" name="wtw_value">
							</div>
						</div>	
					</div><!-- ./row -->
					<!-- Input Professor Name -->
				
					<button type="submit" form="add_new_professor" class="btn btn-block btn-primary center_this browse_submit_btn">Submit New Professor Name</button>
					
				</form>
			</div><!-- modal-body -->
		</div><!-- ./modal-content -->
	</div><!-- ./modal-dialog -->
</div><!-- ./modal .fade -->
<!-- Modal: Add New Professor -->


@endsection