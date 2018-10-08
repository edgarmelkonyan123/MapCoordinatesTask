<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Map</title>

    <!-- Styles & libraries -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <!--Main CSS-->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<!--Main container-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding">
                    <header role="banner">
                        <nav class="nav navbar-light bg-info" role="navigation">
                            <ul class="nav__list">
                                <li>
                                    @foreach($countries as $key => $country)
                                        <input id="group-{{$key}}" type="checkbox" hidden />
                                        <label for="group-{{$key}}">
                                            <span class="fa fa-angle-right"></span>
                                            {{$country->name}}
                                        </label>
                                        <ul class="group-list">
                                        @foreach($country->cities as $city)
                                            <li>
                                                <a href="#" class="city-finder" data-lng="{{$city->lng}}" data-ltd="{{$city->ltd}}"  >{{ $city->name}}</a>
                                            </li>
                                        @endforeach
                                        </ul>
                                    @endforeach    
                                </li>
                            </ul>
                        </nav>
                    </header>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding">
                    <div id="map" class="map-container">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts & libraries -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--Main js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClF0e8Y80QfpRoY9Kd49OL6WkdMiK9HFk"></script>
<script>
    $(document).ready(function () {
    google.maps.event.addDomListener(window, 'load', defaultMap);
    $(".city-finder").on("click", function(){
        cityFinder($(this).data('lng'),$(this).data('ltd'));
    });

});

function cityFinder(newLat,newLng){
    var latlng = new google.maps.LatLng(newLat, newLng);
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(newLat,newLng),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    map.setCenter(latlng);
    markerCreation(map);
};


function defaultMap(){
    var defaultMap = new google.maps.Map(document.getElementById('map'), {
        zoom: 3,
        center: new google.maps.LatLng(0,0),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
};
var locations = [];
@foreach($clients as $client)    
    var contentString = '<div id="content">'+
    '<div id="siteNotice">'+
    '</div>'+
    '<h1 id="firstHeading" class="firstHeading text-center">{{$client->FIO}}</h1>'+
    '<div id="bodyContent">'+
    '<div style="float:right; width:100%;margin-top: 10px;">'+
    '<p>Email <b>{{$client->email}}</b></p>'+
    '<p>Phone <b>{{$client->phone}}</b></p>'+
    '</div>'+
    '</div>'+
    '</div>';
    locations.push( 
        [
            contentString,
            {{$client->coordinates()->latest()->first()->lng}},
            {{$client->coordinates()->latest()->first()->ltd}},
            {{$client->id}} 
        ]);
@endforeach    


function markerCreation(mapProp) {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: mapProp.zoom,
        center: mapProp.center,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            icon: '/img/marker.png'
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
                markerClick(locations[i][3]);
            }
        })(marker, i));

    }
}

    function markerClick(id){
        removeLine();
        flightPlanCoordinates = [];
        $.ajax({
            url: "/coordinates/"+id,
            success: function (data) {
                for(var i in data){
                    flightPlanCoordinates.push({lat: Number(data[i].lng) , lng: Number(data[i].ltd)});
                }
                flightPath = new google.maps.Polyline({
                    path: flightPlanCoordinates,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
                addLine();
            },
        });
  }

    function addLine() {
        flightPath.setMap(map);
    }

    function removeLine() {
        if (typeof flightPath !== 'undefined') {
            flightPath.setMap(null);
        }
    }

</script>
</body>
</html>
