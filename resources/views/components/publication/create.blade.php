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
                        <h2 class="h4 text-center mb-0">Create New Publication</h2>
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
                        <form class="needs-validation" method="POST" action="{{ route('publication.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Title
                                </label>
                                <input type="text" class="form-control form-control-lg" name="title"
                                    value="{{ old('title') }}">
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="emailInput" class="form-label fw-semibold">
                                    Description 
                                </label>
                                <textarea class="form-control" id="bioTextarea" name="body" rows="3" >{{ old('body') }}</textarea>
                            </div>

                            <!-- Image Field -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label fw-semibold">
                                    Picteur
                                </label>
                                <input type="file" class="form-control form-control-lg" name="image">
                            </div>                         
                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Publish
                                </button>

                                <a href="{{ route('publication.index') }}" class="btn btn-secondary btn-lg">Back</a>

                            </div>
                        </form>
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
