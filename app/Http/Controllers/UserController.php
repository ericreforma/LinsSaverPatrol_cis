<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserType;
use App\SystemFeatures;
use App\UserPrivilege;
use Auth;

class UserController extends Controller
{
    public function list(){
        if(Auth::user()->usermanagement_role->role_view == 1){

            session(['active_nav' => 'users']);
            $users = User::
                    orderBy('created_at','desc')
                    ->with('type')
                    ->get();

            return view('user.list', compact('users'));
        }

        return abort(404);
    }

    public function store_view(){
        $types = UserType::all();
        $systemFeatures = SystemFeatures::all();

        return view('user.add', compact('types','systemFeatures'));
    }

    public function store(Request $request){
        $user = new User;
        $types = UserType::all();
        $systemFeatures = SystemFeatures::all();

        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;
        $user->type_id = $request->account_type;
        $user->password = Hash::make($request->password);
        $user->save();

        foreach($systemFeatures as $sf){
            $user_feature = new UserPrivilege;
            $user_feature->user_id = $user->id;
            $user_feature->feature_id = $sf->id;
            $user_feature->feature_description = $sf->description;
            $user_feature->role_view = $request->has('privilege_' . (string)$sf->id . '_1') ? 1 : 0;
            $user_feature->role_add = $request->has('privilege_' . (string)$sf->id . '_2') ? 1 : 0;
            $user_feature->role_edit = $request->has('privilege_' . (string)$sf->id . '_3') ? 1 : 0;
            $user_feature->role_delete = $request->has('privilege_' . (string)$sf->id . '_4') ? 1 : 0;
            $user_feature->save();
        }

        return redirect()->route('users_details', ['id' => $user->id]);
    }

    public function details($id){
        $user = User::find($id);

        return view('user.details', compact('user'));
    }
}
