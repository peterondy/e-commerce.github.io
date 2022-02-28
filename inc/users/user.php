<?php
include '../conn/connect.php';


	$stmt = $con->prepare("SELECT * FROM users WHERE ID = ?");
	$stmt->execute(array($_GET['id']));
	$row = $stmt->fetch();






$user = array(
	"fullName" => $row['fullName'],
	"userName" => $row['userName'],
	"password" => $row['password'],
	"email"    => $row['email'],
	"language" => $row['language'],
	"status"   => $row['status']
);

$dashboard = array(
	"h1" => "dlckv,dokfv,dpkfv,dkf,vkd"
);