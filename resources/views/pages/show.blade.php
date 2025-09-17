<!-- <h2>{{ $news->title }}</h2>
<img src="{{ asset('storage/' . $news->thumbnail)}}" alt=""> -->


@extends('layouts.app')

{{-- Menggunakan judul berita sebagai judul halaman --}}
@section('title', $news->title)

@section('content')



<div class="bg-gray-900 px-6 py-24 sm:py-32 lg:px-8">
    {{-- Mengubah max-w-3xl menjadi max-w-7xl untuk mengakomodasi sidebar --}}
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-x-12 lg:grid-cols-3">

        <!-- Konten Utama Berita (Kolom Kiri) -->
        <main class="lg:col-span-2">
            <div class="text-base leading-7 text-gray-300">
                <!-- Kategori Berita -->
                <div>
                    <a href="#" class="inline-block rounded-full bg-gray-800/60 px-3 py-1.5 text-sm font-medium text-gray-300 hover:bg-gray-700">{{ $news->newsCategory->title }}</a>
                </div>

                <!-- Judul Berita -->
                <h1 class="mt-4 block text-3xl font-bold tracking-tight text-white sm:text-4xl">{{ $news->title }}</h1>

                <!-- Informasi Penulis dan Tanggal -->
                <div class="relative mt-6 flex items-center gap-x-4">
                    <img src="{{ asset('storage/' . $news->author->avatar) }}" alt="Author Avatar" class="size-10 rounded-full bg-gray-800">
                    <div class="text-sm leading-6">
                        <p class="font-semibold text-white">
                            {{ $news->author->name }}
                        </p>
                        <div class="flex items-center gap-x-2 text-gray-400">
                            <time datetime="{{ $news->updated_at->toIso8601String() }}" class="text-gray-400">
                                {{ $news->updated_at->format('M d, Y') }}
                            </time>
                            <span>&middot;</span>
                            <p>{{ $news->author->role }}</p>
                        </div>
                    </div>
                </div>

                <!-- Gambar Utama Berita -->
                <figure class="mt-10">
                    <img class="aspect-video w-full rounded-xl bg-gray-800 object-cover" src="{{ asset('storage/' . $news->thumbnail) }}" alt="Thumbnail Berita">
                </figure>

                <!-- Konten Utama Berita -->
                <div class="mt-10 max-w-none">
                    <div class="prose prose-lg prose-invert max-w-none text-gray-300 prose-headings:text-white prose-a:text-indigo-400 hover:prose-a:text-indigo-300 prose-strong:text-white">
                        {!! $news->content !!}
                    </div>
                </div>
            </div>
        </main>

        {{-- Sidebar akan disembunyikan di layar kecil (hidden) dan muncul di layar besar (lg:block) --}}
        <aside class="hidden lg:block">
            {{-- Membuat sidebar tetap (sticky) saat scroll --}}
            <div class="sticky top-24">
                <h2 class="text-xl font-semibold leading-6 text-white">Berita Terkait</h2>
                <div class="mt-6 space-y-8">
                    {{--
            Looping untuk menampilkan berita terkait.
            Pastikan Anda mengirimkan variabel $relatedNews dari controller Anda.
            Contoh: $relatedNews = News::where('category_id', $news->category_id)->where('id', '!=', $news->id)->latest()->take(4)->get();
          --}}
                    @if(isset($categories) && $categories->count() > 0)
                    @foreach ($categories as $category)
                    <article class="relative flex items-start gap-x-4">
                        <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="Thumbnail Berita Terkait" class="size-16 flex-none rounded-lg bg-gray-800 object-cover">
                        <div class="min-w-0">
                            <a href="{{ route('news.show', $category->slug) }}" class="text-xs relative z-10 rounded-full bg-gray-800/60 px-2.5 py-1 font-medium text-gray-300 hover:bg-gray-700">{{ $category->newsCategory->title }}</a>
                            <h3 class="mt-2 text-sm font-semibold text-white group-hover:text-gray-300">
                                <a href="{{ route('news.show', $category->slug) }}">
                                    <span class="absolute inset-0"></span>
                                    {{ Str::limit($category->title, 45) }}
                                </a>
                            </h3>
                        </div>
                    </article>
                    @endforeach
                    @else
                    <p class="text-gray-400">Tidak ada berita terkait.</p>
                    @endif
                </div>
            </div>
        </aside>

    </div>
</div>

<div class="bg-gray-900 pt-24 sm:pt-10 pb-20">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-2xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">Berita Unggulan</h2>
            <p class="mt-2 text-lg/8 text-gray-300">Learn how to grow your business with our expert advice.</p>
        </div>
        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($newests as $newest )
            <article class="flex max-w-xl flex-col items-start justify-between">

                <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="2020-03-16" class="text-gray-400">{{ $newest->updated_at->format('M d, Y') }}</time>
                    <a href="" class="relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300 hover:bg-gray-800">{{ $newest->newsCategory->title }}</a>
                </div>
                <div class="group relative grow pt-4">
                    <img src="{{ asset('storage/' . $newest->thumbnail) }}" style="background-size: cover; background-position: center; display: block; width: 100%; height: 200px; border-radius: 0.5rem; margin-bottom: 1.25rem;">
                    <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
                        <a href="{{ route('news.show', $newest->slug) }}">
                            <span class="absolute inset-0"></span>
                            {{Str::limit(strip_tags( $newest->title),50 ) }}
                        </a>
                    </h3>
                    <p class="mt-5 line-clamp-3 text-sm/6 text-gray-400">{{ Str::limit (strip_tags($newest->content), 200)  }}</p>
                </div>
                <div class="relative mt-8 flex items-center gap-x-4 justify-self-end">
                    <img src={{ asset ('storage/' . $newest->author->avatar) }} class="size-10 rounded-full bg-gray-800" />
                    <div class="text-sm/6">
                        <p class="font-semibold text-white">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                {{ $newest->author->name }}
                            </a>
                        </p>
                        <p class="text-gray-400">{{ $newest->author->role }}</p>
                    </div>
                </div>

            </article>
            @endforeach

        </div>
    </div>
</div>
@endsection