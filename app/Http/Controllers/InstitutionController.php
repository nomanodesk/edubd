<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Auth;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function dashboard()
     {  
        $findinstitue = Institution::where('user_id', Auth::user()->id)->get();
        // dd($findinstitue);
        if($findinstitue->isEmpty()){
            return view('admin.addinstitue');
        }
         else {
            return view('admin.home');
        }
       
     }
    public function index()
    {
        // return view('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institution $institution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Institution $institution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        //
    }
}
