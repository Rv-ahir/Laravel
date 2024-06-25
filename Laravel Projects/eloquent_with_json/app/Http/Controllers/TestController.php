<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user  = Test::find(4);

        return $user;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = new Test;
        // $user->meta_data = [
        //     'name' => 'rohit',
        //     'email' => 'rohit@gmail.com',
        //     'phone' => '9106398568',
        // ];

        // $user->save();

        $user = Test::find(2);
        $user->meta_data = collect($user->meta_data)->forget('name');
        $user->save();

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       

        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
