@extends('layouts.app')

@section('content')
    @if(Auth::check() && Auth::user()->id == $bap->user_id)

        <div class="container">
            Ta bap
            <h1>{{$bap->name}}</h1>
            <p> Auteur: {{ $bap->username }}</p>
            <p><b>Descriptif: </b>{{$bap->descriptif}}</p>
            <p><b>Context: </b>{{$bap->context}}</p>
        </div>
    @else
        y'a pas de post à ton user_id

    @endif
@endsection