<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\WhoTaughtWhat;

use Input;
use Redirect;
use DB;

class WhoTaughtWhatController extends Controller {

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
	public function store_manage_courses(Request $request)
    {
        
        $input = array_filter(Input::all());
		
	    $wtw = new WhoTaughtWhat();
	
	    $wtw->fill($input);
	
	    $wtw->save();
	    
	     //Error message
	    Flash::success('New Course Added.');
	
		return redirect('manage-courses');
		
    }
    
    public function store_manage_professors(Request $request)
    {
        
        $input = array_filter(Input::all());
		
	    $wtw = new WhoTaughtWhat();
	
	    $wtw->fill($input);
	
	    $wtw->save();
	    
	    // message
	    Flash::success('New Professor Added.');
	
		return redirect('manage-professors');
		
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
		
	    $wtw = WhoTaughtWhat::findOrFail($id);
 
		$wtw->delete();
		
		// message
	    Flash::success('Entry Successfully Removed.');
	
		return view('who_taught_what.manage_courses');
		
	}

	public function manage_courses()
	{

		return view('who_taught_what.manage_courses');
		
	}
	
	public function manage_professors()
	{
		return view('who_taught_what.manage_professors');
	}

}
