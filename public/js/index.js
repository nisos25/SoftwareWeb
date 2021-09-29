function initMap() {
    var center = {lat: 2.449871, lng: -76.609304};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: center
    });
    var marker = new google.maps.Marker({
      position: center,
      map: map
    });
  }
