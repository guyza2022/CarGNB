var mylatlng ={
    lat:40.46,
    lng:3.74
};
var mapOptions ={
    center: mylatlng,
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("google-map"))