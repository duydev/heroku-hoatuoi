@extends('Shared.LayoutUser')

@section('content')
<h2>
    <img src="{{asset("Themes/Images/icon.png")}}" width="30" height="30" />
     BẢN ĐỒ
</h2>
<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>

<h3>Địa chỉ cửa hàng Hoa Tươi H & T</h3>


<button class="btn btn-default btnGioHang" style="" onclick="timDuongDi()"><b style="color:white">Tìm đường đi</b></button>
<br />
<div id="map"></div>
<script>
    function initMap() {
        var uluru = { lat: 10.802198, lng: 106.715044 };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15, //Phóng to bản đồ
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key= AIzaSyAZYI9-r28Nqt3OREv8yzFBZODjC4JUnUU &callback=initMap">
</script>
<br />

<div>
<h2>
    <img src="{{asset("Themes/Images/icon.png")}}" width="30" height="30" />
     LIÊN HỆ VỚI CHUNG TÔI
</h2>
<h3></h3>        
<form class="form-horizontal" role="form" method="post" action="Guimail">    
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Họ & Tên</label>
		<div class="col-sm-10">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
			<input type="text" class="form-control" id="name" name="txtName" placeholder="Nguyễn Văn A" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="txtEmail" placeholder="example@domain.com" value="">
		</div>
	</div>
    <div class="form-group">
        <label for="Title" class="col-sm-2 control-label">Tiêu đề</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="Title" name="txtTitle" value="">
        </div>
    </div>
	<div class="form-group">
		<label for="message" class="col-sm-2 control-label">Nội dung</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="4" name="txtContent"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="human" class="col-sm-2 control-label">Captcha</label>
		<div class="col-sm-10">
			{!! app('captcha')->display(); !!} 
                @if($errors->has('g-recaptcha-response'))                   
                    <span class="help-block">
                        <strong style="color: red">{{$errors->first('g-recaptcha-response')}}</strong>
                    </span>
                @endif   
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<input id="submit" name="submit" type="submit" value="Gửi" class="btn btn-default btnGioHang">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<! Will be used to display an alert to the user>
		</div>
	</div>
	</form>
</div>	
<script>
    function timDuongDi() {
        var latlng = new google.maps.LatLng(10.802145, 106.714965);
        //Vị trí của cửa hàng
        var map = new google.maps.Map(document.getElementById('map'),
            {
                center: latlng,
                zoom: 15
            });
        var infoWindow = new google.maps.InfoWindow({ map: map });

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos =
                    {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                infoWindow.setPosition(pos);

                infoWindow.setContent('Vị trí của bạn');

                map.setCenter(pos);

                var directionsDisplay = new google.maps.DirectionsRenderer({ map: map });

                var request =
                    {
                        destination: latlng, // Điểm đến là vị trí cửa hàng
                        origin: pos, // Điểm bắt đầu là vị trí hiện tại của bạn
                        travelMode: google.maps.TravelMode.DRIVING
                    };

                var directionsService = new google.maps.DirectionsService();

                directionsService.route(request, function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        // Display the route on the map.
                        directionsDisplay.setDirections(response);
                    }
                });
            },
                function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
        }
        else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
    }

</script>
@endsection
