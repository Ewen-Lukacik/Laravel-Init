@extends('layout.app')

@section('content')
<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
    <h1>{{ $title }}</h1>

    <div>

        <h2>List of people :</h2>


        @foreach ($people["results"] as $person)
        @php
        $personId = explode('/', rtrim($person["url"], '/'));
        @endphp
        <article class="bg-red-500">
            <a href="{{ route('blog.people', $personId[5]) }}">
                <h3>
                    {{ $person["name"] }}
                </h3>
            </a>
        </article>
        @endforeach
    </div>
    <br><br>


    Search post commented by someone :
    <form method="get" action="{{ route('blog.home', $current_page) }}">
        <input type="text" name="search" placeholder="Anakin Skywalker">
        <button>Submit</button>
    </form>

    <div class="background-color: lightgray; width: 33vw">
        @if ($comments_named)
            {{ $search }} has commented these posts :
            <br>
            <ul>
                @foreach ($comments_named as $comment)
                    <li>
                        <a href="{{ route('blog.people', $comment["comment"]->people_id) }}">
                            {{ $comment["name"] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>


    <br><br><br>

    <div class="nav-page">
        @php
        $hasPrevious = $people["previous"] != null;
        $hasNext = $people["next"] != null;

        if($hasPrevious){
        $previousPage = explode('/', rtrim($people["previous"], '/'));
        $previousPageId = explode('=', $previousPage[5]);
        }

        if($hasNext){
        $nextPage = explode('/', rtrim($people["next"], '/'));
        $nextPageId = explode('=', $nextPage[5]);
        }
        @endphp

        @if($hasPrevious)
        <a href="{{ route('blog.home', $previousPageId[1]) }}">Previous page</a>
        @endif

        @if($hasNext)
        <a href="{{ route('blog.home', $nextPageId[1]) }}">Next page</a>
        @endif
    </div>

</div>
@endsection
