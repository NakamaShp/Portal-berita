@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<!-- Berita Unggulan -->




<div class="bg-gray-900 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">Berita Unggulan</h2>
      <p class="mt-2 text-lg/8 text-gray-300">Learn how to grow your business with our expert advice.</p>
    </div>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

      @foreach ($featureds as $featured )
      <article class="flex max-w-xl flex-col items-start justify-between">
        <div class="flex items-center gap-x-4 text-xs">
          <time datetime="2020-03-16" class="text-gray-400">Mar 16, 2020</time>
          <a href="#" class="relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300 hover:bg-gray-800">{{ $featured->newsCategory->title }}</a>
        </div>
        <div class="group relative grow pt-4">
          <img src="{{ asset('storage/' . $featured->thumbnail) }}" style="background-size: cover; background-position: center; display: block; width: 100%; height: 200px; border-radius: 0.5rem; margin-bottom: 1.25rem;">
          <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
            <a href="#">
              <span class="absolute inset-0"></span>
              {{Str::limit(strip_tags( $featured->title),50 ) }}
            </a>
          </h3>
          <p class="mt-5 line-clamp-3 text-sm/6 text-gray-400">{{ Str::limit (strip_tags($featured->content), 200)  }}</p>
        </div>
        <div class="relative mt-8 flex items-center gap-x-4 justify-self-end">
          <img src={{ asset ('storage/' . $featured->author->avatar) }} class="size-10 rounded-full bg-gray-800" />
          <div class="text-sm/6">
            <p class="font-semibold text-white">
              <a href="#">
                <span class="absolute inset-0"></span>
                {{ $featured->author->name }}
              </a>
            </p>
            <p class="text-gray-400">{{ $featured->author->role }}</p>
          </div>
        </div>
      </article>
      @endforeach

    </div>
  </div>
</div>




<aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
  <div class="px-20 mx-auto max-w-screen-xl">
    <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Related articles</h2>
    <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
      @foreach ($banners as $banner )
      <article class="max-w-xs">
        <img src="{{ asset('storage/' . $banner->news->thumbnail) }}" style="background-size: cover; background-position: center; display: block; width: 100%; height: 200px; border-radius: 0.5rem; margin-bottom: 1.25rem;">

        </img>
        <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
          <a href="#">{{ Str::limit( $banner->news->title, 30) }}</a>
        </h2>
        <p class="mb-4 text-gray-500 dark:text-gray-400">
          {{ Str::limit(strip_tags($banner->news->content), 100) }}
        </p>
        <a href=""
          class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline text-white">
          Read more
        </a>
      </article>
      @endforeach
    </div>
  </div>
</aside>

@endsection