@extends('layouts.app')

@section('content')

	<div class="container">
		<h4>La page que vous cherchez n'existe pas :(</h4>
	</div>

	<div class="forn-group" style="text-align: center;">
		<a href="{{ route('post.index') }}"><button class="btn btn-warning">Liste des Articles</button></a>
    </div>
	
@endsection