<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard | Data User</title>
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
          <a href="" class="active" >
            <i class='bx bxs-user' style=" color: #fff;"></i>
            <span class="links_name" style=" color: #fff;">Data User </span>
          </a>
        </li>
        <li>
          <a href="{{ route('databuku.index') }}" >
            <i class="bx bx-book"></i>
            <span class="links_name">Data Buku</span>
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
          <p class="judul">Data Users</p>
        <p class="deskripsi">
            Tabel yang menampilkan data pengguna yang telah mendaftar. Sebagai admin Anda bisa
            menambah data, menghapus data, mengedit data dan juga bisa mencari data.
          </p>
      </div>
     
        <button class="btn-tambah"><a href="{{ route('datauser.create') }}">Tambah Data</a></button>
        <table class="content-table">
          <thead>
            <tr>
              <th style="text-align: center;">No</th>
              <th style="text-align: center;">Nama Lengkap</th>
              <th style="text-align: center;">Username</th>
              <th style="text-align: center;">Email</th>
              <th style="text-align: center;">Level</th>
              <th style="text-align: center;">Actions</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($user as $no => $item )
            <tr>
              <td style="text-align: center;">{{ $no + 1 }}</td>
              <td style="text-align: center;">{{ $item->nama_lengkap }}</td>
              <td style="text-align: center;">{{ $item->username }}</td>
              <td style="text-align: center;">{{ $item->email }}</td>
              <td style="text-align: center;">{{ $item->level }}</td>
              <td>
                <div style="display: flex; position: relative; left:15px;">
                <a href="{{ route('datauser.edit', $item->id) }}"><i style="font-size:25px; color:#74E291;" class="ri-pencil-fill"></i></a>
                <form action="{{ route('datauser.destroy', $item->id) }}"  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="border: none;"> <a href=""><i style="font-size:25px; color:#D04848;" class="ri-delete-bin-fill"></i></a></button>
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
  </body>
</html>
