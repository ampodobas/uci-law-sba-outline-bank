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