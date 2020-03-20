@extends('master.body')
@php $fullname = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname @endphp
@section('title','Edit User - ' . $fullname)
@section('container')

    <div class="user_add block_container">

        <form class="form-inline user_form" method=POST action="{{ route('users_edit_save', ['id' => $user->id]) }}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <input type='hidden' name='user_id' value='{{ $user->id }}' id='user_id'/>

            <div class="container-fluid">
                <div class="row">
                    <!-- PROFILE -->
                        <div class=" col-lg-6 col-md-12 col-sm-12">
                            <h2>Profile</h2>
                            <hr />
                            
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="firstname">First Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="text" class='form-control' name='firstname' id='firstname' value="{{ $user->firstname }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="middlename">Middle Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="text" class='form-control' name='middlename' id='middlename' value="{{ $user->middlename }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="lastname">Last Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="text" class='form-control' name='lastname' id='lastname' value="{{ $user->lastname }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Contact Number</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="text" class='form-control' name='contact_number' id='contact_number' value="{{ $user->contact_number }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Email</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="email" class='form-control' name='email' id='email' value="{{ $user->email }}">
                                        <p class="error hide">There is already a user associated with this email.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- LOGIN DETAILS -->
                        <div class=" col-lg-6 col-md-12 col-sm-12">
                            <h2>Login Details</h2>
                            <hr />
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="username">User Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input  type="text" class='form-control' name='username' id='username'  value="{{ $user->username }}">
                                        <p class="error hide">Username already taken.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <i>Only this user can change own password</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <h2 class='mt-4'>Privileges</h2>
                <hr />
                <div class="row">
                    <div class=" col-lg-6 col-md-12 col-sm-12">
                        <!-- ACCOUNT PRIVILEGES -->
                        
                        
                        <div class="row">
                            <div class="form-group">
                                <div class=" col-md-4 col-sm-12">
                                    <label for="lastname">Account Type</label>
                                </div>
                                <div class=" col-md-8 col-sm-12">
                                    <select required class='form-control' name='account_type' id='account_type'>
                                        <option value=''>- Select Account Type -</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" {{ $type->id === $user->type->id ? 'selected' : ''}}>{{ $type->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-12">
                        <div class="collapse" id="privileges_collapse">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <table class='table'>
                                            <thead class='thead-dark'>
                                                <tr>
                                                    <th>ACCESSIBILITY</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user->privileges as $sf)
                                                    <tr>
                                                        <td>{{ $sf->feature_description }}</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                                <input type="checkbox" class="custom-control-input feature_view feature_{{ $sf->id }}_view feature_{{ $sf->id }}" 
                                                                    feature='{{ $sf->id }}' id="privilege_{{ $sf->id }}_1" name="privilege_{{ $sf->id }}_1"
                                                                        {{ $sf->role_view == 1 ? 'checked' : '' }}
                                                                        {{ $user->type->id != 1 && $sf->feature_description == 'User Management' ? 'disabled' : ''}}
                                                                    >
                                                                <label class="custom-control-label" for="privilege_{{ $sf->id }}_1">VIEW</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                                <input type="checkbox" class="custom-control-input feature_{{ $sf->id }}_add feature_{{ $sf->id }} " 
                                                                    id="privilege_{{ $sf->id }}_2" name="privilege_{{ $sf->id }}_2"
                                                                        {{ $sf->role_add == 1 ? 'checked' : '' }}
                                                                        {{ $user->type->id != 1 && $sf->feature_description == 'User Management' ? 'disabled' : ''}}
                                                                    >

                                                                <label class="custom-control-label" for="privilege_{{ $sf->id }}_2">ADD</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                                <input type="checkbox" class="custom-control-input feature_{{ $sf->id }}_edit feature_{{ $sf->id }}" 
                                                                    id="privilege_{{ $sf->id }}_3" name="privilege_{{ $sf->id }}_3"
                                                                        {{ $sf->role_edit == 1 ? 'checked' : '' }}
                                                                        {{ $user->type->id != 1 && $sf->feature_description == 'User Management' ? 'disabled' : ''}}
                                                                    >
                                                                <label class="custom-control-label" for="privilege_{{ $sf->id }}_3" >EDIT</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                                <input type="checkbox" class="custom-control-input feature_{{ $sf->id }}_delete feature_{{ $sf->id }}" 
                                                                    id="privilege_{{ $sf->id }}_4" name="privilege_{{ $sf->id }}_4"
                                                                        {{ $sf->role_delete == 1 ? 'checked' : '' }}
                                                                        {{ $user->type->id != 1 && $sf->feature_description == 'User Management' ? 'disabled' : ''}}
                                                                    >
                                                                <label class="custom-control-label" for="privilege_{{ $sf->id }}_4" >DELETE</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            <!-- SUBMIT BUTTON -->

                <div class="row justify-content-center mt-5">
                    <div class=" col-md-3 col-sm-12">
                        <button type="submit" class="btn btn-success btn-block btn_submit">
                            SAVE
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('modal')
    <div class="modal fade" id="confirmation_modal" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="confirmation_modallabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmation_modallabel">Username <strong><span></span></strong> already exists.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    There is already other user associated with this username. Choose another.
                </div>
                <div class="modal-footer">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-4 col-sm-3 col-md-2 col-lg-2">
                                <button type="button" class="btn btn-primary btn_yes_delete" data-dismiss="modal">OK</button>
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
            $('.feature_view').on('change', function(){
                if($(this).is(':checked')){
                    $(`.feature_${$(this).attr('feature')}`).attr('disabled',false);
                } else {
                    $(`.feature_${$(this).attr('feature')}`).prop('checked',false);
                    $(`.feature_${$(this).attr('feature')}`).attr('disabled',true);
                }
                $(this).attr('disabled',false);
            });

            setTimeout(function(){
                if($('#account_type').val() != ''){
                    $('#privileges_collapse').collapse('show');
                } else {
                    $('#privileges_collapse').collapse('hide');
                }
                
                $('#account_type').on('change', function(){
                    if($(this).val() != ''){
                        $('#privileges_collapse').collapse('show');
                    } else {
                        $('#privileges_collapse').collapse('hide');
                    }
                    if($(this).val() != 1){
                        $(`.feature_4`).prop('checked',false);
                        $(`.feature_4`).attr('disabled',true);
                    } else {
                        $(`.feature_4`).attr('disabled',false);
                        $(`.feature_4`).prop('checked',true);
                    }
                });
            }, 1000);

            $(".btn_submit").on('click', function(e){
                e.preventDefault();

                $('.btn_submit')
                    .attr('disabled','disabled')
                    .html(`<div class="spinner-border text-dark spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>`);

                
                $.ajax({
                    type: 'get',
                    url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/userManagement/checkUsername_edit`,
                    data: {
                        id: $('#user_id').val(),
                        username: $("#username").val()
                    },
                    success: function(response){
                        console.log(response);
                        if(response > 0) {
                            $('#confirmation_modal h5 span').html($('#username').val());
                            $('#confirmation_modal').modal('show');
                        } else {
                            console.log('submitted');
                            $('.user_form').submit();
                        }

                        $('.btn_submit')
                            .attr('disabled',false)
                            .html(`Save`);
                    }
                });
            });
        });
    </script>

@endsection