
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
                    <h2 class="h4 text-center mb-0">Modifier  Profile</h2>
                </div>
                
                <div class="card-body px-4 py-3">
                    <form class="needs-validation" method="POST" action="{{ route('profiles.update',$profile->id)}}">
                        @csrf
                        @method('PUT')
                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="nameInput" class="form-label fw-semibold">
                               Full Name
                            </label>
                            <input type="text" 
                                   class="form-control form-control-lg" 
                                   id="nameInput" 
                                   name="name" 
                                   value="{{$profile->name}}"
                                   required
                                   >
                            <div class="invalid-feedback">
                                Please provide a valid name.
                            </div>
                        </div>
                        
                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="emailInput" class="form-label fw-semibold">
                                Email Address
                            </label>
                            <input type="email" 
                                   class="form-control form-control-lg" 
                                   id="emailInput" 
                                   name="email" 
                                   value="{{$profile->email}}" 
                                   required
                                   >
                            <div class="invalid-feedback">
                                Please provide a valid email.
                            </div>
                        </div>
                        
                        <!-- Bio Field -->
                        <div class="mb-4">
                            <label for="bioTextarea" class="form-label fw-semibold">
                                Biography
                            </label>
                            <textarea class="form-control" 
                                      id="bioTextarea" 
                                      name="bio" 
                                      rows="3" 
                                      value="">{{$profile->bio}}</textarea>
                            <div class="form-text">Maximum 500 characters</div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Update Profile
                            </button>
                            <button class="btn btn-secondary btn-lg">
                                <a href="{{ route('profiles.index')}}">Back</a>
                            </button>
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
<script>
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
</script>
   
@endsection