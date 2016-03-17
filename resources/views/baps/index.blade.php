@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('errors.message')
            @foreach($baps as $bap)
                @if(Auth::check() && Auth::user()->id == $bap->user_id || Auth::user()->isAdmin)

                    <div class="thumbnail col-md-3" style="margin-right:20px; min-height:200px">

                        <a href="{{route('bap.show', $bap->id)}}">
                            <div class="description" style="font-size:1.4em;">
                                {{$bap->id}}. {{$bap->name}}
                            </div>
                        </a>
                        <a href="{{$bap->username}}}}"><p>{{$bap->username}}</p></a>
                        <p>Type de projet : {{$bap->type}}</p>

                        {{--Bouton pour valider le projet, appelle la fonction edit du BapController pour modifier la valeur dans la bdd--}}

                        <a href="{{ route('bap.edit', $bap->id)}}" class="btn btn-success btn-line btn-rect">
                            <i class="fa fa-pencil"></i> Editer
                        </a>

                        <br/>
                        <br/>

                        {{--Affiche si le projet est validé ou pas--}}
                        @if($bap->validate == 1)
                            <div class="text-center" style="position:absolute; bottom:0; color:green;"><i class="fa fa-check"></i> Projet validé
                                @else
                                    <div class="text-center" style="position: absolute; bottom: 0; color:red;"><i class="fa fa-close"></i> Projet non validé
                            @endif
                        </div>
                    </div>
                @else
                @endif
            @endforeach
        </div>
    </div>
@endsection