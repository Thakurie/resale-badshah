<?php
session_start();
session_unset();
session_destroy();
header('location: ../../frontend/main/home.php');
