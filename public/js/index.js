function initMap() {
    var center = {lat: 2.449871, lng: -76.609304};

    var locations = [
      ['Evento1<br>\
      <br>\
     <a href="https://goo.gl/maps/DAfpD3BydF5TQqHx7">Dirección</a>', 2.468840, -76.599701],
      ['Evento2<br>\
      <br>\
     <a href="https://goo.gl/maps/yUNYj6izrdA6n6sx8">Dirección</a>', 2.450715, -76.536086]/*,
      ['Evento3<br>\
      <br>\
      <a href="https://goo.gl/maps/wgTVEWA8EdkK4brc7">Dirección</a>', 2.479314, -76.663752]*/
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: center
    });
    var infowindow = new google.maps.InfoWindow({});
    var marker, count;
    for (count = 0; count < locations.length; count++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[count][1], locations[count][2]),
            map: map,
            title: locations[count][0]
        });
        google.maps.event.addListener(marker, 'click', (function (marker, count) {
            return function () {
                infowindow.setContent(locations[count][0]);
                infowindow.open(map, marker);
            }
        })(marker, count));
    }
}
