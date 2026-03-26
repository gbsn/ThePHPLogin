<?php
// 1. Coleta de dados
$pNome  = $_POST['primeiroNome'] ?? '';
$uNome  = $_POST['ultimoNome'] ?? '';
$email  = $_POST['email'] ?? '';
$email2 = $_POST['email2'] ?? '';
$senha  = $_POST['senha'] ?? '';
$senha2 = $_POST['senha2'] ?? '';

/* // BLOCO DE TESTE (Descomente para verificar as variáveis)
echo "Dados Recebidos:<br>";
echo "Nome: $pNome $uNome<br>";
echo "Email: $email (Confirmação: $email2)<br>";
echo "Senha (Original): $senha<br>";
echo "Senha (MD5): " . md5($senha) . "<br>";
*/

// 2. Validação Lógica
if (empty($pNome) || empty($email) || empty($senha) || $email !== $email2 || $senha !== $senha2) {
    header("Refresh: 5; url=https://averagedev.gt.tc/phpLogin/register.html");
    echo "<h3>Erro nos dados. Verifique campos vazios ou senhas divergentes. Redirecionando...</h3>";
    exit();
}

$senhaHash = md5($senha);

// 3. Função de Conexão
function conectar() {
    try {
        $dsn = "mysql:host=sql300.infinityfree.com;dbname=if0_41364235_phploginteste;charset=utf8mb4";
        return new PDO($dsn, "if0_41364235", "KcKgTzW4HQ", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
}

// 4. Inserção e Redirecionamento
try {
    $db = conectar();

    $sqlInsert = "INSERT INTO registro (nome, sobrenome, email, senha) VALUES (:n, :s, :e, :p)";
    $stmtInsert = $db->prepare($sqlInsert);
    $stmtInsert->execute([':n' => $pNome, ':s' => $uNome, ':e' => $email, ':p' => $senhaHash]);

    // Verificação de persistência no banco
    $stmtCheck = $db->prepare("SELECT id FROM registro WHERE email = :email LIMIT 1");
    $stmtCheck->execute([':email' => $email]);

    if ($stmtCheck->rowCount() > 0) {
        // Redirecionamento imediato (Funciona apenas se o bloco de teste acima estiver comentado)
        header("Location: https://averagedev.gt.tc/phpLogin/login.html");
        exit();
    }

} catch (PDOException $e) {
    die("Erro no processamento: " . $e->getMessage());
}
?>