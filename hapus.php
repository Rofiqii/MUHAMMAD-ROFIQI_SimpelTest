<?php

session_start();
require './query.php';

$crud = new CRUD;
$id = $_GET['id'];

$crud->deleteData($id);
header("Location: home.php");
