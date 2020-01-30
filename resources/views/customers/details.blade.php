@extends('master.body')

@php $fullname = $customer->firstname . ' ' . $customer->middlename . ' ' . $customer->lastname @endphp
@section('title',  $fullname)
@section('container')

    <div class="customer_details container-fluid block_container">
        <div class="row">
            <div class=" col-md-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
                        <a class="nav-item nav-link" id="nav-ledger-tab" data-toggle="tab" href="#nav-ledger" role="tab" aria-controls="nav-ledger" aria-selected="false">Sales Ledger</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class=" col-sm-12 col-md-12 col-lg-6">
                                <table>

                                    <tr>
                                        <td>CODE</td>
                                        <td>{{ $customer->code }} </td>
                                    </tr>
                                    <tr>
                                        <td>STATUS</td>
                                        <td><span class="badge badge-{{ $customer->status == 1 ? 'success' : 'danger' }}">
                                            {{ $customer->status == 1 ? 'ACTIVE' : 'inactive' }}
                                        </span></td>
                                    </tr>
                                    <tr>
                                        <td>CUSTOMER NAME</td>
                                        <td>{{ $customer->firstname }} {{ $customer->middlename }} {{ $customer->lastname }} </td>
                                    </tr>
                                    <tr>
                                        <td>STORE NAME</td>
                                        <td>{{ $customer->store_name }} </td>
                                    </tr>
                                    <tr>
                                        <td>STORE CATEGORY</td>
                                        <td>{{ $customer->store_category->description }} </td>
                                    </tr>
                                    <tr>
                                        <td>CONTACT NUMBER</td>
                                        <td>{{ $customer->contact_number }} </td>
                                    </tr>
                                    <tr>
                                        <td>EMAIL</td>
                                        <td>{{ $customer->email }} </td>
                                    </tr>
                                </table>
                            </div>
                            <div class=" col-sm-12 col-md-12 col-lg-6">
                                <table>
                                    <tr>
                                        <td>PROVINCE</td>
                                        <td>{{ $customer->province->description }} </td>
                                    </tr>
                                    <tr>
                                        <td>CITY</td>
                                        <td>{{ $customer->city->description }} </td>
                                    </tr>
                                    <tr>
                                        <td>BARANGAY</td>
                                        <td>{{ $customer->barangay->description }} </td>
                                    </tr>
                                    <tr>
                                        <td>ADDRESS</td>
                                        <td>{{ $customer->address }} </td>
                                    </tr>
                                    <tr>
                                        <td>LANDMARK</td>
                                        <td>{{ $customer->landmark }} </td>
                                    </tr>
                                    <tr>
                                        <td>GOOGLE MAP</td>
                                        <td>
                                            <a href="{{ $customer->google_map }}" type="button" class="btn btn-secondary" target="_blank">OPEN GOOGLE MAP</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class=" col-sm-12 col-md-12 col-lg-6">
                                <h5>ID ATTACHMENT</h5>
                                <div class="image_container">
                                    <img src="/storage/media/{{ $customer->idMedia->url }}" alt="" data-toggle="modal" data-target="#imagePreviewModal" class="small_preview">
                                </div>
                                
                            </div>
                            <div class=" col-sm-12 col-md-12 col-lg-6">
                                <h5>STORE PHOTO</h5>
                                <div class="image_container">
                                    <img src="/storage/media/{{ $customer->storeMedia->url }}" alt="" data-toggle="modal" data-target="#imagePreviewModal" class="small_preview"> 
                                </div>
                                
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class=" col-sm-4 col-md-3 col-lg-2">
                                <a href="{{ route('customer_editview',$customer->id) }}" type="button" class="btn btn-primary btn-block">EDIT</a>
                            </div>
                            <div class=" col-sm-4 col-md-3 col-lg-2">
                                <a href="{{ route('customer_editview',$customer->id) }}" type="button" class="btn btn-secondary btn-block">SET INACTIVE</a>
                            </div>
                            <div class=" col-sm-4 col-md-3 col-lg-2">
                                <a href="{{ route('customer_editview',$customer->id) }}" type="button" class="btn btn-danger btn-block">DELETE</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-ledger" role="tabpanel" aria-labelledby="nav-ledger-tab">
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection

@section('modal')
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" role="dialog" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <img src='' class='big_preview' data-dismiss="modal">
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function(){
            $('.small_preview').on('click', function(){
                $('.big_preview').attr('src', $(this).attr('src'));
            })
           
        });
    </script>
@endsection