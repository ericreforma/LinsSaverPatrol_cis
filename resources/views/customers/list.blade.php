@extends('master.body')

@section('title','Customer List')
@section('container')

    <div class="customer_list">
        <a href="{{ route('customer_add') }}" class='btn btn-primary'>Add Customer</a>
        <div class="table_container form_container">
            <table class="table" id="customer_list">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Store Category</th>
                        <th>Address</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->code }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->store_category_id }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->status }}</td>
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
        $('#customer_list').DataTable();
    })
</script>
@endsection