@extends('layouts.backend')
@section('pageTitle')Table @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive pt-3 p-5">
                    <div class="d-flex justify-content-end mb-3 ">
                        <a href="{{ route('backends.tables.create') }}" type="button" class="btn btn-primary btn-sm btn-icon-text mr-3">
                            Add New Table
                            <i class="typcn typcn-edit btn-icon-append"></i>                          
                        </a>
                    </div>
                    <table class="table table-bordered border-dark border-opacity-10">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Table Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Des</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($tables->isEmpty())
                                <tr>
                                    <td class="text-center" colspan="5">There is not recode</td>
                                </tr>
                            @else
                                @foreach($tables as $table)
                                    <tr class="table border-opacity-10">
                                        <td class="text-center pe-0 ps-0">{{ $loop->index+1 }}</td>
                                        <td class="ps-3">{{ $table->name }}</td>
                                        <td class="text-center">{{ $table->unit_price }}$</td>
                                        <td class="text-center">
                                            @if($table->image_url)
                                                <a type="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTable{{ $table->id }}">
                                                    <img src="{{ asset($table->image_url) }}" style="width: 60px; height: auto">
                                                </a>
                                                
                                                <div class="modal fade" id="modalTable{{ $table->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <img src="{{ asset($table->image_url) }}" class="w-100 h-100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="ps-3">{{ $table->description }}</td>
                                        <td class="text-center">Null</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('backends.tables.edit', $table) }}" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    Edit
                                                    <i class="typcn typcn-edit btn-icon-append"></i>                          
                                                </a>
                                                <a onclick="deleteProduct( '{{ $table->id }}' )" type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                    Delete
                                                    <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                                                </a>
                                                <form id="frmTable{{ $table->id}}" action="{{ route('backends.tables.destroy', $table) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <script>
                                                    function deleteProduct(id) {
                                                        if(confirm('Are you sure ?')){
                                                            document.getElementById('frmTable' + id).submit();
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>