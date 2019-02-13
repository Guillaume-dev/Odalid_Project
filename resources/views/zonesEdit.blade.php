@extends('layouts.zones')

@section('titre', $zone->nom)

@section('nom', $zone->nom)

@section('supprimer')
		<a href="{{ route('ZonesDelete', ['n' => $zone->id]) }}"><button class="btn btn-danger">Supprimer</button></a>
@endsection
