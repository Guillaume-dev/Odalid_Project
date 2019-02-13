@extends('layouts.gaches')

@section('titre', $gache->nom)

@section('ip', $gache->ip)
@section('mac', $gache->mac)
@section('nom', $gache->nom)

@section('type')
	@if ($gache->type === "prd4")
	<div class="form-group row">
		<label for="porten" class="col-md-4 col-form-label text-md-right">Type </label>
		<div class="col-md-6">
				<input id="nom" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="porten"  value="PoE rail DIN 4 voies" disabled>
		</div>
	</div>
		<span class="ml-3" name="nom"></span>
	@else
	<div class="form-group row">
		<label for="porten" class="col-md-4 col-form-label text-md-right">Type</label>
		<div class="col-md-6">
				<input id="nom" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="porten"  value="PoE boitier 3 voies" disabled>
		</div>
	</div>
		<span class="ml-3" name="nom"></span>
	@endif
@endsection

@section('supprimer')
	<a href="{{ route('GachesDelete', ['n' => $gache->id]) }}"><button class="btn btn-danger">Supprimer</button></a>
@endsection
