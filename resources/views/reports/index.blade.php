@extends('master.body')

@section('title',  'Reports')
@section('container')

    <div class="report_container container-fluid block_container">
        <div class="row">
            <div class=" col-md-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-city-tab" data-toggle="tab" href="#nav-city" role="tab" aria-controls="nav-city" aria-selected="true">SALES BY CITY</a>
                        <a class="nav-item nav-link" id="nav-barangay-tab" data-toggle="tab" href="#nav-barangay" role="tab" aria-controls="nav-barangay" aria-selected="false">SALES BY BARANGAY</a>
                        <a class="nav-item nav-link" id="nav-agent-tab" data-toggle="tab" href="#nav-agent" role="tab" aria-controls="nav-agent" aria-selected="false">SALES BY CUSTOMER</a>
                        <a class="nav-item nav-link" id="nav-credit-tab" data-toggle="tab" href="#nav-credit" role="tab" aria-controls="nav-credit" aria-selected="false" style='display: none'>SALES BY CREDIT AMOUNT/CONSIGNMENT</a>
                        <a class="nav-item nav-link" id="nav-daily-tab" data-toggle="tab" href="#nav-daily" role="tab" aria-controls="nav-daily" aria-selected="false">DAILY COLLECTION REPORT</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-city" role="tabpanel" aria-labelledby="nav-city-tab">
                            <h3>Sales by City</h3>
                            <div class="row justify-content-between">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">REPORT BY DATE</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Select date range" id="daterange_city">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="input-group mb-3">
                                        <button class='btn btn-success btn-block btn_show_city'>Show All Records</button>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-primary alert_city" role="alert">
                                Showing all records.
                            </div>
                            <table class="table table-hover table-striped table_city_report" id="table_city_report">
                                <thead>
                                    <tr>
                                        <th>Province</th>
                                        <th>City</th>
                                        <th>Quantity</th>
                                        <th>IP Amount</th>
                                        <th>RO Amount</th>
                                        <th>Credit Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Province</th>
                                        <th>City</th>
                                        <th>Quantity</th>
                                        <th>IP Amount</th>
                                        <th>RO Amount</th>
                                        <th>Credit Amount</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="nav-barangay" role="tabpanel" aria-labelledby="nav-barangay-tab">
                            <h3>Sales by Barangay</h3>

                            <div class="row justify-content-between">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <button class="btn btn-light btn-block btn_filter btn_filter_barangay" type="button" data-toggle="collapse" data-target="#filterBarangayCollapse" aria-expanded="false" aria-controls="filterBarangayCollapse">
                                        <i class="fas fa-filter"></i> Filter
                                    </button>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="input-group mb-3">
                                        <button class='btn btn-success btn-block btn_show_barangay'>Show All Records</button>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- FILTER BY BARANGAY -->
                                <div class="collapse" id="filterBarangayCollapse"> 
                                    <div class='filter_container' >
                                        <div class="row justify-content-end mb-1">
                                            <div class="col-12">
                                                <h5><i class="fas fa-filter"></i> Filter</h5>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger alert_barangay_error" style='display: none' role="alert">
                                            Invalid filter options.
                                        </div>

                                        <div class="row justify-content-start mb-1">
                                            <div class="col-12">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="brgy_date_switch" checked target='brgy' targetType='date'>
                                                    <label class="custom-control-label" for="brgy_date_switch">Filter by Date</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row filter_select brgy_date_filter_container mb-4" >
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" aria-label="Select date range" id="daterange_barangay">
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
                                                    <input type="checkbox" class="custom-control-input" id="brgy_barangay_switch" checked target="brgy" targetType='location'>
                                                    <label class="custom-control-label" for="brgy_barangay_switch">Filter by Location</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row filter_select brgy_location_filter_container" >
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                                <h6>Province</h6>
                                                <select required class='form-control' name='province' id='brgy_province' report='brgy'>
                                                    <option value=''>- Select a Province -</option>
                                                    @foreach($provinces as $province)
                                                        <option value='{{ $province->code }}'>{{ $province->description }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                                <h6>City / Municipality</h6>
                                                <select required class='form-control' name='cities' id='brgy_cities' report='brgy'>
                                                </select>
                                            </div>
                                            
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                                <h6>Barangay</h6>
                                                <select required class='form-control' name='barangays' id='brgy_barangays' report='brgy'>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row justify-content-end filter_buttons  mb-4">
                                            <div class="col-12 col-sm-3 col-md-2 col-lg-2 mt-4">
                                                <div class="btn btn-success btn-block search_filtered search_filtered_brgy">GO</div>
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-2 col-lg-2 mt-4">
                                                <div class="btn btn-dark btn-block close_filtered close_filtered_brgy" data-toggle="collapse" data-target="#filterBarangayCollapse" aria-expanded="false" aria-controls="filterBarangayCollapse">CLOSE</div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            
                            
                            <div class="alert alert-primary alert_barangay" role="alert">
                                Showing all records.
                            </div>
                            
                            <table class="table table-hover table-striped table_barangay_report" id="table_barangay_report">
                                <thead>
                                    <tr>
                                        <th>Province</th>
                                        <th>City</th>
                                        <th>Barangay</th>
                                        <th>Customer Count</th>
                                        <th>Customer w/ Sales Count</th>
                                        <th>Quantity</th>
                                        <th>IP Amount</th>
                                        <th>RO Amount</th>
                                        <th>Credit Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Province</th>
                                        <th>City</th>
                                        <th>Barangay</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th> </th>
                                        <th>Credit Amount</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">
                            <h3>Sales by Customer</h3>
                            <div class="row justify-content-between">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <button class="btn btn-light btn-block btn_filter btn_filter_customer" type="button" data-toggle="collapse" data-target="#filterCustomerCollapse" aria-expanded="false" aria-controls="filtercustomerCollapse">
                                        <i class="fas fa-filter"></i> Filter
                                    </button>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="input-group mb-3">
                                        <button class='btn btn-success btn-block btn_show_customer'>Show All Records</button>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- FILTER BY customer -->
                                <div class="collapse" id="filterCustomerCollapse"> 
                                    <div class='filter_container' >
                                        <div class="row justify-content-end mb-1">
                                            <div class="col-12">
                                                <h5><i class="fas fa-filter"></i> Filter</h5>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger alert_customer_error" style='display: none' role="alert">
                                            Invalid filter options.
                                        </div>

                                        <div class="row justify-content-start mb-1">
                                            <div class="col-12">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="customer_date_switch" checked target='customer' targetType='date'>
                                                    <label class="custom-control-label" for="customer_date_switch">Filter by Date</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row filter_select customer_date_filter_container mb-4" >
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" aria-label="Select date range" id="daterange_customer">
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
                                                    <input type="checkbox" class="custom-control-input" id="customer_location_switch" checked target="customer" targetType='location'>
                                                    <label class="custom-control-label" for="customer_location_switch">Filter by Location</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row filter_select customer_location_filter_container" >
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                                <h6>Province</h6>
                                                <select required class='form-control' name='province' id='customer_province' report='customer'>
                                                    <option value=''>- Select a Province -</option>
                                                    @foreach($provinces as $province)
                                                        <option value='{{ $province->code }}'>{{ $province->description }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                                <h6>City / Municipality</h6>
                                                <select required class='form-control' name='cities' id='customer_cities' report='customer'>
                                                </select>
                                            </div>
                                            
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                                <h6>Barangay</h6>
                                                <select required class='form-control' name='barangays' id='customer_barangays' report='customer'>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row justify-content-end filter_buttons  mb-4">
                                            <div class="col-12 col-sm-3 col-md-2 col-lg-2 mt-4">
                                                <div class="btn btn-success btn-block search_filtered search_filtered_customer">GO</div>
                                            </div>
                                            <div class="col-12 col-sm-3 col-md-2 col-lg-2 mt-4">
                                                <div class="btn btn-dark btn-block close_filtered close_filtered_customer" data-toggle="collapse" data-target="#filterCustomerCollapse" aria-expanded="false" aria-controls="filterCustomerCollapse">CLOSE</div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            <div class="alert alert-primary alert_customer" role="alert">
                                Showing all records.
                            </div>
                            <table class="table table-hover table-striped table_agent_report" id="table_agent_report">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Quantity</th>
                                        <th>IP Amount</th>
                                        <th>RO Amount</th>
                                        <th>Credit Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Quantity</th>
                                        <th>IP Amount</th>
                                        <th>RO Amount</th>
                                        <th>Credit Amount</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                         <div class="tab-pane fade" id="nav-credit" role="tabpanel" aria-labelledby="nav-credit-tab" style='display: none'>
                            <h3>Credit / Consignment</h3>
                            <div class="row justify-content-between">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">REPORT BY DATE</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Select date range" id="daterange_credit">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="input-group mb-3">
                                        <button class='btn btn-success btn-block btn_show_credit'>Show All Records</button>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-primary alert_credit" role="alert">
                                Showing all records.
                            </div>
                            <table class="table table-hover table-striped table_credit_report" id="table_credit_report">
                                <thead>
                                    <tr>
                                        <th>Credit</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="nav-daily" role="tabpanel" aria-labelledby="nav-daily-tab">
                            <h3>Daily Collection Report</h3>
                            <div class="row justify-content-between">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">REPORT BY DATE</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Select date range" id="daterange_daily">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="input-group mb-3">
                                        <button class='btn btn-success btn-block btn_show_daily'>Show All Records</button>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-primary alert_daily" role="alert">
                                Showing all records.
                            </div>

                            <table class="table table-hover table-striped table_daily_report" id="table_daily_report">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>Unit Cost</th>
                                        <th>Item</th>
                                        <th>IP Amount</th>
                                        <th>RO Amount</th>
                                        <th>Credit Amount</th>
                                        <th>Memo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>TOTAL</th>
                                        <th></th>
                                        <th>Quantity</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>RO Amount</th>
                                        <th>Credit</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(function(){
            let city_date = {
                date_from: null,
                date_to: null
            }

            let barangay_filter = {
                date_from: null,
                date_to: null,
                barangay_code: null,
                isDate: 0,
                isLocation: 0,
            }
            
            let customer_filter = {
                date_from: null,
                date_to: null,
                province_code: null,
                city_code: null,
                barangay_code: null,
                isDate: 0,
                isLocation: 0,
            }

            let credit_date = {
                date_from: null,
                date_to: null
            }

            let daily_date = {
                date_from: null,
                date_to: null
            }
            
            // CITY
                let city_datatable = $('#table_city_report').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'csv',
                            filename: 'Lins Saver Patrol Report - City',
                            className: 'btn btn-primary',
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary')
                            }
                        }, {
                            extend: 'pdf',
                            filename: 'Lins Saver Patrol Report - City',
                            title: 'Sales Report by City',
                            className: 'btn btn-primary',
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary')
                            },
                            customize: function (doc) {
                                doc.content[1].table.widths = [ '20%', '20%', '15%', '15%','15%','15%'];
                                var iColumns = $('#table_city_report thead th').length;

                                var rowCount = doc.content[1].table.body.length;
                                for (i = 0; i < rowCount; i++) {
                                        doc.content[1].table.body[i][iColumns - 1].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 2].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 3].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 4].alignment = 'right';
                                };

                                
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
                        url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/report/city`,
                        method: "GET",
                        data: function ( d ) {
                            return $.extend( {}, d, city_date );
                        },
                        dataSrc: function (json) {
                            var return_data = new Array();
                            for(var i=0;i< json.length; i++){
                                return_data.push({
                                    "province" : json[i].province.description,
                                    "city" : json[i].city.description,
                                    "quantity" : parseFloat(json[i].total_quantity).toLocaleString(),
                                    "amount" : parseFloat(json[i].total_amount).toLocaleString(),
                                    "ro_amount" : json[i].total_ro_amount != null ? parseFloat(json[i].total_ro_amount).toLocaleString() : '',
                                    "credit_amount" : json[i].total_credit_amount != null ? parseFloat(json[i].total_credit_amount).toLocaleString() : '',
                                });
                            }
                            return return_data;
                        },
                    },
                    aoColumns: [
                        {"mData": "province"},
                        {"mData": "city"},
                        {"mData": "quantity"},
                        {"mData": "amount"},
                        {"mData": "ro_amount"},
                        {"mData": "credit_amount"},
                    ],
                    footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(),
                        intVal = function (i) {
                            return typeof i === 'string' ?
                                i.replace(/[, Rs]|(\.\d{2})/g,"")* 1 :
                                typeof i === 'number' ?
                                i : 0;
                        },
                        qty = api
                            .column(2)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        amount = api
                            .column(3)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        ro_amount = api
                            .column(4)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        credit_amount = api
                            .column(5)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                        $(api.column(2).footer()).html(parseFloat(qty).toLocaleString());
                        $(api.column(3).footer()).html(parseFloat(amount).toLocaleString());
                        $(api.column(4).footer()).html(parseFloat(ro_amount).toLocaleString());
                        $(api.column(5).footer()).html(parseFloat(credit_amount).toLocaleString());
                    }
                });
            
            // BARANGAY
                let barangay_datatable = $('#table_barangay_report').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'csv',
                            filename: 'Lins Saver Patrol Report - Barangay',
                            className: 'btn btn-primary',
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary')
                            }
                        }, {
                            extend: 'pdf',
                            filename: 'Lins Saver Patrol Report - Barangay',
                            title: 'Sales Report by Barangay',
                            className: 'btn btn-primary',
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary')
                            },
                            customize: function (doc) {
                                doc.pageOrientation = 'landscape';
                                doc.content[1].table.widths = [ '13%', '13%', '13%','10.16%', '10.16%', '10.16%','10.16%', '10.16%','10.16%', ];
                                var iColumns = $('#table_barangay_report thead th').length;

                                var rowCount = doc.content[1].table.body.length;
                                for (i = 0; i < rowCount; i++) {
                                        doc.content[1].table.body[i][iColumns - 1].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 2].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 3].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 4].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 5].alignment = 'right';
                                };

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
                        url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/report/barangay`,
                        method: "GET",
                        data: function ( d ) {
                            return $.extend( {}, d, barangay_filter );
                        },
                        dataSrc: function (json) {
                            var return_data = new Array();
                            for(var i=0;i< json.length; i++){
                                return_data.push({
                                    "province" : json[i].province.description,
                                    "city" : json[i].city.description,
                                    "barangay" : json[i].barangay.description,
                                    "customers" : json[i].barangay.customers.length,
                                    "reporting_customers" : parseFloat(json[i].total_reporting_customers).toLocaleString(),
                                    "quantity" : parseFloat(json[i].total_quantity).toLocaleString(),
                                    "amount" : parseFloat(json[i].total_amount).toLocaleString(),
                                    "ro_amount" : json[i].total_ro_amount != null ? parseFloat(json[i].total_ro_amount).toLocaleString() : '',
                                    "credit" : json[i].total_credit_amount != null ? parseFloat(json[i].total_credit_amount).toLocaleString() : '',
                                });
                            }
                            return return_data;
                        },
                    },
                    aoColumns: [
                        {"mData": "province"},
                        {"mData": "city"},
                        {"mData": "barangay"},
                        {"mData": "customers"},
                        {"mData": "reporting_customers"},
                        {"mData": "quantity"},
                        {"mData": "amount"},
                        {"mData": "ro_amount"},
                        {"mData": "credit"},
                    ],
                    footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(),
                        intVal = function (i) {
                            return typeof i === 'string' ?
                                i.replace(/[, Rs]|(\.\d{2})/g,"")* 1 :
                                typeof i === 'number' ?
                                i : 0;
                        },
                        customers = api
                            .column(3)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        reporting_customers = api
                            .column(4)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        qty = api
                            .column(5)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        amount = api
                            .column(6)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        ro_amount = api
                            .column(7)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        credit = api
                            .column(8)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                        $(api.column(3).footer()).html(parseFloat(customers).toLocaleString());
                        $(api.column(4).footer()).html(parseFloat(reporting_customers).toLocaleString());
                        $(api.column(5).footer()).html(parseFloat(qty).toLocaleString());
                        $(api.column(6).footer()).html(parseFloat(amount).toLocaleString());
                        $(api.column(7).footer()).html(parseFloat(ro_amount).toLocaleString());
                        $(api.column(8).footer()).html(parseFloat(credit).toLocaleString());
                    }
                });
            
            // CUSTOMER
                let customer_datatable = $('#table_agent_report').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'csv',
                            filename: 'Lins Saver Patrol Report - Agent',
                            className: 'btn btn-primary',
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary')
                            }
                        }, {
                            extend: 'pdf',
                            filename: 'Lins Saver Patrol Report - Agent',
                            title: 'Sales Report by Agent',
                            className: 'btn btn-primary',
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary')
                            },
                            customize: function (doc) {
                                doc.content[1].table.widths = [ '40%', '15%', '15%','15%', '15%'];
                                var iColumns = $('#table_agent_report thead th').length;

                                var rowCount = doc.content[1].table.body.length;
                                for (i = 0; i < rowCount; i++) {
                                        doc.content[1].table.body[i][iColumns - 1].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 2].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 3].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 4].alignment = 'right';
                                };

                                
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
                        url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/report/customer`,
                        method: "GET",
                        data: function ( d ) {
                            return $.extend( {}, d, customer_filter );
                        },
                        dataSrc: function (json) {
                            var return_data = new Array();
                            for(var i=0;i< json.length; i++){
                                return_data.push({
                                    "customer" : `${json[i].customer.firstname} ${json[i].customer.middlename != null ? json[i].customer.middlename : ''} ${json[i].customer.lastname}`,
                                    "quantity" : parseFloat(json[i].total_quantity).toLocaleString(),
                                    "amount" : parseFloat(json[i].total_amount).toLocaleString(),
                                    "ro_amount" : json[i].total_ro_amount != null ? parseFloat(json[i].total_ro_amount).toLocaleString() : '',
                                    "credit_amount" : json[i].total_credit_amount != null ? parseFloat(json[i].total_credit_amount).toLocaleString() : '',
                                });
                            }
                            return return_data;
                        },
                    },
                    aoColumns: [
                        {"mData": "customer"},
                        {"mData": "quantity"},
                        {"mData": "amount"},
                        {"mData": "ro_amount"},
                        {"mData": "credit_amount"},
                    ],
                    footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(),
                        intVal = function (i) {
                            return typeof i === 'string' ?
                                i.replace(/[, Rs]|(\.\d{2})/g,"")* 1 :
                                typeof i === 'number' ?
                                i : 0;
                        },
                        qty = api
                            .column(1)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        amount = api
                            .column(2)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        ro_amount = api
                            .column(3)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        credit_amount = api
                            .column(4)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                        $(api.column(1).footer()).html(parseFloat(qty).toLocaleString());
                        $(api.column(2).footer()).html(parseFloat(amount).toLocaleString());
                        $(api.column(3).footer()).html(parseFloat(ro_amount).toLocaleString());
                        $(api.column(4).footer()).html(parseFloat(credit_amount).toLocaleString());
                    }
                });
                
            // CREDIT 
                let credit_datatable = $('#table_credit_report').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'csv',
                            filename: 'Lins Saver Patrol Report - credit Amount Consignment',
                            className: 'btn btn-primary',
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary')
                            }
                        }, {
                            extend: 'pdf',
                            filename: 'Lins Saver Patrol Report - Credit',
                            title: 'Sales Report by Credit',
                            className: 'btn btn-primary',
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary')
                            },
                            customize: function (doc) {
                                doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                var iColumns = $('#table_credit_report thead th').length;

                                var rowCount = document.getElementById("table_credit_report").rows.length;
                                for (i = 0; i < rowCount; i++) {
                                        doc.content[1].table.body[i][iColumns - 1].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 2].alignment = 'right';
                                };

                                
                                var objLayout = {};
                                objLayout['hLineWidth'] = function(i) { return 0; };
                                objLayout['vLineWidth'] = function(i) { return 0; };
                                objLayout['hLineColor'] = function(i) { return 0; };
                                objLayout['vLineColor'] = function(i) { return 0; };
                                objLayout['paddingLeft'] = function(i) { return 15; };
                                objLayout['paddingRight'] = function(i) { return 15; };
                                doc.content[1].layout = objLayout;
                            }
                        }
                    ],
                    responsive: true,
                    autoWidth: false,
                    processing: true,
                    ajax: {
                        url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/report/credit`,
                        method: "GET",
                        data: function ( d ) {
                            return $.extend( {}, d, credit_date );
                        },
                        dataSrc: function (json) {
                            var return_data = new Array();
                            for(var i=0;i< json.length; i++){
                                return_data.push({
                                    "credit" : json[i].credit_amount,
                                    "amount" : parseFloat(json[i].total_amount).toLocaleString(),
                                });
                            }
                            return return_data;
                        },
                    },
                    aoColumns: [
                        {"mData": "credit"},
                        {"mData": "amount"},
                    ],
                });
            
            // DAILY
                let daily_datatable = $('#table_daily_report').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'csv',
                            filename: 'Lins Saver Patrol Report - Daily Collection Report',
                            className: 'btn btn-primary',
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary')
                            }
                        }, {
                            extend: 'pdf',
                            filename: 'Daily Collection Report',
                            title: 'Daily Collection Report',
                            className: 'btn btn-primary',
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary')
                            },
                            customize: function (doc) {
                                doc.pageOrientation = 'landscape';
                                doc.content[1].table.widths = [ '20%', '10%', '10%', '10%', '10%', '10%', '10%', '10%', '10%'];
                                var iColumns = $('#table_daily_report thead th').length;

                                var rowCount = doc.content[1].table.body.length;
                                for (i = 0; i < rowCount; i++) {
                                        doc.content[1].table.body[i][iColumns - 2].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 3].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 4].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 6].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 7].alignment = 'right';
                                };

                                
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
                        url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/report/daily`,
                        method: "GET",
                        data: function ( d ) {
                            return $.extend( {}, d, daily_date );
                        },
                        dataSrc: function (json) {
                            var return_data = new Array();
                            for(var i=0;i< json.length; i++){
                                return_data.push({
                                    "name" : `${json[i].customer.firstname} ${json[i].customer.middlename != null ? json[i].customer.middlename : ''} ${json[i].customer.lastname}`,
                                    "date" : json[i].sales_date,
                                    "quantity" : parseFloat(json[i].quantity).toLocaleString(),
                                    "price" : parseFloat(json[i].price).toLocaleString(),
                                    "item" :json[i].item.name,
                                    "ip_amount" : parseFloat(json[i].amount).toLocaleString(),
                                    "ro_amount" : json[i].ro_amount != null ? parseFloat(json[i].ro_amount).toLocaleString() : '',
                                    "credit" : json[i].credit_amount != null ? parseFloat(json[i].credit_amount).toLocaleString() : '',
                                    "memo" :json[i].memo,
                                });
                            }
                            return return_data;
                        },
                    },
                    aoColumns: [
                        {"mData":"name"},
                        {"mData":"date"},
                        {"mData":"quantity"},
                        {"mData":"price"},
                        {"mData":"item"},
                        {"mData":"ip_amount"},
                        {"mData":"ro_amount"},
                        {"mData":"credit"},
                        {"mData":"memo"},
                    ],
                    footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(),
                        intVal = function (i) {
                            return typeof i === 'string' ?
                                i.replace(/[, Rs]|(\.\d{2})/g,"")* 1 :
                                typeof i === 'number' ?
                                i : 0;
                        },
                        qty = api
                            .column(2)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        cost = api
                            .column(3)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        amount = api
                            .column(5)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        ro_amount = api
                            .column(6)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        credit = api
                            .column(7)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                        
                        $(api.column(2).footer()).html(parseFloat(qty).toLocaleString());
                        $(api.column(5).footer()).html(parseFloat(amount).toLocaleString());
                        $(api.column(6).footer()).html(parseFloat(ro_amount).toLocaleString());
                        $(api.column(7).footer()).html(parseFloat(credit).toLocaleString());
                    }
                });




            // CITY DATE RANGE
                $('#daterange_city').daterangepicker({
                    locale: {
                        format: 'Y-MM-DD'
                    }
                }, function(start, end, label) {
                    city_date.date_from = start.format('Y-MM-DD');
                    city_date.date_to = end.format('Y-MM-DD');
                    city_datatable.ajax.reload();
                    $('.alert_city').html(`Showing results from ${start.format('MMM DD, Y')} to ${end.format('MMM DD, Y')}`)
                });
                $('#daterange_city').on('apply.daterangepicker', function(ev, picker) {
                    city_date.date_from = picker.startDate.format('Y-MM-DD');
                    city_date.date_to = picker.endDate.format('Y-MM-DD');
                    city_datatable.ajax.reload();
                    $('.alert_city').html(`Showing results from ${picker.startDate.format('MMM DD, Y')} to ${picker.endDate.format('MMM DD, Y')}`)
                });


                $('.btn_show_city').on('click', function(){
                    city_date.date_from = null;
                    city_date.date_to = null;
                    city_datatable.ajax.reload();
                    $('.alert_city').html(`Showing all records`)
                });

            // BARANGAY DATE RANGE
                $('#daterange_barangay').daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        format: 'Y-MM-DD'
                    }
                }, function(start, end, label) {
                    barangay_filter.date_from = start.format('Y-MM-DD');
                    barangay_filter.date_to = end.format('Y-MM-DD');

                    $('#daterange_barangay').val(start.format('MMM-DD-YYYY') + ' to ' + end.format('MMM-DD-YYYY'))
                });

                $('#daterange_barangay').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('MMM-DD-YYYY') + ' to ' + picker.endDate.format('MMM-DD-YYYY'))
                    barangay_filter.date_from = picker.startDate.format('Y-MM-DD');
                    barangay_filter.date_to = picker.endDate.format('Y-MM-DD');
                });
               
            // CUSTOMER DATE RANGE
                $('#daterange_customer').daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        format: 'Y-MM-DD'
                    }
                }, function(start, end, label) {
                    customer_filter.date_from = start.format('Y-MM-DD');
                    customer_filter.date_to = end.format('Y-MM-DD');

                    $('#daterange_customer').val(start.format('MMM-DD-YYYY') + ' to ' + end.format('MMM-DD-YYYY'))
                });
                $('#daterange_customer').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('MMM-DD-YYYY') + ' to ' + picker.endDate.format('MMM-DD-YYYY'))
                    customer_filter.date_from = picker.startDate.format('Y-MM-DD');
                    customer_filter.date_to = picker.endDate.format('Y-MM-DD');
                });

               
            
            // credit DATE RANGE
                $('#daterange_credit').daterangepicker({
                    locale: {
                        format: 'Y-MM-DD'
                    }
                }, function(start, end, label) {
                    credit_date.date_from = start.format('Y-MM-DD');
                    credit_date.date_to = end.format('Y-MM-DD');
                    credit_datatable.ajax.reload();
                    $('.alert_credit').html(`Showing results from ${start.format('MMM DD, Y')} to ${end.format('MMM DD, Y')}`)

                });
                $('#daterange_credit').on('apply.daterangepicker', function(ev, picker) {
                    credit_date.date_from = picker.startDate.format('Y-MM-DD');
                    credit_date.date_to = picker.endDate.format('Y-MM-DD');
                    credit_datatable.ajax.reload();
                    $('.alert_credit').html(`Showing results from ${picker.startDate.format('MMM DD, Y')} to ${picker.endDate.format('MMM DD, Y')}`)
                });
           
                $('.btn_show_credit').on('click', function(){
                    credit_date.date_from = null;
                    credit_date.date_to = null;
                    credit_datatable.ajax.reload();
                    $('.alert_credit').html(`Showing all records`)
                });

            // DAILY DATE RANGE
                $('#daterange_daily').daterangepicker({
                    locale: {
                        format: 'Y-MM-DD'
                    }
                }, function(start, end, label) {
                    daily_date.date_from = start.format('Y-MM-DD');
                    daily_date.date_to = end.format('Y-MM-DD');
                    daily_datatable.ajax.reload();
                    $('.alert_daily').html(`Showing results from ${start.format('MMM DD, Y')} to ${end.format('MMM DD, Y')}`)
                });

                $('#daterange_daily').on('apply.daterangepicker', function(ev, picker) {
                    daily_date.date_from = picker.startDate.format('Y-MM-DD');
                    daily_date.date_to = picker.endDate.format('Y-MM-DD');
                    daily_datatable.ajax.reload();
                    $('.alert_daily').html(`Showing results from ${picker.startDate.format('MMM DD, Y')} to ${picker.endDate.format('MMM DD, Y')}`)
                });
            
                $('.btn_show_daily').on('click', function(){
                    daily_date.date_from = null;
                    daily_date.date_to = null;
                    daily_datatable.ajax.reload();
                    $('.alert_daily').html(`Showing all records`)
                
                });



            // BRGY REPORT FILTER
                
                $('.btn_show_barangay').on('click', function(){
                    barangay_filter.isDate = 0;
                    barangay_filter.isLocation = 0;
                    barangay_datatable.ajax.reload();
                    $('#filterBarangayCollapse').collapse('hide');
                    $('.alert_barangay').html(`Showing all records`)
                });

                $('.search_filtered_brgy').on('click', function(){

                    $('.alert_barangay_error').hide();
                    let cont = 0;
                    let filterString = '';
                    barangay_filter.isDate = $('#brgy_date_switch').is(":checked") ? 1 : 0;
                    barangay_filter.isLocation = $('#brgy_barangay_switch').is(":checked") ? 1 : 0;
                    barangay_filter.barangay_code = $('#brgy_barangays').val();

                    if($('#brgy_date_switch').is(":checked")) {
                        if(barangay_filter.date_from === null || barangay_filter.date_to === null){
                            $('.alert_barangay_error').show();
                            cont = 1;
                        }
                        filterString += `Date filtered from ${barangay_filter.date_from} to ${barangay_filter.date_to} <br>` ;
                    }

                    if($('#brgy_barangay_switch').is(":checked")){
                        if(barangay_filter.barangay_code === null || barangay_filter.barangay_code === '' || barangay_filter.barangay_code === 0){
                            $('.alert_barangay_error').show();
                            cont = 1;
                        }
                        filterString += `Location filtered on barangay ${$('#brgy_barangays option:selected').text()} <br>` ;
                    }
                    
                    if(cont == 0){
                        barangay_datatable.ajax.reload();
                        $('.alert_barangay').html(filterString);
                    }

                    if(!$('#brgy_date_switch').is(":checked") && !$('#brgy_barangay_switch').is(":checked")){
                        $('.alert_barangay').html('Showing all records');
                        $('#filterBarangayCollapse').collapse('hide');
                    }
                });
            // CUSTOMER REPORT FILTER
                
                $('.btn_show_customer').on('click', function(){
                    customer_filter.isDate = 0;
                    customer_filter.isLocation = 0;
                    customer_datatable.ajax.reload();

                    $('#filterCustomerCollapse').collapse('hide');
                    $('.alert_customer').html(`Showing all records`)
                });

                $('.search_filtered_customer').on('click', function(){

                    $('.alert_customer_error').hide();
                    let cont = 0;
                    let filterString = '';
                    customer_filter.isDate = $('#customer_date_switch').is(":checked") ? 1 : 0;
                    customer_filter.isLocation = $('#customer_location_switch').is(":checked") ? 1 : 0;
                    customer_filter.province_code = $('#customer_province').val();
                    customer_filter.city_code = $('#customer_cities').val();
                    customer_filter.barangay_code = $('#customer_barangays').val();
                    console.log(customer_filter);
                    if($('#customer_date_switch').is(":checked")) {
                        if(customer_filter.date_from === null || customer_filter.date_to === null){
                            $('.alert_customer_error').show();
                            cont = 1;
                        }
                        filterString += `Date filtered from ${customer_filter.date_from} to ${customer_filter.date_to} <br>` ;
                    }

                    if($('#customer_location_switch').is(":checked")){
                        if(customer_filter.province_code === null || customer_filter.province_code === '' || customer_filter.province_code === 0){
                            $('.alert_customer_error').show();
                            cont = 1;
                        }
                        filterString += `Location filtered on ${$('#customer_province option:selected').text()} ${ $('#customer_cities').val() != '' ? '- ' + $('#customer_cities option:selected').text() : ''} ${ $('#customer_barangays').val() != '' ? '- ' + $('#customer_barangays option:selected').text() : ''} <br>` ;
                    }
                    
                    if(cont == 0){
                        customer_datatable.ajax.reload();
                        $('.alert_customer').html(filterString);
                    }

                    if(!$('#customer_date_switch').is(":checked") && !$('#customer_location_switch').is(":checked")){
                        $('.alert_customer').html('Showing all records');
                        $('#filterCustomerCollapse').collapse('hide');
                    }
                });
            });
    </script>
@endsection