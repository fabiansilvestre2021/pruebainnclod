<?php

require_once 'laravelre4stapi/vendor/autoload.php';
require_once 'laravelre4stapi/bootstrap/app.php';

use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Obtener los valores del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Validar las credenciales ingresadas por el usuario
if (Auth::attempt(['email' => $email, 'password' => $password])) {
    // Autenticación exitosa, redirigir a dashboard.php
    header('Location: dashboard.php');
    exit();
} else {
    // Autenticación fallida, redirigir a index.html
    header('Location: index.html');
    exit();
}
?> exit();
}
?>