<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/stylelogin.css'); ?>">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>

<body>
    <div class="container">
        <h1>Master User Login</h1>

        <form action="<?= base_url("mastercontroller/ceklogin") ?>" method="POST" class="form-login">
            <div>
                <label>Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username Anda">
            </div>

            <div>
                <label>Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password Anda">
            </div>

            <div class="alert-flashdata"><?= $this->session->flashdata('info');?></div>
            <button class="click_login_button" type="submit">Login</button>
            <a href="<?= base_url('mastercontroller/register_akun') ?>" class="register_akun_button">Register
                Account</a>
        </form>
    </div>

</body>

</html>