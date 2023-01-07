
var map = tt.map({
    key: "Qv0kWAm7l4EBbLlYCvSa2EVRQttT62BG",
    container: 'search-map',
    center: [100.607447,14.068933],
    zoom:14,
    

});
var Marker = new tt.Marker().setLngLat([100.607447,14.068933]).addTo(map);
var markers = [];
map.on('click', function(event){
    console.log(event);
    clearMarkers();
    var marker = new tt.Marker().setLngLat(event.lngLat).addTo(map);
    moveMap(event.lngLat);
    $("#lat").val(event.lngLat.lat);
    $("#lng").val(event.lngLat.lng);
    markers.push(marker);
}
);
var clearMarkers = function(){
    for (marker of markers){
        marker.remove();
    }
    markers = [];
};
var createRoute =function(){
    var routeOptions = {
        key: "Qv0kWAm7l4EBbLlYCvSa2EVRQttT62BG",
        locations: []
    }
    for (marker of markers){
        routeOptions.locations.push(marker.getLngLat())
        console.log(routeOptions.locations)
    }
    tt.services.calculateRoute(routeOptions).then(
        function(routeData){
            console.log(routeData)
            document.getElementById('distance').innerHTML = 'Total distance' + routeData.routes[0].summary.lengthInMeters + 'Meters';
            var geo = routeData.toGeoJson();
            displayRoute(geo)
        }
    )
};
var displayRoute = function(geoJSON){
    routeLayer = map.addLayer({
        'id' : 'route',
        'type' : 'line',
        'source' : {
            'type' : 'geojson',
            'data' : geoJSON
        },
        'paint' : {
            'line-color' : 'red',
            'line-width' : 5
        }
    })
};
var moveMap = function(lnglat) {
    map.flyTo({
        center: lnglat,
        zoom: 17
    })
};
var handleResults = function(result){
    if(result.results){
        moveMap(result.results[0].position);

        var Marker = new tt.Marker().setLngLat(result.results[0].position).addTo(map);
        console.log(result.results[0].position.lat);
        console.log(result.results[0].position.lng);
    }
    
    var destination = result.results[0].position;

};
var search = function(){
    tt.services.fuzzySearch({
        key:'Qv0kWAm7l4EBbLlYCvSa2EVRQttT62BG',
        query: document.getElementById("query").value,
        
    }).then(handleResults)
};

var addNearbyMarker = function(){
    for (nearbyMarker of nearbyMarkers){
        var marker = new tt.Marker().setLngLat([nearbyMarker['longtitude'],nearbyMarker['latitude']]).addTo(map);
    }
}



