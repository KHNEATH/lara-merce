@extends('layouts.backend')
@section('pageTitle')Products @endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="table-responsive pt-3 ps-3 pe-3">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('backends.products.create') }}" type="button" class="btn btn-primary btn-sm btn-icon-text mr-3">
                            Add New Product
                            <i class="typcn typcn-edit btn-icon-append"></i>                          
                        </a>
                    </div>
                    <table class="table table-bordered border-dark border-opacity-10">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" style="width: 60px">ID</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Quantity In Stock</th>
                                <th class="text-center" style="width: 50px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if($products->isEmpty())
                                <tr>
                                    <td colspan="7">There is not recode</td>
                                </tr>
                            @else
                                @foreach($products as $product)
                                    <tr class="table border-opacity-10">
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td class="text-center">{{ $product->category->title }}</td>
                                        <td class="text-center">
                                            @if($product->image_url)
                                                <a type="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProduct{{ $product->id }}">
                                                    <img src="{{ asset($product->image_url) }}">
                                                </a>
                                                
                                                <div class="modal fade" id="modalProduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <img src="{{ asset($product->image_url) }}" style="width: 200px; height: auto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $product->name }}</td>
                                        <td class="text-center">{{ $product->qty_in_stock }}</td>
                                        <td class="d-flex justify-content-center">
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('backends.products.show', $product) }}" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    Detail
                                                    <i class="typcn typcn-edit btn-icon-append"></i>                          
                                                </a>
                                                <a href="{{ route('backends.products.edit', $product) }}" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    Edit
                                                    <i class="typcn typcn-edit btn-icon-append"></i>                          
                                                </a>
                                                <a onclick="deleteProduct( '{{ $product->id }}' )" type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                    Delete
                                                    <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                                                </a>
                                                <form id="frmProduct{{ $product->id}}" action="{{ route('backends.products.destroy', $product) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <script>
                                                    function deleteProduct(id) {
                                                        if(confirm('Are you sure ?')){
                                                            document.getElementById('frmProduct' + id).submit();
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
