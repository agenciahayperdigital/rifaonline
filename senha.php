<?php
// Define a senha a ser criptografada
$senha = '123456';

// Cria o hash usando o algoritmo de Blowfish
$hash = password_hash($senha, PASSWORD_BCRYPT);

// Exibe a senha original e o hash gerado
echo "Senha original: $senha\n";
echo "Hash criptografado: $hash\n";
?>
