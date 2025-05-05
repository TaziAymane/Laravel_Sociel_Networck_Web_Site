@extends('layouts.app')
@section('titel')
    Create
@endsection
@section('contente')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0 pt-4">
                        <h2 class="h4 text-center mb-0">Update Profile</h2>
                    </div>
                    {{-- Form Errors Alert --}}
                    @if ($errors->any())
                        <x-alert type="warning">
                            <h3>Errors</h3>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </x-alert>
                    @endif
                    {{-- End --}}
                    <div class="card-body px-4 py-3">
                        <form class="needs-validation" method="POST" action="{{ route('profiles.update', $profile->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Full Name
                                </label>
                                <input type="text" class="form-control form-control-lg" id="nameInput" name="name"
                                    value="{{ old('name', $profile->name) }}">
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="emailInput" class="form-label fw-semibold">
                                    Email Address
                                </label>
                                <input type="email" class="form-control form-control-lg" id="emailInput" name="email"
                                    value="{{ old('email', $profile->email) }}">
                            </div>
                            <!-- Image Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Profile Picteur
                                </label>
                                <input type="file" class="form-control form-control-lg" name="image" value="{{old('image',$profile->image) }}">
                            </div>
                            <!-- Bio Field -->
                            <div class="mb-4">
                                <label for="bioTextarea" class="form-label fw-semibold">
                                    Biography
                                </label>
                                <textarea class="form-control" id="bioTextarea" name="bio" rows="3" value="">{{ old('bio', $profile->bio) }}</textarea>
                                <div class="form-text">Maximum 500 characters</div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Update Profile
                                </button>
                                <button class="btn btn-secondary btn-lg">
                                    <a href="{{ route('profiles.index') }}">Back</a>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
