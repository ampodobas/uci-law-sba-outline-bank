@extends('app')
@section('content')

<h1 class="page_title">Upload Outline</h1>

@if (Session::has('message'))
	<div class="flash alert-info">
		<p>{{ Session::get('message') }}</p>
	</div>
@endif

<!-- Form: Upload File -->
<form action="{{route('addentry', [])}}" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <!-- Upload: Step 1 -->
    <div class="row upload_step_row">
	    <div class="col-md-4 left">
		    <h2>Step 1</h2>
		    <h4>Professor</h4>
	    </div>
	    <div class="col-md-8 right">
		    <select class="form-control" name="professor_name">
			    <option value="">Select Professor Name</option>
				<!-- Include: Professor Names Array -->
				@include('partials.partial_professor_names')
				<!-- Include: Professor Names Array -->
		</select>

	    </div>
    </div>
    <!-- Upload: Step 1 -->
    
    <!-- Upload: Step 2 -->
    <div class="row upload_step_row">
	    <div class="col-md-4 left">
		    <h2>Step 2</h2>
		    <h4>Course Name</h4>
	    </div>
	    <div class="col-md-8 right">
		    <select class="form-control" name="course_name">
			    <option value="">Select Course Title</option>
				<!-- Include: Course Titles Array -->
				@include('partials.partial_course_titles')
				<!-- Include: Course Titles Array -->
		</select>

	    </div>
    </div>
    <!-- Upload: Step 2 -->
    
    <!-- Upload: Step 3 -->
    <div class="row upload_step_row">
	    <div class="col-md-4 left">
		    <h2>Step 3</h2>
		    <h4>Upload PDF</h4>
	    </div>
	    <div class="col-md-8 right">
		    <div class="file_select_container">
		    	<div class="col-md-4"><input type="file" class="sba_btn" name="filefield"></div>
		    </div>
	    </div>
    </div>
    <!-- Upload: Step 3 -->
    
    <!-- Upload: Step 4 -->
    <div class="row upload_step_row">
	    <div class="col-md-4 left">
		    <h2>Step 4</h2>
		    <h4>Show You As Contributor?</h4>
	    </div>
	    <div class="col-md-8 right">
		    <select class="form-control" name="submitting_user_email">
			    <option value="">No</option>
			    <option value="{{ Auth::user()->email }}" name="submitting_user_email">Yes</option>
		</select>

	    </div>
    </div>
    <!-- Upload: Step 4 -->
    
    <hr/>
    
    <!-- Upload: Submit -->
    <div class="row upload_step_row">
	    <input type="submit" value="Submit">
	    <button type="submit" form="upload" value="Upload" class="btn btn-inverted btn-block btn_sba" ><span class="glyphicon glyphicon-cloud-upload"></span>Upload</button>
    </div>
    <!-- Upload: Submit -->
	
</form>
<!-- Form: Upload File -->


@endsection