@extends('layouts.app')

@section('content')
    @if(Auth::check() && Auth::user()->id == $bap->user_id)

        <div class="container">
            <h1>{{$bap->name}}</h1>
            <p> Auteur: {{ $bap->username }}</p>
            <p><b>Descriptif: </b>{{$bap->descriptif}}</p>
            <p><b>Context: </b>{{$bap->context}}</p>
            @if($bap->validate == 1)
                <div class=""style="color:green;"><i class="fa fa-check"></i> Projet validé</div>
            @else
                <div class="" style="color:red;"><i class="fa fa-close"></i> Projet non validé</div>
            @endif
        </div>
    @else
        y'a pas de post à ton user_id

    @endif
@endsection