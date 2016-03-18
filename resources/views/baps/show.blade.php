@extends('layouts.app')

@section('content')
    @if(Auth::check() && Auth::user()->id == $bap->user_id || Auth::user()->isAdmin)

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

            {{--Bouton appelle la fonction edit du BapController pour modifier la valeur dans la bdd--}}
            <a href="{{ route('bap.edit', $bap->id)}}" class="btn btn-success btn-line btn-rect">
                <i class="fa fa-pencil"></i> Editer
            </a>

            {!! Form::model($bap, array('route' => array('bap.destroy', $bap->id), 'method' => 'DELETE')) !!}
            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    @else
        y'a pas de post à ton user_id

    @endif
@endsection