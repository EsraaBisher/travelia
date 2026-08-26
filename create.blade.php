@extends('layouts.app')

@section('content')

<style>
    .btn-custom-purple {
        background-color: #ffffff;
        color: #5f3475;
        border: 2px solid #5f3475;
        transition: all 0.3s ease-in-out;
    }

    .btn-custom-purple:hover {
        background-color: #5f3475;
        color: #ffffff;
    }
    
    /* This ensures any icons inside the button change color too */
    .btn-custom-purple:hover svg {
        fill: currentColor;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                    <h4 class="fw-bold text-dark">Add New Tour</h4>
                </div>
                
                <div class="card-body p-4">
                    <!-- NEW: Error Message Display -->
                    @if ($errors->any())
                        <div class="alert alert-danger pb-0">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Note the enctype="multipart/form-data" - this is required for uploading images! -->
                    <form action="{{ route('tours.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tour Name</label>
                            <input type="text" name="name" class="form-control" required placeholder="e.g. Hurghada">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" class="form-control" rows="3" required placeholder="Describe the tour..."></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Price ($)</label>
                                <input type="number" step="0.01" name="price" class="form-control" required placeholder="e.g. 100.00">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Duration (Days)</label>
                                <input type="text" name="duration" class="form-control" required placeholder="e.g. 4">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tour Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('tours.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-custom-purple fw-semibold rounded-3 py-2 px-4">Save Tour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection