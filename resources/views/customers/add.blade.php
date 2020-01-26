@extends('master.body')

@section('title','New Customer')
@section('container')

    <div class="customer_add form_container">

        <form class="form-inline" method=POST action="{{ route('customer_store') }}">
            @csrf
            <div class="container">
                <!-- PROFILE -->
                    <h2>Profile</h2>
                    <hr />
                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">Customer Name</label>
                            </div>
                            <div class="col col-9">
                                <input type="text" class='form-control' name='name' id='customer_name'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">Store Name</label>
                            </div>
                            <div class="col col-9">
                                <input type="text" class='form-control' name='store_name' id='store_name'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">Store Category</label>
                            </div>
                            <div class="col col-9">
                                <input type="email" class='form-control' name='email' id='email'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">Contact Number</label>
                            </div>
                            <div class="col col-9">
                                <input type="text" class='form-control' name='contact_number' id='contact_number'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">Email</label>
                            </div>
                            <div class="col col-9">
                                <input type="email" class='form-control' name='email' id='email'>
                            </div>
                        </div>
                    </div>

                <!-- LOCATION -->
                    <h2>Location</h2>
                    <hr />
                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">Province</label>
                            </div>
                            <div class="col col-9">
                                <input type="text" class='form-control' name='province' id='province'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">City</label>
                            </div>
                            <div class="col col-9">
                                <input type="text" class='form-control' name='city' id='city'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">Barangay</label>
                            </div>
                            <div class="col col-9">
                                <input type="text" class='form-control' name='barangay' id='barangay'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">Complete Address</label>
                            </div>
                            <div class="col col-9">
                                <input type="text" class='form-control' name='address' id='address'>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">Land Mark</label>
                            </div>
                            <div class="col col-9">
                                <input type="text" class='form-control' name='landmark' id='landmark'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">Google Map</label>
                            </div>
                            <div class="col col-9">
                                <input type="text" class='form-control' name='google_map' id='google_map'>
                            </div>
                        </div>
                    </div>

                <!-- PHOTOS -->
                    <h2>PHOTOS</h2>
                    <hr />
                    <div class="row">
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">ID Attachment</label>
                            </div>
                            <div class="col col-9">
                                <input type="text" class='form-control' name='province' id='province'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col col-3">
                                <label for="customer_name">Store Photo</label>
                            </div>
                            <div class="col col-9">
                                <input type="text" class='form-control' name='province' id='province'>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

@endsection