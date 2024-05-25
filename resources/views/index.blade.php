@extends('layout')
@section('content')
<div class="table-responsive">
    <h3 class="text-center">All User</h3>
    <a href="{{ route('crud.create') }}" class="btn btn-success">Registration</a>
    <hr>

    {{-- flash msg show code --}}
    @if (session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    @if (session()->has('danger'))
    <div class="alert alert-danger">{{ session()->get('danger') }}</div>
    @endif
    {{-- flash msg show code end --}}

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Address</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>User Details</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->contact }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->getCountry->name }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->hobbies }}</td>
                <td>
                    <a href="{{ route('crud.show',['crud' => $user->id]) }}" class="btn btn-primary">Show</a>
                </td>
                <td>
                    <a href="{{ route('crud.edit',['crud' => $user->id]) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form method="POST" action="{{ route('crud.destroy',['crud' => $user->id]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="10" class="text-center">No Data Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {!! $users->links() !!}
</div>
@endsection
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>