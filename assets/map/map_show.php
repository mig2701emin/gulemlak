<?php $latlong=base64_decode($_GET['currentlatlong']);
header("content-type: application/x-javascript");
$lat_long=explode("-",$latlong);
$latlongVal_old=$lat_long[0];
$old_chars=Array("(",")");
$latlongVal=str_replace($old_chars,"",$latlongVal_old);
$zoomVal=$lat_long[1];
?>
var infowindow;
  (function () {
    google.maps.Map.prototype.markers = new Array();
    google.maps.Map.prototype.getMarkers = function() {
      return this.markers
    };
    google.maps.Map.prototype.clearMarkers = function() {
      for(var i=0; i < this.markers.length; i++){
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
function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $latlongVal;?>);

  var myOptions = {
    zoom: <?php echo $zoomVal;?>,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.HYBRID,
	streetViewControl: false
  }

  map = new google.maps.Map(document.getElementById("gmap"), myOptions);


  marker = new google.maps.Marker({
      	position: myLatlng,
      	map: map
  	});
	  var infowindow = new google.maps.InfoWindow({

  content: "<div style=\"font-size:11pt;font-weight:bold;color:red;text-align:center;\">İlanın Bulunduğu Konum</div>"
});
infowindow.open(map, marker);
  }

window.onload = function(){initialize();};
