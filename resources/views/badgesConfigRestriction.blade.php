@extends ('layouts.badgesRestriction')                    

@section('restriction)
                    <div class="tab-content">
            @foreach ($zones as $zone)
            <!-- Affichage des onglets pour chaque zone -->
            <div class="tab-pane fade" id="panel{{ $zone->id }}" role="tabpanel">
                <h3 class="text-center">Gestion des accès</h3>
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
                 
                    <hr>
                    <h3 class="text-center"> Gestion des dates d'expiration</h3>
                    <div class="row">

                        @if (isset($dates_expirations) && $dates_expirations != null)

                        <!-- Pour chaques date de permission (od_identitezone -> dateDebut et dateFin)  -->

                        @foreach ($dates_expirations as $date_permission)
                        <!-- Si l'id-zone de od_identitezone = id de od_zones (retrouvé avec le foreach du début), affichage des données -->
                        @if ($date_permission->zone_id === $zone->id)
                        <div class="col-md-6 text-center">
                            <label for="dateDebut_{{$zone->id}}">Date de début : </label>
                            <input type="date" id="dateDebut_{{$zone->id}}" name="dateDebut_{{$zone->id}}" value="{{ $date_permission->dateDebut }}">
                        </div>
                        <div class="col-md-6 text-center">
                            <label for="dateFin_{{$zone->id}}">Date de fin : </label>
                            <input type="date" id="dateFin_{{$zone->id}}" name="dateFin_{{$zone->id}}" value="{{ $date_permission->dateFin }}">
                        </div>
                    </div>
                    <hr>

                    <!-- Pour chaque date permises, affichage des heures d'accès -->
                    @foreach ($table_jour as $heure_jour)
                    <!-- Si l'id_identiteZone de od_jour = l'id de od_identitezone, affichage des heures d'accès selon les jours -->
                    @if ($heure_jour->identiteZone_id == $date_permission->id)
                    <fieldset>
                        @switch($heure_jour->nom)
                        @case(0)
                        <legend>Lundi</legend>
                        @break
                        @case(1)
                        <legend>Mardi</legend>
                        @break
                        @case(2)
                        <legend>Mercredi</legend>
                        @break
                        @case(3)
                        <legend>Jeudi</legend>
                        @break
                        @case(4)
                        <legend>Vendredi</legend>
                        @break
                        @case(5)
                        <legend>Samedi</legend>
                        @break
                        @case(6)
                        <legend>Dimanche</legend>
                        @break
                        @endswitch
                        <input type="time" id="heureDebut_{{$date_permission->id}}_{{$heure_jour->nom}}" name="heureDebut_{{$date_permission->id}}_{{$heure_jour->nom}}" value="{{ $heure_jour->heureDebut }}">
                        <label for="heureDebut_{{$date_permission->id}}_{{$heure_jour->nom}}">Heure de début : </label>
                        <input type="time" id="heureFin_{{$date_permission->id}}_{{$heure_jour->nom}}" name="heureFin_{{$date_permission->id}}_{{$heure_jour->nom}}" value="{{ $heure_jour->heureFin }}">
                        <label for="heureFin_{{$date_permission->id}}_{{$heure_jour->nom}}">Heure de fin : </label>

                    </fieldset>
                    @endif
                    @endforeach
                    <div class="form-group row">
                        <div class="col-md-4 col-form-label  mx-auto">
                            <button type="submit" class="btn btn-primary btn-md">Valider</button>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6 offset-md-4 d-flex justify-content-end ">
                        <a href="{{ route('Badges') }}"><button class="btn btn-blue-grey">Retour</button></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endsection

        @section('scripts')
        <script src="{{ asset('js/acces_script.js') }}"></script>
        @endsection
