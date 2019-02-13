@extends('layouts.navigation')

@section('titre', 'Badges')

@section('content')
<div class="espace" style="height:13vh;"></div>
<div class="card mx-auto" style="width: 80%;">
    <div class="card-header">
        <h1 class="text-center">Seconde Page Badges - @yield('titre')</h1>
    </div>
    <div class="card-body">
        <div class="container"><h3>Selectionnez votre zone</h3></div>
            <div id="exTab1" class="container">     
                <ul  class="nav nav-pills areaNav" role="tablist">
                    @foreach ($zones as $zone)
                    <li class="nav-item areaNameConfig">
                        <a id="areaName{{$zone->id}}" class="nav-link zone areaNameConfig" data-toggle="tab" role="tab" href="#areaConf{{$zone->id}}" onclick="zone()">{{ $zone->nom }}</a>
                    </li>
                    @endforeach
                </ul>
            <!-- FIN DE LA ZONE DE SELECTION DES ZONES -->
            <!-- DEBUT DU CORP DE LA ZONE CHOISIS -->
            <div class="tab-content">
                @foreach ($zones as $zone)
                <!-- Affichage des onglets pour chaque zone -->
                <div class="tab-pane fade" id="areaConf{{$zone->id}}" role="tabpanel">
                    <h3>Configuration de la zone : {{ $zone->nom }}</h3>
                    <div class="form-group">
                        <label class="control-label col-md-6 d-flex justify-content-end">Accès autorisé :</label>
                        <div class="col-md-6">
                            <div class="btn-group" id="status" data-toggle="buttons" >
                                <label class="btn btn-default btn-on-1 btn-sm active waves-effect waves-light" id="acces">
                                <input type="radio" value="1" name="multifeatured_module[module_id][status]" checked="checked">Oui</label>
                                <label class="btn btn-default btn-off-1 btn-sm waves-effect waves-light" id="no_acces">
                                <input type="radio" value="0" name="multifeatured_module[module_id][status]">Non</label>
                            </div>
                        </div>
                    </div>
                
                    <div id="config">
                        <hr>
                        <h3 class="text-center"> Gestion des dates d'expiration</h3>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <label for="dateDebut_{{$zone->id}}">Date de début : </label>
                                <input type="date" id="dateDebut_{{$zone->id}}" name="dateDebut_{{$zone->id}}" value="">
                            </div>
                            <div class="col-md-6 text-center">
                                <label for="dateFin_{{$zone->id}}">Date de fin : </label>
                                <input type="date" id="dateFin_{{$zone->id}}" name="dateFin_{{$zone->id}}" value="">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8 col-form-label  mx-auto">
                            @foreach ($table_jour as $heure_jour)
                               
                                <form action="">
                                    <div>
                                        <h3>{{ $heure_jour->nom }}</h3>
                                        <div class="form-semainier">
                                            <label for="heure_debut_lundi">Heure de début</label>
                                            <input id="heure_debut_lundi" type="time" value="{{ $heure_jour->heureDebut }}">
                                            <label for="heure_fin_lundi">Heure de Fin</label>
                                            <input id="heure_fin_lundi" type="time" value="{{ $heure_jour->heureFin }}">
                                        </div>
                                    </div>
                                
                            @endforeach
                                    <div class="form-group row">
                                        <div class="col-md-4 col-form-label  mx-auto">
                                            <button type="submit" class="btn btn-primary btn-md">Valider</button>
                                        </div>
                                    </div>  
                                </form>
                            </div>
                        </div>  
                        
                    </div> <!-- FIN DE LA PARTIE CONFIG -->
                </div> <!-- FIN DE LA PARTIE AFFICAHGE DE LA CONFIG DES ZONES -->
                @endforeach  
            </div>
        </div> <!-- FIN DE LA DIV CONTAINER--->
    </div> <!-- FIN DE LA CARD-BODY-->
</div><!-- FIN DE LA CARD-->
@endsection

@section('scripts')
<script src="{{ asset('js/acces_script.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection

<!-- @extends('layouts.navigation')

@section('titre', 'Badges')

@section('content')
<div id="tabs">
  <ul>
    <li><a href="#fragment-1">One</a></li>
    <li><a href="#fragment-2">Two</a></li>
    <li><a href="#fragment-3">Three</a></li>
  </ul>
  <div id="fragment-1">
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
  </div>
  <div id="fragment-2">
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
  </div>
  <div id="fragment-3">
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/acces_script.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection -->