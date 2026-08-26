@extends('layouts.app')

@section('title', 'Edit Destination - E-Travel')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-outline-purple me-3">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h3 class="fw-bold text-orange mb-0">Edit Destination</h3>
            </div>

            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    
                    @if($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold text-purple">Destination Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $destination->title) }}" required>
                        </div>

                        <!-- Duration -->
                        <div class="mb-3">
                            <label for="duration" class="form-label fw-semibold text-purple">Duration</label>
                            <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration', $destination->duration) }}" required>
                        </div>

                        <!-- Location -->
                        <div class="mb-3">
                            <label for="location" class="form-label fw-semibold text-purple">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $destination->location) }}" required>
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label fw-semibold text-purple">Price ($)</label>
                            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $destination->price) }}" required>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label fw-semibold text-purple">Destination Image</label>
                            @if($destination->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->title }}" class="rounded" width="80" height="80" style="object-fit: cover;">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold text-purple">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', $destination->description) }}</textarea>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.destinations.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-purple px-4">
                                <i class="fa-solid fa-check me-1"></i> Update Destination
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection