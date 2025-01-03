<x-app-layout>
    <div class="container mt-5">
        <!-- Titre de l'article -->
        <h1 class="mb-4">{{ $post->title }}</h1>

        <!-- Image de l'article (si elle existe) -->
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-fluid w-50" alt="Image de l'article">
        @else
            <img src="https://via.placeholder.com/200x200" class="card-img-fluid w-50" alt="Image par défaut">
        @endif


        <!-- Contenu de l'article -->
        <div class="content mb-4">
            <p>{{ $post->content }}</p>
        </div>

        <!-- Bouton pour revenir à la liste des articles -->
        <a href="{{ route('posts.index') }}" class="btn btn-info mb-3">Retour à la liste des articles</a>
    </div>
</x-app-layout>
