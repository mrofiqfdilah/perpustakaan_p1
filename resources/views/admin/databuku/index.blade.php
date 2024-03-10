<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard | Data Buku</title>
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">Dashboard</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="{{ route('datauser.index') }}"  >
            <i class='bx bxs-user'></i>
            <span class="links_name">Data User</span>
          </a>
        </li>
        <li>
          <a href="{{ route('databuku.index') }}"  class="active" >
            <i class="bx bx-book" style=" color: #fff;"></i>
            <span class="links_name" style=" color: #fff;">Data Buku</span>
          </a>
        </li>
        <li>
          <a href="{{ route('datakategori.index') }}">
            <i class='bx bxs-category'></i>
            <span class="links_name">Data Kategori</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class='bx bxs-user-detail'></i>
            <span class="links_name">Data Peminjaman</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
          <form action="" method="GET" style="height: 50px;">
            <input type="text" name="search" placeholder="Search..." />
            <i class="bx bx-search"></i>
          </form>
        </div>
        <div class="profile-details">
          <img src="image/profile.jpg" alt="" />
          <span class="admin_name">Administrator</span>
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>
      <div class="main">
        <div class="text">
          <p class="judul">Data Buku</p>
        <p class="deskripsi">
            Tabel yang menampilkan data buku yang telah didaftarkan
            di perpustakaan, sebagai admin Anda dapat menambah data, menghapus data, mengedit
             data dan juga dapat mencari data.</p>
      </div>
     
        <button class="btn-tambah"><a href="{{ route('databuku.create') }}">Tambah Data</a></button>
        <table class="content-table">
          <thead>
            <tr>
              <th style="text-align: center;">No</th>
              <th style="text-align: center;">Judul Buku</th>
              <th style="text-align: center;">Penulis</th>
              <th style="text-align: center;">Stock</th>
              <th style="text-align: center;">Cover</th>
              <th style="text-align: center;">Tahun Terbit</th>
              <th style="text-align: center;">Actions</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($buku as $no => $item )
            <tr>
              <td style="text-align: center;">{{ $no + 1 }}</td>
              <td style="text-align: center;">{{ $item->judul }}</td>
              <td style="text-align: center;">{{ $item->penulis }}</td>
              <td style="text-align: center;">{{ $item->stock }}</td>
              <td style="text-align: center; cursor: pointer; color:blue; text-decoration:underline;" data-cover="{{ $item->cover}}" class="open-modal">See Cover</td>
              <td style="text-align: center;">{{ $item->tahun_terbit }}</td>
              <td>
                <div style="display: flex; position: relative; left:10px;">
                <a href="{{ route('databuku.edit',$item->id) }}"><i style="font-size:25px; color:#74E291;" class="ri-pencil-fill"></i></a>
                <form action="{{ route('databuku.destroy', $item->id) }}"  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="border: none;"><a href=""><i style="font-size:25px; color:#D04848;" class="ri-delete-bin-fill"></i></a></button>
                </form>
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
        </div>
      </div>
    </section>
    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>


<div id="myModal" class="modal">
  <span class="close" onclick="closeModal()">&times;</span>
  <img id="img01" class="modal-content" alt="">
  <div id="caption"></div>
</div>
<script>
  // Dapatkan semua elemen td dengan class open-modal dan atur event listener saat diklik
  var tds = document.querySelectorAll('.open-modal');
  tds.forEach(function (td) {
      td.onclick = function () {
          var modal = document.getElementById("myModal");
          var modalImg = document.getElementById("img01");
          var captionText = document.getElementById("caption");

          modal.style.display = "block";
          modalImg.src = this.getAttribute('data-cover'); // Gunakan data-cover sebagai atribut yang benar
          captionText.innerHTML = "";
      };
  });

  // Fungsi untuk menutup modal
  function closeModal() {
      var modal = document.getElementById("myModal");
      modal.style.display = "none";
  }
</script>
<style>
#myImg {
border-radius: 5px;
cursor: pointer;
transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 9999; /* Sit on top */
padding-top: 100px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: hidden;
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
margin: auto;
display: block;
width: 40%;
max-width: 300px;
}

/* Caption of Modal Image */
#caption {
margin: auto;
display: block;
width: 40%;
max-width: 700px;
text-align: center;
color: #ccc;
padding: 10px 0;
height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
-webkit-animation-name: zoom;
-webkit-animation-duration: 0.6s;
animation-name: zoom;
animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
from {-webkit-transform:scale(0)} 
to {-webkit-transform:scale(1)}
}

@keyframes zoom {
from {transform:scale(0)} 
to {transform:scale(1)}
}

/* The Close Button */
.close {
position: absolute;
top: 15px;
right: 35px;
color: #f1f1f1;
font-size: 40px;
font-weight: bold;
transition: 0.3s;
}

.close:hover,
.close:focus {
color: #bbb;
text-decoration: none;
cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
.modal-content {
width: 100%;
}
}
</style>

  </body>
</html>


