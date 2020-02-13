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
                        @if(Auth::user()->sales_role->role_view == 1)
                        <a class="nav-item nav-link" id="nav-ledger-tab" data-toggle="tab" href="#nav-ledger" role="tab" aria-controls="nav-ledger" aria-selected="false">Sales Ledger</a>
                        @endif
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
                                            <td>{{  $customer->province_code != null ? $customer->province->description  : ''}} </td>
                                        </tr>
                                        <tr>
                                            <td>CITY</td>
                                            <td>{{ $customer->city_code != null ? $customer->city->description : '' }} </td>
                                        </tr>
                                        <tr>
                                            <td>BARANGAY</td>
                                            <td>{{ $customer->barangay_code != null ? $customer->barangay->description : ''}} </td>
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
                                        @if($customer->idAttachment_media_id != null)
                                            <img src="/influencer/LinsSaverPatrol_CIS/public/storage/media/{{ $customer->idMedia->url }}" alt="" data-toggle="modal" data-target="#imagePreviewModal" class="small_preview">
                                        @endif
                                    </div>
                                    
                                </div>
                                <div class=" col-sm-12 col-md-12 col-lg-6">
                                    <h5>STORE PHOTO</h5>
                                    <div class="image_container">
                                        @if($customer->storephoto_media_id != null)
                                            <img src="/influencer/LinsSaverPatrol_CIS/public/storage/media/{{ $customer->storeMedia->url }}" alt="" data-toggle="modal" data-target="#imagePreviewModal" class="small_preview"> 
                                        @endif
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
                           
                            <div class="row justify-content-end mt-3">
                                @if(Auth::user()->customer_role->role_delete == 1)
                                    <div class=" col-sm-4 col-md-3 col-lg-2 ">
                                        <a href="" type="button" class="btn btn-danger btn-block mb-3" data-toggle="modal" data-target="#delete_modal">DELETE</a>
                                    </div>
                                @endif

                                @if(Auth::user()->customer_role->role_edit == 1)
                                    <div class=" col-sm-4 col-md-3 col-lg-2 ">
                                        <a href="" type="button" class="btn btn-warning btn-block mb-3" data-toggle="modal" data-target="#setStatusModal">SET {{ $customer->status == 1 ? 'INACTIVE' : 'ACTIVE' }}</a>
                                    </div>
                                    <div class=" col-sm-4 col-md-3 col-lg-2 ">
                                        <a href="{{ route('customer_editview',$customer->id) }}" type="button" class="btn btn-primary btn-block mb-3">EDIT</a>
                                    </div>
                                @endif
                                
                                
                            </div>
                        </div>
                    <!-- LEDGER -->
                        <div class="tab-pane fade" id="nav-ledger" role="tabpanel" aria-labelledby="nav-ledger-tab">
                            @if(Auth::user()->sales_role->role_add == 1)
                            <div class="btn btn-primary add_ledger_button" data-toggle="modal" data-target="#add_ledger_modal" onclick="setFormForAdd()">ADD SALES</div>
                            @endif
                            <br/>
                            <table class="table table-hover table-striped sales_ledger_table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>IP Amount</th>
                                        <th>RO Amount</th>
                                        <th>Credit</th>
                                        <th>Credit Due Date</th>
                                        <th>Memo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                            <div class="row justify-content-end mt-5">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                    <table class='totals'>
                                        <tr>
                                            <td>Total Quantity</td>
                                            <td class='total_qty'></td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount</td>
                                            <td class='total_amount'></td>
                                        </tr>
                                        <tr>
                                            <td>Total Credit Amount</td>
                                            <td class="total_credit"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection

@section('modal')
    <!-- PREVIEW MODAL -->
        <div class="modal fade" id="imagePreviewModal" tabindex="-1" role="dialog" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <img src='' class='big_preview' data-dismiss="modal">
            </div>
        </div>
    <!-- ADD LEDGER MODAL -->
        <div class="modal fade" id="add_ledger_modal" tabindex="-1" role="dialog" aria-labelledby="add_ledger_modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form class="form-inline add_ledger_form" method=POST accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="customer_id" name="customer_id" value='{{ $customer->id }}' />
                    <input type="hidden" id="sales_id" name="sales_id" value='' />
                    <input type="hidden" id="isEdit" name="isEdit" value='0' />
                    <input type="hidden" id="province_code" name="province_code" value='{{ $customer->province_code }}' />
                    <input type="hidden" id="city_code" name="city_code" value='{{ $customer->city_code }}' />
                    <input type="hidden" id="barangay_code" name="barangay_code" value='{{ $customer->barangay_code }}' />

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
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <label for="unit">Date</label>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input required type="text" class='form-control' name='ledger_date' id='ledger_date'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <label for="item">Item</label>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                        <select required type="text" class='form-control item-select' name='item_id' id='item_id' >
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
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
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
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
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
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <label for="unit">Quantity</label>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                        <input required type="number" class='form-control' name='ledger_qty' id='ledger_qty'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <label for="amount">IP Amount</label>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">P</span>
                                            </div>
                                            <input required type="number" class='form-control' name='amount' id='amount' pattern="[0-9]+([,\.][0-9]+)?" step="0.01">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <label for="ro_amount">RO Amount</label>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">P</span>
                                            </div>
                                            <input type="number" class='form-control' name='ro_amount' id='ro_amount' pattern="[0-9]+([,\.][0-9]+)?" step="0.01">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <label for="credit_amount">Credit Amount</label>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">P</span>
                                            </div>
                                            <input type="number" class='form-control' name='credit_amount' id='credit_amount'>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="hasDueDate" name="hasDueDate">
                                            <label class="custom-control-label" for="hasDueDate">Has Credit Due Date</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row collapse multi-collapse" id="creditDueCollapse">
                                <div class="form-group">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <label for="unit">Credit Due Date</label>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" class='form-control' name='credit_duedate' id='credit_duedate'>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <label for="ro_amount">Memo</label>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                        
                                        <textarea class="form-control" id="memo" name='memo' rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @if(Auth::user()->sales_role->role_delete == 1)
                        <button class="btn btn-danger btn_delete hide" >Delete</button>
                        @endif
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

                </div>
            </div>
        </div>

    <!-- CONFIM DELETE -->
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
                        Are you sure you want to <strong>DELETE</strong> customer <strong>{{ $fullname }}?</strong>
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
        
    <!-- CONFIRM SET INACTIVE -->
        <div class="modal fade" id="setStatusModal" tabindex="-1" role="dialog" aria-labelledby="setStatusModallabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="setStatusModallabel">Confirm Change Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to change the status of customer <strong>{{ $fullname }}?</strong> to {{ $customer->status == 1 ? 'INACTIVE' : 'ACTIVE' }}?
                    </div>
                    <div class="modal-footer">
                        <div class="container-fluid">
                            <div class="row justify-content-between">
                                <div class="col-4 col-sm-3 col-md-2 col-lg-2">
                                    <button type="button" class="btn btn-link btn_yes_status">Yes</button>
                                </div>
                                <div class="col-4 col-sm-3 col-md-2 col-lg-2">
                                    <button type="button" class="btn btn-danger btn_no_status">NO</button>
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
            getTotals({{ $customer->id }})
            let ledgerForm = $('.add_ledger_form');

            $('.small_preview').on('click', function(){
                $('.big_preview').attr('src', $(this).attr('src'));
            })
            $('#add_ledger_modal').on('hide.bs.modal', function () {
                clearForm();
            });

            $('#ledger_price').on('blur',function(){
                const amount = parseFloat($('#ledger_qty').val()) * parseFloat($(this).val());
                $('#amount').val(amount);
            });

            $('#ledger_qty').on('blur',function(){
                const amount = parseFloat($('#ledger_price').val()) * parseFloat($(this).val());
                $('#amount').val(amount);
            });

            $('#hasDueDate').on('change', function(){
                if($(this).is(':checked')){
                    $('#creditDueCollapse').collapse('show');
                    $('#credit_duedate').attr('required','required');

                } else {
                    $('#creditDueCollapse').collapse('hide');
                    $('#credit_duedate').attr('required',false);
                }
            });

            let sales_datatable = $('.sales_ledger_table').DataTable({
                responsive: true,
                autoWidth: false,
                processing: true,
                buttons: [
                    {
                        extend: 'csv',
                        filename: '{{ $fullname }} Sales Ledger',
                        
                    }, {
                        extend: 'pdf',
                        filename: '{{ $fullname }} Sales Ledger',
                        
                    }
                ],
                ajax: {
                    url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/sales/ledger/get/${$('#customer_id').val()}`,
                    method: "GET",
                    dataSrc: function (json) {
                        var return_data = new Array();
                        for(var i=0;i< json.length; i++){
                            return_data.push({
                            "sales_date" : json[i].sales_date,
                            "item_name" : json[i].item.name,
                            "price" : `P ${parseFloat(json[i].price).toLocaleString()} / ${json[i].unit.short_name}`,
                            "quantity" : `${parseFloat(json[i].quantity).toLocaleString()} ${json[i].unit.short_name}S`,
                            "ip_amount" : parseFloat(json[i].amount).toLocaleString(),
                            "ro_amount" : json[i].ro_amount != null ? parseFloat(json[i].ro_amount).toLocaleString() : '',
                            "credit_amount" : json[i].credit_amount != null ? parseFloat(json[i].credit_amount).toLocaleString() : '',
                            "credit_duedate" : json[i].credit_duedate != null ? json[i].credit_duedate : '',
                            "memo" : json[i].memo,
                            "menu" : `<button class='btn btn-primary' onclick="getForm(${json[i].id})">Edit</button>`
                            });
                        }
                        return return_data;
                    },
                    error: function(){
                        sales_datatable.ajax.reload();
                    }
                },
                aoColumns: [
                    {"mData": "sales_date"},
                    {"mData": "item_name"},
                    {"mData": "price"},
                    {"mData": "quantity"},
                    {"mData": "ip_amount"},
                    {"mData": "ro_amount"},
                    {"mData": "credit_amount"},
                    {"mData": "credit_duedate"},
                    {"mData": "memo"},
                    {"mData": "menu"},
                ],
            });

            
            $('#ledger_date').dateDropper({
                large: true,
                largeDefault: true,
                startFromMonday: false,
                theme: 'leaf'
            });

            $('#credit_duedate').dateDropper({
                large: true,
                largeDefault: true,
                startFromMonday: false,
                theme: 'leaf'
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
                    url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/sales/store`,
                    success: function(){
                        getTotals({{ $customer->id }})
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
                getTotals({{ $customer->id }})
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
                    url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/sales/delete`,
                    success: function(response){
                        reloadTable();
                        clearForm();
                        $('#add_ledger_modal').modal('hide');
                    }
                });
            });

            $('.btn_yes_status').on('click', function(){
                $.ajax({
                    type: 'POST',
                    data: {
                        id: {{ $customer->id}},
                        status: {{ $customer->status == 1 ? 0 : 1 }},
                        _token: $('meta[name=csrf-token]').attr('content')
                    },
                    url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/customer/status`,
                    success: function(response){
                        window.location.reload();
                    }
                });
            })
        });
       
        function setFormForAdd(){
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
            $('#ro_amount').val('');
            $('#memo').val('');
            $('#hasDueDate').prop('checked',false);
            $('#credit_amount').val('');
            $('#credit_duedate').val('');
            $('#creditDueCollapse').collapse('hide');

        }
        function getForm(id){
            $.ajax({
                url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/sales/details/${id}`,
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
                    $('#credit_amount').val(response.credit_amount);
                    $('#ro_amount').val(response.ro_amount);
                    $('#memo').val(response.memo);
                    if(response.credit_duedate != null) {
                        $('#hasDueDate').prop('checked', true);
                        $('#creditDueCollapse').collapse('show');
                    } else {
                        $('#hasDueDate').prop('checked', false);
                        $('#creditDueCollapse').collapse('hide');
                    }
                    $('#credit_duedate').val(response.credit_duedate);
                },
               
            })
        }
        function getTotals(id){
            $.ajax({
                url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/sales/totals/${id}`,
                success: function(response){
                    $('.total_qty').html(parseFloat(response.total_qty).toLocaleString());
                    $('.total_amount').html(parseFloat(response.total_amount).toLocaleString());
                    $('.total_credit').html(parseFloat(response.total_credit).toLocaleString());
                }
            })
        }
        $('.btn_yes_delete').on('click', function(){

            $('.btn_yes_delete').attr('disabled','disabled');
            $('.btn_yes_delete').html(`<div class="spinner-border text-dark spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);

            $.ajax({
                type: 'POST',
                url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/customer/delete`,
                data: {
                    id: $('#customer_id').val(),
                },
                success: function(response){
                    $('.btn_yes_delete').attr('disabled',false);
                    $('.btn_yes_delete').html(`Yes`);
                    window.location.replace(`${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/customer/list`);
                }

            })
        });

    </script>
@endsection