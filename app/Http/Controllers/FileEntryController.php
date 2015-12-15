<?php 
	
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Fileentry;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Input;
use Redirect;

class FileEntryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	public function index()
	{
		$entries = Fileentry::all();
		return view('fileentries.index', compact('entries'));
	}
	
	public function add() {
		
		$entry = new Fileentry();
		
		$entry->professor_name = Input::get("professor_name");
		$entry->course_name = Input::get("course_name");
		$entry->submitting_user_email = Input::get("submitting_user_email");
		
		$file = Request::file('filefield');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		
		$entry->mime = $file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;
		$entry->save();
		return redirect('fileentry');
		
	}
	
	public function get($filename){
		$entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);
		return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
	}
}