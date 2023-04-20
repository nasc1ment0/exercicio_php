<?php
//logoff do site por destruições da session
session_start();

session_destroy();
header('Location: index.php');

?> 