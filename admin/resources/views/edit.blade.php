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
                        <h2>Edit Sub Admin</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>
                        </ul>
                    </div>
                    <form method="POST"  id="addproduct" enctype="multipart/form-data">
                        @csrf
                                    <input name="id" type="hidden" class="form-control" placeholder="Enter First Name Here" value="{{$data->id}}" required>
                        <div class="px-5">
                            <h3>Main Info</h3>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <label>First Name</label>
                                    <input name="first_name" type="text" class="form-control" placeholder="Enter First Name Here" value="{{$data->first_name}}" required>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label>Last Name</label>
                                    <input name="last_name" type="text" class="form-control" placeholder="Enter Last name here" value="{{$data->last_name}}" required>
                                </div>
                            </div>
                            <!--<div class="row mt-3">-->
                            <!--    <div class="col-md-6 col-lg-6">-->
                            <!--        <label>Email</label>-->
                            <!--        <input name="email" type="text" class="form-control" placeholder="Enter Email Address Here" value="{{$data->email}}" required>-->
                            <!--    </div>-->
                            <!--    <div class="col-md-6 col-lg-6">-->
                            <!--        <label>Role</label>-->
                            <!--        <input name="role" type="text" class="form-control" value="{{$data->role}}" readonly>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="row mt-3">
                                <div class="col-md-6 col-lg-6">
                                    <label>Company</label>
                                    <input name="company_name" type="text" class="form-control" placeholder="Company Name" value="{{$data->company_name}}" required>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label>Position</label>
                                    <input name="position" type="text" class="form-control" placeholder="Position" value="{{$data->position}}" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 col-lg-12">
                                    <label>Address</label>
                                    <input id="address" name="address" type="text" class="form-control" value="{{$data->address}}"  />
                                    <div id='map' class="d-none"></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 col-lg-6">
                                    <label>Mobile Number</label>
                                    <input name="mobile_number" type="text" class="form-control" placeholder="Mobile Number" value="{{$data->mobile_number}}"  required>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label>Telephone Number</label>
                                    <input name="telephone_number" type="text" class="form-control" placeholder="Telephone Number" value="{{$data->telephone_number}}"  required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 col-lg-6">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Enter Password Here">
                                </div>

                            </div>
                          
                            <h3>Optional Info</h3>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <label>Facebook URL</label>
                                    <input name="fb_url" type="text" class="form-control" value="{{$data->fb_url}}">
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label>Twitter URL</label>
                                    <input name="twitter_url" type="text" class="form-control" value="{{$data->twitter_url}}">
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label>Instagram URL</label>
                                    <input name="insta_url" type="text" class="form-control" value="{{$data->insta_url}}">
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label>Snapchat URL</label>
                                    <input name="snapchat_url" type="text" class="form-control" value="{{$data->snapchat_url}}">
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label>Linkedin URL</label>
                                    <input name="linkedin_url" type="text" class="form-control" value="{{$data->linkedin_url}}">
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label>Website</label>
                                    <input name="website" type="text" class="form-control" value="{{$data->website}}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <label>Profile Picture</label>
                                    <input name="profile_pic" type="file" class="form-control">
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label>Cover Picture</label>
                                    <input name="cover_pic" type="file" class="form-control">
                                </div>
                            </div>
                            <input type="submit" href="#" class="btn mt-3 mb-3 float-right" style="background-color: #002E63; color: white;" value="Edit Sub Admin" />
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
            url: "{{env('APP_URL_API')}}api/user/update",
            data: formData,
            headers: headers,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if (response.status == 1) {
                    toastr.info('Sucess', response.message);
                    location.reload();
                }
                if (response.status == 0) {
                    toastr.error('Error', response.error);
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

            /* Location details */
        });
        // draggabled address  Start

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