<!DOCTYPE html>
<html>

<head>
    <title>Tambah Cafe</title>
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
            max-width: 600px;
            margin-top: 50px;
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
        <h1 class="text-center">Tambah Cafe</h1>
        <form action="<?php echo base_url('Cafe/AksiTambah') ?>" method="post">
            <!-- Hidden ID field -->
            <input type="hidden" id="id" name="id" value="">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" required>
                <?php echo form_error('nama'); ?>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea id="deskripsi" class="form-control" name="deskripsi" rows="4" required><?php echo set_value('deskripsi'); ?></textarea>
                <?php echo form_error('deskripsi'); ?>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" id="harga" class="form-control" name="harga" value="<?php echo set_value('harga'); ?>" required>
                <?php echo form_error('harga'); ?>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" id="alamat" class="form-control" name="alamat" value="<?php echo set_value('alamat'); ?>" required>
                <?php echo form_error('alamat'); ?>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude:</label>
                <input type="text" id="latitude" class="form-control" name="latitude" value="<?php echo set_value('latitude'); ?>" required>
                <?php echo form_error('latitude'); ?>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude:</label>
                <input type="text" id="longitude" class="form-control" name="longitude" value="<?php echo set_value('longitude'); ?>" required>
                <?php echo form_error('longitude'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>

</html>
