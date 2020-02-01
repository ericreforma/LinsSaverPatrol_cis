@extends('master.body')

@section('title','Customer List')
@section('container')

    <div class="customer_list">
        <div class="row justify-content-between">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <a href="{{ route('customer_add') }}" class='btn btn-primary btn-block'>ADD NEW CUSTOMER</a>

            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
           
        </div>
            
        <div class="collapse" id="filterCollapse"> 
            <div class='block_container filter_container' >
                <h5><i class="fas fa-filter"></i> Filter</h5>
                <div class="row filter_select" >
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                        <h6>Province</h6>
                        <select required class='form-control' name='province' id='province'>
                            <option value=''>- Select a Province -</option>
                            @foreach($provinces as $province)
                                <option value='{{ $province->code }}'>{{ $province->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                        <h6>City / Municipality</h6>
                        <select required class='form-control' name='cities' id='cities'>
                        </select>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                        <h6>Barangay</h6>
                        <select required class='form-control' name='barangays' id='barangays'>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-end filter_buttons">
                    <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                        <div class="btn btn-success btn-block search_filtered">SEARCH</div>
                    </div>
                    <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                        <div class="btn btn-secondary btn-block clear_filtered">CLEAR</div>
                    </div>
                    <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                        <div class="btn btn-dark btn-block close_filtered">CLOSE</div>
                    </div>
                </div>
              
            </div>
        </div>

        <div class="collapse" id="filterResultCollapse"> 
            <div class='block_container filter_container' >
                <h5>Showing results for <span> </span></h5>
            </div>        
        </div>

        <div class="table_container block_container">
            <table class="table table-hover" id="customer_list">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Store Category</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(function(){
            let filtered = 0;
            let myData = {
                filtered: filtered,
            };

            let customer_datatable = $('#customer_list').DataTable({
                responsive: true,
                autoWidth: false,
                processing: true,
                ajax: {
                    url: `${window.location.origin}/LinsSaverPatrol_CIS/public/api/customer/list`,
                    data: function ( d ) {
                        return $.extend( {}, d, myData );
                    },
                    method: "GET",
                    dataSrc: function (json) {
                        var return_data = new Array();
                        for(var i=0;i< json.length; i++){
                            return_data.push({
                            "code" : json[i].code,
                            "name" : `${json[i].firstname} ${json[i].middlename} ${json[i].lastname}`,
                            "store_category" : json[i].store_category.description,
                            "address" : json[i].address,
                            "status" : `
                                <span class="badge badge-${json[i].status == 1 ? 'success' : 'danger' }">
                                    ${json[i].status == 1 ? 'active' : 'inactive' }
                                </span>
                            `,
                            "menu" : `
                                <a href="${window.location.origin}/LinsSaverPatrol_CIS/public/customer/details/${json[i].id}" type="button" class='btn btn-secondary'>View</a>
                            `
                            });
                        }
                        return return_data;
                    },
                },
                aoColumns: [
                    {"mData": "code"},
                    {"mData": "name"},
                    {"mData": "store_category"},
                    {"mData": "address"},
                    {"mData": "status"},
                    {"mData": "menu"},
                ],
            });

            
            $('.search_filtered').on('click', function(){
                $('#filterResultCollapse').collapse('show');
                let message = `${$('#province').val() == '' || $('#province').val() == null ? '' : '"' + $('#province option:selected').html() + '"'} `;
                    message += `${$('#cities').val() == '' || $('#cities').val() == null ? '' : '"' + $('#cities option:selected').html() + '"'}  `;
                    message += `${$('#barangays').val() == '' || $('#barangays').val() == null ? '' : '"' + $('#barangays option:selected').html() + '"'} `;
                
                $('#filterResultCollapse h5 span').html(message);
                myData = {
                    filtered: 1,
                    province: $('#province').val(),
                    city: $('#cities').val(),
                    barangay: $('#barangays').val()
                };
                customer_datatable.ajax.reload();
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