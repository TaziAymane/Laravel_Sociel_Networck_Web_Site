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
                        <h2 class="h4 text-center mb-0">Update Publication </h2>
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
                        <form class="needs-validation" method="POST"
                            action="{{ route('publication.update', $publication->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Title
                                </label>
                                <input type="text" class="form-control form-control-lg" name="title"
                                    value="{{ old('title', $publication->title) }}">
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="emailInput" class="form-label fw-semibold">
                                    Description
                                </label>
                                <textarea class="form-control" id="bioTextarea" name="body" rows="3">{{ old('body', $publication->body) }}</textarea>
                            </div>

                            <!-- Image Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Picture
                                </label>
                                @if ($publication->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $publication->image) }}" alt="Current image"
                                            style="max-height: 200px;">
                                        <p class="text-muted small mt-1">Current Image</p>
                                    </div>
                                @endif
                                <input type="file" class="form-control form-control-lg" name="image">
                                <small class="text-muted">Leave empty to keep current image</small>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Update
                                </button>
                                <a href="{{ route('publication.index') }}" class="btn btn-secondary btn-lg">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
