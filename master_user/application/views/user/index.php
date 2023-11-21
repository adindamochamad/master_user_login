<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
</head>

<body>
    <div class="top-bar">
        <?php foreach ($datasession as $data_sess) : ?>
            <div class="session-pengguna">
                Dashboard <?php echo $data_sess->username ?>
            </div>
        <?php endforeach ?>
        <div class="logout-button">
            <a href="<?= base_url('mastercontroller/logout') ?>">LOGOUT</a>
        </div>
    </div>

    <h1>Master User</h1>
    <div class="add-button">
        <a href="<?= base_url('mastercontroller/add_data') ?>">Tambah Siswa</a>
    </div>
    <div class="flashdata-alert">
        <?= $this->session->flashdata('flashdata'); ?>
    </div>

    <div class=" data-tabel">
        <table class="tabel_data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($datauser as $data) : ?>
                <tbody>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data->nama ?></td>
                        <td><?php echo $data->umur ?></td>
                        <td><?php echo $data->alamat ?></td>
                        <td><?php echo $data->tanggal_lahir ?></td>
                        <td>
                            <a href="<?= base_url('mastercontroller/edit_data/' . $data->id) ?>" class="edit-button">Edit</a>
                            <a href="<?= base_url('mastercontroller/delete_data/' . $data->id) ?>" class="delete-button" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>