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
                        <h2 class="h4 text-center mb-0">Create New Profile</h2>
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
                        <form class="needs-validation" method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Full Name
                                </label>
                                <input type="text" class="form-control form-control-lg" id="nameInput" name="name"
                                    value="{{ old('name') }}">
                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="emailInput" class="form-label fw-semibold">
                                    Email Address
                                </label>
                                <input type="text" class="form-control form-control-lg" id="emailInput" name="email"
                                    value="{{ old('email') }}">

                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="emailInput" class="form-label fw-semibold">
                                    Password
                                </label>
                                <input type="password" class="form-control form-control-lg" id="emailInput" name="password">
                                {{-- End  --}}
                                {{-- Confirmation Password --}}
                                <label for="emailInput" class="form-label fw-semibold">
                                    Confirmation Password
                                </label>
                                <input type="password" class="form-control form-control-lg" id="emailInput"
                                    name="password_confirmation">
                                <div class="form-text">Minimum 8 characters</div>
                                {{-- End --}}
                            </div>
                            <!-- Image Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Profile Picteur
                                </label>
                                <input type="file" class="form-control form-control-lg" i name="image">
                            </div>
                            <!-- Bio Field -->
                            <div class="mb-4">
                                <label for="bioTextarea" class="form-label fw-semibold">
                                    Biography
                                </label>
                                <textarea class="form-control" id="bioTextarea" name="bio" rows="3" placeholder="Tell us about yourself...">{{ old('bio') }}</textarea>
                                <div class="form-text">Maximum 500 characters</div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Create Profile
                                </button>

                                <a href="{{ route('profiles.index') }}" class="btn btn-secondary btn-lg">Back</a>

                            </div>
                        </form>
                    </div>

                    <div class="card-footer bg-white border-0 text-center py-3">
                        <p class="text-muted mb-0">Already have an account?
                            <a href="#" class="text-decoration-none">Sign in</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap form validation script -->
    {{-- <script>
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script> --}}
@endsection
