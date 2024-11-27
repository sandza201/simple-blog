<x-blog-layout>
    <div class="bg-[#f6f4ed] min-h-screen flex flex-col-reverse md:flex-row items-center relative px-6 py-12">
        <img class="md:absolute md:right-0 md:top-1/2 md:bottom-1/2 md:-translate-y-1/2" src="images/7061503.svg" alt="">
        <main class="mx-auto max-w-7xl h-full flex w-full">
            <div class="my-auto flex flex-col">
                <h1 class="text-[6rem] leading-none font-georgia">Home <br>
                    stories & ideas</h1>
                <p class="text-xl mt-6">A place to read, write, and deepen your understanding</p>
                <a href="{{ route('feed.index') }}"
                    class="px-7 py-3 bg-black text-white w-fit text-xl rounded-full mt-8">Start Reading</a>
            </div>
        </main>
    </div>
</x-blog-layout>
