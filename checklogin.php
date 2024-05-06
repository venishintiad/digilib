<?php
session_start();
include("config/MySQL.php");
include("config/functions.php");

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $data = new MySQL();
	$data->connect();

	$stmt = $data->getDb()->prepare("SELECT kodePetugas, nama FROM tb_petugas WHERE username = ? AND password = ?");
	
	// Create separate variables for username and password
	$escapedUsername = $username;
	$hashedPassword = md5($password);
	
	if ($type == 1) {
		$stmt->bind_param("ss", $escapedUsername, $hashedPassword);
	} elseif ($type == 2) {
		$stmt = $data->getDb()->prepare("SELECT kodeDosen, nama FROM tb_dosen WHERE username = ? AND password = ?");
		$stmt->bind_param("ss", $escapedUsername, $hashedPassword);
	} elseif ($type == 3) {
		$stmt = $data->getDb()->prepare("SELECT kodeMhs, nama FROM tb_mahasiswa WHERE username = ? AND password = ?");
		$stmt->bind_param("ss", $escapedUsername, $hashedPassword);
	}
	
	$stmt->execute();
	$result = $stmt->get_result();
	$user = $result->fetch_array(MYSQLI_NUM);

    if($user) {
        $_SESSION["type"] = $type;
        $_SESSION["idUser"] = $user[0];
        $_SESSION["name"] = $user[1];
        redirect("index.php", "");
    } else {
        redirect("index.php", "Username atau Password salah!");
    }
}
?>
