@extends('layouts.app') 

@section('content')

<!-- Add this style block right here -->
<style>
    /* Your existing button styles */
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
    
    .btn-custom-purple:hover svg {
        fill: currentColor;
    }

    /* NEW: Card Hover Styles */
    .card-custom-hover {
        /* A transparent border prevents the card layout from "jumping" on hover */
        border: 2px solid transparent !important; 
        transition: border-color 0.3s ease-in-out;
    }

    .card-custom-hover:hover {
        border-color: #5f3475 !important;
    }

    /* ... your existing button and card hover styles ... */

    /* NEW: Custom Purple Text */
    .text-custom-purple {
        color: #5f3475 !important;
    }
</style>

<!-- Main Container -->
<div class="container py-5">
        <div class="text-center mt-3">
            <h1 class=" justify-content-center mb-5">Let's See Where Your <b style="color: #5f3475">Vacation</b> Will Be.. </h1>
        </div>
    <!-- Grid Layout -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">
        
        @foreach($destinations as $destination)
        <!-- Individual Card -->
        <div class="col">
            <div class="card h-100 shadow-sm rounded-4 overflow-hidden card-custom-hover">
                
                <!-- Image -->
                <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                
                <!-- Content Wrapper -->
                <div class="card-body d-flex flex-column p-4">
                    
                    <!-- Destination Name -->
                    <h5 class="card-title fw-bold text-dark mb-1">{{ $destination->name }}</h5>

                    <!-- Short Description -->
                    <p class="card-text text-muted small mb-3">
                        {{ Str::limit($destination->description, 50) }}
                    </p>

                    <!-- Duration -->
                    <p class="card-text text-muted small mb-3">
                        {{ $destination->duration }} Days
                    </p>
                    
                    <!-- Price -->
                    <div class="fs-4 fw-bolder text-custom-purple mb-4">
                        {{ $destination->price }}$
                    </div>
                    
                    <!-- Push buttons to the bottom -->
                    <div class="mt-auto">
                        <!-- View Details Modal Trigger Button -->
                        <button type="button" class="btn btn-custom-purple w-100 fw-semibold mb-3 rounded-3 py-2" data-bs-toggle="modal" data-bs-target="#tourModal-{{ $destination->id }}">
                            View Details
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tour Modal (Hidden by default, triggered by the button above) -->
        <div class="modal fade" id="tourModal-{{ $destination->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $destination->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold fs-4" id="modalLabel-{{ $destination->id }}">{{ $destination->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-4">
                        <div class="row g-4">
                            <!-- Modal Image -->
                            <div class="col-md-5">
                                <img src="{{ asset('storage/' . $destination->image) }}" class="img-fluid rounded-4 shadow-sm" alt="{{ $destination->name }}" style="object-fit: cover; width: 100%; height: auto;">
                            </div>
                            <!-- Modal Details -->
                            <div class="col-md-7">
                                <h6 class="fw-bold text-muted mb-3">About this tour</h6>
                                <p class="mb-4">{{ $destination->description }}</p>

                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-light rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clock text-custom-purple" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-bold">Duration</p>
                                        <p class="mb-0 text-muted">{{ $destination->duration }} Days</p>
                                    </div>
                                </div>
                                <!-- Modal Price -->
                                <div class="fs-4 fw-bolder text-custom-purple mb-4">
                                    {{ $destination->price }}$
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Buttons -->
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-secondary rounded-3 px-4" data-bs-dismiss="modal">Close</button>
                        <a href="{{ url('/book/' . $destination->id) }}" class="btn btn-custom-purple rounded-3 px-4 fw-bold">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        
        @endforeach

    </div>
    
    <!-- Add Tour Button at the bottom -->
    <div class="text-center border-top pt-3">
        <div class="text-center mt-5">
            <a href="{{ route('tours.create') }}" class="btn btn-custom-purple fw-semibold rounded-3 py-2 px-4">
                Add Tour
            </a>
        </div>
    </div>
</div>
@endsection