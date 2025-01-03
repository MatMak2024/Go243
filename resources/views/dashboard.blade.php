
<x-app-layout>
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-12">
                {{ __("You're logged in!") }}
                <h1 class="display-4" style="">Bienvenue sur Go<span class="text-info fide-in">2</span><span class="text-danger slide-in">4</span><span class="text-warning fide-in">3</span>!</h1>
                <p class="lead">Découvrez les dernières tendances, articles, et astuces sur le monde de la technologie, de la programmation et plus encore !</p>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div
    class="d-flex flex-column justify-content-center align-items-center text-center"
    style="background: url('https://source.unsplash.com/1920x1080/?business,innovation') no-repeat center center/cover; color: white; height: 100vh;">
        <h1 style="font-size: 3rem; font-weight: bold;">Bienvenue sur notre plateforme</h1>
        <p style="font-size: 1.25rem;">Découvrez des idées, inspirez l'innovation, connectez-vous.</p>
        <a href="#features" class="btn btn-info btn-lg mt-3" style="transition:0.5s">Explorer</a>
    </div>

    <!--section artiscles-->



    <!--section nos mentors-->


    <!-- Features Section -->
    <div class="container py-5" id="features">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card p-3 shadow-sm" style="transition: transform 0.5s, box-shadow 0.5s;">
                    <h5>Idées Innovantes</h5>
                    <p>Collaborez sur des idées pour les transformer en projets réels.</p>
                    <a href="{{ route('ideas.index') }}" class="btn btn-outline-info btn-sm">En savoir plus</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 shadow-sm" style="transition: transform 0.5s, box-shadow 0.5s;">
                    <h5>Mentorat</h5>
                    <p>Connectez-vous avec des mentors pour un accompagnement personnalisé.</p>
                    <a href="#mentorship" class="btn btn-outline-info btn-sm">Voir les mentors</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 shadow-sm" style="transition: transform 0.5s, box-shadow 0.5s;">
                    <h5>Blog</h5>
                    <p>Lisez des articles inspirants sur l'entrepreneuriat et l'innovation.</p>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-info btn-sm">Lire le blog</a>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
