@extends('master.body')

@section('title','Edit')
@section('container')

    <div class="user_add block_container">

        <form class="form-inline user_form" method=POST action="{{ route('users_store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
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
                                        <input required type="text" class='form-control' name='firstname' id='firstname'>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="middlename">Middle Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="text" class='form-control' name='middlename' id='middlename'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="lastname">Last Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="text" class='form-control' name='lastname' id='lastname'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Contact Number</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="text" class='form-control' name='contact_number' id='contact_number'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Email</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="email" class='form-control' name='email' id='email'>
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
                                        <input required type="text" class='form-control' name='username' id='username'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="password" class='form-control' name='password' id='password'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="confirmpassword">Confirm Password</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="password" class='form-control' name='confirmpassword' id='confirmpassword'>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- ACCOUNT PRIVILEGES -->
                        <h2>Privileges</h2>
                        <hr />
                        <div class="row">
                            <div class="form-group">
                                <div class=" col-md-4 col-sm-12">
                                    <label for="lastname">Account Type</label>
                                </div>
                                <div class=" col-md-8 col-sm-12">
                                    <select required class='form-control' name='account_type' id='account_type'>
                                        <option value=''>- Select Account Type -</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
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
                                                @foreach($systemFeatures as $sf)
                                                    <tr>
                                                        <td>{{ $sf->description }}</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                                <input type="checkbox" class="custom-control-input feature_view feature_{{ $sf->id }}_view feature_{{ $sf->id }}" 
                                                                    feature='{{ $sf->id }}' id="privilege_{{ $sf->id }}_1" name="privilege_{{ $sf->id }}_1">
                                                                <label class="custom-control-label" for="privilege_{{ $sf->id }}_1">VIEW</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                                <input type="checkbox" class="custom-control-input feature_{{ $sf->id }}_add feature_{{ $sf->id }} " 
                                                                    id="privilege_{{ $sf->id }}_2" name="privilege_{{ $sf->id }}_2" disabled>
                                                                <label class="custom-control-label" for="privilege_{{ $sf->id }}_2">ADD</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                                <input type="checkbox" class="custom-control-input feature_{{ $sf->id }}_edit feature_{{ $sf->id }}" 
                                                                    id="privilege_{{ $sf->id }}_3" name="privilege_{{ $sf->id }}_3" disabled>
                                                                <label class="custom-control-label" for="privilege_{{ $sf->id }}_3" >EDIT</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                                <input type="checkbox" class="custom-control-input feature_{{ $sf->id }}_delete feature_{{ $sf->id }}" 
                                                                    id="privilege_{{ $sf->id }}_4" name="privilege_{{ $sf->id }}_4" disabled>
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
                        <button type="submit" class="btn btn-success btn-block">
                            SAVE
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')
    <script>
        $(function(){
            $(`.feature_1`).prop('checked',true);
            $(`.feature_1`).attr('disabled',false);
            $(`.feature_2`).prop('checked',true);
            $(`.feature_2`).attr('disabled',false);
            $(`.feature_3`).prop('checked',true);
            $(`.feature_3`).attr('disabled',false);
            $(`.feature_5`).prop('checked',true);
            $(`.feature_5`).attr('disabled',false);

            
            $('.feature_view').on('change', function(){
                if($(this).is(':checked')){
                    $(`.feature_${$(this).attr('feature')}`).attr('disabled',false);
                } else {
                    $(`.feature_${$(this).attr('feature')}`).prop('checked',false);
                    $(`.feature_${$(this).attr('feature')}`).attr('disabled',true);
                }
                $(this).attr('disabled',false);
            });

            if($('#account_type').val() != ''){
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


            $(".user_form").one('submit', function(e){
                e.preventDefault();

                if($('.password').val() != $('.confirmpassword').val()){
                    alert('Password did not matched!');
                } else {
                    $(this).submit();
                }
            });
        });
    </script>

@endsection