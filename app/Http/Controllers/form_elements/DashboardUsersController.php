<?php

namespace App\Http\Controllers\form_elements;

use App\Models\League;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardUsersController extends Controller{

  public function __construct()
  {
      $this->middleware(function ($request, $next) {
          if ($request->user() && $request->user()->role !== 'super-admin') {
              abort(402, 'Access Denied');
          }

          return $next($request);
      });
  }

  public function index(){
    if(auth()->user()->role != 'super-admin'){
      return abort(402, "you dont have access to this resource");
    }else{
      $users = User::get();
    }

    return view('content.tables.tables-users',compact('users'));
  }

  public function create(){
    return view('content.form-elements.create-user');
  }
    
  public function store(Request $request){
    $data = $request->all();
    

    $user = User::create([
        'name' => $data['name'],
        'role' => "admin",
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);



    return redirect()->route('list-users');
  }

  public function edit($id){
    $user = User::find($id);
    if(!$user){
      return abort(404,"User not found!");
    }

    return view('content.form-elements.edit-user',compact('user'));

  }

  public function update(Request $request){
      $validatedData = $request->validate([
        'name' => 'required', 
        'email' => 'required', 
        'password' => 'required', 
      ]);
      
      $data = $request->all();
      // return $data;

      $user = User::find($request->id);
      
      if(!$user){
        return abort(404,"User not found");
      }

      if($user->password != $request->password){
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $data['status'],
            'password' => bcrypt($data['password']),
        ]);
      }else{
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $data['status'],
        ]);
      }
  
      return redirect()->route('list-users');

  }
    

  
  

  public function delete($id){
    $user = User::find($id);
    if(!$user){
      return abort(404,"User not found!");
    }
    $user->delete();
    return back();
  }
}
