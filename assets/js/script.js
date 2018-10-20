function generate(type,text){
    var n = noty({
        text        : text,
        type        : type,
        dismissQueue: true,
        timeout     : 4000,
        layout      : 'topRight',
        theme       : 'defaultTheme'
    });

    console.log('html: ' + n.options.id);
};

function codeAddress(a){
  geocoder.geocode({
    address:a
    },
    function(c,b){
      if(b==google.maps.GeocoderStatus.OK){
        map.fitBounds(c[0].geometry.viewport)
      }
    }
  )
};


$(document).ready(function() {
  $("#use_map_option").change(function(){
    if(this.checked){
      $("#use_map_overlay").fadeOut("slow")
    }else{
      $("#use_map_overlay").fadeIn("slow");
      $("#map_Val").val("");
      map.clearMarkers()
    }
  });
});
