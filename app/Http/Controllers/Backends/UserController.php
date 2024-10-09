<?php

namespace App\Http\Controllers\Backends;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authUser = Auth::user();
    
        if ($authUser->role == 'admin') {
            $users = User::where('id', '!=', $authUser->id)->get();
        }

        return view('backends.users.index', [
            'users' => $users
        ]);
    }

    public function personal_info()
    {
        $authUser = Auth::user();
        $users_info = User::where('id', $authUser->id)->get();
        return view('backends.accountusers.index', [
            /*
                'accountusers' => $users_info: This part of the code assigns the retrieved user data ($users_info) to a key named 'accountusers'. 
                This key acts as a variable name within the view template (backends.accountusers.index).
                @foreach ($accountusers as $user)
                    //
                
                @endforeach
            */
            'accountusers' => $users_info
        ]);
    }

    public function create()
    {
        return view('backends.users.create');
    }

    public function store(Request $request)
    {
        $userData = $request->all();

        $file = $request->file('image');
        if ($file){
            $filename = time() . '_' . $file-> getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filenameAndPath = 'users/' . $filename . '.' . $extension;

            $file->storeAs('public/' . $filenameAndPath);
            $userData['profile'] = 'storage/' . $filenameAndPath;

        }
        User::create($userData);
        return redirect(route('backends.users.index'));
    }
    
    public function edit(User $user){
        // Query database to get available table numbers
        $availableRole = [
            'buyer', 
            'seller', 
            'admin'
        ]; // Replace with your logic
        return view('backends.users.eidt', [
            'users' => $user,
            'roles'=> $availableRole
        ]);
    }
    public function update(User $user, Request $request){
        $userData = $request->all();
        $file = $request->file('image');
        if($file) {
            $filename = time() . '_' . $file-> getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filenameAndPath = 'users/' . $filename . '.' . $extension;

            $file->storeAs('public/' . $filenameAndPath);
            $userData['profile'] = 'storage/'. $filenameAndPath;
            // Delete old image
            File::delete($user->profile);
        }
        $user->update($userData);
        return redirect(route('backends.users.index'));
    }
    public function destroy(User $user){
        $user->delete();
        return redirect(route('backends.users.index'));
    }
}