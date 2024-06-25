<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\User;
use Illuminate\Http\Request;


class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Info::paginate(10);
        return view('index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insertdata');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birthdate' => 'required',
            'password' => 'required|confirmed',
            'select' => 'required|in:Indai,Pakistan,japan,America',
            'hobby' => 'required',
            'gender' => 'required',
        ],[
            'select.in'=>'Plz select a country',
        ]);


        $hooby = $request->hobby;
        $hooby1 = implode(',', $hooby);
        // return $hooby1;
        $user = Info::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'password' => $request->password,
            'confirm_password' => $request->password_confirmation,
            'country' => $request->select,
            'hobby' => $hooby1,
            'gender' => $request->gender,
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(string $info)
    {
        $user = Info::find($info);
        $hobby = $user->hobby;
        $hobby1 = explode(',', $hobby);
        // return $hobby1;
        return view('update', ['user' => $user, 'hobby' => $hobby1]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birthdate' => 'required',
            'password' => 'required|confirmed',
            'select' => 'required|in:Indai,Pakistan,Japan,America',
            'hobby' => 'required',
            'gender' => 'required',
        ],[
            'select.in'=>'Plz select a country',
        ]);


        $hooby = $request->hobby;
        $hooby1 = implode(',', $hooby);


        $user = Info::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'password' => $request->password,
            'confirm_password' => $request->password_confirmation,
            'country' => $request->select,
            'hobby' => $hooby1,
            'gender' => $request->gender,
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Info::find($id)->delete();

        return redirect()->route('user.index');
    }
}
