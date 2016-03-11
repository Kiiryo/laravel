@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">
    @include('errors.message')
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$post->title}}</div>

                <div class="panel-body">
                    {{$post->content}} <br><br>

                    
                    @if(Auth::check() && (Auth::user()->id == $post->user_id || Auth::user()->isAdmin))
                    {!! Form::model($post, array('route' => array('post.destroy', $post->id), 'method' => 'DELETE')) !!}
                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                
                        <br>
                        <div class="forn-group">
                            <a href="{{ route('post.edit', $post->id) }}"><button class="btn btn-success">Modifier</button></a>
                        </div><br>
                    @endif

                    <div class="forn-group" style="text-align: center;">
                        <a href="{{ route('post.index') }}"><button class="btn btn-success">Retour aux Articles</button></a>
                    </div>
                    <div class="panel-body">
                        <h3>Commentaires</h3>
                            @foreach($post->comments as $comment)
                                <p><strong>{{ $comment->user->name }}</strong> <br>{{ $comment->comment }}</p>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection