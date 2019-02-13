<div class="card-body" style=" overflow: auto; height:60vh;">
    <table class="table table-striped">
        <thead>
        <tr>
            
            <th scope="col">Nom</th>
            <th scope="col">Date Evenement</th>
            <th scope="col">Porte</th>
            <th scope="col">Etat</th>
        </tr>
        </thead>
        <tbody>
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
<div class="d-flex justify-content-center" style="margin-top:1vh;">{{ $historiques->links() }}</div>
