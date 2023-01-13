<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data petugas dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		$_SESSION['id_admin'] = $data['id_admin'];
		// alihkan ke halaman dashboard admin
		header("location:dashboard.php");

	// cek jika user login sebagai petugas
	}

	
}else{

		// alihkan ke halaman login kembali
		?>
		<script type="text/javascript">
			alert ('Username atau Password Tidak ditemukan');
			window.location="login_admin.php";
		</script>
}



<?php
}
?>
