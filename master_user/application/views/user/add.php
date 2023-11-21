<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
</head>

<body>
    <h1>Add Data User</h1>
    <form action="<?= base_url("mastercontroller/add_action") ?>" method="POST">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
            <?= form_error('nama', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Umur</label>
            <input type="text" name="umur" class="form-control">
            <?= form_error('umur', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
            <?= form_error('alamat', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
            <?= form_error('tanggal_lahir', '<div class="text-danger">', '</div>'); ?>
        </div>
        <button type="submit" class="submit-button">Submit</button>
        <button type="reset" class="reset-button">Reset</button>
        <a href="<?= base_url('mastercontroller/dashboard')?>" type="kembali" class="kembali-button">Kembali</a>
    </form>

</body>

</html>