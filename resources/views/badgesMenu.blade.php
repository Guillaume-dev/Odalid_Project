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
    <div ba-panel="" ba-panel-title="Detail du badge : {{ $badge->nom }}" ba-panel-class="with-scroll">
        <div class="panel with-scroll" zoom-in="">
            <div class="panel-heading clearfix">
                <h3 class="panel-title ng-binding">Detail du badge : {{ $badge->nom }}</h3>
            </div>
            <div class="panel-body">
                <div class="row ng-scope">
                    <div class="col-md-3">
                        <div class="button-wrapper">
                            <h2>Menu</h2>
                            <div class="button-wrapper ng-scope"><a href="{{ route('Badges') }}"><button type="button" class="btn btn-warning btn-with-icon btn-full"><i class="fa fa-arrow-left"></i>Retour</button></a></div>
                            <div class="button-wrapper"><button type="button" id="editBadge" class="btn btn-warning btn-with-icon btn-full"><i class="fa fa-pencil"></i>Modifier le badge</button></div>
                            <div class="button-wrapper ng-scope"><button type="button" class="btn btn-warning btn-with-icon btn-full"><i class="fa fa-id-card"></i>Encoder carte</button></div>
                            <div class="button-wrapper ng-scope"><a href="{{ route('BadgesRestriction', ['n' => $badge->id]) }}"><button type="button" class="btn btn-warning btn-with-icon btn-full"><i class="fa fa-exchange"></i>Restrictions</button></a></div>
                            <div class="button-wrapper ng-scope"><button type="button" class="btn btn-warning btn-with-icon btn-full" id="switch"><i class="fa fa-id-card"></i>Activer / Désactiver</button></div>
                            @yield('supprimer')
                            <div class="button-wrapper ng-scope"><a href="{{ route('BadgesDelete', ['n' => $badge->id]) }}"><button type="button" class="btn btn-warning btn-with-icon btn-full" ng-disabled="isEdit" ng-hide="dataForm.roles=='superadmin'"><i class="fa fa-trash"></i>Supprimer le badge</button></a></div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <form class="form-horizontal" name="inputForm" novalidate="" style="">
                            <div class="form-group row"><label for="Nom" class="control-label col-md-3 col-form-label">Nom *</label>
                                <div class="col-md-7"><input type="text" class="form-control" name="Nom" required="" placeholder="Nom" disabled="disabled" style=""></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-3 col-form-label">Prénom</label>
                                <div class="col-md-7"><input type="text" class="form-control " name="FirstName" placeholder="Prénom" disabled="disabled" style=""></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-3 col-form-label">Status</label>
                                <div class="col-md-7"><span class="label label-info" id="actif">Actif</span> <span class="label label-info " id="desactive">Désactivé</span></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-3 col-form-label">Email *</label>
                                <div class="col-md-7"><input type="email" class="form-control " name="Email" required="" placeholder="Email" disabled="disabled" style=""> <span class="help-block "></span></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-3 col-form-label">Numéro d'identité</label>
                                <div class="col-md-7"><input type="text" class="form-control " name="NumIdentity" placeholder="numéro d'identité" disabled="disabled"> <span class="help-block "></span></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-3 col-form-label">Sexe</label>
                                <div class="col-md-7"><input type="text" class="form-control " name="Sexe" placeholder="H ou F" disabled="disabled"></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-3 col-form-label">Type</label>
                                <div class="col-md-7"><input type="text" class="form-control " name="Type" placeholder="type" disabled="disabled"></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-3 col-form-label">Groupe</label>
                                <div class="col-md-7"><input type="text" class="form-control " name="Group" placeholder="Groupe" disabled="disabled"></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-3 col-form-label">Date de naissance</label>
                                <div class="col-md-7"><input type="date" class="form-control " name="DateBorn" date-converter="" placeholder="dd/MM/yyyy" disabled="disabled"></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-3 col-form-label">Date d'expiration *</label>
                                <div class="col-md-7"><input type="date" class="form-control " name="DateExpireAt" date-converter="" required="" placeholder="dd/MM/yyyy" disabled="disabled" style=""> <span class="help-block "></span></div>
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
        <script src="{{ asset('js/actif_script.js') }}"></script>
        @endsection
