<?php

namespace App\Http\Controllers;

use App\Models\rohit;
use Illuminate\Http\Request;

class RohitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = rohit::paginate(10); 
       
        return view('viewtable',['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('openaddfrom');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
            rohit::create([
                'name' => $request->name,
                'city' => $request->city,
            ]);

           return  redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = rohit::find($id);
        return view('show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = rohit::find($id);
        return view('update',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        rohit::find($id)->update([
            'name' => $request->name,
            'city' => $request->city,
        ]);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $user = rohit::find($id);
       $user->delete();
       return redirect()->route('user.index');

    }   
}
