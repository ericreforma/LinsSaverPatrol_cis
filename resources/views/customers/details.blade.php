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
                    <!-- DETAILS -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <table class='table_details'>

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
                                <div class=" col-sm-12 col-md-6 col-lg-6">
                                    <table class='table_details'>
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
                                        <img src="/LinsSaverPatrol_CIS/public/storage/media/{{ $customer->idMedia->url }}" alt="" data-toggle="modal" data-target="#imagePreviewModal" class="small_preview">
                                    </div>
                                    
                                </div>
                                <div class=" col-sm-12 col-md-12 col-lg-6">
                                    <h5>STORE PHOTO</h5>
                                    <div class="image_container">
                                        <img src="/LinsSaverPatrol_CIS/public/storage/media/{{ $customer->storeMedia->url }}" alt="" data-toggle="modal" data-target="#imagePreviewModal" class="small_preview"> 
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <table class='author_table'>
                                        <tr>
                                            <td>Created By:</td>
                                            <td>
                                                
                                                {{ $creator->user->firstname }}
                                                {{ $creator->user->middlename }}
                                                {{ $creator->user->lastname }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                {{ date_format($creator->created_at, 'M d, Y h:i:s A') }}
                                            </td>
                                        </tr>
                                        @if($editor !== null)
                                        <tr>
                                            <td>Last update by:</td>
                                            <td>
                                                {{ $editor->user->firstname }}
                                                {{ $editor->user->middlename }}
                                                {{ $editor->user->lastname }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                {{ date_format($editor->created_at, 'M d, Y h:i:s A') }}
                                            </td>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class=" col-sm-4 col-md-3 col-lg-2">
                                    <a href="{{ route('customer_editview',$customer->id) }}" type="button" class="btn btn-primary btn-block">EDIT</a>
                                </div>
                            </div>
                        </div>
                    <!-- LEDGER -->
                        <div class="tab-pane fade" id="nav-ledger" role="tabpanel" aria-labelledby="nav-ledger-tab">
                            <div class="btn btn-primary add_ledger_button" data-toggle="modal" data-target="#add_ledger_modal" onclick="setFormForAdd()">ADD SALES</div>
                            <br/>
                            <table class="table table-hover table-striped sales_ledger_table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Debit Amount</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
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
    <div class="modal fade" id="add_ledger_modal" tabindex="-1" role="dialog" aria-labelledby="add_ledger_modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-inline add_ledger_form" method=POST accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="customer_id" name="customer_id" value='{{ $customer->id }}' />
                <input type="hidden" id="sales_id" name="sales_id" value='' />
                <input type="hidden" id="isEdit" name="isEdit" value='0' />
                <div class="modal-header">
                    <h5 class="modal-title" id="add_ledger_modalLabel">ADD NEW SALES</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                                    <label for="unit">Date</label>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                    <input required type="text" class='form-control' name='ledger_date' id='ledger_date'>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                                    <label for="item">Item</label>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                    <select required type="text" class='form-control item-select' name='item_id' id='item_id' data-live-search="true">
                                    <option data-tokens="" value="">- Select item -</option>
                                        @foreach($items as $item)
                                            <option data-tokens="{{ $item->name }}" value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                                    <label for="price">Price</label>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">P</span>
                                        </div>
                                        <input required type="number" class='form-control' name='ledger_price' id='ledger_price'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                                    <label for="amount">Pricing unit</label>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                    <select required class='form-control' name='ledger_unit' id='ledger_unit'>
                                        <option value=''>- Select unit -</option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }} ({{ $unit->short_name }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                                    <label for="unit">Quantity</label>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                    <input required type="number" class='form-control' name='ledger_qty' id='ledger_qty'>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                                    <label for="amount">Amount</label>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">P</span>
                                        </div>
                                        <input required type="number" class='form-control' name='amount' id='amount'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                                    <label for="debit_amount">Debit Amount</label>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">P</span>
                                        </div>
                                        <input required type="number" class='form-control' name='debit_amount' id='debit_amount'>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn_delete hide" >Delete</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

            </div>
        </div>
    </div>
    
@endsection

@section('js')
    <script>
        $(function(){
            let ledgerForm = $('.add_ledger_form');

            $('.small_preview').on('click', function(){
                $('.big_preview').attr('src', $(this).attr('src'));
            })
            $('#add_ledger_modal').on('hide.bs.modal', function () {
                clearForm();
            });

            let sales_datatable = $('.sales_ledger_table').DataTable({
                responsive: true,
                autoWidth: false,
                processing: true,
                ajax: {
                    url: `${window.location.origin}/LinsSaverPatrol_CIS/public/api/sales/ledger/get/${$('#customer_id').val()}`,
                    method: "GET",
                    dataSrc: function (json) {
                        var return_data = new Array();
                        for(var i=0;i< json.length; i++){
                            return_data.push({
                            "sales_date" : json[i].sales_date,
                            "item_name" : json[i].item.name,
                            "price" : parseFloat(json[i].price).toLocaleString(),
                            "quantity" : parseFloat(json[i].quantity).toLocaleString(),
                            "amount" : parseFloat(json[i].amount).toLocaleString(),
                            "debit_amount" : parseFloat(json[i].debit_amount).toLocaleString(),
                            "menu" : `<button class='btn btn-primary' onclick="getForm(${json[i].id})">View</button>`
                            });
                        }
                        return return_data;
                    },
                },
                aoColumns: [
                    {"mData": "sales_date"},
                    {"mData": "item_name"},
                    {"mData": "price"},
                    {"mData": "quantity"},
                    {"mData": "amount"},
                    {"mData": "debit_amount"},
                    {"mData": "menu"},
                ],
            });

            $('.item-select').selectpicker({
                style: 'btn-light'
            });
            $('#ledger_date').dateDropper({
                large: true,
                largeDefault: true,
                startFromMonday: false
            });

            ledgerForm.submit(function(e){
                e.preventDefault();
                $('#add_ledger_modal button[type=submit]').attr('disabled','disabled');
                
                $('#add_ledger_modal button[type=submit]').html(`<div class="spinner-border text-light spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);

                $.ajax({
                    type: 'post',
                    data: ledgerForm.serialize(),
                    url: `${window.location.origin}/LinsSaverPatrol_CIS/public/api/sales/store`,
                    success: function(){
                        sales_datatable.ajax.reload();
                        clearForm();
                        $('#add_ledger_modal').modal('hide');
                    },
                    error: function(e){
                        console.log(e);
                    }
                })
            });

            function reloadTable(){
                sales_datatable.ajax.reload();
            }

            $('.btn_delete').on('click', function(){
                $('#add_ledger_modal button[type=submit]').attr('disabled','disabled');
                $('.btn_delete').attr('disabled','disabled');

                $('.btn_delete').html(`<div class="spinner-border text-light spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>`);
                $('#add_ledger_modal button[type=submit]').html(`<div class="spinner-border text-light spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);

                $.ajax({
                    type: 'POST',
                    data: {
                        id: $("#sales_id").val(),
                        _token: $('meta[name=csrf-token]').attr('content')
                    },
                    url: `${window.location.origin}/LinsSaverPatrol_CIS/public/api/sales/delete`,
                    success: function(response){
                        reloadTable();
                        clearForm();
                        $('#add_ledger_modal').modal('hide');
                    }
                })
            });
        });
       
        function setFormForAdd(){
            $('.modal-title').html('ADD NEW SALES');
            $('#isEdit').val(0);
            $('.btn_delete').hide();
        }
        
        function clearForm(){
            $('.btn_delete').html('Delete')
            $('.btn_delete').attr('disabled',false);

            $('#add_ledger_modal button[type=submit]').html('Submit')
            $('#add_ledger_modal button[type=submit]').attr('disabled',false);

            $('#ledger_date').val('');
            $(".item-select").val('');
            $(".item-select").selectpicker("refresh");
            $('#ledger_price').val('');
            $('#ledger_unit').val('');
            $('#ledger_qty').val('');
            $('#amount').val('');
            $('#debit_amount').val('');

        }
        function getForm(id){
            $.ajax({
                url: `${window.location.origin}/LinsSaverPatrol_CIS/public/api/sales/details/${id}`,
                success: function(response){
                    $('.modal-title').html('EDITING SALES LEDGER');
                    $('.btn_delete').show();
                    $('#add_ledger_modal').modal('show');
                    $('#isEdit').val(1);
                    $('#sales_id').val(response.id);

                    $(".item-select").val(response.item_id);
                    $(".item-select").selectpicker("refresh");

                    $('#ledger_date').val(response.sales_date);
                    $('#ledger_price').val(response.price);
                    $('#ledger_unit').val(response.unit_id);
                    $('#ledger_qty').val(response.quantity);
                    $('#amount').val(response.amount);
                    $('#debit_amount').val(response.debit_amount);
                }
            })
        }

    </script>
@endsection