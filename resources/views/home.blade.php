@extends('layouts.navigation')

@section('content')
<div class="espace" style="height:13vh;"></div>
<div class="al-content">
    <top-content-navigation>
        <div class="content-top clearfix">
            <h1 class="al-title ng-binding">Tableau de bord</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#/dashboard">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tableau de bord</li>
                </ol>
            </nav>
        </div>
    </top-content-navigation>
    <!-- uiView: -->
    <div class="dispo-dashboard">
            <div class="card porte-card">
                    <div class="panel-heading clearfix">
                        <h3 class="card-title">Gestion des portes</h3>
                    </div>
                    <div class="card-body" ng-transclude="">
                        <div class="full ng-scope">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th class="browser-icons"></th>
                                        <th>Porte</th>
                                        <th>Action</th>
                                        <th>Etat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ngRepeat: door in DoorList -->
                                    <tr ng-repeat="door in DoorList" style="">
                                        <td><img src="/img/door.png" width="20" height="20"></td>
                                        <td class="ng-binding">Porte bureau Odalid</td>
                                        <td>
                                            <div class="btn-group" id="status" data-toggle="buttons">
                                                <label class="btn btn-default btn-on-1 btn-sm " id="open">
                                                    <input  type="radio" value="1" name="multifeatured_module[module_id][status]">Ouvrir</label>
                                                <label class="btn btn-default btn-off-1 btn-sm active " id="close">
                                                    <input  type="radio" value="0" name="multifeatured_module[module_id][status]" checked="checked">Fermer</label>
                                            </div>

                                        </td>
                                        <td><span class="label label-info " id="opened" style="">Ouverte</span><span class="label label-info" id="closed" style="">Fermé</span></td>
                                    </tr><!-- end ngRepeat: door in DoorList -->
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>



        <div class="card text-center historic-card">
            <div class="card-header h3">Bienvenue {{ Auth::user()->username }} </div>
            <div class="card-body" style="overflow: auto; height: 75vh;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Date Evenement</th>
                            <th scope="col">Porte</th>
                            <th scope="col">Etat</th>
                        </tr>
                    </thead>
                    <tbody id="histo">
                        @foreach ($historiques as $historique)
                        <tr>
                            <td>{{ $historique->identite_nom }}</td>
                            <td>{{ \Carbon\Carbon::parse($historique->dateEvenement)->format('d/m/Y H:i:s')}}</td>
                            <td>{{ $historique->porte_nom }}</td>
                            <td>{{ $historique->etatEvenement }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection

@section('scripts')
<script src="{{ asset('js/door_script.js') }}"></script>
@endsection
