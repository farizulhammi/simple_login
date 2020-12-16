<?php
//error_reporting(0);
//Agar Deafult Waktu Menjadi Asia/Jakarta
date_default_timezone_set("Asia/Jakarta");

$base_url = "http://localhost/simple_login/";


//host
$host = "localhost";

//username database
$dbuser = "root";

//password database
$dbpass = "";

//nama database
$dbname = "simple_login";

//Melakukan Koneksi ke Database
$koneksi = mysqli_connect($host, $dbuser, $dbpass, $dbname);

//Mengecek apakah koneksi berhasil atau tidak
if (mysqli_connect_errno()) {
    //menampilkan pesan gagal
    echo "GAGAL DI SEBABKAN ".mysqli_connect_error();
}

// function untuk keamanan 
function protek($input) {
    global $koneksi;
    $result = mysqli_real_escape_string($koneksi,stripslashes(strip_tags(htmlspecialchars($input,ENT_QUOTES))));
    return $result;
    } 

//validasi saat login
function validasi($user,$pass){
    global $koneksi;
    global $base_url;
    //mengecek apakah user dan pass terisi
    if (empty($user) OR empty($pass)) {
    
      $_SESSION['respon'] = [
          "title" => "Gagal",
          "isi"   => "Harap isi Username Dan Password",
          "type"  => "error"
      ];

    }
    else{
      $qry = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user'");
      $cek = mysqli_num_rows($qry);

      //mengecek apakah data username ada atau tdak
      if ($cek == 1) {

        $data = mysqli_fetch_array($qry);

        //mengecek apakah password sesuai dengan hash password
        if (password_verify($pass, $data['password'])) {
            unset($_SESSION['respon']);

            //mengambil tanggal & waktu saat ini
            $l_g = date("Y-m-d H:i:s");

            $_SESSION['username'] = $user;

            //menyimpan data user dalam bentuk array di session
            $_SESSION['data'] = [

                "nama" => $data['nama'],
                "lastlogin" => $data['last_login']
            ];

           //meng update last_login
            mysqli_query($koneksi, "UPDATE users SET last_login='$l_g' WHERE username='$user' ");

            header("Location: $base_url");
        }

      }else{

        $_SESSION['respon'] = [
            "title" => "Gagal",
            "isi"   => "Username Atau Password Salah",
            "type"  => "error"
        ];

      }
     
    }
}