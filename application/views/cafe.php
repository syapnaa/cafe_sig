<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coffee Shop Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row my-4">
            <div class="col text-center">
                <h1>Coffee Shop Pelaihari Map</h1>
            </div>
            <div class="col text-end">
                <a href="<?php echo base_url('login'); ?>" class="btn btn-primary">Login</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="map"></div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialize the map
        var map = L.map('map').setView([-3.7932, 114.7206], 13); // Set the view to Pelaihari coordinates

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Create a custom icon
        var cafeIcon = L.icon({
            iconUrl: '<?php echo base_url('/assets/gambar/caffe.jpg'); ?>', // Path to your image
            iconSize: [38, 38],
            iconAnchor: [22, 94],
            popupAnchor: [-3, -76]
        });

        // Fetch data from the server
        fetch('<?php echo base_url('Cafe/getData'); ?>')
            .then(response => response.json())
            .then(data => {
                data.forEach(function (cafe) {
                    // Create a marker for each Cafe using the custom icon
                    var marker = L.marker([cafe.latitude, cafe.longitude], { icon: cafeIcon }).addTo(map);

                    // Create popup content
                    var popupContent =
                        `<b>${cafe.nama}</b><br>${cafe.deskripsi}<br>Harga Mulai: ${cafe.harga}<br>Alamat: ${cafe.alamat}`;

                    // Add a popup to the marker
                    marker.bindPopup(popupContent);
                });
            })
            .catch(error => console.error('Error fetching data:', error));

           
        // Fetch and display polygon data
        fetch('<?php echo base_url('Poligon/getData'); ?>')
            .then(response => response.json())
            .then(data => {
                // Convert data to GeoJSON format
                var geojsonFeature = {
                    "type": "FeatureCollection",
                    "features": [{
                        "type": "Feature",
                        "properties": {},
                        "geometry": {
                            "type": "Polygon",
                            "coordinates": [
                                data.map(function (poli) {
                                    return [poli.longitude, poli.latitude];
                                })
                            ]
                        }
                    }]
                };

                // Add the polygon to the map
                L.geoJSON(geojsonFeature, {
                    style: function (feature) {
                        return {
                            color: 'blue',
                            fillColor: '#f03',
                            fillOpacity: 0.3
                        };
                    },
                    onEachFeature: function (feature, layer) {
                        layer.bindPopup('Kecamatan Pelaihari');
                    }
                }).addTo(map);
            })
            .catch(error => console.error('Error fetching data:', error));

    </script>
</body>
</html>
