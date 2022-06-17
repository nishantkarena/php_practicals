<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
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
        $data = User::where('usertype', '0')->paginate(5);
    
        return view('home',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'name' => 'required|min:4|max:14|string',
            'email' => 'required|email',
            'gender'=>'required',
            'hobbies'=>'required',
            'password'=>'required|min:6|max:10|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/',
        ],[
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'password.regex'=>'Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->hobbies = implode(',',$request->hobbies);
        $user->password = Hash::make($request->password);
        $user->save();
     
        return redirect()->route('home')
                        ->with('success','Admin created successfully.');
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
        $data = User::find($id);
        return view('admin.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {      
        $request->validate([
            'name' => 'required|min:4|max:14|string',
            'email' => 'required|email',
            'gender'=>'required',
            'hobbies'=>'required',
        ],[
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',         
        ]);
        $user= User::find($id);
        if($request->password == ""){
            $user->name=$request->name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->hobbies = implode(',',$request->hobbies);
            $user->update();
        }else{
            $user->name=$request->name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->hobbies = implode(',',$request->hobbies);
            $user->password = Hash::make($request->password);
            $user->update();
        }
        return redirect()->route('home')
                        ->with('success','Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect()->route('home')
                        ->with('success','Admin deleted successfully');
    }
}
