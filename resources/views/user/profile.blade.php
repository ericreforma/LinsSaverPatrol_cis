@extends('master.body')

@php $user = Auth::user() @endphp
@section('container')

    <div class="profile block_container">
        <form class="form-inline profile_form" method=POST action="{{ route('profile_store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <!-- PHOTO SECTION -->
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 justify-content-center">
                            <input type="file" class='form-control input-upload-image' name='profile_photo' id='profile_photo'>

                            @if($user->media_id == 0)
                                <label for="profile_photo" class='photo_container photo_container_placeholder'>
                                    <span>{{ substr($user->username, 0, 1) }}</span>
                                </label>
                            @else
                                <label for="profile_photo" class='photo_container' style="background-image: url('/influencer/LinsSaverPatrol_CIS/public/storage/media/{{ $user->media->url }}')">
                                </label>
                            @endif

                            <label for="profile_photo">
                                <div class="btn btn-link btn_change_photo mt-4">Change Photo</div>
                            </label>
                            
                        </div>

                    <!-- DETAILS SECTION -->
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
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
                                        <p class="error error_email">Email already taken</p>
                                    </div>
                                </div>
                            </div>

                            <h2>Login</h2>
                            <hr />
                            
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="username">User Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="text" class='form-control' name='username' id='username' value="{{ $user->username }}">
                                        <p class="error error_username">Username already taken</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input type="hidden" name='isChangePassword' id="isChangePassword">
                                        <div class="btn btn-primary change_password" >Change Password</div>
                                    </div>
                                </div>
                            </div>

                            <div class="collapse" id="passwordCollapse"> 
                                <div class="row">
                                    <div class="form-group">
                                        <div class=" col-md-4 col-sm-12">
                                            <label for="current_password">Current Password</label>
                                        </div>
                                        <div class=" col-md-8 col-sm-12">
                                            <input type="password" class='form-control' name='current_password' id='current_password'>
                                            <p class="error error_password">Password is incorrect</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class=" col-md-4 col-sm-12">
                                            <label for="new_password">New Password</label>
                                        </div>
                                        <div class=" col-md-8 col-sm-12">
                                            <input type="password" class='form-control' name='new_password' id='new_password'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class=" col-md-4 col-sm-12">
                                            <label for="repeat_password">Repeat New Password</label>
                                        </div>
                                        <div class=" col-md-8 col-sm-12">
                                            <input type="password" class='form-control' name='repeat_password' id='repeat_password'>
                                            <p class="error error_repeat">Password did not matched</p>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                                    <button class="btn btn-success btn-block btn-submit">Save</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('modal')
    
@endsection

@section('js')
    <script>
       $(function(){
            $('#profile_photo').on('change', function(){
                photoImage(this);
                $('.photo_container_placeholder span').hide();
            });
            $('.change_password').on('click', function(){
                if($('#passwordCollapse').hasClass('show')) {
                    $('#passwordCollapse').collapse('hide');
                    $('#isChangePassword').val(0);
                    $('#current_password').attr('required',false);
                    $('#new_password').attr('required',false);
                    $('#repeat_password').attr('required',false);

                } else {
                    $('#passwordCollapse').collapse('show');
                    $('#isChangePassword').val(1);
                    $('#current_password').attr('required','required');
                    $('#new_password').attr('required','required');
                    $('#repeat_password').attr('required','required');
                }
            });

            $('.profile_form').one('submit', function(e){
                let me = $(this);
                e.preventDefault();

                $('.btn-submit').attr('disabled','disabled');
                $('.btn-submit').html(`<div class="spinner-border text-dark spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
                $('.error').hide();

                if($('#isChangePassword').val() == 1 && $('#new_password').val() != $('#repeat_password').val()){
                    $('.error_repeat').show();
                    $('.btn-submit').attr('disabled',false);
                    $('.btn-submit').html(`Save`);
                    
                } else {
                    
                    checkForm($('#isChangePassword').val(),$('#current_password').val(), $('#username').val(), $('#email').val(), function(response){
                        let err = 0;

                        if(response.password == 'error') {
                            $('.error_password').show();
                            err += 1;
                        } 

                        if(response.username == 'error') {
                            $('.error_username').show();
                            err += 1;
                        } 
                        if(response.email == 'error') {
                            $('.error_email').show();
                            err += 1;
                        } 

                        if(err == 0) {
                            console.log('submit')
                            me.submit();
                        }

                        $('.btn-submit').attr('disabled',false);
                        $('.btn-submit').html(`Save`);
                    });
                }
               
            })
            
       });
        function checkForm(isPasswordChange, password, username, email, callback) {
            $.ajax({
                type: 'post',
                url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/profile_validate`,
                data: {
                    id: {{ $user->id }},
                    isPasswordChange: isPasswordChange,
                    password: password,
                    username: username,
                    email: email
                },
                success: function(response){
                    callback(response)
                }
            });
        }

        function photoImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(`.photo_container`).css('background-image', `url('${e.target.result}')`);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
    </script>
@endsection
