@extends('master.body')

@section('title',  $item->name)
@section('container')

    <div class="item_details container-fluid block_container">
            
            <div class="row">
                <div class=" col-sm-12 col-md-12 col-lg-12">
                    <table class='table_details'>
                        <tr>
                            <td>BRAND</td>
                            <td>{{ $item->brand }}</td>
                        </tr>
                        <tr>
                            <td>CATEGORY</td>
                            <td>{{ $item->category }} </td>
                        </tr>
                        <tr>
                            <td>NAME</td>
                            <td>{{ $item->name }} </td>
                        </tr>
                        <tr>
                            <td>PRICE</td>
                            <td>{{ $item->price->price }}  / {{ $item->unit->short_name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row justify-content-end">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    @component('components.author',['creator' => $creator, 'editor' => $editor])
                    @endcomponent
                </div>
            </div>
            <div class="row justify-content-end">
                <div class=" col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ route('item_editview',$item->id) }}" type="button" class="btn btn-primary btn-block">EDIT</a>
                </div>
            </div>
    </div>

@endsection