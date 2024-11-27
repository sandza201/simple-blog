<x-blog-layout>
    <div>
        <article class="mx-auto max-w-2xl py-12">
            <h1 class="text-5xl font-bold">{{ $post->title }}</h1>
            <div class="flex flex-row gap-4 my-10">
                <img src="https://picsum.photos/200" class="w-12 h-12 rounded-full" alt="profile picture">
                <div class="flex flex-col">
                    <span class="text-lg">By {{ $post->author->name }}</span>
                    <div class="flex flex-row gap-2 text-sm">
                        <span class="text-gray-600">{{ $post->created_at->diffForHumans() }}</span>
                        <span>{{ $post->getReadingTime() }} min read</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-b py-2 mt-4 mb-16">
                <a href="#comments" type="button" class="flex flex-row gap-2">
                    <svg class="w-5 h-5" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>comment-1</title>
                            <desc>Created with Sketch Beta.</desc>
                            <defs> </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                sketch:type="MSPage">
                                <g id="Icon-Set" sketch:type="MSLayerGroup"
                                    transform="translate(-100.000000, -255.000000)" fill="#000000">
                                    <path
                                        d="M116,281 C114.832,281 113.704,280.864 112.62,280.633 L107.912,283.463 L107.975,278.824 C104.366,276.654 102,273.066 102,269 C102,262.373 108.268,257 116,257 C123.732,257 130,262.373 130,269 C130,275.628 123.732,281 116,281 L116,281 Z M116,255 C107.164,255 100,261.269 100,269 C100,273.419 102.345,277.354 106,279.919 L106,287 L113.009,282.747 C113.979,282.907 114.977,283 116,283 C124.836,283 132,276.732 132,269 C132,261.269 124.836,255 116,255 L116,255 Z"
                                        id="comment-1" sketch:type="MSShapeGroup"> </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span>{{ count($post->comments) }}</span>
                </a>
            </div>

            <div class="text-xl mt-4 my-6 prose">
                {!! $post->body !!}
            </div>

            <div id="comments" class="border-t py-12">
                <h1 class="font-bold text-2xl mb-8">Comments ({{ count($post->comments) }})</h1>

                @can('create', App\Models\Comment::class)
                    <form action="{{ route('comments.store', $post->id) }}" method="POST">
                        @csrf
                        <span class="flex flex-col w-full shadow-lg border border-gray-50 relative min-h-32 p-4">
                            <span>{{ auth()->user()->name }}</span>
                            <input type="text" class="border-0 px-0 focus:ring-0" name="content" id="content"
                                placeholder="What are your thoughts?"></input>
                            <button type="submit"
                                class="absolute bottom-2 right-2 bg-green-600 rounded-full px-3 py-2 text-sm text-white">Respond</button>
                        </span>

                    </form>
                @endcan


                <div class="border-t mt-12">
                    @foreach ($post->comments as $comment)
                        <div class="border-b py-6 text-sm flex flex-col">
                            <div class="flex flex-row gap-2">
                                <img class="w-8 h-8 rounded-full" src="https://picsum.photos/200" alt="profile picture">
                                <div class="flex flex-col mb-4">
                                    <span>{{ $comment->author->name }}</span>
                                    <span class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                            </div>

                            <span>
                                {{ $comment->content }}
                            </span>

                            @can('delete', $comment)
                                <x-forms.form method="DELETE" action="{{ route('comments.destroy', $comment) }}">
                                    <button type="submit" class="text-red-500 hover:underline">Delete response</button>
                                </x-forms.form>
                            @endcan
                        </div>
                    @endforeach
                </div>

            </div>
        </article>
    </div>

</x-blog-layout>
