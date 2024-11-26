<x-blog-layout>
    <div class="grid grid-cols-3">
        <div class="col-span-2">
            @foreach ($posts as $post)
                <a href="{{ route('feed.post', $post) }}" class="flex flex-col border-b py-8">
                    <div class="flex flex-col col-span-2 gap-4 mt-4">
                        <div>
                            <span>By {{ $post->author->name }}</span>
                            <h1 class="text-2xl font-bold mb-2">
                                {{ $post->title }}
                            </h1>
                        </div>
                        <span class="flex flex-row gap-3 text-sm text-gray-600">
                            <span>{{ $post->created_at }}</span>
                            <span></span>
                        </span>
                    </div>

                </a>
            @endforeach
        </div>

        <div>

        </div>

    </div>
</x-blog-layout>
