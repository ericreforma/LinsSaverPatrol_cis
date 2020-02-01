@extends('master.body')

@section('title','Customer List')
@section('container')

    <div class="customer_list">
        <a href="{{ route('customer_add') }}" class='btn btn-primary'>ADD NEW CUSTOMER</a>
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
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->code }}</td>
                        <td>{{ $customer->firstname }} {{ $customer->middlename }} {{ $customer->lastname }} </td>
                        <td>{{ $customer->store_category->description }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            <span class="badge badge-{{ $customer->status == 1 ? 'success' : 'danger' }}">
                                {{ $customer->status == 1 ? 'active' : 'inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('customer_details', $customer->id) }}" type="button" class='btn btn-secondary'>View</a>
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
            $('#customer_list').DataTable({
                responsive: true,
                autoWidth: false,
            });
        })
    </script>
@endsection