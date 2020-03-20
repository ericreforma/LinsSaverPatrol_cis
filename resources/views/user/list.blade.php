@extends('master.body')

@section('title','User List')
@section('container')

    <div class="user_list">
        <a href="{{ route('users_add') }}" class='btn btn-primary'>ADD NEW USER</a>
        <div class="table_container block_container">
            <table class="table table-hover" id="user_list_table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Member since</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            @if($user->media_id == 0)
                                <div class="letter_profile_picture">
                                    <span>
                                        {{ substr($user->username, 0, 1) }}
                                    </span>
                                </div>
                            @else
                                <div class="letter_profile_picture profile_picture" style="background-image: url('/influencer/LinsSaverPatrol_CIS/public/storage/media/{{ $user->media->url }}')">
                                </div>
                            @endif
                        </td>
                        <td>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            <h5>

                            <span class="badge badge-{{ $user->type_id == 1 ? 'primary' : 'warning' }}">
                                {{ $user->type->description }}
                            </span>

                            </h5>

                        </td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('users_details', ['id' => $user->id]) }}" class="btn btn-primary">
                                VIEW
                            </a>
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
            $('#user_list_table').DataTable();
        });
    </script>
@endsection