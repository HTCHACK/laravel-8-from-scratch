@extends('layouts.master')

@section('content')
@include('layouts.header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <article
                class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">
                    <div class="flex-1 lg:mr-8">
                        <a href="{{ route('posts.slug', $posts[0]->slug) }}"><img
                                src="{{ asset('front/images/illustration-1.png') }}" alt="Blog Post illustration"
                                class="rounded-xl"></a>
                    </div>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 lg:mt-0">
                            <div class="space-x-2">
                                <a href="/?category={{ $posts[0]->category->slug }}"
                                    class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                    style="font-size: 10px">{{ $posts[0]->category->name }}</a>

                                <a href="#"
                                    class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                                    style="font-size: 10px">{{ $posts[0]->excerpt }}</a>
                            </div>

                            <div class="mt-4">
                                <h1 class="text-3xl">
                                    {{ $posts[0]->title }}
                                </h1>

                                <span class="mt-2 block text-gray-400 text-xs">
                                    Published <time>{{ $posts[0]->created_at->diffForHumans() }}</time>
                                </span>
                            </div>
                        </header>

                        <div class="text-sm mt-2">
                            <p>
                                {{ Str::limit($posts[0]->body, 255) }}
                            </p>
                        </div>

                        <footer class="flex justify-between items-center mt-8">
                            <a href="/?user={{ $posts[0]->user->username }}">
                                <div class="flex items-center text-sm">
                                    <img src="{{ asset('front/images/lary-avatar.svg') }}" alt="Lary avatar">
                                    <div class="ml-3">
                                        <h5 class="font-bold">Posted By</h5>
                                        <h6>{{ $posts[0]->user->name }}</h6>
                                    </div>
                                </div>
                            </a>

                            <div class="hidden lg:block">
                                <a href="{{ route('posts.slug', $posts[0]->slug) }}"
                                    class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                                    More</a>
                            </div>
                        </footer>
                    </div>
                </div>

            </article>

            <div class="lg:grid lg:grid-cols-2">
                @foreach ($posts->skip(1) as $post)
                    <article
                        class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                        <a href="{{ route('posts.slug', $post->slug) }}">
                            <div class="py-6 px-5">
                                <div>
                                    <img src="{{ asset('front/images/illustration-3.png') }}"
                                        alt="Blog Post illustration" class="rounded-xl">
                                </div>

                                <div class="mt-8 flex flex-col justify-between">
                                    <header>
                                        <div class="space-x-2">
                                            <a href="/?user={{ $post->user->username }}"
                                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                                style="font-size: 10px">{{ $post->user->username }}</a>
                                            <a href="/?category={{ $post->category->slug }}"
                                                class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                                                style="font-size: 10px">{{ $post->category->name }}</a>
                                        </div>

                                        <div class="mt-4">
                                            <h1 class="text-3xl">
                                                {{ $post->title }}
                                            </h1>

                                            <span class="mt-2 block text-gray-400 text-xs">
                                                Published <time>{{ $post->created_at->diffForHumans() }}</time>
                                            </span>
                                        </div>
                                    </header>

                                    <div class="text-sm mt-4">
                                        <p>
                                            {{ Str::limit($post->body, 250) }}
                                        </p>
                                    </div>

                                    <footer class="flex justify-between items-center mt-8">
                                        <a href="/?user={{ $post->user->username }}">
                                            <div class="flex items-center text-sm">
                                                <img src="{{ asset('front/images/lary-avatar.svg') }}" alt="Lary avatar">
                                                <div class="ml-3">
                                                    <h5 class="font-bold">Posted By</h5>
                                                    <h6>{{ $post->user->name }}</h6>
                                                </div>
                                            </div>
                                        </a>

                                        <div>
                                            <a href="{{ route('posts.slug', $post->slug) }}"
                                                class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                                                More</a>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach

            </div>

    </main>
    {{$posts->links()}}
@else
    <p class="text-center">No post yet. Please Check Back Later .</p>
    @endif
@endsection
