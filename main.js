"use strict";
$(document).ready(function () {
  $("#livesearch").keyup(function () {
    let cityName = $("#livesearch").val();
    $.post(
      "index.php",
      {
        city: cityName,
      },
      function (data, status) {
        $("#para").html(data);
      }
    );


  });
});

