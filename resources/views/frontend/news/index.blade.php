@extends('layouts.app')

@section('content')
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
        <div class="col-lg-6 px-0">
            <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede...</p>
        </div>
    </div>

    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">{{ $title }}</h3>

            @forelse ($news_list as $news_item)
                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1">
                        <a href="{{ url('/news/' . $news_item->slug) }}" class="text-decoration-none text-reset">
                            {{ $news_item->title }}
                        </a>
                    </h2>
                    <p>{{ $news_item->body }}</p>
                    <hr>
                </article>
            @empty
                <h3>No News available</h3>
                <p>Unable to find any news for you.</p>
            @endforelse
        </div>

        <div class="col-md-4">
            </div>
    </div>
@endsection