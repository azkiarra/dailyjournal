<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['pass']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
            color: #333;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 100%;
            animation: fadeIn 1.5s ease-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        h1 {
            font-size: 2.2rem;
            color: #007acc;
            margin-bottom: 25px;
            font-weight: bold;
        }
        .input-container {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #007acc;
            box-shadow: 0 0 5px rgba(0, 122, 204, 0.5);
        }
        input[type="submit"] {
            background: linear-gradient(90deg, #66a6ff, #89f7fe);
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s, transform 0.2s;
        }
        input[type="submit"]:hover {
            background: linear-gradient(90deg, #89f7fe, #66a6ff);
            transform: translateY(-2px);
        }
        p {
            margin-top: 15px;
            font-size: 0.9rem;
            color: #e74c3c;
        }
        .success {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 1rem;
            font-weight: bold;
            color: #27ae60;
        }
    </style>
</head>
<body>
    <?php
    $username = "admin";
    $password = "12345";

    ?>

    <div class="container">
        <h1>Operator</h1>
        <form method="post">
            <div class="input-container">
                <input type="text" name="user" placeholder="Enter Username" required>
                <input type="password" name="pass" placeholder="Enter Password" required>
            </div>
            <input type="submit" value="Login">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputUser = $_POST['user'] ?? '';
            $inputPass = $_POST['pass'] ?? '';

            if ($inputUser === $username && $inputPass === $password) {
                echo "<p style='color: green;'>Login berhasil! Mengarahkan...</p>";
                header("Refresh: 2; url=uts.html");
                exit();
            } else {
                echo "<p>Username atau Password tidak cocok.</p>";
            }
        }
        ?>
    </div>
</body>
</html>


<?php
}
?>