@extends('layouts.navigation')

@section('content')
<div class="espace" style="height:13vh;"></div>
<div class="al-content">
    <top-content-navigation>
        <div class="content-top clearfix">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#/dashboard">Home</a></li>
                </ol>
            </nav>
        </div>
    </top-content-navigation>
    <div ba-panel="" ba-panel-title="Detail de la porte : {{ $porte->nom }}" ba-panel-class="with-scroll">
        <div class="panel with-scroll" zoom-in="">
            <div class="panel-heading clearfix">
                <h3 class="panel-title ng-binding">Detail de la porte : {{ $porte->nom }}</h3>
            </div>
            <div class="panel-body">
                <div class="row ng-scope">
                    <div class="col-md-3">
                        <div class="button-wrapper">
                            <h2>Menu</h2>
                            <div class="button-wrapper ng-scope"><a href="{{ route('Portes') }}"><button type="button" class="btn btn-warning btn-with-icon btn-full"><i class="fa fa-arrow-left"></i>Retour</button></a></div>
                            <div class="button-wrapper"><button type="button" id="editPorte" class="btn btn-warning btn-with-icon btn-full"><i class="fa fa-pencil"></i>Modifier la porte</button></div>
                            @yield('supprimer')
                            <div class="button-wrapper ng-scope"><a href="{{ route('PortesDelete', ['n' => $porte->id]) }}"><button type="button" class="btn btn-warning btn-with-icon btn-full"><i class="fa fa-trash"></i>Supprimer la porte</button></a></div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <form class="form-horizontal" name="inputForm" novalidate="" style="">
                            <div class="form-group row"><label for="Nom" class="control-label col-md-3 col-form-label">Nom *</label>
                                <div class="col-md-7"><input type="text" class="form-control" name="Nom" required="" placeholder="Nom" disabled style=""></div>
                            </div>
                            <div class="form-group row"><label for="Salle " class="control-label col-md-3 col-form-label">Salle *</label>
                                <div class="col-md-7"><input type="text" class="form-control" name="Salle " required="" placeholder="Salle " disabled style=""></div>
                            </div>
                            <div class="form-group row"><label for="Lecteur " class="control-label col-md-3 col-form-label">Lecteur *</label>
                                <div class="col-md-7"><input type="text" class="form-control" name="Lecteur " required="" placeholder="Lecteur " disabled style=""></div>
                            </div>
                            <div class="form-group row"><label for="Gache " class="control-label col-md-3 col-form-label">Gache *</label>
                                <div class="col-md-7"><input type="text" class="form-control" name="Gache " required="" placeholder="Gache " disabled style=""></div>
                            </div>
                            <div class="form-group row"><label for="Relais " class="control-label col-md-3 col-form-label">Relais *</label>
                                <div class="col-md-7"><input type="text" class="form-control" name="Relais " required="" placeholder="Relais " disabled style=""></div>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-offset-4 col-md-7">
                                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                                    <button class="btn btn-danger" type="button" id="disabled">Annuler</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
        <script src="{{ asset('js/modif_script.js') }}"></script>
        @endsection
