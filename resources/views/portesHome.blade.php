@extends('layouts.navigation')

@section('titre', 'Portes')

@section('content')

<div class="espace" style="height:13vh;"></div>
<div class="al-content">
    <top-content-navigation>
        <div class="content-top clearfix">
            <h1 class="al-title ng-binding">Portes</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#/dashboard">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Portes</li>
                </ol>
            </nav>
        </div>
    </top-content-navigation><!-- uiView: -->
    <div ui-view="" autoscroll="true" autoscroll-body-top="" class="ng-scope" style="">
        <div ba-panel="" ba-panel-class="light-text">
            <div class="panel light-text" zoom-in="">
                <div class="panel-body">
                    <div class="row clearfix ">
                        <div class="col-md-9 col-md-push-3">
                            <h1>Gestion des portes</h1>
                            <p>Gestion des portes ainsi que leurs permissions</p>
                        </div>
                        @if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
                        <div class="col-md-3 col-md-pull-9 text-center"><a href="{{ route('PortesNew') }}"><button class="btn btn-info btn-raised addNew"><img class="btn-img-medium" alt="Image badge" src="/img/door-add.png" width="64" height="64">
                                <p>Nouvelle porte</p>
                                <p></p>
                            </button></a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div ba-panel="" ba-panel-title="Liste des portes" ba-panel-class="light-text" class="ng-scope">
            <div class="panel light-text" zoom-in="">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">Liste des portes</h3>
                </div>
                <div class="panel-body" ng-transclude="">
                    @foreach ($portes as $porte)
                    <a href="{{ route('PortesMenu', ['n' => $porte->id]) }}">
                    <button class="admin">
                        <div class="card" style="width: 10rem;">
                            <img class="card-img-top" src="/img/door.png" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{ $porte->nom }}</p>
                            </div>
                        </div>
                    </button>
                    @endforeach

                    <!-- end ngRepeat: user in dataForm -->
                    <!--  <div ng-hide="dataForm.length!=0" class="ng-scope ng-hide">
                        <p class="text-center text-muted">Aucun utilisateur n'a été cree. Pour cree un utilisateur cliquer sur Nouvel utilisateur</p>
                    </div>-->
                    </a>
                </div>
            </div>
        </div>

        <!--<div class="espace" style="height:13vh;"></div>
	<div class="card mx-auto" style="width: 87vw; height:81vh">
  <div class="card-header">
    <h1 class="text-center">Portes</h1>
      <a href="{{ route('PortesNew') }}"><i class="fa fa-plus" aria-hidden="true"></i> <i class="fa fa-columns" aria-hidden="true"></i> Ajouter une porte</a>
  </div>
  <div class="card-body" style=" overflow: auto; height:70vh;">

      <table class="table table-striped" >
        <thead>
          <tr>
            <th scope="col">Editer</th>
            <th scope="col">Nom</th>

          </tr>
        </thead>
        <tbody>

          @foreach ($portes as $porte)
              <tr>
                  <th scope='row'><a href="{{ route('PortesEdit', ['n' => $porte->id]) }}"><i class="fa fa-edit deep-orange-text" aria-hidden="true"></i></a></th>
                <td>{{ $porte->nom }}</td>

            </tr>
          @endforeach
        </tbody>
      </table>
  </div>

</div>-->

        @endsection
