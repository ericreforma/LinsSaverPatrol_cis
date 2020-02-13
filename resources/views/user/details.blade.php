@extends('master.body')
@php $fullname = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname @endphp
@section('title',$fullname)
@section('container')

    <div class="user_details block_container">
        <div class="container-fluid">
            <div class="row">
                <!-- PROFILE -->
                    <div class=" col-12">
                        <h2>Profile</h2>
                        <hr />
                        <table class="user_details_table">
                           <tr>
                               <td>Name</td>
                               <td>{{ $fullname}} </td>
                           </tr> 
                           <tr>
                               <td>Username</td>
                               <td>{{ $user->username }} </td>
                           </tr> 
                           <tr>
                               <td>Account Type</td>
                               <td>
                                    <h5>
                                        <span class="badge badge-{{ $user->type_id == 1 ? 'primary' : 'warning' }}">
                                            {{ $user->type->description }}
                                        </span>
                                    </h5>
                               </td>
                           </tr> 
                           <tr>
                               <td>Contact Number</td>
                               <td>{{ $user->contact_number }} </td>
                           </tr> 
                           <tr>
                               <td>Email</td>
                               <td>{{ $user->email }} </td>
                           </tr> 
                        </table>
                    </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <!-- ACCOUNT PRIVILEGES -->
                    <h2>Privileges</h2>
                    <table class="table table-hover">
                        <tr>
                            <td></td>
                            <td>VIEW</td>
                            <td>ADD</td>
                            <td>EDIT</td>
                            <td>DELETE</td>
                        </tr>
                        @foreach($user->privileges as $priv)
                        <tr>
                            <td>{{ $priv->feature_description }}</td>
                            <td>
                                @if($priv->role_view == 1)
                                    <span class="badge badge-success">YES</span>
                                @endif
                            </td>
                            <td>
                                @if($priv->role_add == 1)
                                    <span class="badge badge-success">YES</span>
                                @endif
                            </td>
                            <td>
                                @if($priv->role_edit == 1)
                                    <span class="badge badge-success">YES</span>
                                @endif
                            </td>
                            <td>
                                @if($priv->role_delete == 1)
                                    <span class="badge badge-success">YES</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                </div>
            </div>
            <div class="row justify-content-end mt-4">
                <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                    <a href="" class="btn btn-primary btn-block">Edit</a>
                </div>
                <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                    <div class="btn btn-danger btn-block">Delete</div>
                </div>
            </div>
        </div>
    </div>

@endsection
