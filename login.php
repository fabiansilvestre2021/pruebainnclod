<?php
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar las credenciales de inicio de sesión (usuario y contraseña)
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar las credenciales contra la base de datos o cualquier otro método de autenticación
    // Aquí se puede implementar la lógica para verificar si el usuario y la contraseña son válidos

    // Ejemplo de verificación básica
    

    
    



    if ($username === 'admin' && $password === 'password') {
        // Inicio de sesión exitoso
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit();
    } else {
        // Credenciales inválidas
        $error = 'Usuario o contraseña incorrectos.';
    }
}


function login($email, $password) {
    $data = array(
        'email' => $email,
        'password' => $password
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $response = file_get_contents('http://localhost:8000/api/login/', false, $context);

    if ($response !== false) {
        $responseData = json_decode($response, true);
        return $responseData;
    } else {
        return null;
    }
}
?>