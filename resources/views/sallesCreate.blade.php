@extends('layouts.salles')

@section('titre', 'Nouvelle')

@section('option')
    <option value="">Aucune</option>
	@foreach ($zones as $zone)
    		<option value="{{ $zone->id }}">{{ $zone->nom }}</option>
    @endforeach
@endsection