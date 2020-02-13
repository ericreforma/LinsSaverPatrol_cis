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
                        <a class="nav-item nav-link" id="nav-agent-tab" data-toggle="tab" href="#nav-agent" role="tab" aria-controls="nav-agent" aria-selected="false">SALES BY AGENT</a>
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
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">REPORT BY DATE</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Select date range" id="daterange_barangay">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="input-group mb-3">
                                        <button class='btn btn-success btn-block btn_show_barangay'>Show All Records</button>
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
                                        <th>Quantity</th>
                                        <th>IP Amount</th>
                                        <th>RO Amount</th>
                                        <th>Credit Amount</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">
                            <h3>Sales by Agent</h3>
                            <div class="row justify-content-between">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">REPORT BY DATE</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Select date range" id="daterange_customer">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="input-group mb-3">
                                        <button class='btn btn-success btn-block btn_show_customer'>Show All Records</button>
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

            let barangay_date = {
                date_from: null,
                date_to: null
            }
            
            let customer_date = {
                date_from: null,
                date_to: null
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
                                doc.content[1].table.widths = [ '15%', '15%', '15%', '13%','13%', '13%','13%'];
                                var iColumns = $('#table_barangay_report thead th').length;

                                var rowCount = doc.content[1].table.body.length;
                                for (i = 0; i < rowCount; i++) {
                                        doc.content[1].table.body[i][iColumns - 1].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 2].alignment = 'right';
                                        doc.content[1].table.body[i][iColumns - 3].alignment = 'right';
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
                            return $.extend( {}, d, barangay_date );
                        },
                        dataSrc: function (json) {
                            var return_data = new Array();
                            for(var i=0;i< json.length; i++){
                                return_data.push({
                                    "province" : json[i].province.description,
                                    "city" : json[i].city.description,
                                    "barangay" : json[i].barangay.description,
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
                        qty = api
                            .column(3)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        amount = api
                            .column(4)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        ro_amount = api
                            .column(5)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0),
                        credit = api
                            .column(6)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                        
                        $(api.column(3).footer()).html(parseFloat(qty).toLocaleString());
                        $(api.column(4).footer()).html(parseFloat(amount).toLocaleString());
                        $(api.column(5).footer()).html(parseFloat(ro_amount).toLocaleString());
                        $(api.column(6).footer()).html(parseFloat(credit).toLocaleString());
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
                            return $.extend( {}, d, customer_date );
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
                    locale: {
                        format: 'Y-MM-DD'
                    }
                }, function(start, end, label) {
                    barangay_date.date_from = start.format('Y-MM-DD');
                    barangay_date.date_to = end.format('Y-MM-DD');
                    barangay_datatable.ajax.reload();
                    $('.alert_barangay').html(`Showing results from ${start.format('MMM DD, Y')} to ${end.format('MMM DD, Y')}`)
                });
                $('#daterange_barangay').on('apply.daterangepicker', function(ev, picker) {
                    barangay_date.date_from = picker.startDate.format('Y-MM-DD');
                    barangay_date.date_to = picker.endDate.format('Y-MM-DD');
                    barangay_datatable.ajax.reload();
                    $('.alert_barangay').html(`Showing results from ${picker.startDate.format('MMM DD, Y')} to ${picker.endDate.format('MMM DD, Y')}`)

                });
                $('.btn_show_barangay').on('click', function(){
                    barangay_date.date_from = null;
                    barangay_date.date_to = null;
                    barangay_datatable.ajax.reload();
                    $('.alert_barangay').html(`Showing all records`)
                });

            // CUSTOMER DATE RANGE
                $('#daterange_customer').daterangepicker({
                    locale: {
                        format: 'Y-MM-DD'
                    }
                }, function(start, end, label) {
                    customer_date.date_from = start.format('Y-MM-DD');
                    customer_date.date_to = end.format('Y-MM-DD');
                    customer_datatable.ajax.reload();
                    $('.alert_customer').html(`Showing results from ${start.format('MMM DD, Y')} to ${end.format('MMM DD, Y')}`)
                });
                $('#daterange_customer').on('apply.daterangepicker', function(ev, picker) {
                    customer_date.date_from = picker.startDate.format('Y-MM-DD');
                    customer_date.date_to = picker.endDate.format('Y-MM-DD');
                    customer_datatable.ajax.reload();
                    $('.alert_customer').html(`Showing results from ${picker.startDate.format('MMM DD, Y')} to ${picker.endDate.format('MMM DD, Y')}`)
                });

                $('.btn_show_customer').on('click', function(){
                    customer_date.date_from = null;
                    customer_date.date_to = null;
                    customer_datatable.ajax.reload();
                    $('.alert_customer').html(`Showing all records`)
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
            });
    </script>
@endsection