@extends('layouts.backend')
@section('pageTitle')personal-info @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-10 offset-lg-1">  
                <div class="card mb-3">
                    @foreach ($accountusers as $user)
                    <div class="row g-0">  <div class="col-md-4">
                        @if($user->profile)
                            <img src="{{ asset($user->profile) }}" alt="{{ $user->name }} Profile" class="img-fluid rounded-start" data-bs-toggle="modal" data-bs-target="#modalUser{{$user->id}}">
                            <div class="modal fade" id="modalUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body pt-3">
                                            <img src="{{ asset($user->profile) }}" class="img-fluid" alt="{{ $user->name }} Profile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-3">
                                <p class="card-title">Name : {{ $user->name }}</p>
                                <p>Email : {{ $user->email }}</p>
                                <p>Role : {{ $user->role }}</p>
                                <p class="card-text">* Believing in yourself is the first secret to success.<br>* You get what you focus on, so focus on what you want.</p>
                                <a href="https://gemini.google.com/app/24e52a1602d86ead">How to create good profile by html and style bootstrap with AI Gemini</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>