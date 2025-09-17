@extends('layouts.app')

@section('title', 'Newsletter')

@section('content')

<!-- Berita Unggulan -->




<div class="bg-gray-900 pt-24 sm:pt-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-2xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">Berita Unggulan</h2>
      <p class="mt-2 text-lg/8 text-gray-300">Learn how to grow your business with our expert advice.</p>
    </div>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
      @foreach ($featureds as $featured )
      <article class="flex max-w-xl flex-col items-start justify-between">

        <div class="flex items-center gap-x-4 text-xs">
          <time datetime="2020-03-16" class="text-gray-400">{{ $featured->updated_at->format('M d, Y') }}</time>
          <a href="" class="relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300 hover:bg-gray-800">{{ $featured->newsCategory->title }}</a>
        </div>
        <div class="group relative grow pt-4">
          <img src="{{ asset('storage/' . $featured->thumbnail) }}" style="background-size: cover; background-position: center; display: block; width: 100%; height: 200px; border-radius: 0.5rem; margin-bottom: 1.25rem;">
          <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
            <a href="{{ route('news.show', $featured->slug) }}">
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


<div class="bg-gray-900 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-2xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">Related News</h2>
      <p class="mt-2 text-lg/8 text-gray-300">Learn how to grow your business with our expert advice.</p>
    </div>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

      @foreach ($banners as $banner )
      <article class="flex max-w-xl flex-col items-start justify-between">
          <div class="flex items-center gap-x-4 text-xs">
            <time datetime="2020-03-16" class="text-gray-400">{{ $banner->updated_at->format('M d, Y') }}</time>
            <a href="#" class="relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300 hover:bg-gray-800">
              {{ $banner->news->newsCategory->title }}</a>
          </div>
          <div class="group relative grow pt-4">
            <img src="{{ asset('storage/' . $banner->news->thumbnail) }}" style="background-size: cover; background-position: center; display: block; width: 100%; height: 200px; border-radius: 0.5rem; margin-bottom: 1.25rem;">
            <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
              <a href="{{ route('news.show', $banner->news->slug) }}">
                <span class="absolute inset-0"></span>
                {{Str::limit(strip_tags( $banner->news->title),50 ) }}
              </a>
            </h3>
            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-400">{{ Str::limit (strip_tags($banner->news->content), 200)  }}</p>
          </div>
          <div class="relative mt-8 flex items-center gap-x-4 justify-self-end">
            <img src={{ asset ('storage/' . $banner->news->author->avatar) }} class="size-10 rounded-full bg-gray-800" />
            <div class="text-sm/6">
              <p class="font-semibold text-white">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  {{ $banner->news->author->name }}
                </a>
              </p>
              <p class="text-gray-400">{{ $banner->news->author->role }}</p>
            </div>
          </div>
      </article>
      @endforeach

    </div>
  </div>
</div>