<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;

class RegisterContoller extends Controller
{
    public function index()
    {
        return view('register.register');
    }

    public function store()
    {
        // dd(request()->all());
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'contact_no' => 'required',
            'home_address' => 'required',
            'password' => 'required|min:3|confirmed',
        ]);

        if($user)
        {
            $user_login = User::create($user);
            auth()->login($user_login);
            return redirect('/register/user_view')->with('success','User Saved Successfully');
        }else{
            return redirect('/register/view')->with('error','User Not Saved');
        }

    }

    public function user_view()
    {
        return view('register.view',['users_details' => UserDetails::paginate(4)]);
    }
    public function user_add()
    {
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        // UserDetails::updateOrCreate([
        //     'id' => request()->id
        // ],[
        //     'name' => $user['name'],
        //     'email' => $user['email'],
        //     'address' => $user['address']
        // ]);

        if(!request()->id){
            UserDetails::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'address' => $user['address']
            ]);
            return back()->with('success','Successfully Data Created');
        }else{

            UserDetails::where('id',request()->id)->update([
                'name' => $user['name'],
                'email' => $user['email'],
                'address' => $user['address']
            ]);

            return back()->with('success','Successfully Data Updated');
        }


    }
    public function user_edit(UserDetails $UserDetails)
    {
        return $UserDetails;
    }
    public function user_delete(UserDetails $UserDetails)
    {
        if($UserDetails)
        {
            $UserDetails->delete();
            return back()->with('success','Record Deleted Successfully');
        }else{
            return back()->with('error','Record Not Deleted');
        }
    }

    public function user_search()
    {
        $output="";
        $users_details = UserDetails::where('email','like','%'.request()->data.'%')->get();
        if($users_details)
        {
            foreach ($users_details as $key => $user) {
            $output.='<tr>'.
            '<td>'.$user->name.'</td>'.
            '<td>'.$user->email.'</td>'.
            '<td>'.$user->address.'</td>'.
            '<td>'.
                '<button type="submit" onclick="editproduct($user->id)" class="btn btn-warning mx-2">EDIT</button>
                <button type="submit" onclick="deleteproduct($user->id)" class="btn btn-danger mx-2">DELETE</button>'.
            '</td>'.
            '</tr>';
            }
            return Response($output);
        }
    }
}
