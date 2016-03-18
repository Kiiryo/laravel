@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <strong>Your Application's Landing Page.</strong><br><br>
                    <a href="{{ url('/login') }}" type="button" class="btn btn-default btn-lg btn-block">Connectez vous </a><br>
                    <a href="{{ url('/register') }}" type="button" class="btn btn-default btn-lg btn-block">Inscrivez vous</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
