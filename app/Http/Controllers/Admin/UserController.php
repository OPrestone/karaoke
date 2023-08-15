<?php

namespace App\Http\Controllers\Admin;

use App\Models\Song;
use App\Models\User;
use App\Models\Artist;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UsersFormRequest;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }
    public function create()
    {
        $user = Auth::user();
        $category= Category::where('status', '0')->get();
        return view('auth.register', compact('category','user'));
    }
    public function store(usersFormRequest $request)
    {
        $data= $request->validated();
        dd($data);
        $user = new User;
        $user->first_name =$data['first_name'];
        $user->last_name =$data['last_name'];
        $user->phone =$data['phone'];
        $user->location =$data['location'];
        $user->dob =$data['dob'];
        $user->email =$data['email'];
        $user->description =$data['description'];
        $user->password =$data['password'];
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file -> move('uploads/users/', $filename);
            $user->image =$filename;
        }
        $user->save();

        return redirect('/home')->with('message', 'User Added Successfully');

    }
    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('dashboard.users.edit', compact('user'));
    }
    public function profile($user_id)
    {
        $user = User::find($user_id);
        $users = User::all();
        return view('dashboard.users.profile', compact('user','users'));
    }
    public function myProfile($user_id)
    {
        $songs = Song::orderBy('created_at', 'DESC')->paginate(10);
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(10);
        $user = User::find($user_id);
        $users = User::all();
        return view('frontend.users.profile', compact('user','users','artists','songs'));
    }
    public function update(Request $request, $user_id)
{
    $user = User::find($user_id);
    if ($user) {
        $user->role_as = $request->role_as;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->dob = $request->dob;
        $user->email = $request->email;
        $user->description = $request->description;
        $user->password = $request->password;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/users/', $filename);
            $user->image = $filename;
        }
        $user->update();
        return redirect('admin/users')->with('message', 'User Updated Successfully');
    }
    return redirect('admin/users')->with('message', 'User not found');
}


}
