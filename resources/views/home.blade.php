@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <strong>Vous etes connecté</strong>
                    <br><br>
                    <a href="{{ route('post.index') }}" type="button" class="btn btn-default btn-lg btn-block">La liste des articles</a><br>
                    <a href="{{ route('bap.create') }}" type="button" class="btn btn-default btn-lg btn-block">Soumetez une BAP !</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
