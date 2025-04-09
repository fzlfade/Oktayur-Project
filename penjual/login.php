<?php
include "koneksi.php";  // Pastikan file koneksi sudah benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan email
    $query = "SELECT * FROM penjual WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Ambil data user dari query
        $user = mysqli_fetch_assoc($result);

        // Cek apakah password cocok dengan yang ada di database
        if (password_verify($password, $user['password'])) {
            // Jika login sukses, redirect ke dashboard atau halaman lain
            echo "<script>
                    alert('Login berhasil! Selamat datang.');
                    window.location.href = 'penjual/dashboard.html';  // Arahkan ke halaman dashboard
                  </script>";
        } else {
            // Jika password salah, tampilkan popup
            echo "<script>
                    alert('Password salah!');
                    window.location.href = 'penjual/login.html';  // Arahkan kembali ke halaman login
                  </script>";
        }
    } else {
        // Jika email tidak ditemukan
        echo "<script>
                alert('Email tidak terdaftar!');
                window.location.href = 'penjual/login.html';  // Arahkan kembali ke halaman login
              </script>";
    }
}
?>
