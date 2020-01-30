@extends('master.body')

@section('title','Item List')
@section('container')

    <div class="item_ist">
        <a href="{{ route('item_add') }}" class='btn btn-primary'>ADD NEW ITEM</a>
        <div class="table_container block_container">
            <table class="table table-hover" id="item_ist">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date Updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->firstname }} {{ $item->middlename }} {{ $item->lastname }} </td>
                        <td>{{ $item->store_category->description }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <span class="badge badge-{{ $item->status == 1 ? 'success' : 'danger' }}">
                                {{ $item->status == 1 ? 'active' : 'inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('item_details', $item->id) }}" type="button" class='btn btn-primary'>View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(function(){
            $('#item_ist').DataTable();
        })
    </script>
@endsection