<!DOCTYPE html>
<html>

<head>
    <title>COFFE SHOP sekitaran Pelaihari</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                <h1>Coffe Shop Pelaihari Map</h1>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col text-center">
                <a href="<?php echo base_url('Cafe/input') ?>" class="btn btn-success">Tambah Cafe</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="map"></div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus Cafe ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="#" id="confirmDelete" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        // Initialize the map
        var map = L.map('map').setView([-3.7932, 114.7206], 13); // Set the view to Pelaihari coordinates

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

       // Fetch data from the server
fetch('<?php echo base_url('Cafe/getData'); ?>')
    .then(response => response.json())
    .then(data => {
        data.forEach(function(cafe) {
            // Create a marker for each Cafe
            var marker = L.marker([cafe.latitude, cafe.longitude]).addTo(map);

            // Create popup content
            var popupContent =
                `<b>${cafe.nama}</b><br>${cafe.deskripsi}<br>Harga Mulai: ${cafe.harga}<br>Alamat: ${cafe.alamat}<br><br>`;

            popupContent +=
                `<a href="<?php echo base_url('Cafe/edit/'); ?>${cafe.id}" class="btn btn-sm btn-warning">Ubah</a>&nbsp;&nbsp;`;
            popupContent +=
                `<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="${cafe.id}">Hapus</button>`;

            // Add a popup to the marker
            marker.bindPopup(popupContent);
        });
    })
    .catch(error => console.error('Error fetching data:', error));

        // Draw a circle around Pelaihari
        var circle = L.circle([-3.8001190, 114.770], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.3,
            radius: 5000 // in meters
        }).addTo(map);

        circle.bindPopup("<b>Area Sekitar Pelaihari</b>");

        // Set up delete confirmation modal
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var id = button.getAttribute('data-id'); // Extract info from data-* attributes
            var confirmDelete = deleteModal.querySelector('#confirmDelete');
            confirmDelete.href = `<?php echo base_url('Cafe/AksiDelete/'); ?>${id}`;
        });
    </script>
</body>

</html>
