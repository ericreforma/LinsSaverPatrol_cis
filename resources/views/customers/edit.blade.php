@extends('master.body')

@php $fullname = 'Edit Customer - ' .$customer->firstname . ' ' . $customer->middlename . ' ' . $customer->lastname @endphp
@section('title',$fullname)
@section('container')

    <div class="customer_add block_container">

        <form class="form-inline" method=POST action="{{ route('customer_editstore') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <input value="{{ $customer->id }}" type="hidden" class='form-control' name='id' id='id'>
                <div class="row">
                    <!-- PROFILE -->
                        <div class=" col-lg-6 col-md-12 col-sm-12">
                            <h2>Profile</h2>
                            <hr />
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="lastname">Last Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input value="{{ $customer->lastname }}" type="text" class='form-control' name='lastname' id='lastname'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="firstname">First Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input  value="{{ $customer->firstname }}"type="text" class='form-control' name='firstname' id='firstname'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="middlename">Middle Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input value="{{ $customer->middlename }}" type="text" class='form-control' name='middlename' id='middlename'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Store Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input value="{{ $customer->store_name }}" type="text" class='form-control' name='store_name' id='store_name'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Store Category</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <select class='form-control' name='store_category' id='store_category'>
                                            <option value='0'>- Select a Category -</option>
                                            @foreach($storeCategories as $storeCategory)
                                                <option value="{{ $storeCategory->id }}" {{ $customer->store_category_id == $storeCategory->id ? 'selected' : '' }}>{{ $storeCategory->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Contact Number</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input value="{{ $customer->contact_number }}" type="text" class='form-control' name='contact_number' id='contact_number'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Email</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input value="{{ $customer->email }}" type="email" class='form-control' name='email' id='email'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- LOCATION -->

                        <div class=" col-lg-6 col-md-12 col-sm-12">
                            <h2>Location</h2>
                            <hr />
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Province</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <select class='form-control' name='province' id='province'>
                                            <option value='0'>- Select a Province -</option>
                                            @foreach($provinces as $province)
                                                <option value='{{ $province->code }}' {{ $customer->province_code == $province->code ? 'selected' : '' }}>{{ $province->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">City / Municipality</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <select class='form-control' name='cities' id='cities'>
                                            <option value='{{ $customer->city_code }}'>{{ $customer->city->description }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Barangay</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <select class='form-control' name='barangays' id='barangays'>
                                            <option value='{{ $customer->barangay_code }}'>{{ $customer->barangay->description }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Complete Address</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input value="{{ $customer->address }}" type="text" class='form-control' name='address' id='address'>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Land Mark</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input value="{{ $customer->landmark }}" type="text" class='form-control' name='landmark' id='landmark'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="google_map">Google Map</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <a href="https://www.google.com/maps" class="btn btn-secondary" type="button" id="google_map" target="_blank">Open Google Map</a>
                                            </div>
                                            <input type="text" class="form-control" 
                                            value="{{ $customer->google_map }}"
                                            name="google_map"
                                            id="google_map"
                                            placeholder="" aria-label="Example text with button addon" aria-describedby="google_map">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            <!-- PHOTOS -->
                <div class="row">
                    <div class=" col-12">
                        <h2>Photos</h2>
                        <hr />
                        <div class="row">
                            <div class=" col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="idAttachment">Identification Card</label>
                                    <input type="file" class='form-control input-upload-image' name='idAttachment' id='idAttachment'>
                                    <label for="idAttachment" class='image_preview'>
                                        <span>Upload Photo</span>
                                        <img src="/storage/media/{{ $customer->idMedia->url }}" alt="preview" class='img_previewer idAttachment show_preview' >
                                    </label>
                                </div>
                            </div>
                            <div class=" col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="store_photo">Store Photo</label>
                                    <input type="file" class='form-control input-upload-image' name='store_photo' id='store_photo'>
                                    <label for="store_photo" class='image_preview '>
                                        <span>Upload Photo</span>
                                        <img src="/storage/media/{{ $customer->storeMedia->url }}" alt="preview" class='img_previewer store_photo show_preview'>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- SUBMIT BUTTON -->

                <div class="row justify-content-center">
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