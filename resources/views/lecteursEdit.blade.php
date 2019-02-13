@extends('layouts.lecteurs')

@section('titre', $lecteur->nom)

@section('ip', $lecteur->ip)
@section('mac', $lecteur->mac)
@section('nom', $lecteur->nom)

@section('option')
    	@foreach ($portes as $porte)
    		@if ($lecteur->porte_id === $porte->id)
        <div class="form-group row">
          <label for="porten" class="col-md-4 col-form-label text-md-right">Porte </label>
          <div class="col-md-6">
              <input id="nom" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="porten"  value="{{ $porte->nom }}" disabled>
          </div>
        </div>
        	@endif
        @endforeach
@endsection

@section('supprimer')
	<a href="{{ route('LecteursDelete', ['n' => $lecteur->id]) }}"><button class="btn btn-danger">Supprimer</button></a>
@endsection
