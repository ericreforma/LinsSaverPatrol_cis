@extends('master.body')

@section('title','Store Category')
@section('container')

    <div class="item_ist">
    <div class="btn btn-primary add_category_button">ADD NEW</div>
        
        <div class="table_container block_container">
            <table class="table table-hover" id="storecategory_list">
                <thead>
                    <tr>
                        <th>Store Category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('modal')
    <div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="add_category_modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-inline add_category_form" method=POST accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="storeCategory_id" name="storeCategory_id" value='' />
                <input type="hidden" id="isEdit" name="isEdit" value='0' />

                <div class="modal-header">
                    <h5 class="modal-title" id="add_category_modalLabel">ADD NEW CATEGORY</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                    <label for="unit">Store Category</label>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 ">
                                    <input required type="text" class='form-control' name='description' id='description'>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn_delete">Delete</button>
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
            let add_category_form = $('.add_category_form');
            let storeCategory_datatable = $('#storecategory_list').DataTable({
                responsive: true,
                autoWidth: false,
                processing: true,
                ajax: {
                    url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/storeCategory/get`,
                    method: "GET",
                    dataSrc: function (json) {
                        var return_data = new Array();
                        for(var i=0;i< json.length; i++){
                            return_data.push({
                                "storeCategory" : json[i].description,
                                "menu" : `<button class='btn btn-primary view_details' storeCategory_id='${json[i].id}'>Edit</button>`
                            });
                        }
                        return return_data;
                    },
                },
                aoColumns: [
                    {"mData": "storeCategory"},
                    {"mData": "menu"},
                ],
            });

            add_category_form.submit(function(e){
                e.preventDefault();
                $('#add_category_modal button[type=submit]').attr('disabled','disabled');
                
                $('#add_category_modal button[type=submit]').html(`<div class="spinner-border text-light spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);

                $.ajax({
                    type: 'post',
                    data: add_category_form.serialize(),
                    url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/storeCategory/add`,
                    success: function(){
                        $('#description').val('');
                        storeCategory_datatable.ajax.reload();
                        $('#add_category_modal').modal('hide');

                        $('#add_category_modal button[type=submit]').attr('disabled',false);
                        $('#add_category_modal button[type=submit]').html(`Save`);
                    },
                    error: function(e){
                        console.log(e);
                    }
                })
            });
            $('.add_category_button').on('click', function(){
                $('#isEdit').val(0);
                $('#add_category_modal').modal('show');
                $('.btn_delete').hide();
                $('.add_category_modalLabel').html('ADD NEW STORE CATEGORY');
            })
        
            $('body').on('click','.view_details', function(){

                $.ajax({
                    type: 'get',
                    url: `${window.location.origin}/influencer/LinsSaverPatrol_CIS/public/api/storeCategory/details/${$(this).attr('storeCategory_id')}`,
                    success: function(response){
                        $('#description').val(response.description);
                        $('#storeCategory_id').val(response.id);
                        $('#add_category_modal').modal('show');
                        $('#isEdit').val(1);
                        $('.btn_delete').show();
                        $('.add_category_modalLabel').html('EDITING CATEGORY');
                    },
                    error: function(e){
                        console.log(e);
                    }
                })
            });
        });
    </script>
@endsection
