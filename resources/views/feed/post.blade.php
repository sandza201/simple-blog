<x-blog-layout>
    <div>
        <article class="mx-auto max-w-2xl py-12">
            <h1 class="text-5xl font-bold mb-4">{{ $post->title }}</h1>
            <span class="text-lg">By {{ $post->author->name }}</span>
            <div class="border-t border-b py-3 mt-6">
                <a href="#comments" type="button" class="-m-2.5 p-2.5">comment</a>
            </div>

            <div class="text-xl mt-4 my-6">
                {{ $post->body }}
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
                            <span class="flex flex-col mb-4">
                                <span>{{ $comment->author->name }}</span>
                                <span class="text-gray-500">{{ $comment->created_at }}</span>
                            </span>

                            <span>
                                {{ $comment->content }}
                            </span>

                            @can('delete', $comment)
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete response</button>
                                </form>
                            @endcan
                        </div>
                    @endforeach
                </div>

            </div>
        </article>
    </div>

</x-blog-layout>
