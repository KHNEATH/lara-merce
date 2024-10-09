@extends('layouts.backend')
@section('pageTitle')New User @endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('backends.users.update', $users) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="role" class="col-sm-2 col-form-label">Role *</label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control border-info" id="role" name="role">
                                    <option>-----Select role-----</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role}}" @if ($users->role == $role) selected @endif>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input value="{{ $users->name}}" type="text" class="form-control border-info" id="name" name="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email *</label>
                            <div class="col-sm-10">
                                <input value="{{ $users->email}}" type="email" class="form-control border-info" id="email" name="email" placeholder="email@example.com">
                            </div>
                        </div>
                        <div class="mb-3 row" hidden>
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input  value="{{ $users->password}}" type="password" class="form-control border-info" id="password" name="password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="image" class="col-sm-2 col-form-label">Profile<span class="text-danger">*</span> </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control border-info" id="image" name="image" accept="image/png, image/jpg, image/webp, image/svg">
                            </div>
                            <span>Keep it blank if you do not want to change image</span>
                            <h3>Selected image</h3>
                            <img src="{{ asset($users->profile) }}" alt="w-100" style="max-width : 150px">
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <a href="{{ route('backends.users.index') }}" class="btn btn-outline-secondary mt-3">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection