@extends('layouts.backend')

@section('pageTitle')Categories @endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="table-responsive pt-3 ps-3 pe-3">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('backends.categories.create') }}" type="button" class="btn btn-primary btn-sm btn-icon-text mr-3">
                            Add New Category
                            <i class="typcn typcn-edit btn-icon-append"></i>
                        </a>
                    </div>
                    <table class="table table-bordered border-dark border-opacity-10">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Icon</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($categories->isEmpty())
                                <tr>
                                    <td>There is not recode</td>
                                </tr>
                            @else
                                @foreach($categories as $category)
                                    <tr class="table border-opacity-10">
                                        <td class="text-center">{{ $category->id }}</td>
                                        <td class="text-center">{{ $category->title }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset($category->icon) }}" style="width: 40px; height: auto;">
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('backends.categories.edit', $category) }}" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    Edit
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </a>
                                                <a onclick="deleteCategory( '{{ $category->id }}' )" type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                    Delete
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </a>
                                                <form id="frmCategory{{ $category->id}}" action="{{ route('backends.categories.delete', $category) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <script>
                                                    function deleteCategory(id) {
                                                        if(confirm('Are you sure ?')){
                                                            document.getElementById('frmCategory' + id).submit();
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
