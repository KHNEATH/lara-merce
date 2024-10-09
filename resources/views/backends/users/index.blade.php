@extends('layouts.backend')
@section('pageTitle')Users @endsection
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="table-responsive pt-3 ps-3 pe-3">
                    <table class="table table-bordered border-dark border-opacity-10">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Profile</th>
                                <th class="text-center">
                                    <a href="{{ route('backends.users.create') }}" class="btn btn-primary">
                                        New User
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="table border-opacity-10">
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td class="text-center">{{ $user->role }}</td>
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="text-center">
                                        @if($user->profile)
                                            <a type="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUser{{$user->id}}">
                                                View-Profile
                                            </a>
                                            <div class="modal fade" id="modalUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <img src="{{ asset($user->profile) }}" class="w-100 h-100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('backends.users.edit', $user) }}" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                Edit
                                                <i class="typcn typcn-edit btn-icon-append"></i>                          
                                            </a>
                                            <a onclick="deleteUser( '{{ $user->id }}' )" type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                Delete
                                                <i class="fa-regular fa-trash-can"></i>
                                            </a>
                                            <form id="frmUser{{ $user->id}}" action="{{ route('backends.users.delete', $user) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <script>
                                                function deleteUser(id) {
                                                    if(confirm('Are you sure ?')){
                                                        document.getElementById('frmUser' + id).submit();
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>