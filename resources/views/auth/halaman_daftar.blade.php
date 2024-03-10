<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register page</title>
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <div class="container">
        <p class="judul">Register Page</p>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="hidden" name="level">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" placeholder="Masukan nama lengkap anda"><br>

            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Masukan username anda""><br>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Masukan email anda""><br>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Buat password anda""><br>

            <button type="submit">Register Sekarang</button>
        </form>
        <p class="sudah">Sudah mempunyai akun? <a href="{{ route('halaman_login') }}" class="silahkan">Login</a></p>
    </div>
</body>
</html>
