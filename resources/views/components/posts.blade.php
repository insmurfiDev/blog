@props(['posts' => []])

<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Cool blog</h2>
            <p class="mt-2 text-lg/8 text-gray-600">Blog about everything</p>
        </div>
    </div>
    <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach
    </div>
</div>
