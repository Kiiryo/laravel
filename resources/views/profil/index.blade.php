@extends('layouts.app')

@section('content')

    <div class="container">
        @include('errors.message')
        <h1>  Bonjour, {{$user->name}} </h1>
        <p>{{$user->email}} </p>

        <a href="{{route('profil.edit', $user->id)}}">
            <button class="btn btn-default">
                Modifier votre profil
            </button>
        </a>
    </div>


@endsection