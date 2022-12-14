<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

@foreach($posts as $post)
<div class="dark:bg-gray-800 dark:text-gray-100">
	<div class="container max-w-4xl px-10 py-6 mx-auto rounded-lg shadow-sm dark:bg-gray-900">
		<div class="flex items-center justify-between">
			<span class="text-sm dark:text-gray-400">{{$post->created_at->format("d M Y")}}</span>
			<a rel="noopener noreferrer" href="#" class="px-2 py-1 font-bold rounded dark:bg-violet-400 dark:text-gray-900">{{$post->category->name}}</a>
		</div>
		<div class="mt-3">
			<a rel="noopener noreferrer" href="#" class="text-2xl font-bold hover:underline">{{$post->title}}</a>
			<p class="mt-2">{{$post->content}}</p>
		</div>
		<div class="flex items-center justify-between mt-4">
			<a rel="noopener noreferrer" href="{{route('posts.show', $post)}}" class="hover:underline dark:text-violet-400">Voir plus</a>
			<div>
				<a rel="noopener noreferrer" href="#" class="flex items-center">
					<img src="https://source.unsplash.com/50x50/?portrait" alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full dark:bg-gray-500">
					<span class="hover:underline dark:text-gray-400">{{$post->user->name}}</span>
				</a>
			</div>
		</div>
	</div>
</div>
@endforeach

@include('partials.footer')

</x-app-layout>