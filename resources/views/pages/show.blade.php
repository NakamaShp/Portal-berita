<!-- <h2>{{ $news->title }}</h2>
<img src="{{ asset('storage/' . $news->thumbnail)}}" alt=""> -->


@extends('layouts.app')

{{-- Menggunakan judul berita sebagai judul halaman --}}
@section('title', $news->title)

@section('content')

<div class="bg-gray-900 px-6 py-24 sm:py-32 lg:px-8">
  <div class="mx-auto max-w-3xl text-base leading-7 text-gray-300">
    
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
      {{-- Jika Anda punya caption untuk gambar, bisa ditambahkan di sini --}}
      {{-- <figcaption class="mt-4 flex gap-x-2 text-sm leading-6 text-gray-500">
        <svg class="mt-0.5 size-5 flex-none text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
        </svg>
        Faucibus commodo massa rhoncus, volutpat.
      </figcaption> --}}
    </figure>

    <!-- Konten Utama Berita -->
    <div class="mt-10 max-w-none">
      {{-- 
        Menggunakan `prose` dan `prose-invert` dari Tailwind Typography untuk styling konten HTML.
        `prose-invert` khusus untuk dark mode.
        PENTING: Gunakan {!! !!} untuk merender HTML. Pastikan konten Anda sudah di-sanitize
        untuk mencegah serangan XSS.
      --}}
      <div class="prose prose-lg prose-invert max-w-none text-gray-300 prose-headings:text-white prose-a:text-indigo-400 hover:prose-a:text-indigo-300 prose-strong:text-white">
        {!! $news->content !!}
      </div>
    </div>

  </div>
</div>

@endsection
