<?php
error_reporting(0);
$latlong=base64_decode($_GET['currentlatlong']);
header("content-type: application/x-javascript");
$lat_long=explode("-",$latlong);
if($lat_long[0]!=''){
$latlongVal_old=$lat_long[0];
$old_chars=Array("(",")");
$latlongVal=str_replace($old_chars,"",$latlongVal_old);
}else{
$latlongVal="41.033, 28.95";
}
if($lat_long[1]!=''){
$zoomVal=$lat_long[1];
}else{
$zoomVal="8";
}
?>
var infowindow;
  (function () {
    google.maps.Map.prototype.markers = new Array();
    google.maps.Map.prototype.getMarkers = function() {
      return this.markers
    };
    google.maps.Map.prototype.clearMarkers = function() {
      for(var i=0; i<this.markers.length; i++){
        this.markers[i].setMap(null);
      }
      this.markers = new Array();
    };
    google.maps.Marker.prototype._setMap = google.maps.Marker.prototype.setMap;
    google.maps.Marker.prototype.setMap = function(map) {
      if (map) {
        map.markers[map.markers.length] = this;
      }
      this._setMap(map);
    }
  })();
var map;
var marker=false;
var geocoder;
function initialize() {
geocoder = new google.maps.Geocoder();
  var myLatlng = new google.maps.LatLng(<?php echo $latlongVal;?>);

  var myOptions = {
    zoom: <?php echo $zoomVal;?>,
	minZoom:5,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
	streetViewControl: false
  }

  map = new google.maps.Map(document.getElementById("gmap"), myOptions);

  <?php if($lat_long[0]!=''){?>
  marker = new google.maps.Marker({
      	position: myLatlng,
      	map: map
  	});
	  var infowindow = new google.maps.InfoWindow({

  content: "<div style=\"font-size:11pt;font-weight:bold;color:red;text-align:center;\">İlanınızın Bulunduğu Konum</div>"
});
infowindow.open(map, marker);
<?php }?>

google.maps.event.addListener(map, 'click', function(event) {
map.clearMarkers();

  var marker = new google.maps.Marker({
      position: event.latLng,
      map: map
  });
  var infowindow = new google.maps.InfoWindow({

  content: "<div style=\"font-size:11pt;font-weight:bold;color:red;text-align:center;\">İlanınızın Bulunduğu Konum</div>"
});
infowindow.open(map, marker);

	document.getElementById("map_Val").value = event.latLng+"-"+map.getZoom();
  });

  }

window.onload = function(){initialize();map_location();};
