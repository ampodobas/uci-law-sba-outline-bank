@extends('app')
@section('content')


	
<div class="well">
	<h1>Upload</h1>
	
	<!-- Form -->
    <form action="{{route('addentry', [])}}" method="post" enctype="multipart/form-data">
	    
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	    
		<div class="form-group">
			<label for="ProfessorName">Professor Name</label>	
			<select class="form-control" name="professor_name">
				<!-- Include: Professor Names Array -->
				@include('partials.partial_professor_names')
				<!-- Include: Professor Names Array -->
			</select>
		</div>
		
		<div class="form-group">
			<label for="CourseName">Course Name</label>
			<input type="text" class="form-control" name="course_name">
		</div>
	
		<input type="hidden" name="submitting_user_email" value="{{ Auth::user()->email }}" />

	    <div class="container">
		    <div class="col-md-4"> <input type="file" name="filefield"></div>
		    <br/>
		    <div class="col-md-4"><input type="submit"></div>
	    </div>
       
    </form>
    <!-- Form -->
    
</div><!-- ./well -->
 
<div class="well">
	<h1>Files List</h1>
	
	<div class="row">
        <ul class="thumbnails">
			@foreach($entries as $entry)
            <div class="col-md-2">
                <div class="thumbnail">
	                {{$entry->professor_name}}
	                {{$entry->course_name}}
	                
                    <a href="{{route('getentry', $entry->filename)}}">{{$entry->original_filename}}</a>
                </div>
            </div>
			@endforeach
 		</ul>
	</div>
</div><!-- ./well -->

@endsection