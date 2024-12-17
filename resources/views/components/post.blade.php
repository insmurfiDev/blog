@props(['post'])

<article class="flex flex-col items-start justify-between">
    <div class="relative w-full">
        <img src="{{ $post->img }}" alt=""
            class="aspect-video w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
    </div>
    <div class="max-w-xl">
        <div class="mt-8 flex items-center gap-x-4 text-xs">
            <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at->format('M d, Y') }}</time>
            <a href="#"
                class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->category }}</a>
        </div>
        <div class="group relative">
            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                <a href="#">
                    <span class="absolute inset-0"></span>
                    {{ $post->title }}
                </a>
            </h3>
            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ $post->content }}</p>
        </div>
        <div class="relative mt-8 flex items-center gap-x-4">
            <img src="https://avatar.iran.liara.run/public/boy" alt="" class="size-10 rounded-full bg-gray-100">
            <div class="text-sm/6">
                <p class="font-semibold text-gray-900">
                    <a href="#">
                        <span class="absolute inset-0"></span>
                        {{ $post->user->name }}
                    </a>
                </p>
                <p class="text-gray-600">{{ $post->user->email }}</p>
            </div>
        </div>
        @auth()
            @if ($post->user_id === auth()->user()->id)
                <div class="mt-3 flex items-center gap-3">
                    <a href="{{ route('posts.edit', $post->id) }}"
                        class="bg-blue-600 text-xs text-white rounded-md p-1">Edit</a>
                    <form method="post" action="/posts/{{ $post->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="bg-red-600 text-xs text-white rounded-md p-1">Delete post</button>
                    </form>
                </div>
            @endif
        @endauth()
    </div>
</article>
