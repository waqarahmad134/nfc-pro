@extends('welcome')
@section('content')

<div id="main-content">
    <div class="block-header">
        <div class="row clearfix">

        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Change Password</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>
                        </ul>
                    </div>
                    <form method="POST" id="addproduct" enctype="multipart/form-data">
                        @csrf
                        <div class="px-5">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <label>Old Password</label>
                                    <input name="old_password" type="password" class="form-control" placeholder="Enter old password here" required>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label>New Password</label>
                                    <input name="new_password" type="password" class="form-control" placeholder="Enter your new password here" required>
                                </div>
                            </div>
                            <input type="submit" href="#" class="btn mt-3 mb-3 float-right" style="background-color: {{ env('THEME_PRIMARY_COLOR', '#000000') }}; color: white;" value="Change" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#addproduct').on('submit', (function(e) {
        e.preventDefault();
        var token = "{{ session('token') }}";
        var formData = new FormData(e.target);
        console.log(formData);
        var headers = {
            'Authorization': 'Bearer ' + token
        };
        $.ajax({
            type: 'POST',
            url: "{{env('APP_URL_API')}}api/change-my-password",
            data: formData,
            headers: headers,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if (response.status == 1) {
                    toastr.info('Sucess', 'Info');
                }
                if (response.status == 0) {
                    toastr.error('Error', response.message);
                }
            },
            error: function(data) {
                toastr.error('Unexpected Error', 'Error');
                console.log("error");
                console.log(data);
            }
        });
    }));

    function initMap() {
        var lati = 31.4717778;
        var long = 74.24510699999999;
        var myLatlng = new google.maps.LatLng(Number(lati), Number(long));
        var geocoder = new google.maps.Geocoder();

        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: Number(lati),
                lng: Number(long)
            },
            zoom: 15
        });
        var input = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: true

        });
        autocomplete.addListener('place_changed', function() {
            marker.setVisible(true);
            var place = autocomplete.getPlace();
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
            document.getElementById('address').innerHTML = place.name;
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('lang').value = place.geometry.location.lng();
            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);

        });

        google.maps.event.addListener(marker, 'dragend',
            function(marker) {
                var latLng = marker.latLng;
                currentLatitude = latLng.lat();
                currentLongitude = latLng.lng();

                geocoder.geocode({
                    'latLng': latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            document.getElementById('address').value = results[0].formatted_address;
                            document.getElementById('lat').value = currentLatitude;
                            document.getElementById('lang').value = currentLongitude;

                            infowindow.setContent('<div>' + results[0].formatted_address + '<br>');
                            infowindow.open(map, marker);
                        }
                    }
                });
            });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>


@endsection