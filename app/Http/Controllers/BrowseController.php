<?php namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Fileentry;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Input;
use Redirect;
use DB;

class BrowseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function browse_by_professor()
	{
		$entries_by_professor = Fileentry::whereNotNull('professor_name')->get();

		$join_get_full_name = DB::table('file_entries')
            ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
            ->select('users.user_first_name', 'users.user_last_name')
            ->take(1)
            ->get();
		
		return view('browse.browse_by_professor', compact('entries_by_professor', 'join_get_full_name'));
		
	}
	
	public function browse_by_course()
	{
		$entries_by_course = Fileentry::whereNotNull('course_name')->get();

		$join_get_full_name = DB::table('file_entries')
            ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
            ->select('users.user_first_name', 'users.user_last_name')
            ->take(1)
            ->get();
	
		return view('browse.browse_by_course', compact('entries_by_course', 'join_get_full_name'));
		
	}
	
	public function browse_by_student()
	{
		$entries_by_student = Fileentry::whereNotNull('submitting_user_email')->get();

		$join_get_full_name = DB::table('file_entries')
            ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
            ->select('users.user_first_name', 'users.user_last_name')
            ->take(1)
            ->get();
		
		return view('browse.browse_by_student', compact('entries_by_student', 'join_get_full_name'));
		
	}
	
	
	public function search_by_course(Request $request)
	{
		$course_name = Input::get('course_name');
		
		$query = Fileentry::whereNotNull('course_name')->where('course_name', '=', ''.$course_name.'')->get();

		$join_get_full_name = DB::table('file_entries')
            ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
            ->select('users.user_first_name', 'users.user_last_name')
            ->take(1)
            ->get();
        
		return view('browse.search_results_by_course', compact('query', 'course_name', 'join_get_full_name'));
		
	}
	
	public function search_by_professor(Request $request)
	{
		$professor_name = Input::get('professor_name');
		
		$query = Fileentry::whereNotNull('professor_name')->where('professor_name', '=', ''.$professor_name.'')->get();

		$join_get_full_name = DB::table('file_entries')
            ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
            ->select('users.user_first_name', 'users.user_last_name')
            ->take(1)
            ->get();
        
		return view('browse.search_results_by_professor', compact('query', 'professor_name', 'join_get_full_name'));
		
	}
	
	public function search_by_student(Request $request)
	{
		$student_name = Input::get('student_name');
		
		$query = Fileentry::whereNotNull('submitting_user_email')->where('submitting_user_email', '=', ''.$student_name.'')->get();

		$join_get_full_name = DB::table('file_entries')
            ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
            ->select('users.user_first_name', 'users.user_last_name')
            ->take(1)
            ->get();
        
		return view('browse.search_results_by_professor', compact('query', 'professor_name', 'join_get_full_name'));
		
	}
	
	public function search_all(Request $request)
	{
		
		$course_name = Input::get('course_name');
		$professor_name = Input::get('professor_name');
		
		//if professor_name provided, but not course_name
		if (!(empty($professor_name)) && empty($course_name))
		{
			$query = Fileentry::whereNotNull('professor_name')->where('professor_name', '=', ''.$professor_name.'')->get();
		}
		
		//if course_name provided, but not professor_name
		if (!(empty($course_name)) && empty($professor_name))
		{
			$query = Fileentry::whereNotNull('course_name')->where('course_name', '=', ''.$course_name.'')->get();
		}
		
		//if course_name AND professor_name provided
		if (!(empty($professor_name)) && !(empty($course_name)))
		{
			$query = Fileentry::whereNotNull('course_name')
				->whereNotNull('updated_at')
				->where('course_name', '=', ''.$course_name.'')
				->where('professor_name', '=', ''.$professor_name.'')
				->get();
		}

		$join_get_full_name = DB::table('file_entries')
            ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
            ->select('users.user_first_name', 'users.user_last_name')
            ->take(1)
            ->get();
        
		return view('browse.search_results_all', compact('query', 'course_name', 'professor_name', 'join_get_full_name'));
		
	}

}
