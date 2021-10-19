if ($("#contentListFilms").is(":visible")) {
  $("#listFilms").bootstrapTable({
    classes: 'table table-hover table-bordered table-sm',
    theadClasses: 'thead-light',
    pagination: true,
    pageSize: 15,
    pageList: ['15','25','50','100'],
    idField: 'film_id',
    sortName: 'film_id',
    columns: [{
      field: 'film_id',
      title: 'Id',
      titleTooltip: 'Colonne des identifiants des films',
      valign: 'middle',
      align: 'center',
      sortable: true,
      formatter: 'fieldFilmFormatter'
    }, {
      field: 'title',
      title: 'Titre',
      titleTooltip: 'Colonne des titres des films',
      valign: 'middle',
      halign: 'center',
      sortable: true,
      formatter: 'fieldFilmFormatter'
    }, {
      field: 'category',
      title: 'Catégorie',
      titleTooltip: 'Colonne des catégories des films',
      valign: 'middle',
      align: 'center',
      sortable: true,
      formatter: 'fieldFilmFormatter'
    }, {
      field: 'rental_rate',
      title: 'Tarif de location',
      titleTooltip: 'Colonne des tarifs de location des films',
      width: '160',
      valign: 'middle',
      align: 'center',
      sortable: true,
      formatter: 'fieldFilmFormatter'
    }, {
      field: 'rental_duration',
      title: 'Durée de location (en jours)',
      titleTooltip: 'Colonne des durées de location des films',
      width: '160',
      valign: 'middle',
      align: 'center',
      sortable: true,
      formatter: 'fieldFilmFormatter'
    }, {
      field: 'rating',
      title: 'Classification',
      titleTooltip: "Colonne des classifications des films",
      width: '80',
      valign: 'middle',
      align: 'center',
      sortable: true,
      formatter: 'fieldFilmFormatter'
    }, {
      field: 'action',
      title: 'Action',
      titleTooltip: 'Colonne des différents actions possibles',
      width: '100',
      valign: 'middle',
      align: 'center',
      formatter: 'actionFilmFormatter'
    }]
  })
  getFilms();
}

if ($("#contentListRentals").is(":visible")) {
  $("#listRentals").bootstrapTable({
    classes: 'table table-hover table-bordered table-sm',
    theadClasses: 'thead-light',
    pagination: true,
    pageSize: 15,
    pageList: ['15','25','50','100'],
    idField: 'rental_id',
    sortName: 'rental_id',
    columns: [{
      field: 'rental_id',
      title: 'Id',
      titleTooltip: 'Colonne des identifiants des locations',
      align: 'center',
      sortable: true,
      formatter: 'fieldFormatter'
    }, {
      field: 'film_title',
      title: 'Film',
      titleTooltip: 'Colonne des titres des films',
      align: 'center',
      sortable: true,
      formatter: 'fieldFormatter'
    }, {
      field: 'rental_date',
      title: 'Date de location',
      titleTooltip: 'Colonne des dates des films en locations',
      align: 'center',
      sortable: true,
      formatter: 'fieldFormatter'
    }, {
      field: 'return_date',
      title: 'Date de retour',
      titleTooltip: "Colonne des dates de retours des films",
      align: 'center',
      sortable: true,
      formatter: 'fieldFormatter'
    }, {
      field: 'customer_firstname',
      title: 'Client',
      titleTooltip: 'Colonne des images du profile des employés',
      align: 'center',
      sortable: true,
      formatter: 'fieldCustomerFormatter'
    },{
      field: 'staff_firstname',
      title: 'Personnel',
      titleTooltip: 'Colonne des images du profile des employés',
      align: 'center',
      sortable: true,
      formatter: 'fieldStaffFormatter'
    }]
  });
  getRentals();
}

function getFilms() {
  $.ajax({
    url: "http://localhost:8888/sakila/api/films/getFilms.php",
    type: "GET",
    contentType: "application/json",
    success: function (data) {
      $("#listFilms").bootstrapTable('load', data.data);
    }
  });
}

function getFilm(filmId) {
  if (!filmId)
    return false;

  $.ajax({
    url: "http://localhost:8888/sakila/api/films/getFilm.php",
    type: "GET",
    data: {"id": filmId},
    contentType: "application/json",
    success: function (data) {
      alert(JSON.stringify(data.data));
    }
  });
}

function searchFilms() {
  $.ajax({
    url: "http://localhost:8888/sakila/api/films/searchFilms.php",
    type: "GET",
    contentType: "application/json",
    data: {'test': 'lala'},
    success: function (data) {
      console.log(typeof data);
      $('body .container').before(data["test"]);
    }
  });
}

function getRentals() {
  $.ajax({
    url: "http://localhost:8888/sakila/api/rentals/getRentals.php",
    type: "GET",
    contentType: "application/json",
    success: function (data) {
      $("#listRentals").bootstrapTable('load', data.data);
    }
  });
}

function addRental() {
  let rental_date = $("#rentalDate").val();
  let inventory_id = $("#inventoryId").val();
  let customer_id = $("#customerId").val();
  let staff_id = $("#staffId").val();
  let params = {
    "rental_date": rental_date,
    "inventory_id": inventory_id,
    "customer_id": customer_id,
    "staff_id": staff_id
  };



  $.ajax({
    url: "http://localhost:8888/sakila/api/films/addRental.php",
    type: "POST",
    data: params,
    contentType: "application/json",
    success: function (data) {
      alert(JSON.stringify(data));
      $("#listRentals").bootstrapTable('load', data.data);
    }
  });
}

function addReturnRental() {
  $.ajax({
    url: "http://localhost:8888/sakila/api/films/addReturnRental.php",
    type: "POST",
    contentType: "application/json",
    success: function (data) {
      alert(JSON.stringify(data));
      $("#listRentals").bootstrapTable('load', data.data);
    }
  });
}

// Fonction permettant au clique sur les <span> d'ouvrir la modal des détails d'un employé
function fieldFormatter(value, row, index) {
  return '<span class="field">' + value + '</span>';
}

// Fonction permettant au clique sur les <span> d'ouvrir la modal des détails d'un employé
function fieldFilmFormatter(value, row, index) {
  return '<span class="field" data-toggle="modal" data-target="#detailsFilm">' + value + '</span>';
}

// Fonction permettant au clique sur les <span> d'ouvrir la modal des détails d'un employé
function fieldCustomerFormatter(value, row, index) {
  return '<span class="field">' + row.customer_firstname + ' ' + row.customer_lastname+ '</span>';
}

// Fonction permettant au clique sur les <span> d'ouvrir la modal des détails d'un employé
function fieldStaffFormatter(value, row, index) {
  return '<span class="field">' + row.staff_firstname + ' ' + row.staff_lastname+ '</span>';
}

// Fonction permettant l'affichage des boutons dans la colonne "Action" pour chaque ligne d'un employé
function actionFilmFormatter(value, row, index) {
  return '<div class="action"><button class="btn btn-outline-primary" type="button" onclick="getFilm(' + row.film_id + ')" title="Afficher les information de ce film"><i class="fas fa-eye"></i></button></div>';
}