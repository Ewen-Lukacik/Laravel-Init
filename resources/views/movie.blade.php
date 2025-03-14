<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <h1>{{ $movie["title"] }}</h1>

    <h2>Date de sortie : {{ date('d/m/Y', strtotime($movie["release_date"])) }}</h2>

    <span>
        <a href="{{ route('blog.home', 1) }}">
        Retour à l'accueil
        </a>
    </span>
</div>
