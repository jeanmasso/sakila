function searchFilm() {
  $.ajax({
    url: "http://localhost:8888/sakila/database/api.php?requete=" + $("#test").val() + "",
    type: "GET",
    contentType: "application/json",
    dataType: "json",
    success: function (data) {
      alert(JSON.stringify(data));
    }
  });
}

