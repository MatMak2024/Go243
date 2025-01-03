<x-app-layout>
    <div class="container mt-3">
        <h1 class="mb-4">Articles</h1>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Image article">
                        @else
                            <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Image article">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->description }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Voir l'article</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
