@extends('layouts.app')
@section('titel')
    Show
@endsection
@section('contente')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 mb-0">Profile Details</h1>
                    </div>

                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <h5 class="mb-1 text-muted">ID</h5>
                                <p class="mb-0 fs-5"><b>{{ $profile->id }}</b></p>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <h5 class="mb-1 text-muted">Image</h5>
                                    <p class="mb-0 fs-5">
                                    <div class="flex-shrink-0 me-2">
                                        <div class="bg-primary bg-opacity-10 rounded-circle overflow-hidden"
                                            style="width: 80px; height: 80px;">
                                            <img src="{{ asset('storage/' . $profile->image) }}" alt="Profile image"
                                                class="w-100 h-100 object-fit-cover">
                                        </div>
                                    </div>
                                    </p>
                                </div>

                                <div class="list-group-item">
                                    <h5 class="mb-1 text-muted">Name</h5>
                                    <p class="mb-0 fs-5"><b>{{ $profile->name }}</b></p>
                                </div>

                                <div class="list-group-item">
                                    <h5 class="mb-1 text-muted">Email</h5>
                                    <p class="mb-0 fs-5">
                                        <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                                    </p>
                                </div>

                                <div class="list-group-item">
                                    <h5 class="mb-1 text-muted">Bio</h5>
                                    <p class="mb-0 fs-5"><b>{{ $profile->bio }}</b></p>
                                </div>
                                <div class="list-group-item">
                                    <h5 class="mb-1 text-muted">Join in  </h5>
                                    <p class="mb-0 fs-5"><b>{{ $profile->created_at->format('d-m-Y') }}</b></p>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light">
                            <a href="{{ route('profiles.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
