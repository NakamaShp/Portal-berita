 <aside class="hidden lg:block">
     {{-- Membuat sidebar tetap (sticky) saat scroll --}}
     <div class="sticky top-24">
         <h2 class="text-xl font-semibold leading-6 text-white">Berita Lainnya</h2>
         <div class="mt-6 space-y-8">
             @if (isset($categories) && $categories->count())
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