function searchFilm() {
  alert($("#test").val());
  $.ajax({
    url: "http://localhost:8888/sakila/api/api.php?requete=" + $("#test").val() + "",
    type: "GET",
    contentType: "application/json",
    data: ["json"],
    success: function (data) {
      alert(JSON.stringify(data));
    }
  });
}

