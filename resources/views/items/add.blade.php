@extends('master.body')

@section('title','New Item')
@section('container')

    <div class="item_add block_container">

        <form class="form-inline" method=POST action="{{ route('item_store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                
                <div class="row">
                    <!-- PROFILE -->
                        <div class=" col-lg-6 col-md-12 col-sm-12">
                          
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="lastname">Brand</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="text" class='form-control' name='brand' id='brand'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="firstname">Category</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="text" class='form-control' name='category' id='category'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="middlename">Display Name</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="text" class='form-control' name='name' id='name'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Price</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                        <input required type="number" class='form-control' name='price' id='price'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-md-4 col-sm-12">
                                        <label for="customer_name">Unit of Price</label>
                                    </div>
                                    <div class=" col-md-8 col-sm-12">
                                       <select required class='form-control' name='unit_id' id='unit_id'>
                                            <option value=''>- Select unit -</option>
                                            @foreach($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }} ({{ $unit->short_name }})</option>
                                            @endforeach
                                       </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class=" col-md-3 col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block">
                                        SAVE
                                    </button>
                                </div>
                            </div>
                        </div>
                   </div>
            <!-- SUBMIT BUTTON -->

               
            </div>
        </form>
    </div>

@endsection