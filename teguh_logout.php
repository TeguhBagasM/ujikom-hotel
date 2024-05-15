<?php

session_start();

session_destroy();

echo "<script>
    alert('Logout Berhasil');
    document.location.href = 'teguh_login.php';
    </script>";