<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Media;
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
                    where('deleted', '0')
                    ->orderBy('created_at','desc')
                    ->with('type')
                    ->get();

            return view('user.list', compact('users'));
        }

        return abort(404);
    }

    private function saveMedia($owner_id, $file) {
        $media = new Media;
        $media->owner_id = $owner_id;
        $media->save();

        $extension = $file->extension();
        $filename = $media->owner_id . '_' . $media->id . '.' . $extension;
        $media->url = 'users/' . $filename;
        $file->storeAs('/media/users', $filename, 'public');
        $media->save();
    
        return $media->id;
    }
      
    public function store_view(){
        if(Auth::user()->usermanagement_role->role_add == 1){
            $types = UserType::all();
            $systemFeatures = SystemFeatures::all();

            return view('user.add', compact('types','systemFeatures'));
        }

        return abort(404);
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
        if(Auth::user()->usermanagement_role->role_view == 1){
            $user = User::find($id);

            return view('user.details', compact('user'));
        }
        return abort(404);
    }

    public function edit_view($id){
        if(Auth::user()->usermanagement_role->role_edit == 1){
            $user = User::find($id);
            $types = UserType::all();
            $systemFeatures = SystemFeatures::all();

            return view('user.edit', compact('user', 'types','systemFeatures'));
        }
        return abort(404);
    }
    
    public function edit_store(Request $request){
        $user = User::find($request->user_id);

        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;
        $user->type_id = $request->account_type;

        $user->save();

        foreach($user->privileges as $sf){
            $user_feature = UserPrivilege::find($sf->id);
            $user_feature->role_view = $request->has('privilege_' . (string)$sf->id . '_1') ? 1 : 0;
            $user_feature->role_add = $request->has('privilege_' . (string)$sf->id . '_2') ? 1 : 0;
            $user_feature->role_edit = $request->has('privilege_' . (string)$sf->id . '_3') ? 1 : 0;
            $user_feature->role_delete = $request->has('privilege_' . (string)$sf->id . '_4') ? 1 : 0;
            $user_feature->save();
        }

        return redirect()->route('users_details', ['id' => $user->id]);
    }

    public function add_check_username(Requestn $request){
        $isExist = User::where('username',$request->username)
            ->count();

        return $isExist;
    }

    public function edit_check_username(Request $request){
        $isExist = User::where('username',$request->username)
                    ->where('id','<>', $request->id)
                    ->count();

        return $isExist;
    }

    public function add_check_email(Request $request){
        $isExist = User::where('email',$request->email)
                    ->where('id','<>', $request->id)
                    ->count();

        return $isExist;
    }

    public function edit_check_email(Request $request){
        $isExist = User::where('email',$request->email)
                    ->where('id','<>', $request->id)
                    ->count();

        return $isExist;
    }

    public function delete(Request $request){
        $user = User::find($request->id);
        $user->deleted = 1;
        $user->save();
    }

    public function checkPassword(Request $request) {
        $user = User::find($request->id);

        if(Hash::check($request->password, $user->password)){
            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
        
    }

    public function profile_validate(Request $request) {
        $user = User::find($request->id);
        $password_response = 'success';
        $username_response = 'error';
        $email_response = 'error';

        if($request->isPasswordChange == 1) {
            if(Hash::check($request->password, $user->password)){
                $password_response = 'success';
            } else {
                $password_response = 'error';
            }
        }

        $emailExist = User::where('email',$request->email)
                    ->where('id','<>', $request->id)
                    ->count();
        
        $usernameExist = User::where('username',$request->username)
                    ->where('id','<>', $request->id)
                    ->count();

        if($emailExist == 0) {
            $email_response = 'success';
        }
        if($usernameExist == 0) {
            $username_response = 'success';
        }

        return response()->json([
            'password' => $password_response, 
            'email' => $email_response,
            'username' => $username_response
        ]);
    }

    public function profile_view(){
        return view('user.profile');
    }

    public function profile_store(Request $request){
        $user = User::find($request->user()->id);

        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;

        if($request->has('profile_photo')){
            $user->media_id = $this->saveMedia($user->id, $request->file('profile_photo'));
        }

        if($request->isChangePassword == 1) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('profile');
    }
}
