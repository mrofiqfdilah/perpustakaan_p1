<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <div class="container">
        <p class="judul">Login Page</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
    
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Masukan email anda"><br>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Masukan password anda"><br>

            <button type="submit">Login Sekarang</button>
        </form>
        <p class="sudah">Belum mempunyai akun? <a href="{{ route('halaman_daftar') }}" class="silahkan">Register</a></p>
    </div>
</body>
</html>
