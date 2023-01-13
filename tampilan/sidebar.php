<?php 
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=belummasuk");
  }

  ?>
  <?php
  if($_SESSION['level']=="admin"){
  ?>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="img/avatar/avatar-1.png" class="rounded-circle mr-1">
            Halo <b><?php echo $_SESSION['username']; ?></b> Anda adalah <b><?php echo $_SESSION['level']; ?></b></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <img src="logo.png" width="70" height="70" rel="logo">
            <a>MY Kost</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a>MN</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li>
                <a href="dashboard.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Main Navigation</li>
              <li><a class="nav-link" href="kamar.php"><i class="fas fa-database"></i> <span>DATA KAMAR</span></a></li>
              <li><a class="nav-link" href="penghuni.php"><i class="fas fa-user-graduate"></i> <span>DATA PENGHUNI</span></a></li>
              <li><a class="nav-link" href="tagihan.php"><i class="fas fa-database"></i> <span>DATA TAGIHAN</span></a></li>
              <li><a class="nav-link" href="pembayaran.php"><i class="fas fa-money-check-alt"></i> <span>PEMBAYARAN</span></a></li>
              <li class="menu-header">Other</li>
              <li><a class="nav-link" href="akunpengguna.php"><i class="fas fa-user-edit"></i> <span>PENGGUNA SISTEM</span></a></li>
              <!-- <li class="menu-header">Fitur</li> -->
              
              
              <!-- <li><a class="nav-link" href="laporan.php"><i class="fas fa-book"></i> <span>LAPORAN</span></a></li> -->
        </aside>
      </div>
<?php 
}
 else if($_SESSION['level']=="penghuni"){
   ?>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="img/avatar/avatar-1.png" class="rounded-circle mr-1">
            Halo <b><?php echo $_SESSION['username']; ?></b> Anda adalah <b><?php echo $_SESSION['level']; ?></b></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <div class="sidebar-brand">
            <img src="logo.png" width="70" height="70" rel="logo">
            <a>MY KOST</a>
          </div>
          
          <ul class="sidebar-menu">
              <ul class="sidebar-menu">
              <li class="menu-header">Fitur</li>
              <li><a class="nav-link" href="biodata.php"><i class="fas fa-fire"></i> <span>BIODATA</span></a></li>
              <li><a class="nav-link" href="history2.php"><i class="fas fa-fire"></i> <span>HISTORY</span></a></li>
        </aside>
      </div>
     <?php
   }
      else {
       ?>
        <script type="text/javascript">
          alert ('Username atau Password Tidak ditemukan');
          window.location="login.php";
        </script>
      }

<?php
}
?>
