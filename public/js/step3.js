$(document).ready(function(){function e(){for(var e=0;e<o.length;e++)o[e].setMap(null);o.length=0}var o=[],a={};a[1e3]=14,a[3e3]=12,a[5e3]=11,a[8e3]=11,a[13e3]=10,a[2e4]=9;var t=$("#location").geocomplete({types:["address"],componentRestrictions:{country:"ma"},map:"#map",mapOptions:{center:{lat:33.5,lng:-7.5},zoom:2},markerOptions:{draggable:!0},details:".location-details"}).bind("geocode:result",function(t,n){var i=$("#location").geocomplete("map"),l=$("#location").geocomplete("marker"),r=parseInt($("#radius").val()),s=new google.maps.Circle({map:i,radius:parseInt($("#radius").val()),fillColor:"#fd875e",fillOpacity:.65,strokeWeight:1});i.setZoom(a[r]),e(),o.push(s),s.bindTo("center",l,"position")});$("#can_travel").change(function(){$("#can_travel").prop("checked")?$("#map-and-radius").removeClass("no-visibility"):$("#map-and-radius").addClass("no-visibility")}),$("#radius").change(function(){t.trigger("geocode:result")}),gmaps.init({locationInput:"location",formID:"location_form",latitude:"lat",longitude:"lng",types:[],noPredictionsMsg:"Aucun lieu ne correspond à votre saisie"})});