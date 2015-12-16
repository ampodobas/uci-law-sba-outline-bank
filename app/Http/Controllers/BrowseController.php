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

}
