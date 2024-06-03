<?php

// Configurações do banco de dados
$dbHost = 'localhost';
$dbUsername = 'villa300_sorteio';
$dbPassword = '30091990Ba@';
$dbName = 'villa300_sorteio';

// Conexão com o banco de dados
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Variável para armazenar os IDs dos participantes atualizados
$updatedParticipants = array();

// Consulta para selecionar todos os dados da tabela participant
$sql = "SELECT id, numbers FROM participant";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Atualiza os números para cada registro
    while ($row = $result->fetch_assoc()) {
        $numbers = json_decode($row['numbers']);
        $updatedNumbers = array_map(function ($number) {
            // Completa o número com zeros à esquerda para ter 7 dígitos
            return str_pad($number, 7, '0', STR_PAD_LEFT);
        }, $numbers);

        // Verifica se os números foram alterados
        if ($updatedNumbers !== $numbers) {
            // Atualiza a coluna numbers no banco de dados
            $updatedNumbersJson = json_encode($updatedNumbers);
            $updateSql = "UPDATE participant SET numbers='$updatedNumbersJson' WHERE id=" . $row['id'];

            if ($conn->query($updateSql) === TRUE) {
                // Armazena o ID do participante atualizado
                $updatedParticipants[] = $row['id'];
            } else {
                echo "Erro ao atualizar dados: " . $conn->error;
            }
        }
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Exibe os IDs dos participantes atualizados
if (!empty($updatedParticipants)) {
    echo "Participantes atualizados ID: " . implode(", ", $updatedParticipants);
}

$conn->close();
?>
