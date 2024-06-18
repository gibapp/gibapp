<!-- resources/views/pages/search.blade.php -->

@extends('pages.lost')

@section('content')
<div class="container">
    <h1>Search Results for "{{ $search }}"</h1>
    <div class="row">
        @foreach($items as $item)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset('storage/images/' . $item->image) }}" alt="Item Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->item_name }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="card-text"><small class="text-muted">Finder: {{ $item->finders_name }}</small></p>
                    <p class="card-text"><small class="text-muted">Found at: {{ $item->found_location }}</small></p>
                    <p class="card-text"><small class="text-muted">Status: {{ $item->status }}</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
