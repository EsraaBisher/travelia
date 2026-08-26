@extends('admin.layouts.app')

@section('title', 'Edit Destination')
@section('page_title', 'Edit Destination')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                
                <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="title" class="form-label fw-semibold">Destination Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $destination->name) }}" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="duration" class="form-label fw-semibold">Duration</label>
                            <input type="text" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration', $destination->duration) }}" required placeholder="e.g. 3 Days / 2 Nights">
                            @error('duration') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="location" class="form-label fw-semibold">Location</label>
                            <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $destination->location) }}" required>
                            @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label fw-semibold">Price ($)</label>
                            <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $destination->price) }}" required>
                            @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $destination->description) }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold">Destination Image</label>
                        @if($destination->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $destination->image) }}" alt="Current Image" class="rounded-2" style="width: 100px; height: 70px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                        <small class="text-muted">Leave empty if you don't want to change the current image.</small>
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.destinations.index') }}" class="btn btn-light px-4">Cancel</a>
                        <button type="submit" class="btn btn-theme px-4">Update Destination</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection