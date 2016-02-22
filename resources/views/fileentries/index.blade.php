@extends('app')
@section('content')

<h1 class="page_title">Upload An Outline</h1>

<p class="justified upload_instructions">The fields below marked with an asterisk (Professor, Course Name, and the file) are required.
If the relevant Professor and/or course are  not listed, select &quot;NOT LISTED&quot; from the
drop-down menu. Each uploaded outline must be a Microsoft Word (.docx only) or PDF file.</p>
</p>

@if (Session::has('message'))
	<div class="flash alert-info">
		<p>{{ Session::get('message') }}</p>
	</div>
@endif

<!-- Form: Upload File -->
<form action="{{route('addentry', [])}}" method="post" id="upload" enctype="multipart/form-data">
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <!-- Upload: Step 1 -->
    <div class="row upload_step_row">
	    <div class="col-md-4 left">
		    <h2>Step 1 <strong>*</strong></h2>
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
		    <h2>Step 2 <strong>*</strong></h2>
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
		    <h2>Step 3 <strong>*</strong></h2>
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
		    <h4>Academic Term</h4>
	    </div>
	    <div class="col-md-8 right">
		    <select class="form-control" name="academic_term">
			    <option value="">Select Academic Term</option>
			    <!-- Include: Academic Terms Array -->
				@include('partials.partial_academic_terms')
				<!-- Include: Academic Terms Array -->
			</select>
	    </div>
    </div>
    <!-- Upload: Step 4 -->
    
    <!-- Upload: Step 5 -->
    <div class="row upload_step_row">
	    <div class="col-md-4 left">
		    <h2>Step 5</h2>
		    <h4>Select Year</h4>
	    </div>
	    <div class="col-md-8 right">
		    <select class="form-control" name="year">
			    <option value="">Select Year</option>
			    <!-- Include: Years Array -->
				@include('partials.partial_years')
				<!-- Include: Years Array -->
			</select>
	    </div>
    </div>
    <!-- Upload: Step 5 -->
    
    <!-- Upload: Step 6 -->
    <div class="row upload_step_row">
	    <div class="col-md-4 left">
		    <h2>Step 6</h2>
		    <h4>Show My Name?</h4>
	    </div>
	    <div class="col-md-8 right">
		    <select class="form-control" name="submitting_user_reveal_id">
			    <option value="">Select Yes/No</option>
			    <option value="yes">Yes</option>
			    <option value="no">No</option>
			</select>
	    </div>
    </div>
    <!-- Upload: Step 6 -->
    
    <!-- Upload: Hidden Fields -->
    <input type="hidden" name="submitting_user_id" value="{{ Auth::user()->id }}" />
    <input type="hidden" name="submitting_user_email" value="{{ Auth::user()->email }}" />
    <input type="hidden" name="submitting_user_first_name" value="{{ Auth::user()->user_first_name }}" />
    <input type="hidden" name="submitting_user_last_name" value="{{ Auth::user()->user_last_name }}" />
    <input type="hidden" name="submitting_user_projected_graduation_year" value="{{ Auth::user()->projected_graduation_year }}" />
    <!-- Upload: Hidden Fields -->
    
    <hr/>
    
    <!-- Upload: Submit -->
    <div class="row upload_step_row">
	    <button type="submit" form="upload" value="Upload" class="btn btn-inverted btn-block btn_sba" ><span class="glyphicon glyphicon-cloud-upload"></span>Upload</button>
    </div>
    <!-- Upload: Submit -->
	
</form>
<!-- Form: Upload File -->


@endsection