@extends('master.body')
@php $fullname = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname @endphp
@section('title',$fullname)
@section('container')

    <div class="user_details block_container">
        <div class="container-fluid">
            <div class="row">
                <input type="hidden" name='user_id' id="user_id" value="{{ $user->id }}" />
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
                    <table class="table table-hover table_priv">
                        <tr>
                            <td></td>
                            <td>VIEW</td>
                            <td>ADD</td>
                            <td>EDIT</td>
                            <td>DELETE</td>
                        </tr>
                        <tbody>
                            @foreach($user->privileges as $priv)
                            <tr>
                                <td>{{ $priv->feature_description }}</td>
                                <td>
                                    @if($priv->role_view == 1)
                                        <i class="fas fa-check"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($priv->role_add == 1)
                                        <i class="fas fa-check"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($priv->role_edit == 1)
                                        <i class="fas fa-check"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($priv->role_delete == 1)
                                        <i class="fas fa-check"></i>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    
                </div>
            </div>
            <div class="row justify-content-end mt-4">
                @if(Auth::user()->usermanagement_role->role_edit == 1)
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                        <a href="{{ route('users_edit', ['id' => $user->id] ) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                @endif
                @if(Auth::user()->usermanagement_role->role_delete == 1)
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                        <div class="btn btn-danger btn-block btn_delete">Delete</div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('modal')
    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modallabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_modallabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to <strong>REMOVE</strong> user<br> <strong>{{ $fullname }}?</strong><br><br>
                    We will still keep their records but this user will be permanently unavailable.
                </div>
                <div class="modal-footer">
                    <div class="container-fluid">
                        <div class="row justify-content-between">
                            <div class="col-4 col-sm-3 col-md-2 col-lg-2">
                                <button type="button" class="btn btn-link btn_yes_delete">Yes</button>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2 col-lg-2">
                                <button type="button" class="btn btn-danger btn_no_delete">NO</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function(){
            $('.btn_delete').on('click', function(){
                $('#delete_modal').modal('show');
            });
            $('.btn_yes_delete').on('click', function(){
                $('.btn_yes_delete').attr('disabled','disabled');
                $('.btn_yes_delete').html(`<div class="spinner-border text-dark spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);

                $.ajax({
                    type: 'POST',
                    url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/userManagement/delete`,
                    data: {
                        id: $('#user_id').val(),
                    },
                    success: function(response){
                        window.location.replace(`${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/users/list`);
                    }

                })
            });
        });
    </script>
@endsection
