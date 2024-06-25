<?php

namespace App\Http\Controllers;

use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =  User::get();
        return view('welcome',compact('user'));
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
        //using  store function....
        // return $request;
        $file = $request->file('photo');
        $path =  $request->file('photo')->store('image','public');
        User::create([
            'photo' => $path,
        ]);
        return redirect()->route('user.index')->with('status', 'Add photo successfully');


        // $file = $request->file('photo');
        // $filename = time().'_'.$file->getClientOriginalName();
        // $path =  $request->file('photo')->storeAs('image',$filename, 'public');
        // return redirect()->route('user.index');
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
        $user = User::find($id);
        return view('update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($request->hasfile('photo')) {
            $user_path = public_path('storage/').$user->photo;
            if(file_exists($user_path))
            {
                @unlink($user_path);
            }
            $path =  $request->file('photo')->store('image','public');
            User::find($id)->update([
                'photo' => $path,
            ]);
            return redirect()->route('user.index')->with('status', 'Update photo successfully');
        }
        
       
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        $user_path = public_path('storage/').$user->photo;
        if(file_exists($user_path))
        {
            @unlink($user_path);
        }
        return redirect()->route('user.index');
    }
}
