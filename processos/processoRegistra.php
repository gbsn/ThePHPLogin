<?php
//Criado por Geraldo Neto - 24032026

//Recebendo Usuario via POST da página de Login
$primeiroNome = $_POST['primeiroNome'];

//Recebendo Usuario via POST da página de Login
$ultimoNome = $_POST['ultimoNome'];

//Recebendo Usuario via POST da página de Login
$email = $_POST['email'];

//Recebendo Usuario via POST da página de Login
$email2 = $_POST['email2'];

//Recebendo Senha via POST da página de Login
$senha = $_POST['senha'];

//Recebendo Senha via POST da página de Login
$senha2 = $_POST['senha2'];

//Verificando variáveis
print "Primeiro Nome: ".$primeiroNome." <br>Ultimo Nome: ".$ultimoNome." <br><br>Login: ".$email. " <br>Confirmação de Login: ".$email2." <br><br>Senha: ".$senha. " <br>Senha Comparação: ".$senha2;

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

    // Função para validar login
function validarLogin($l1, $l2) {
    if ($l1 === $l2) {
        echo "<h3>Logins Conferem!</h3>";
        return true;
    } else {
        echo "<h3>Erro: Os Logins não são iguais.</h3>";
        return false;
    }
}

// Executando a validação antes de prosseguir
if (validarLogin($email, $email2)) {
    // Aqui entrará o seu código de inserção no Banco de Dados (BD)
    echo "Prosseguindo para a gravação no banco...";
} else {
        // O redirecionamento precisa acontecer ANTES de qualquer comando 'echo' ou 'print'
        header("Location: register.html?erro=senha_invalida");
        exit(); // Interrompe a execução do script para garantir o redirecionamento
    }
?>