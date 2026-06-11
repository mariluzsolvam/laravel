@extends('layouts.app')

@section('content')
<section class="py-5">
    <h2>{{ $news->title }}</h2>
    <p class="lead text-muted">{{ $news->body }}</p>
    
    @if($news->image)
        <img src="{{ asset('assets/img/' . $news->image) }}" width="300" class="img-fluid rounded shadow-sm" alt="{{ $news->title }}">
    @endif
    
    <div class="mt-4">
        <a href="{{ url('/news') }}" class="btn btn-secondary">Volver al archivo</a>
    </div>
</section>
@endsection