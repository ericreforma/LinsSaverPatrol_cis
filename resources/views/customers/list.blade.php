@extends('master.body')

@section('title','Customer List')
@section('container')

    <div class="customer_list">
        <div class="row justify-content-between">
            @if(Auth::user()->customer_role->role_add == 1)
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <a href="{{ route('customer_add') }}" class='btn btn-primary btn-block'>ADD NEW CUSTOMER</a>
                </div>
            @endif
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <button class="btn btn-light btn-block btn_filter" type="button" data-toggle="collapse" data-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
           
        </div>
            
        <!-- FILTER -->
            <div class="collapse" id="filterCollapse"> 
                <div class='block_container filter_container'>
                    <div class="row justify-content-end mb-1">
                        <div class="col-12">
                            <h5><i class="fas fa-filter"></i> Filter</h5>
                        </div>
                    </div>
                    <div class="alert alert-danger alert_error" style='display: none' role="alert">
                        Invalid filter options.
                    </div>

                    <div class="row justify-content-start mb-1">
                        <div class="col-12">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="date_switch" checked target="" targetType='date'> 
                                <label class="custom-control-label" for="date_switch">Filter by Date</label>
                            </div>
                        </div>
                    </div>

                    <div class="row filter_select _date_filter_container mb-4" >
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="Select date range" id="daterange">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-start mb-1">
                        <div class="col-12">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="location_switch" checked target="" targetType='location'>
                                <label class="custom-control-label" for="location_switch">Filter by Location</label>
                            </div>
                        </div>
                    </div>
                    <div class="row filter_select _location_filter_container" >
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <h6>Province</h6>
                            <select required class='form-control' name='province' id='province' report='brgy'>
                                <option value=''>- Select a Province -</option>
                                @foreach($provinces as $province)
                                    <option value='{{ $province->code }}'>{{ $province->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <h6>City / Municipality</h6>
                            <select required class='form-control' name='cities' id='cities' report='brgy'>
                            </select>
                        </div>
                        
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <h6>Barangay</h6>
                            <select required class='form-control' name='barangays' id='barangays' report='brgy'>
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-end filter_buttons  mb-4">
                        <div class="col-12 col-sm-3 col-md-2 col-lg-2 mt-4">
                            <div class="btn btn-success btn-block search_filtered">SEARCH</div>
                        </div>
                        <div class="col-12 col-sm-3 col-md-2 col-lg-2 mt-4">
                            <div class="btn btn-dark btn-block close_filtered close_filtered" data-toggle="collapse" data-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse">CLOSE</div>
                        </div>
                    </div>
                
                </div>
            </div>

        
        <div class="collapse" id="filterResultCollapse"> 
            <div class='block_container filter_container' >
                <h5>Showing results for <span> </span></h5>
                <button class="btn btn-primary clear_filtered">CLEAR FILTER</button>
                <button class="btn btn-success clear_filtered" data-toggle="collapse" data-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse">OPEN FILTER</button>
            </div>        
        </div>

        <div class="table_container block_container">
            <table class="table table-hover" id="customer_list">
                <thead>
                    <tr>
                        <th>Date Created</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Store Category</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Total Sales</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
                <tfoot>
                    <tr>
                        <th>Date Created</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Store Category</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Total Sales</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(function(){
            let myData = {};

            // Date Range
                $('#daterange').daterangepicker({
                autoUpdateInput: false,
                    locale: {
                        format: 'Y-MM-DD'
                    }
                }, function(start, end, label) {
                    myData.date_from = start.format('Y-MM-DD');
                    myData.date_to = end.format('Y-MM-DD');

                    $('#daterange').val(start.format('MMM-DD-YYYY') + ' to ' + end.format('MMM-DD-YYYY'))
                });

                $('#daterange').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('MMM-DD-YYYY') + ' to ' + picker.endDate.format('MMM-DD-YYYY'))
                    myData.date_from = picker.startDate.format('Y-MM-DD');
                    myData.date_to = picker.endDate.format('Y-MM-DD');
                });
            
            let customer_datatable = $('#customer_list').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        filename: 'Lins Saver Patrol - Customers',
                        className: 'btn btn-primary',
                        init: function(api, node, config) {
                            $(node).removeClass('btn-secondary')
                        }
                    }, {
                        extend: 'pdf',
                        filename: 'Lins Saver Patrol - Customers',
                        title: 'Lins Saver Patrol Customers',
                        className: 'btn btn-primary',
                        init: function(api, node, config) {
                            $(node).removeClass('btn-secondary')
                        },
                        exportOptions: {
                            columns: [ 0, 1,2,3,4,5,6,7 ]
                        },
                        customize: function (doc) {
                            doc.pageOrientation = 'landscape';
                            doc.content[1].table.widths = [ '12.5%', '12.5%', '12.5%', '12.5%', '12.5%', '12.5%', '12.5%', '12.5%'];
                            var objLayout = {};
                            objLayout['hLineWidth'] = function(i) { return 0; };
                            objLayout['vLineWidth'] = function(i) { return 0; };
                            objLayout['hLineColor'] = function(i) { return 0; };
                            objLayout['vLineColor'] = function(i) { return 0; };
                            objLayout['paddingLeft'] = function(i) { return 10; };
                            objLayout['paddingRight'] = function(i) { return 10; };
                            doc.content[1].layout = objLayout;
                        },
                        footer: true
                    }
                ],
                responsive: true,
                autoWidth: false,
                processing: true,
                ajax: {
                    url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/customer/list`,
                    data: function ( d ) {
                        return $.extend( {}, d, myData );
                    },
                    method: "GET",
                    dataSrc: function (json) {
                        var return_data = new Array();
                        for(var i=0;i< json.length; i++){
                            return_data.push({
                            "date" : moment(json[i].created_at).format('MMM. DD, Y'),
                            "code" : json[i].code,
                            "name" : `${json[i].firstname} ${json[i].middlename != null ? json[i].middlename : ''} ${json[i].lastname}`,
                            "contact_number" : json[i].contact_number,
                            "store_category" : json[i].store_category.description,
                            "address" : json[i].address,
                            "status" : `
                                <span class="badge badge-${json[i].status == 1 ? 'success' : 'danger' }">
                                    ${json[i].status == 1 ? 'active' : 'inactive' }
                                </span>
                            `,
                            "totalSales" : json[i].total_sales != null ? parseFloat(json[i].total_sales).toLocaleString() : '',
                            "menu" : `
                                <a href="${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/customer/details/${json[i].id}" type="button" class='btn btn-secondary'>View</a>
                            `
                            });
                        }
                        return return_data;
                    },
                    error: function(){
                        customer_datatable.ajax.reload();
                    }
                },
                aoColumns: [
                    {"mData": "date"},
                    {"mData": "code"},
                    {"mData": "name"},
                    {"mData": "contact_number"},
                    {"mData": "store_category"},
                    {"mData": "address"},
                    {"mData": "status"},
                    {"mData": "totalSales"},
                    {"mData": "menu"},
                ],
                
            });

            $('.search_filtered').on('click', function(){
                $('.alert_error').hide();
                let cont = 0;
                let filterString = '';

                myData.isDate = $('#date_switch').is(":checked") ? 1 : 0,
                myData.isLocation = $('#location_switch').is(":checked") ? 1 : 0,
                myData.province = $('#province').val(),
                myData.city = $('#cities').val(),
                myData.barangay = $('#barangays').val()
                   
                console.log(myData);

                if($('#date_switch').is(":checked")) {
                    if(myData.date_from === null || myData.date_to === null){
                        $('.alert_error').show();
                        cont = 1;
                    }
                    filterString += `Date filtered from ${myData.date_from} to ${myData.date_to} <br>` ;
                }

                if($('#location_switch').is(":checked")){
                    if(myData.province === null || myData.province === '' || myData.province === 0){
                        $('.alert_error').show();
                        cont = 1;
                    }
                    filterString += `Location filtered ` ;
                    filterString += `${$('#province').val() == '' || $('#province').val() == null ? '' : '"' + $('#province option:selected').html() + '"'} `;
                    filterString += `${$('#cities').val() == '' || $('#cities').val() == null ? '' : '"' + $('#cities option:selected').html() + '"'}  `;
                    filterString += `${$('#barangays').val() == '' || $('#barangays').val() == null ? '' : '"' + $('#barangays option:selected').html() + '"'} `;
                }

                if(!$('#date_switch').is(":checked") && !$('#location_switch').is(":checked")){
                    $('#filterCollapse').collapse('hide');
                    filterString = ' all records';
                }

                if(cont == 0) {
                    $('#filterCollapse').collapse('hide');
                    $('#filterResultCollapse').collapse('show');
                    $('#filterResultCollapse h5 span').html(filterString);
                    customer_datatable.ajax.reload();
                } 
            });

            $('.close_filtered').on('click', function(){
                $('#filterCollapse').collapse('hide');
            });

            $('.clear_filtered').on('click', function(){
                $('#filterResultCollapse').collapse('hide');
                $('#province').val('').change();
                $('#cities').val('').change();

                myData = {
                    filtered: 0,
                };
                customer_datatable.ajax.reload();
            });
        })
    </script>
@endsection