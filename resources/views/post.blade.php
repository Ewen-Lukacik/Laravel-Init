@section('title')
    {{ $person["name"] }}
@endsection
<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <h1>{{ $title }} {{ $id }}</h1>


    <p>
    <div class="bg-red-500">
        Espèce :
        @foreach ($species as $specie)
        @php
            $speciesId = explode('/', rtrim($specie["url"], '/'));
        @endphp
        <a href="{{ route('blog.species', $speciesId[5]) }}">
            {{ $specie["name"] }}
        </a>
        @endforeach
        <br>
        <br>
    </div>
    {{ $person["name"] }}
    est {{ $person["gender"] === "male" ? 'un homme' : ($person["gender"] === "female" ? 'une femme' : 'un droïde') }}


    {{ $person["gender"] === "male" ? 'né' : ($person["gender"] === "female" ? 'née' : 'construit') }}
    en {{ $person["birth_year"] }}
    originaire de {{ $homeworld["name"] }}.

    <br>

    <br>

    Vous pouvez voir {{ $person["name"] }}
    dans les films suivants :
    <div class="movies">
        <ul>
            @foreach ($movies as $movie)
            @php
            $movieId = explode('/', rtrim($movie["url"], '/'));
            @endphp
            <a href="{{ route('blog.movie', $movieId[5]) }}">
                <li>{{ $movie["title"] }}</li>
            </a>
            @endforeach
        </ul>
    </div>


    <br>
    <br>


    {{ $person["name"] }} a déjà piloté les engins suivants :
    <div class="vehicles">
        <ul>
            @foreach ($vehicles as $vehicle)
            @php
            $vehicleId = explode('/', rtrim($vehicle["url"], '/'));
            @endphp
            <a href="{{ route('blog.vehicle', $vehicleId[5]) }}">
                <li>{{ $vehicle["name"] }}</li>
            </a>
            @endforeach
        </ul>
    </div>
    </p>

    <h3>Comments section</h3>

    <section>
        @if ($comments)
            @foreach ($comments as $comment)
                <div style="border: 2px solid black; width: 33%; padding-left: 3rem;">
                    <h4>Posté par {{$comment->firstname }} {{ $comment->lastname }} :</h4>
                    <small>{{ $comment->email }}, {{ date('d/m/Y', strtotime($comment->created_at)) }}</small>
                    <br>
                    <p>
                        "{!! nl2br($comment->content) !!}"
                    </p>
                    <div style="display: flex; flex-direction: row; gap: 3rem; justify-content:center; align-items: center;">
                        <a href="{{ route('comment.edit', $comment->id) }}"
                            style="text-decoration:none;background-color: green; color:white; border-radius: 5rem; border:none; padding: 1rem 2rem 1rem 2rem; font-weight: bold; text-transform: uppercase;">
                            Edit your comment
                        </a>
                        <form method="post" action="{{ route('comment.delete') }}">
                            {{ csrf_field()  }}
                            @method('DELETE')
                            <input type="hidden" name="people_id" value="{{ $id }}">
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                            <input type="submit"
                            style="background-color: red; color:white; border-radius: 5rem; border:none; padding: 1rem 2rem 1rem 2rem; font-weight: bold; text-transform: uppercase;"
                            value="delete">
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </section>
    <br>

    <br>


    <h3>Post a new comment : </h3>
    <form method="post" action="{{ route('comment.create') }}" style="width: 33%;">
            {{ csrf_field() }}
            <fieldset>
                <label for="firstname">Firstname</label>
                <br>
                <input type="text" name="firstname" placeholder="Aayla">
            </fieldset>
            <fieldset>
                <label for="lastname">Lastname</label>
                <br>
                <input type="text" name="lastname" placeholder="Secura"></fieldset>
            <fieldset>
                <label for="email">E-mail</label>
                <br>
                <input type="email" name="email" placeholder="aaylasercura@republic.ge">
            </fieldset>
            <fieldset>
                <label for="firstname">Comments</label>
                <br>
                <textarea name="content" id="" placeholder="Your comments"></textarea>
            </fieldset>
            <input type="hidden" name="item_id" value="{{ $id }}">
            <button>Submit</button>
    </form>



    <br>
    <br>

    <span>
        <a href="{{ route('blog.home', 1) }}">
            Retour à l'accueil
        </a>
    </span>
</div>
