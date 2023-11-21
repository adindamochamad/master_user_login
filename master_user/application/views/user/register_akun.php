<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/stylelogin.css'); ?>">

<body>
    <div class="container">
        <h1>Register Account</h1>
        <form action="<?= base_url("mastercontroller/registered_akun") ?>" method="POST">
            <div>
                <label>Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username Baru Anda">
                <?= form_error('username', '<div class="text-danger">', '</div>'); ?>
            </div>

            <div>
                <label>Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password Baru Anda">
                <?= form_error('password', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="alert-flashdata-registered"><?= $this->session->flashdata('flashdata');?></div>
            <button class="click_login_button_registered_akun" type="submit">Daftar</button>
            <a href="<?= base_url('mastercontroller/index') ?>" class="register_akun_button">Sudah punya Akun? Login</a>
        </form>
    </div>

</body>

</html>