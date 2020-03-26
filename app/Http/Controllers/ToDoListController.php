<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\To_do_list;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $to_do_lists = To_do_list::where('do_at', '>=', date('Y-m-d'))
            ->orWhere('status', '=', 'New')
            ->orderBy('do_at')->get();
        return view('welcome', compact('to_do_lists'));
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
        $request->validate([
            'do_at' => 'required|date',
            'topic' => 'required',
        ]);
        To_do_list::create([
            'do_at' => $request->do_at,
            'topic' => $request->topic,
            'status' => 'New',
        ]);
        return \redirect('list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $to_do_lists = To_do_list::find($id);
        $to_do_lists->delete();
        return \redirect('list');
    }
    function ajax_change_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;

        $to_do_lists = To_do_list::find($id);
        $to_do_lists->status = $status;
        $to_do_lists->save();
    }
}
