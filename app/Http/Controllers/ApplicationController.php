<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Application::latest()->get();

        return response()->json([
            'applications' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ran_file = Str::random(15);
    	$file = $request->resume_file->getClientOriginalName();
    	$file = $ran_file.$file;
    	$request->photo->storeAs("resumes",$file,"public");

        Application::create([
            'job_id' => $request->job_id,
            'status' => $request->status,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone, 
            'resume_file' => $file
        ]);

        return response()->json([
            'applications' => Application::latest()->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'application' => Application::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Application::find($id);

        $data->update([
            'status' => $request->status
        ]);

        return response()->json([
            'applications' => Application::latest()->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Application::find($id);

        $data->delete();
        
        return response()->json([
            'applications' => Application::latest()->get(),
        ]);
    }
}
