<?php
// Conectar ao banco de dados (substitua com suas configurações reais)
$host = "localhost";
$dbname = "sitedepublicidade";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Pegando os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        // Atualizando as informações no banco de dados
        // Aqui você precisaria de um identificador único do usuário (por exemplo, ID do usuário)
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Substitua ":id" pelo ID do usuário atual (geralmente vem da sessão do usuário)
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        // Supondo que você tenha uma variável de sessão com o ID do usuário:
        $stmt->bindParam(':id', $_SESSION['user_id']); // Usando o ID do usuário armazenado na sessão

        $stmt->execute();

        // Redireciona para a página da conta do usuário após salvar as alterações
        header("Location: minha-conta.html");
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
