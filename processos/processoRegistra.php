<?php
//Criado por Geraldo Neto - 23032026

//Recebendo Usuario via POST da página de Login
$email = $_POST['email'];

//Recebendo Senha via POST da página de Login
$senha = $_POST['senha'];

//Recebendo Senha via POST da página de Login
$senha2 = $_POST['senha2'];

//Verificando variáveis
print "Login: ".$email. " Senha: ".$senha. " Senha Comparação: ".$senha2;

// Função para validar as senhas
function validarSenhas($s1, $s2) {
    if ($s1 === $s2) {
        echo "<h3>Senhas Conferem!</h3>";
        return true;
    } else {
        echo "<h3>Erro: As senhas não são iguais.</h3>";
        return false;
    }
}

// Executando a validação antes de prosseguir
if (validarSenhas($senha, $senha2)) {
    // Aqui entrará o seu código de inserção no Banco de Dados (BD)
    echo "Prosseguindo para a gravação no banco...";
} else {
        // O redirecionamento precisa acontecer ANTES de qualquer comando 'echo' ou 'print'
        header("Location: login.html?erro=senha_invalida");
        exit(); // Interrompe a execução do script para garantir o redirecionamento
    }
?>