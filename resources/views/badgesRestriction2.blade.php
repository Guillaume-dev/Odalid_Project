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
                        <a id="areaName{{$zone->id}}" class="nav-link zone areaNameConfig" data-toggle="tab" role="tab" href="#areaConf{{$zone->id}}">{{ $zone->nom }}</a>
                    </li>
                    @endforeach
                </ul>
            <!-- FIN DE LA ZONE DE SELECTION DES ZONES -->
            <!-- DEBUT DU CORP DE LA ZONE CHOISIS -->
            <div class="tab-content">
                @foreach ($zones as $zone)
                <!-- Affichage des onglets pour chaque zone -->
                <div class="tab-pane fade" id="areaConf{{$zone->id}}">
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
                
                     <!-- Si l'accès à la gestion est autorisé,alors affichage des dates et des horaires de permission -->
                <div id="config">
                <h3 class="text-center"> Gestion des dates d'expiration</h3>
                <div class="row show-content">
                    Blavlbaz 1
                    
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