<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: auth/login.php");
    exit;
} else {
    header("Location: dashboard");
    echo "
    <script>
        alert('data berhasil ditambah');
    </script>
";
}
