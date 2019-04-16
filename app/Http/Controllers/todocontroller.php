<?php

namespace App\Http\Controllers;

use App\todo;
use Illuminate\Http\Request;

class todocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return todo::where('cleared', 0)->orderBy('id', 'asc')->get();
    }

    public function remaining()
    {
        return todo::where('complete', 0)->orderBy('id', 'asc')->get();
    }

    public function completed()
    {
        return todo::where('complete', 1)->where('cleared', 0)->orderBy('id', 'asc')->get();
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
       $todo = new todo();

       $todo->text = request('body');
       $todo->complete = 0;
       $todo->cleared = 0;

       $todo->save();

       return todo::orderBy('id', 'asc')->get();
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todo $todo)
    {
        $todo = todo::findOrFail(request('id'));
 
        $todo->complete = !$todo->complete;
 
        $todo->save();
 
        return todo::orderBy('id', 'asc')->get();
    }

    public function updatecleared(Request $request, todo $todo)
    {
        $todo = todo::findOrFail(request('id'));
 
        $todo->cleared = 1;
 
        $todo->save();
 
        return todo::orderBy('id', 'asc')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo $todo)
    {
        //
    }
}
