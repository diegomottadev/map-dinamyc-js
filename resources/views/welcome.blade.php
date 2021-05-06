<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('mapboxgl/mapbox-gl.css') }}" rel="stylesheet" />
    <style>
        #map {
            margin: auto;
            width: 80%;
            height: 75vh;
            border: 1px solid black;

        }

        /* #geocoder-container>div {
            min-width: 50%;
            margin-left: 25%;
        } */
        .coordinates {
            background:rgba(0, 0, 0, 0.5);
            color: #fff;
            position: absolute;
            bottom: 40px;
            left: 10px;
            padding: 5px 10px;
            margin: 0;
            font-size: 11px;
            line-height: 18px;
            border-radius: 3px;
            display: none;
        }
</style>
</head>

<body>
    <div class="container-fluid">

            <div class="m-0 row justify-content-center">
                <div class="col-auto text-center">
                    <h1 class="display-4">App with Mapbox-gl and Nominatim</h1>
                </div>
            </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="control-label">País</label>
                        <select class="form-control" name="country" id="country">
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">Provincia</label>
                        <select class="form-control" name="province" id="province">
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">Departamento</label>
                        <select class="form-control" name="department" id="department">
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">Localidad</label>
                        <select class="form-control" name="city" id="city">
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Calle</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span><input placeholder="Calle"
                                    id="street" name="street" type="text" class="form-control"
                                    value="{{ request()->get('street') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Altura</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span><input placeholder="Altura"
                                    id="number" name="number" type="number" class="form-control"
                                    value="{{ request()->input('number') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Dpto</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span><input placeholder="Dpto"
                                    id="dpto" name="dpto" type="text" class="form-control"
                                    value="{{ request()->input('dpto') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Latitud</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span><input placeholder="Latitud"
                                    id="lat" name="lat" type="text" class="form-control"
                                    value="{{ request()->input('lat') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Longitud</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span><input placeholder="Longitud"
                                    id="lon" name="lon" type="text" class="form-control"
                                    value="{{ request()->input('lon') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <label>&nbsp;</label>
                    <div id="map"></div>
                    <pre id="coordinates" class="coordinates"></pre>
                </div>
            </div>
        </div>
    </div>
</body>
@routes
<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('mapboxgl/mapbox-gl.js') }}" type="text/javascript"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">
<script>
    $.ajax({
        type: "get",
        url: route('countries.index'),
        success: function(res) {
            if (res.data) {
                $("#province").empty().append('< value="">-- Seleccionar provincia --</option>');
                $("#department").empty().append('< value="">-- Seleccionar departamento --</option>');
                $("#city").empty().append('< value="">-- Seleccionar ciudad --</option>');
                $("#country").append('< value="">-- Seleccionar país --</option>');
                $.each(res.data, function(key, value) {
                    $("#country").append(`<option value="${value.id}">${value.name}</option>`);
                });
                $('#country').val('')
            }
        }
    });
</script>

<script>

    mapboxgl.accessToken = 'pk.eyJ1IjoicnViZW5tb3YiLCJhIjoiY2tqMGN1Nnk3MGZ3NDJycGh2eWJ4NW5ubSJ9.ac6ojU1TR6GcYSPfV_F0WQ';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-54.6922327,-27.042191],
        zoom: 6
    });

    var canvas = map.getCanvasContainer();

    var coordinates = document.getElementById('coordinates');

    $("#country").select2({
        placeholder: "-- Seleccionar país --",
        allowClear: true,
        language: { noResults: () => "Sin resultados"},
        theme: 'bootstrap4',
    });
    $("#province").select2({
        placeholder: "-- Seleccionar provincia --",
        language: { noResults: () => "Sin resultados"},
        theme: 'bootstrap4',
        allowClear: true
    });
    $("#department").select2({
        placeholder: "-- Seleccionar departamento --",
        language: { noResults: () => "Sin resultados"},
        theme: 'bootstrap4',
        allowClear: true
    });
    $("#city").select2({
        placeholder: "-- Seleccionar ciudad --",
        language: { noResults: () => "Sin resultados"},
        theme: 'bootstrap4',
        allowClear: true
    });

    /*  $.ajax({
         type:"get",
         url: route('countries'}),
         success:function(res)
         {
             $("#country").empty();
             $("#province").empty();
             $("#department").empty();
             $("#city").empty();
             $("#country").append('<option value="">-- Seleccionar país --</option>');
             $.each(res,function(key,value){
                 $("#provcountryince").append('<option value="'+value.id+'">'+value.name+'</option>');
             });
             $.ajax({
                 type:"get",
                 url: route('provinces', {id: country_id}),
                 success:function(res)
                 {
                     if(res)
                     {
                         $("#province").empty();
                         $("#department").empty();
                         $("#city").empty();
                         $("#province").append('<option value="">-- Seleccionar provincia --</option>');
                         $.each(res,function(key,value){
                             $("#province").append('<option value="'+value.id+'">'+value.name+'</option>');
                         });
                         $('#province').val(province_id)
                         if(province_id!== null){
                             $.ajax({
                                 type:"get",
                                 url: route('cities', {id: province_id}),
                                 success:function(res)
                                 {
                                     if(res)
                                     {
                                         $("#department").empty();
                                         $("#city").empty();
                                         $("#department").append('<option value="">-- Seleccionar departamento --</option>');
                                         $.each(res,function(key,value){
                                             $("#department").append('<option value="'+value.id+'">'+value.name+'</option>');
                                         });
                                         $('#department').val(department_id)
                                         if(department_id!== null){
                                             $.ajax({
                                                 type:"get",
                                                 url: route('citys', {id: department_id}),
                                                 success:function(res)
                                                 {
                                                     if(res)
                                                     {
                                                         $("#city").empty();
                                                         $("#city").append('<option value="">-- Seleccionar localidad --</option>');
                                                         $.each(res,function(key,value){
                                                             $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
                                                         });
                                                         if(city_id!=null){
                                                             $('#city').val(city_id)
                                                         }

                                                     }
                                                 }
                                             });
                                         }
                                     }
                                 }
                             });
                         }
                     }
                 }
             });
         }
     }); */

    $('#country').on('change', function() {
        console.log($(this).val());
        const country = $(this).val();
        $.ajax({
            type: "get",
            url: route('countries.provinces.index', [country]),
            success: function(res) {
                $("#province").empty();
                $("#department").empty();
                $("#city").empty();
                $("#province").append('< value="">-- Seleccionar provincia --</option>');
                $.each(res.data, function(key, value) {
                    $("#province").append(`<option value="${value.id}">${value.name}</option>`);
                });
                $('#province').val('')
            }
        });
    });

    $('#province').change(function() {
        const province = $(this).val();
        const country = $('#country').val();
        $.ajax({
            type: "get",
            url: route('countries.provinces.departments.index', [country, province]),
            success: function(res) {
                $("#department").empty();
                $("#city").empty();
                $("#department").append(
                    '<option value="">-- Seleccionar departamento --</option>');
                $.each(res.data, function(key, value) {
                    $("#department").append(`<option value="${value.id}">${value.name}</option>`);
                });
                $('#department').val('')
            }
        });
    });

    $('#department').change(function() {
        const department = $(this).val();
        const province = $('#province').val();
        const country = $('#country').val();
        changeMap();
        $.ajax({
            type: "get",
            url: route('countries.provinces.departments.cities.index', [country, province, department]),
            success: function(res) {
                $("#city").empty();
                $("#city").append('<option value="">-- Seleccionar localidad --</option>');
                $.each(res.data, function(key, value) {
                    $("#city").append(`<option value="${value.id}">${value.name}</option>`);
                });
                $('#city').val('')

            }
        });
    });

    $('#city').change(function() {
        changeMap();
    });


    $('#street').change(function(){
       let street =  $(this).val();
        if(street.length > 3){
            changeMap();
        }
    })

    $('#number').change(function(){
       let number =  $(this).val();
        if(number.length > 0){
            changeMap();
        }
    })

    const onMove = (e) => {
        var coords = e.lngLat;

        // Set a UI indicator for dragging.
        canvas.style.cursor = 'grabbing';

        // Update the Point feature in `geojson` coordinates
        // and call setData to the source layer `point` on it.
        geojson.features[0].geometry.coordinates = [coords.lng, coords.lat];
        $('#lon').val(coords.lng);
        $('#lat').val(coords.lat);
        map.getSource('point').setData(geojson);
    }

    const onUp = (e) => {
        /* var coords = e.lngLat;

        // Print the coordinates of where the point had
        // finished being dragged to on the map.
        coordinates.style.display = 'block';
        coordinates.innerHTML =
            'Longitude: ' + coords.lng + '<br />Latitude: ' + coords.lat; */
        canvas.style.cursor = '';

        // Unbind mouse/touch events
        map.off('mousemove', onMove);
        map.off('touchmove', onMove);
    }

    const removeMapLayer = () => {
        if (map.getLayer('point')){
            map.removeLayer('point');
        }

        if (map.getSource('point')){
            map.removeSource('point');
        }
    }

    map.addControl(new mapboxgl.NavigationControl());

    const changeMap = () =>{

        const country = $("#country option:selected").text();
        const province = $("#province option:selected").val() !==  "" ? $("#province option:selected").text(): "";
        const department = $("#department option:selected").val() !==  "" ? $("#department option:selected").text(): "";
        const city = $("#city option:selected").val() !==  "" ? $("#city option:selected").text(): department;
        const street = $("#number").val().length > 0 ? ("#street").val() + " " +  $("#number").val() : $("#street").val();

        $.ajax({
                type: "get",
                url:  `https://nominatim.openstreetmap.org/?format=json&street=${street}&city=${city}&state=${province}&country=Argentina`,
                success: function(res) {

                   /*  if(!res.length || res[0].lat === undefined){
                        coordinates.style.display = 'block';
                        coordinates.innerHTML =  'No se encuentra coordenada para la localidad seleccionada';
                        canvas.style.cursor = '';
                        return;
                    } */

                    let latitude = res[0].lat;
                    let longitude = res[0].lon;

                    removeMapLayer();

                    geojson = {
                        'type': 'FeatureCollection',
                        'features': [{
                            'type': 'Feature',
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [longitude,latitude]
                            }
                        }]
                    };

                    map.addSource('point', {
                        'type': 'geojson',
                        'data': geojson
                    });

                    map.addLayer({
                        'id': 'point',
                        'type': 'circle',
                        'source': 'point',
                        'paint': {
                            'circle-radius': 10,
                            'circle-color': '#3887be'
                        }
                    });

                    // Set a UI indicator for dragging.
                    canvas.style.cursor = 'grabbing';

                    // Update the Point feature in `geojson` coordinates
                    // and call setData to the source layer `point` on it.
                    geojson.features[0].geometry.coordinates = [longitude, latitude];
                    $('#lon').val(longitude);
                    $('#lat').val(latitude);
                    map.getSource('point').setData(geojson);
                    map.flyTo({
                        center: geojson.features[0].geometry.coordinates,
                        speed: 0.5,
                        zoom:15
                        });
                    map.on('mouseenter', 'point', function() {
                        map.setPaintProperty('point', 'circle-color', '#3bb2d0');
                        canvas.style.cursor = 'move';
                    });

                    map.on('mouseleave', 'point', function() {
                        map.setPaintProperty('point', 'circle-color', '#3887be');
                        canvas.style.cursor = '';
                    });

                    map.on('mousedown', 'point', function(e) {
                        // Prevent the default map drag behavior.
                        e.preventDefault();

                        canvas.style.cursor = 'grab';

                        map.on('mousemove', onMove);
                        map.once('mouseup', onUp);
                    });

                    map.on('touchstart', 'point', function(e) {
                        if (e.points.length !== 1) return;

                        // Prevent the default map drag behavior.
                        e.preventDefault();

                        map.on('touchmove', onMove);
                        map.once('touchend', onUp);
                    });
                }
        });
    }

</script>

</html>
