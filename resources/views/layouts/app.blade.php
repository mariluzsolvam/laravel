<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'NewsBlog' }}</title>
    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900&display=swap" rel="stylesheet" />
    
    <script src="{{ asset('assets/js/color-modes.js') }}"></script>
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet" />
    
    <meta name="theme-color" content="#712cf9" />
    <style>
        .bd-placeholder-img { font-size: 1.125rem; text-anchor: middle; user-select: none; }
        @media (min-width: 768px) { .bd-placeholder-img-lg { font-size: 3.5rem; } }
        .b-example-divider { width: 100%; height: 3rem; background-color: #0000001a; border: solid rgba(0, 0, 0, 0.15); border-width: 1px 0; box-shadow: inset 0 0.5em 1.5em #0000001a, inset 0 0.125em 0.5em #00000026; }
        .b-example-vr { flex-shrink: 0; width: 1.5rem; height: 100vh; }
        .bi { vertical-align: -0.125em; fill: currentColor; }
        .nav-scroller { position: relative; z-index: 2; height: 2.75rem; overflow-y: hidden; }
        .nav-scroller .nav { display: flex; flex-wrap: nowrap; padding-bottom: 1rem; margin-top: -1px; overflow-x: auto; text-align: center; white-space: nowrap; -webkit-overflow-scrolling: touch; }
        .btn-bd-primary { --bd-violet-bg: #712cf9; --bs-btn-color: var(--bs-white); --bs-btn-bg: var(--bd-violet-bg); --bs-btn-border-color: var(--bd-violet-bg); }
        .bd-mode-toggle { z-index: 1500; }
    </style>
</head>
<body>
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1"><a class="link-secondary" href="#">Subscribe</a></div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="{{ url('/news') }}">NewsBlog</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    @if (Auth::check())
                        <span class="me-2 text-secondary">Hola, {{ Auth::user()->name }}</span>
                        <a class="btn btn-sm btn-outline-secondary" href="{{ url('/signOut') }}">Sign Out</a>
                    @else
                        <a class="btn btn-sm btn-outline-secondary" href="{{ url('/login') }}">Sign in</a>
                    @endif
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-3 border-bottom">
            <nav class="nav nav-underline justify-content-between">
                @foreach ($categories as $cat)
                    <a class="nav-item nav-link link-body-emphasis" href="{{ url('/news/category/' . $cat->id) }}">
                        {{ $cat->category }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>

    <main class="container">
        @yield('content')
    </main>

    <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a>.</p>
        <p class="mb-0"><a href="#">Back to top</a></p>
    </footer>

    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>