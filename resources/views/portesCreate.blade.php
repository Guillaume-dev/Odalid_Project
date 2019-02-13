@extends('layouts.portes')

@section('titre', 'Nouvelle')

<!-- Affichage de toutes les salles -->
@section('option_salle')
	<option value="">Aucune</option>
	@foreach ($salles as $salle)
    	<option value="{{ $salle->id }}">{{ $salle->nom }}</option>
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
					<option value="{{ $relais_seul->id }}">Voie {{ $relais_seul->numero }}
						<!-- Réstitution du nom des portes déjà sur les voies -->
						@foreach($relais_portes as $option_porte)
							@if ($option_porte->relais_id === $relais_seul->id)
								-> {{$option_porte->nom}}
							@endif
						@endforeach
					</option>
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
        	<option value="{{ $lecteur->id }}">{{ $lecteur->nom }}</option>
        @endforeach
    </select>
@endsection