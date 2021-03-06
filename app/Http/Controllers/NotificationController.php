<?php

namespace App\Http\Controllers;

use App\DatabaseNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notification.index')
            ->withNotifications(auth()->user()->notifications);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DatabaseNotification  $databaseNotification
     * @return \Illuminate\Http\Response
     */
    public function show(DatabaseNotification $databaseNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DatabaseNotification  $databaseNotification
     * @return \Illuminate\Http\Response
     */
    public function edit(DatabaseNotification $databaseNotification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DatabaseNotification  $databaseNotification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatabaseNotification $databaseNotification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DatabaseNotification  $databaseNotification
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatabaseNotification $databaseNotification)
    {
        //
    }
}
