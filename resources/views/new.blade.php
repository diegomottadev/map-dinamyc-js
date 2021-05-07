@extends('layouts.public')
@section('content')
<div class="row">
    <div class="col-md-6">
            <div class="row">
                <div id="error-validation-show" class="row   d-none">

                    <div id="error-validation" class="alert alert-danger">

                    </div>
                </div>
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
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">&nbsp;</label>
                    <button class="btn btn-block btn-primary" id="btn-save">Guardar</button>
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
@endsection
@push('scripts')

<script>

    $( document ).ready(function(){
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
            const street = $("#number").val().length > 0 ? $("#street").val() + " " +  $("#number").val() : $("#street").val();

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
                        if(res.length){


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
                    }
            });
        }
    })
    </script>
    <script>
        $( document ).ready(function(){
            $("#btn-save").click(function(){
                const address = {
                    country: $('#country').val()!== "" ? $('#country').val() : null,
                    province: $('#province').val()!== "" ? $('#province').val() : null,
                    department:$('#department').val()!== "" ? $('#department').val() : null,
                    city:$('#city').val()!== "" ? $('#city').val() : null,
                    street: $('#street').val() !== "" ? $('#street').val() : null,
                    floor: $('#floor').val()!== "" ? $('#floor').val() : null,
                    lat: $('#lat').val()!== "" ? $('#lat').val() : null,
                    lon: $('#lon').val()!== "" ? $('#lon').val() : null,
                    number: $('#number').val()!== "" ? $('#number').val() : null,
                }

                $.ajax({
                        type: "post",
                        url: route('addresses.store', address),
                        success: function(res) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Dirección guardada',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#error-validation-show').hasClass('d-none') ? "" : $('#error-validation-show').addClass('d-none') ;
                        },

                        error: function(err){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Faltan datos por ingresar',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#error-validation-show').removeClass('d-none');
                            console.log(err);
                            $.each(err.responseJSON.errors, function(key,value) {
                                $('#error-validation').append(`<li>${value}</li`);
                            });
                        }
                })
            })
        })
    </script>

    @endpush
