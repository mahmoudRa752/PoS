<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct(){

        $this->middleware(['permission:users-create'])->only('create');
        $this->middleware(['permission:users-read'])->only('index');
        $this->middleware(['permission:users-update'])->only('edit');
        $this->middleware(['permission:users-delete'])->only('destroy');

    }

    public function index(Request $request)
    {

        $users=User::whereRoleIs('admin')->when($request->search,function($query) use ($request){
            return $query->where('first_name','like','%'.$request->search.'%')
                         ->orWhere('last_name','like','%'.$request->search.'%');
        })->paginate(10);
        return view('dashboard.users.index',compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed',
        ]);


        $request_data = $request->except(['password'],['password_confirmation'],['permission'],['image']);
        $request_data['password']=bcrypt($request->password);

        if($request->image){
            Image::make($request->image)->resize(300,null,function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('uploads\users-images\\'.$request->image->hashName()));
        }
        $request_data['image']=$request->image->hashName();

        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        session()->flash('success','user added successfully');
        return redirect()->route('dashboard.users.index');
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
        ]);

        $request_data = $request->except(['permissions']);
        $user->update($request_data);

        $user->syncPermissions($request->permissions);
        session()->flash('success','user updated successfully');
        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        if($user->image != 'default.png'){
            Storage::disk('public_uploads')->delete('/users-images/'.$user->image);
        }

        $user->delete();

        session()->flash('success','user deleted successfully');
        return back();
    }
}
