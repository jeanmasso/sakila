<!-- Modal -->
<div class="modal fade" id="addRentalModal" tabindex="-1" aria-labelledby="addRentalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Création d'une location</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3">
          <div class="col-12">
            <label for="film" class="form-label">Film</label>
            <div class="input-group">
              <input type="text" id="film" class="form-control" placeholder="Rechercher un film" />
              <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
              <ul id="searchListFilms" class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </div>
          </div>
          <div class="col-12">
            <label for="customer" class="form-label">Client</label>
            <div class="input-group">
              <input type="text" class="form-control" id="customerId" placeholder="Rechercher un client"/>
              <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
              <ul id="searchListCustomers" class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </div>
          </div>
          <div class="col-6">
            <label for="inputAddress2" class="form-label">Personnel en charge</label>
            <select id="staffId" class="form-select" aria-label="Default select example">
              <option selected>Personnel en charge de la manipulation</option>
              <option value="2">Jon Stephens</option>
              <option value="1">Mike Hillyer</option>
            </select>
          </div>
          <div class="col-6">
            <label for="rentalDate" class="form-label">Date de location</label>
            <input type="datetime-local" class="form-control" id="rentalDate" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="addRental()">Enregistrer</button>
      </div>
    </div>
  </div>
</div>