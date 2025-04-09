<?php
include "koneksi.php";  // Pastikan sudah terkoneksi dengan database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama_toko = $_POST['nama_toko'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    // Cek apakah password dan re_password cocok
    if ($password !== $re_password) {
        echo "Password tidak cocok!";
        exit;
    }

    // Cek apakah email sudah ada di database
    $cek = mysqli_query($conn, "SELECT * FROM penjual WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "Email sudah digunakan!";
        exit;
    }

    // Hash password untuk keamanan
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memasukkan data ke database
    $query = "INSERT INTO penjual (nama_toko, email, password) VALUES ('$nama_toko', '$email', '$hash')";
    if (mysqli_query($conn, $query)) {
        // Menampilkan popup sukses jika registrasi berhasil
        echo "<script>
                alert('Registrasi berhasil! Silakan login.');
                window.location.href = 'penjual/login.html';  // Arahkan pengguna ke halaman login
              </script>";
    } else {
        echo "Gagal daftar: " . mysqli_error($conn);
    }
}
?>
