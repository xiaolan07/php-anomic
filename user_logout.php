<?php
require_once('utils/common.php');
session_start();
noMagicQuotes();

if (!empty($_SESSION['admin'])){
    $_SESSION['admin'] = null;
    $url = "http://localhost/proFinal/";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";

}
