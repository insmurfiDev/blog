@extends('layouts.base')

@section('content')
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-gray-900">
                {{ isset($post) ? 'Edit post' : 'Create new post' }}</h2>
        </div>


        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
            <div class="bg-white px-6 py-12 shadow sm:rounded-lg sm:px-12">
                <form novalidate class="space-y-6"
                    action="{{ isset($post) ? route('posts.update', ['id' => $post->id]) : route('posts') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title"
                                value="{{ isset($post) ? $post->title : '' }}" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        @error('title')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Category</label>
                        <div class="mt-2">
                            <input value="{{ isset($post) ? $post->category : '' }}" type="text" name="category"
                                id="category" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        @error('category')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm/6 font-medium text-gray-900">Text</label>
                        <div class="mt-2">
                            <textarea id="content" name="content"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                {{ isset($post) ? $post->content : '' }}
                                </textarea>
                        </div>
                        @error('content')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>


                    <div>
                        <label for="img" class="block text-sm/6 font-medium text-gray-900">Image</label>
                        @if (isset($post))
                            <img src="{{ $post->img }}" class="w-full h-auto" />
                        @endif
                        <div class="mt-2">
                            <input type="file" type="text" name="img" id="img" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        @error('img')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>


                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ isset($post) ? 'Edit' : 'Create' }}
                            post</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
