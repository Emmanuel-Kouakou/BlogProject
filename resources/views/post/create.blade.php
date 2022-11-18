<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>
    
    @foreach($errors->all() as $error)
    <div class="my-5">
        <span class="block text-red-500">
            {{$error}}
        </span>
    </div>
    @endforeach
    

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mt-10">
      
       @csrf

       <x-label for="title" value="Titre du post"/>
       <x-input id="title" name="title"/>

       <x-label for="content" value="Contenu du post"/>
       <textarea name="content" id="content" cols="30" rows="10"></textarea>

       <x-label for="image" value="Image du post"/>
       <x-input type="file" id="image" name="image"/> 


       <x-label for="category" value="Categorie du post"/>
       <select name="category_id" id="category">
        @foreach($categories as $categorie)
          <option value="{{$categorie->id}}">{{$categorie->name}}</option>
        @endforeach  
       </select>

       <x-input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>

       <x-button style="display: block !important;" class="mt-5">Créer mon post</x-button>
    </form>
		
	</div>


@include('partials.footer')

</x-app-layout>