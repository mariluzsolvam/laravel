@extends('layouts.app')

@section('content')
<section class="mx-auto my-5" style="max-width: 400px;">
    <h2 class="mb-4">{{ $title }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/checkUser') }}" method="post" class="card p-4 shadow-sm">
        @csrf <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Send</button>
    </form>
    
    <div class="text-center mt-3">
        <a href="{{ url('/news') }}">Volver al inicio</a>
    </div>
</section>
@endsection