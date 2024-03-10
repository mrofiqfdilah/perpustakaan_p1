<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pinjam Buku Page</title>
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <div class="container">
        <p class="judul">Pinjam Buku</p>
        <form action="{{ route('pinjam') }}" method="POST">
            @csrf
            <input type="hidden" name="id_buku" value="{{ $buku->id }}">
            <input type="hidden" name="id_users" value="{{ Auth()->User()->id }}">
            <label for="nama_lengkap">Buku Dipinjam </label>
            <input type="text" disable  value="{{ $buku->judul }}"><br>

            <label for="username">Nama Anda</label>
            <input type="text" disabled value="{{ Auth()->User()->nama_lengkap }}"><br>

            <label for="username">Jumlah Pinjam</label>
            <input type="number"  name="total_pinjam" placeholder="Total meminjam  buku"><br>

            <label for="email">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" placeholder="Masukan email anda"><br>

            <label for="email">Tanggal Mengembalikan</label>
            <input type="date" name="tgl_kembali" placeholder="Masukan email anda"><br>

            <button type="submit">Pinjam Sekarang</button>
        </form>
    </div>
</body>
</html>
<style>
    body {
    font-family: Poppins;
    background-color: #F3F4F6;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #FFFFFF;
    padding: 20px;
    border-radius: 8px;
  
    box-shadow: 0  5px 10px rgba(0, 0, 0, 0.1);
    width: 400px;
}

form {
    margin-top: 20px; /* Add some space between title and form */
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="date"],
input[type="number"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #B9B9BF;
    border-radius: 4px;
   
   
    font-size: 14px;
    font-family: poppins;
   
}

input[type="text"]::placeholder,
input[type="email"]::placeholder,
input[type="password"]::placeholder {
   
    font-family: poppins;
    letter-spacing: 1px;
}

label {
    
    letter-spacing: 0.5px;
    font-size: 14px;
    margin-bottom: 5px;
    display: block;
}

button[type="submit"] {
    background-color: #1D2535;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 20px;
    width: 100%;
    font-family: poppins;
    letter-spacing: 0.5px;

}

.judul {
    color: #222222;
    letter-spacing: 0.5px;
    text-align: left;
    font-size: 20px;
    font-weight: 600;
    margin: 0; /* Remove default margins */
}
.sudah{
    color: #5B5A5B;
    position: relative;
    top: 10px;
}
.silahkan {
    color: #1C2632;
    text-decoration: none;
    font-weight: 600;
}

</style>
