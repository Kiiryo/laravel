@extends('layouts.app')

@section('content')

    <div class="container">
        @include('errors.message')
        <h1> Modifier le profil de : {{$user->name}} </h1>

        {!! Form::open(['url' => route('profil.update', $user->id), 'method' => 'PUT']) !!}
        {{ csrf_field() }}

        <label for="name"> Nom </label>
        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
        <br>
        <label for="email"> Email </label>
        {!! Form::text('email', $user->email,['class' => 'form-control']) !!}
        <br>
        <label for="password"> Nouveau mot de passe </label><br>
        {!! Form::password('password', ['class' => 'form-control']) !!}
        <br>

        <!-- <label for="password_confirmation"> Confirmez votre mot de passe </label><br>
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                <br>--><br>

        {!! Form::submit('Envoyer', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}


        @if($errors)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif


    </div>

@endsection