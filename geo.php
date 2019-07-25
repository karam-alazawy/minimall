<!DOCTYPE html>
<html>
<body>


<button onclick="getLocation()">Try It</button>

<p id="demo"></p>
<button onclick="getmap()">open in google map</button>

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script>
	var a;
	var b;
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }

}

function showPosition(position) {
  x.innerHTML = "خط العرض : " + position.coords.latitude + 
  "<br>خط الطول: " + position.coords.longitude;
  a=position.coords.latitude;
  b=position.coords.longitude;
}
function getmap() {
  	    window.location.href = "https://www.google.com/maps/dir/"+a+","+b;

}

</script>

</body>
</html>
