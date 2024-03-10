<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Buku</title>
</head>
<body>
    <div class="container">
        <p class="judul">Edit Buku</p>
        <form action="{{ route('databuku.update',$buku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="nama_lengkap">Judul </label>
            <input type="text" name="judul" value="{{ $buku->judul }}" placeholder="Masukan Judul Buku"><br>

            <label for="nama_lengkap">Penulis</label>
            <input type="text" name="penulis" value="{{ $buku->penulis }}" placeholder="Masukan Penulis Buku"><br>

            <label for="nama_lengkap">Stock</label>
            <input type="number" name="stock" value="{{ $buku->stock }}" placeholder="Masukan Stock buku"><br>

            <label for="nama_lengkap">Cover Buku</label>
            <input type="file" name="cover" value="{{ $buku->cover }}" ><br>
            
            <label for="nama_lengkap">Tahun Terbit</label>
            <input type="date" value="{{ $buku->tahun_terbit }}" name="tahun_terbit"><br>
            
            <button type="submit">Submit</button>
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
input[type="file"],
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
    background-color: #321ED5;
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

select{
    width: 402px;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #B9B9BF;
    border-radius: 4px;
    font-size: 14px;
    font-family: poppins;
}

</style>
