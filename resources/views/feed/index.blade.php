<x-blog-layout>
    <div class="max-w-3xl mx-auto my-8">
        <div class="border-b">
            <div class="flex flex-row flex-wrap gap-3">
                @foreach ($categories as $category)
                    <a class="py-2 px-4 text-gray-500 text-sm">{{ $category->title }}</a>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col">
            @foreach ($posts as $post)
                <a href="{{ route('feed.post', $post) }}" class="flex flex-col border-b py-6">
                    <div class="flex flex-col col-span-2 gap-2 mt-4">
                        <div class="flex flex-row gap-2 items-center">
                            <img class="w-5 h-5 rounded-full" src="https://picsum.photos/200" alt="profile picture">
                            <span>By {{ $post->author->name }}</span>
                        </div>
                        <h1 class="text-2xl font-bold mb-2">
                            {{ $post->title }}
                        </h1>
                        <span class="flex flex-row gap-3 text-sm text-gray-600">
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                            <span></span>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-blog-layout>
