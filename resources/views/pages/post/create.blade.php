<x-app-layout>
    <div class="container mt-3">
        <h2 class="mb-4">Ajouter un article</h2>

        <!-- Formulaire -->
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Titre de l'article -->
            <div class="mb-3">
                <label for="title" class="form-label">Titre de l'article</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Entrez le titre de l'article" required>
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Description du cours</label>
                <textarea class="form-control" id="description" name="description" value="{{old('description')}}" rows="3"></textarea>
                <span class="text-small text-warning">@error('description') {{$message}} @enderror</span>
            </div>


            <div class="mb-3">
                <label for="image" class="form-label">Image (facultatif)</label>
                <input class="form-control" type="file" id="image" name="image" value="{{ old('image') }}" required>
            </div>

            <!-- Contenu de l'article -->
            <div class="mb-3">
                <label for="content" class="form-label">Contenu de l'article</label>
                <textarea class="form-control" id="content"  name="content" value="{{ old('content') }}" rows="5" placeholder="Entrez le contenu de l'article" required></textarea>
            </div>



            <!-- Bouton de soumission -->
            <button type="submit"  class="btn btn-info mb-5">Ajouter l'article</button>
        </form>
    </div>
</x-app-layout>
