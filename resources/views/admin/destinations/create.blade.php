@extends('admin.layouts.app')

@section('title', 'Add Destination')
@section('page_title', 'Add New Destination')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                
                <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="title" class="form-label fw-semibold">Destination Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required placeholder="e.g. Sharm El Sheikh">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="duration" class="form-label fw-semibold">Duration</label>
                            <input type="text" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration') }}" required placeholder="e.g. 3 Days / 2 Nights">
                            @error('duration') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="location" class="form-label fw-semibold">Location</label>
                            <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" required placeholder="e.g. South Sinai, Egypt">
                            @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label fw-semibold">Price ($)</label>
                            <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required placeholder="e.g. 299.99">
                            @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" required placeholder="Write a short description about this destination...">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold">Destination Image</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.destinations.index') }}" class="btn btn-light px-4">Cancel</a>
                        <button type="submit" class="btn btn-theme px-4">Save Destination</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection