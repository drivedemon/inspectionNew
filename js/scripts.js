//Input Numeric Only
function keyintdot() {
    var key = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if ((key<46 || key>57 || key == 47) && (key != 13)) {
      event.returnValue = false;
   }
}
//substring checked
function myFunction() {
  var str = "!";
  var n = str.length;
  document.getElementById("demo").innerHTML = n;
}
