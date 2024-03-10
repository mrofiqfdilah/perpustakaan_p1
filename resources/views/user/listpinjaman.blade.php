<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Pinjaman Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="font-family: poppins; background-color:#F3F4F6; overflow-x: hidden;">
    <nav style="height: 70px; box-shadow:0 5px 10px rgba(0,0,0,0.1);" class="navbar navbar-expand-lg  bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" style="font-size:20px; position: relative; left:70px; font-weight:600;">DigitaLibrary <i class="ri-book-line"></i></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left:600px; display:flex; letter-spacing:1px;">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ route('user.home') }}">Daftar Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Koleksi Pribadi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active"  style="font-weight: 600; href="{{ route('listpinjaman') }}">List Pinjaman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Akun Anda</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <section class="sec-1">
        <div class="hero">
      <p class="halo" style="font-size:25px; letter-spacing:1px; font-weight:500;">Buku dipinjam {{ Auth()->User()->nama_lengkap }}</p>
      </div>

      <div class="book-container">
        @foreach ($pinjamanUser as $pinjaman)
    <div class="book-item">
        <img src="{{ $pinjaman->buku->cover }}" alt="">
        <p style="letter-spacing:1px; color:#222222; font-weight:500; text-shadow: 0 5px 10px rgba(0,0,0,0.1); font-size:17px;">{{ $pinjaman->buku->judul }}</p>
        <button style="background-color: #222222; border: 2px solid #222222; letter-spacing:0.5px;"><a style="text-decoration: none; color:#ccc;" href="">Kembalikan</a></button>
       
    </div>
@endforeach

    </div>
    
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<style>
  .book-container {
    display: flex;
    flex-wrap: wrap;
    position: relative;
    left: 60px;
    top: 28px;
}

.book-item {
    width: 260px;
    margin: 10px;
    padding: 10px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: center;
}

.book-item img {
    width: 60%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 10px;
}

.book-item p {
    margin-bottom: 5px;
}

.book-item button {
    padding: 5px 10px;
    margin: 5px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.book-item button:hover {
    background-color: #0056b3;
}

    .halo{
        font-size: 20px;
        position: relative; 
        top: 10px;
    }
    .emoji{
       animation: wave 2s infinite;
    }
    .hero{
        position: relative;
        top: 30px;
         left:70px;
    }
    @keyframes wave {
0% { transform: rotate(0deg); }
25% { transform: rotate(20deg); }
50% { transform: rotate(0deg); }
}
  </style>