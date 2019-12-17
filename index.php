<?php 
// digunakan untuk menjalankan session dari awal
if (!session_id()) session_start();


require_once'app/init.php';

$app=new App;