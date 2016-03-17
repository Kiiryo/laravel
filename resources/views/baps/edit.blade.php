@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('errors.message')
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">IIM - Bourse au projet</div>

                </div>
                <h1>Modifiez votre demande de Bourse au Projet</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Le formulaire de soumission
                    </div>
                    <div class="panel-body">
                        @if(Auth::check() && (Auth::user()->id == $bap->user_id || Auth::user()->isAdmin))
                            {!! Form::model($bap, array(
                                'route' => array('bap.update', $bap->id),
                                'method' => 'PUT'
                                ))
                            !!}

                            <div class="form-group">
                                {!! Form::text('name', old('name'), [
                                'class' => 'form-control',
                                'placeholder' => 'Name de la BAP'
                                ]) !!}
                            </div>

                            <div class="form-group">
                                <label>Type de projet</label>

                                {!! Form::select('type' ,array(
                                'site_internet' => 'Site Internet',
                                '3d' =>'3D',
                                '2d' =>'2D',
                                'multimedia' =>'Installation Multimédia',
                                'jeu_video' =>'Jeu Vidéo',
                                'dvd' =>'DVD',
                                'print' =>'Print',
                                'cd-rom' =>'CD-ROM',
                                'evenement' =>'Evenement',
                                'appel_doffre' =>'Appel d\'offre',
                                'business_plan' =>'Business Plan'
                                ),[
                                'class' => 'form-control', 'style'=>'display:inline;'])
                                !!}

                                <br/>
                                <br/>

                                <label>
                                    <input name="type" type="checkbox"> Autres
                                </label>

                                {!! Form::text('typeother', old('typeother'), [
                                      'class' => ' ',
                                      'placeholder' => 'Autres'
                                  ]) !!}
                            </div>

                            <label for="">Descriptif du projet</label>
                            {!! Form::textarea('descriptif', old('descriptif'), [
                                      'class' => 'form-control',
                                      'placeholder' => 'Détails du projet'
                                  ]) !!}

                            <label for="">Contexte de la demande</label>
                            {!! Form::text('context', old('context'), [
                                      'class' => 'form-control',
                                      'placeholder' => 'Précision sur l\'environnement du projet'
                                  ]) !!}

                            <label for="">Vos objetifs</label>
                            {!! Form::text('objectif', old('objectif'), [
                                      'class' => 'form-control',
                                      'placeholder' => 'Objectifs du projet'
                                  ]) !!}

                            <label for="">Contraintes particulières</label>
                            {!! Form::text('contrainte', old('contrainte'), [
                                      'class' => 'form-control',
                                      'placeholder' => 'Les contraintes du projet'
                                  ]) !!}
                            <div class="form-group">
                                <label>Projet validé</label>
                                @if($bap->validate == 0)
                               {!! Form::checkbox('validate', '1') !!}
                                @else($bap->validate == 1)
                               {!! Form::checkbox('validate', 'smallInteger', true) !!}
                                @endif

                            </div>
                            <br/>

                            {!! Form::submit('Envoyer', ['class' => ' form-control']) !!}

                            {!! Form::close() !!}
                        @else
                            <h4>Vous n'avez pas les droits suffisants !</h4>
                            <div class="form-group"  style="text-align: center;">
                                <a href="{{ route('bap.index') }}"><button class="btn btn-warning">Retour aux BAP</button></a>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection