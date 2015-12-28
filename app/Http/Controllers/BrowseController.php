<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\FileEntry;
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
		$entries_by_professor = FileEntry::whereNotNull('professor_name')->get();
		
		return view('browse.browse_by_professor', compact('entries_by_professor'));
		
	}
	
	public function browse_by_course()
	{
		$entries_by_course = FileEntry::whereNotNull('course_name')->get();

		$join_get_full_name = DB::table('file_entries')
            ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
            ->select('users.user_first_name', 'users.user_last_name')
            ->take(1)
            ->get();
	
		return view('browse.browse_by_course', compact('entries_by_course', 'join_get_full_name'));
		
	}
	
	public function browse_by_student()
	{
		$entries_by_student = FileEntry::whereNotNull('submitting_user_email')->get();

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
		
		$query = FileEntry::whereNotNull('course_name')->where('course_name', '=', ''.$course_name.'')->get();

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
		
		$query = FileEntry::whereNotNull('professor_name')->where('professor_name', '=', ''.$professor_name.'')->get();

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
		
		$query = FileEntry::whereNotNull('submitting_user_email')->where('submitting_user_email', '=', ''.$student_name.'')->get();

		$join_get_full_name = DB::table('file_entries')
            ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
            ->select('users.user_first_name', 'users.user_last_name')
            ->take(1)
            ->get();
        
		return view('browse.search_results_by_professor', compact('query', 'professor_name', 'join_get_full_name'));
		
	}

	public function search_all(Request $request)
	{
		
		//Inputs
		$course_name = Input::get('course_name');
		$professor_name = Input::get('professor_name');
		$academic_term = Input::get('academic_term');
		$year = Input::get('year');


		$query = FileEntry::whereCourseNameOrProfessorNameOrAcademicTermOrYear(Input::get('professor_name'), Input::get('professor_name'), Input::get('academic_term'), Input::get('year'))->get();

		/* 
			http://www.neontsunami.com/posts/dynamic-where-clauses-and-find-methods-in-eloquent-(laravel-4)
			User::firstByAttributes(['email' => 'dwight@example.com', 'first_name' => 'Dwight']);
		*/
		

		$join_get_full_name = DB::table('file_entries')
            ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
            ->select('users.user_first_name', 'users.user_last_name')
            ->take(1)
            ->get();
        
		return view('browse.search_results_all', compact('query', 'course_name', 'professor_name', 'academic_term', 'year', 'join_get_full_name'));
		
	}
	
	public function year()
	{
		
		$year_2009 = FileEntry::where('year', '=', 2009)->get();
		$year_2010 = FileEntry::where('year', '=', 2010)->get();
		$year_2011 = FileEntry::where('year', '=', 2011)->get();
		$year_2012 = FileEntry::where('year', '=', 2012)->get();
		$year_2013 = FileEntry::where('year', '=', 2013)->get();
		$year_2014 = FileEntry::where('year', '=', 2014)->get();
		$year_2015 = FileEntry::where('year', '=', 2015)->get();
		$year_2016 = FileEntry::where('year', '=', 2016)->get();
		
		$count_year_2009 = FileEntry::where('year', '=', 2009)->count();
		$count_year_2010 = FileEntry::where('year', '=', 2010)->count();
		$count_year_2011 = FileEntry::where('year', '=', 2011)->count();
		$count_year_2012 = FileEntry::where('year', '=', 2012)->count();
		$count_year_2013 = FileEntry::where('year', '=', 2013)->count();
		$count_year_2014 = FileEntry::where('year', '=', 2014)->count();
		$count_year_2015 = FileEntry::where('year', '=', 2015)->count();
		$count_year_2016 = FileEntry::where('year', '=', 2016)->count();
		
		$join_get_full_name = DB::table('file_entries')
            ->join('users', 'users.email', '=', 'file_entries.submitting_user_email')
            ->select('users.user_first_name', 'users.user_last_name')
            ->take(1)
            ->get();
        
		return view('browse.year', compact('year_2009', 'year_2010', 'year_2011', 'year_2012', 'year_2013', 'year_2014', 'year_2015', 'year_2016', 'count_year_2009', 'count_year_2010', 'count_year_2011', 'count_year_2012', 'count_year_2013', 'count_year_2014', 'count_year_2015', 'count_year_2016', 'join_get_full_name'));
		
	}

}
