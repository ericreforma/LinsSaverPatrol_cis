@extends('master.body')

@section('title','Item Category')
@section('container')

    <div class="item_ist">
        <a href="{{ route('item_add') }}" class='btn btn-primary'>ADD NEW CATEGORY</a>
        <div class="table_container block_container">
            <table class="table table-hover" id="item_list">
                <thead>
                    <tr>
                        <th>Store Category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->brand }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price->price }} / {{ $item->unit->short_name }}</td>

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
            $('#item_list').DataTable();
        });
    </script>
@endsection