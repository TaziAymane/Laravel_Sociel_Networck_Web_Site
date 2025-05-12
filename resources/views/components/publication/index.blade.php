@extends('layouts.app')

@section('titel')
    Publications
@endsection

@section('contente')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold">Our Publications</h1>
            <p class="lead">Latest news and updates from our team</p>
            <a href="{{ route('publication.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Create New Publication
            </a>
        </div>
    </div>

    

    <div class="row g-4">
        @forelse($publications as $publication)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 overflow-hidden">
                    @if($publication->image)
                        <div class="publication-image" style="height: 200px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $publication->image) }}" 
                                 alt="{{ $publication->title }}" 
                                 class="img-fluid w-100 h-100 object-fit-cover">
                        </div>
                    @endif
                    <div class="card-body">
                        <h3 class="h5 card-title">{{ $publication->title }}</h3>
                        <p class="card-text text-muted">
                            {{ Str::limit($publication->body, 150) }}
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0 d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                        <div class="d-flex">
                            <a href="{{ route('publication.edit', $publication->id) }}" 
                               class="btn btn-sm btn-outline-secondary me-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('publication.destroy', $publication->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return alert('are you shour you want to delete this publication !!')"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        
                    </div>
                    <div class="d-flex text-end">
                            <p>plush al {{$publication->created_at->format('d-m-Y')}}</p>
                        </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No publications found. Create your first one!
                </div>
            </div>
        @endforelse
    </div>

    <div class="row mt-4">
        <div class="col-12">
            {{ $publications->links() }}
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .publication-image {
        background-color: #f8f9fa;
        transition: transform 0.3s ease;
    }
    .card:hover .publication-image {
        transform: scale(1.03);
    }
    .card {
        transition: all 0.3s ease;
        border-radius: 10px;
    }
    .card:hover {
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .object-fit-cover {
        object-fit: cover;
    }
</style>
@endsection