<!DOCTYPE html>
<html>

<head>
    <title>Edit Cafe</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 50px;
    }

    .card {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        margin-bottom: 20px;
    }

    .btn-primary {
        width: 100%;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card w-75">
                <div class="card-body">
                    <h1 class="text-center">Edit Cafe</h1>
                    <form action="<?php echo base_url('Cafe/AksiUpdate') ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $cafe->id; ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Cafe:</label>
                            <input type="text" id="nama" class="form-control" name="nama"
                                value="<?php echo set_value('nama', $cafe->nama); ?>" required>
                            <?php echo form_error('nama'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi:</label>
                            <textarea id="deskripsi" class="form-control" name="deskripsi" rows="3" required><?php echo set_value('deskripsi', $cafe->deskripsi); ?></textarea>
                            <?php echo form_error('deskripsi'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga:</label>
                            <input type="number" id="harga" class="form-control" name="harga"
                                value="<?php echo set_value('harga', $cafe->harga); ?>" required>
                            <?php echo form_error('harga'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <textarea id="alamat" class="form-control" name="alamat" rows="3" required><?php echo set_value('alamat', $cafe->alamat); ?></textarea>
                            <?php echo form_error('alamat'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude:</label>
                            <input type="text" id="latitude" class="form-control" name="latitude"
                                value="<?php echo set_value('latitude', $cafe->latitude); ?>" required>
                            <?php echo form_error('latitude'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude:</label>
                            <input type="text" id="longitude" class="form-control" name="longitude"
                                value="<?php echo set_value('longitude', $cafe->longitude); ?>" required>
                            <?php echo form_error('longitude'); ?>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update Data Cafe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
