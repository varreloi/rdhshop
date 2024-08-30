<?php
session_start();
//hancurin $_SESSION["pelanggam]
session_destroy();

echo "<script>alert('keluar juga lu goblok!');</script>";
echo "<script>location='index.php';</script>";
?>
