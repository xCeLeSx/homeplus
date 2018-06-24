$("#box-temp").click(function() {
    $("#temp").load("temp.php");
    var x = document.getElementById("snackbar");
 });

setInterval(function () {
  $("#temp").load("temp.php");
}, 10000);

