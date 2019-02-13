@extends('layouts.portes')

@section('titre', $porte->nom)
@section('nom', $porte->nom)

<!-- Affichage de toutes les salles -->
@section('option_salle')
	<option value="">Aucune</option>
	@foreach ($salles as $salle)

		@if ($salle->id === $porte->salle_id)
    		<option value="{{ $salle->id }}" selected>{{ $salle->nom }}</option>
    	@else
    		<option value="{{ $salle->id }}">{{ $salle->nom }}</option>
    	@endif
    @endforeach
@endsection

<!-- Affichage du nom des gâches et des relais en conséquences -->
@section('option_relais')
	<!-- Chaque gâche -->
	<option value="">Aucun</option>
	@foreach ($gaches as $gache)
		<optgroup label="{{ $gache->nom }}">
			<!-- Chaque relais -->
			@foreach ($relais as $relais_seul)
				<!-- Si l'id gâche du relais = l'id de la gache de la boucle en cours -->
				@if ($relais_seul->gache_id === $gache->id)
					<!-- Création de l'option dans le select -->
					si id relai porte = id relai -> selected
					@if ($porte->relais_id === $relais_seul->id)
						<option value="{{ $relais_seul->id }}" selected>Voie {{ $relais_seul->numero }} ->{{ $porte->nom }}
						<!-- Réstitution du nom des portes déjà sur les voies -->
						@foreach($relais_portes as $option_porte)
							@if ($option_porte->relais_id === $relais_seul->id)
								-> {{$option_porte->nom}}
							@endif
						@endforeach
					</option>
					@else
					<option value="{{ $relais_seul->id }}">Voie {{ $relais_seul->numero }}
						<!-- Réstitution du nom des portes déjà sur les voies -->
						@foreach($relais_portes as $option_porte)
							@if ($option_porte->relais_id === $relais_seul->id)
								-> {{$option_porte->nom}}
							@endif
						@endforeach
					</option>
					@endif
			    @endif
		    @endforeach
	    </optgroup>
	@endforeach
@endsection

@section('option_lecteur')
	<label for="id_lecteur">Lecteur : </label>
	<select id="id_lecteur" name="id_lecteur">
		<option value="">Aucun</option>
    	@foreach ($lecteurs as $lecteur)
    		@if ($lecteur->porte_id != null && $lecteur->porte_id != $porte->id)
    			<option value="{{ $lecteur->id }}" disabled>{{ $lecteur->nom }}</option>
    		@elseif ($lecteur->porte_id === $porte->id)
    			<option value="{{ $lecteur->id }}" selected>{{ $lecteur->nom }}</option>
    		@else
        		<option value="{{ $lecteur->id }}">{{ $lecteur->nom }}</option>
        	@endif
        @endforeach
    </select>
@endsection

@section('supprimer')
	<a href="{{ route('PortesDelete', ['n' => $porte->id]) }}"><button class="btn btn-danger">Supprimer</button></a>
@endsection
