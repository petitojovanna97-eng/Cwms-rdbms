<?php

include '../model/server.php';

session_start();
session_unset();
session_destroy();

header('location:../page/Authentication.php');

?>