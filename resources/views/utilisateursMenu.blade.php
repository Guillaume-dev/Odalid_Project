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
    <div ba-panel="" ba-panel-title="Detail de l'utilisateur : Administrateur" ba-panel-class="with-scroll">
        <div class="panel with-scroll" zoom-in="">
            <div class="panel-heading clearfix">
                <h3 class="panel-title ng-binding">Detail de l'utilisateur : {{ $user->roles }}</h3>
            </div>
            <div class="panel-body">
                <div class="row ng-scope">
                    <div class="col-md-3">
                        <div class="button-wrapper">
                            <h2>Menu</h2>
                            <div class="button-wrapper ng-scope"><a href="{{ route('Utilisateurs') }}"><button type="button" class="btn btn-warning btn-with-icon btn-full"><i class="fa fa-arrow-left"></i>Retour</button></a></div>
                            <div class="button-wrapper"><button type="button" id="editUser" class="btn btn-warning btn-with-icon btn-full"><i class="fa fa-pencil"></i>Modifier utilisateur</button></div>
                            <div class="button-wrapper ng-scope"><button type="button" class="btn btn-warning btn-with-icon btn-full" id="switch"><i class="fa fa-id-card"></i>Activer / Désactiver</button></div>
                            <div class="button-wrapper ng-scope"><button type="button" class="btn btn-warning btn-with-icon btn-full" ng-click="password()" ng-disabled="isEdit"><i class="fa fa-key"></i>Nouveau mot de passe</button></div>
                            @yield('supprimer')
                            <div class="button-wrapper ng-scope"><a href="{{ route('UtilisateursDelete', ['n' => $user->id]) }}"><button type="button" class="btn btn-warning btn-with-icon btn-full" ng-disabled="isEdit" ng-hide="dataForm.roles=='superadmin'"><i class="fa fa-trash"></i>Supprimer l'utilisateur</button></a></div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <form class="form-horizontal" name="inputForm">
                            <div class="form-group row"><label for="Nom" class="control-label col-md-4 col-form-label">Nom d'utilisateur</label>
                                <div class="col-md-6"><input type="text" class="form-control" name="Nom" required="" value="{{ $user->username }}" style="" disabled="disabled"> <span class="help-block "></span></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-4 col-form-label">Email</label>
                                <div class="col-md-6"><input type="email" class="form-control" name="Email" required="" value="{{ $user->email }}" style="" disabled="disabled"> <span class="help-block"></span></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-4 col-form-label">Actif</label>
                                <div class="col-md-6"><span class="label label-info" style="" id="actif">Actif</span> <span class="label label-info" style="" id="desactive">Désactivé</span></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-4 col-form-label">Roles</label>
                                <div class="col-md-6"><select class="form-control" name="Role" required="" disabled="disabled" style="">
                                        <option value="admin">{{ $user->roles }}</option>
                                        <option value="user">{{ $user->roles }}</option>
                                    </select></div>
                            </div>
                            <div class="form-group row"><label class="control-label col-md-4 col-form-label">Date d'expiration</label>
                                <div class="col-md-6"><input type="date" class="form-control" name="Date" date-converter="" value="{{ $user->expire_at }}" required="" style="" disabled="disabled"> <span class="help-block"></span></div>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-offset-4 col-md-6">
                                    <button class="btn btn-primary" type="submit">Sauvegarder</button>
                                    <button class="btn btn-danger" type="button" id="disabled">Annuler</button></div>
                            </div>
                        </form>

                        <!-- <div class="col-md-9">
                        <form class="form-horizontal ng-pristine ng-valid-email ng-valid ng-valid-required" name="inputForm" ng-submit="saveEdit()" novalidate="" style="">
                            <div class="form-group" ng-class="{ 'has-error': inputForm.Nom.$invalid &amp;&amp; inputForm.$submitted }"><label for="Nom" class="control-label col-md-4" >Nom d'utilisateur</label>
                                <div class="col-md-6"><input type="text" class="form-control" name="Nom" required="" value="{{ $user->username }}" ng-readonly="!isEdit" readonly="readOnly" style=""> <span class="help-block ng-hide ng-binding" ng-show="inputForm.Nom.$invalid &amp;&amp; inputForm.Nom.$pristine &amp;&amp; inputForm.Nom.doublon"></span></div>
                            </div>
                            <div class="form-group" ng-class="{ 'has-error': inputForm.Email.$invalid &amp;&amp; inputForm.$submitted }"><label class="control-label col-md-4">Email</label>
                                <div class="col-md-6"><input type="email" class="form-control ng-pristine ng-untouched ng-valid-email ng-not-empty ng-valid ng-valid-required" name="Email" ng-model="dataForm.email" required="" value="{{ $user->email }}" ng-readonly="!isEdit" readonly="readOnly" style=""> <span class="help-block ng-hide ng-binding" ng-show="inputForm.Email.$invalid &amp;&amp; inputForm.Email.$pristine &amp;&amp; inputForm.Email.doublon"></span></div>
                            </div>
                            <div class="form-group" ng-hide="isEdit || dataForm.roles=='superadmin'"><label class="control-label col-md-4">Actif</label>
                                <div class="col-md-6"><span class="label label-info" ng-show="dataForm.actif" style="">oui</span> <span class="label label-danger ng-hide" ng-show="!dataForm.actif" style="">non</span></div>
                            </div>
                            <div class="form-group" ng-hide="dataForm.roles=='superadmin'"><label class="control-label col-md-4">Roles</label>
                                <div class="col-md-6"><select class="form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" name="Role" ng-model="dataForm.roles" required="" ng-disabled="!isEdit" disabled="disabled" style="">
                                        <option value="admin">{{ $user->roles }}</option>
                                        <option value="user">{{ $user->roles }}</option>
                                    </select></div>
                            </div>
                            <div class="form-group" ng-class="{ 'has-error': inputForm.Date.$invalid &amp;&amp; inputForm.$submitted}" ng-hide="dataForm.roles=='superadmin'"><label class="control-label col-md-4">Date d'expiration</label>
                                <div class="col-md-6"><input type="date" class="form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" name="Date" date-converter="" ng-model="dataForm.dateExpiration" value="{{ $user->expire_at }}" required="" ng-readonly="!isEdit" readonly="readOnly" style=""> <span class="help-block ng-hide ng-binding" ng-show="inputForm.Date.$invalid &amp;&amp; inputForm.Date.$pristine &amp;&amp; inputForm.Date.doublon"></span></div>
                            </div>
                            <div class="form-group ng-hide" ng-show="isEdit">
                                <div class="col-md-offset-4 col-md-6"><button class="btn btn-primary" type="submit">Sauvegarder</button> <button class="btn btn-danger" type="button" ng-click="cancelEdit()">Annuler</button></div>
                            </div>
                        </form>
                    </div>-->
                    </div>
                </div>
            </div>
        </div>




        @endsection

        @section('scripts')
        <script src="{{ asset('js/modif_script.js') }}"></script>
        <script src="{{ asset('js/actif_script.js') }}"></script>
        @endsection
        <!-- <div>
            <form>
                <div>
                    <label>test111</label>
                    <input type="text" value="tsestt" disabled>
                </div>
                <div>
                    <label>test2221</label>
                    <input type="text" value="tsestt555" disabled>
                </div>
                <div>
                    <label>test2221</label>
                    <input type="text" name="1" id="1" disabled>
                </div>
                <div>
                    <label>test2221</label>
                    <input type="text" name="2" id="2" disabled>
                </div>
                <div>
                    <label>test2221</label>
                    <input type="text" name="3" id="3" disabled>
                </div>
                <div>
                    <label>test2221</label>
                    <input type="text" name="4" id="4" disabled>
                </div>
                <div>
                    <label>valider</label>
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>
            <button id="edit">Click to Enable</button>
        </div>
        <script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                $('#edit').click(function() {
                    $("input").prop('disabled', false);
                });
            });

        </script>-->
