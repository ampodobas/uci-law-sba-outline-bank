<?php 
	
namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use App\FileEntry;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Laracasts\Flash\Flash;

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
		
		$file = Request::file('filefield');
		
		// Build the validation input as an array
	    $file_validation = array('filefield' => $file);
	
	    // Within the ruleset, the filefield input is required, must be a PDF mime, and must be under 8 megabytes in size
	    $rules = array(
	        'filefield' => 'required|mimes:pdf|max:10000'
	    );
	
	    // Pass the input and rules into the validator
	    $validator = Validator::make($file_validation, $rules);
	
	    // Check to see if validation fails or passes
	    if ($validator->fails())
	    {
	        
	        //Error message
	        Flash::error('You must upload a PDF file under 8 megabytes in size. Please try again.');
	        
	        return redirect('upload');
	    } else
	    {
	        // If the rule validation is met, proceed to upload the file and submit the file and insert user information in the file_entries table 
	    
			$extension = $file->getClientOriginalExtension();
			Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		
			//Collect and store file and user input in file_entries table
			$entry->professor_name = Input::get("professor_name");
			$entry->course_name = Input::get("course_name");
			$entry->submitting_user_email = Input::get("submitting_user_email");
			$entry->submitting_user_id = Input::get("submitting_user_id");
			$entry->academic_term = Input::get("academic_term");
			$entry->year = Input::get("year");
			$entry->submitting_user_id = Input::get("submitting_user_id");
			
			$entry->mime = $file->getClientMimeType();
			$entry->original_filename = $file->getClientOriginalName();
			$entry->filename = $file->getFilename().'.'.$extension;
			$entry->save();
			
			//Success message
			Flash::success('File successfully uploaded. Thank you.');
			
			return redirect('upload');
	    }

	}
	
	public function get($filename){
		$entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);
		return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
	}
}