<?php

// Inclui arquivo de configuração
require_once $_SERVER['DOCUMENT_ROOT'] . "/_config.php";

/*******************************************
 * Seu código PHP desta página entra aqui! *
 *******************************************/

// Variáveis desta página
$form = [];

// Variável que exibe/oculta formulário.
$show_form = true;

// Detecta se o formulário foi enviado...
if (isset($_POST['send'])) :

    // Obtém os valores dos campos, sanitiza e armazena nas variáveis.
    // Atenção! A função "sanitize()" está em "/_config.php".
    $form['name'] = sanitize('name', 'string');
    $form['email'] = sanitize('email', 'email');
    $form['birth'] = sanitize('birth', 'date');
    $form['password'] = sanitize('password', 'string');
    $form['password2'] = sanitize('password2', 'string');

    echo '<pre>';
    print_r($form);
    echo '</pre>';
    exit;

    // Verifica se todos os campos form preenchidos
    if ($name === '' or $email === '' or $birth === '' or $password === '' or $password2 === '') :
        $feedback = '<h3 style="color:red">Erro: por favor, preencha todos os campos!</h3>';


    // Verifica se as senhas digitadas coincidem
    elseif ($password !== $password2) :
        $feedback = '<h3 style="color:red">Erro: as senhas não coincidem!</h3>';
        $password = $password2 = '';
    else :

        // Cria a query para slvar no banco de dados.

        $sql = <<<SQL

INSERT INTO users (
    user_name,
    user_email,
    user_birth,
    user_password
) VALUES 
(
    '{$name}',
    '{$email}',
    '{$birth}',
    '{$password}'
),

SQL;

        echo '<pre>';
        print_r($sql);
        echo '</pre>';
        exit;

    // Salva contato no banco de dados.

    // Cria mensagem de confirmação.

    // Oculto o formulário.

    // Data de envio.

    // Enviar e-mail para o administrador.

    endif;

    echo '<pre>';
    print_r($feedback);
    echo '</pre>';
    exit;

endif; // if (isset($_POST['send']))

/*********************************************
 * Seu código PHP desta página termina aqui! *
 *********************************************/

// Define o título DESTA página.
$page_title = "";

// Opção ativa no menu
$page_menu = "index";

// Inclui o cabeçalho da página
require_once $_SERVER['DOCUMENT_ROOT'] . "/_header.php";

?>

<?php // Conteúdo 
?>
<article>

    <h2>Novo usuário</h2>

    <p>Preencha todos os campos do formulário para se cadastrar no <?php echo $site['name'] ?>.</p>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

        <input type="hidden" name="send" value="true">

        <p>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" placeholder="Seu nome completo." value="" autofocus>
        </p>

        <p>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" placeholder="Seu e-mail principal." value="">
        </p>

        <p>
            <label for="birth">Nascimento:</label>
            <input type="date" name="birth" id="birth" placeholder="Sua data de nascimento" value="">
        </p>

        <p>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" placeholder="Sua senha." value="">
            <small>Sua senha deve ter pelo menos 7 caracteres, uma letra maiúscula, uma minúscula e um número.</small>
        </p>

        <p>
            <label for="password2">Senha:</label>
            <input type="password" name="password2" id="password2" placeholder="Repita a senha." value="">
        </p>

        <p>
            <label></label>
            <button type="submit">Cadastrar</button>
        </p>

    </form>

</article>

<?php // Barra lateral 
?>
<aside>

    <h3>Seções:</h3>

    <ul>
        <li><a href="/sections/front.php">Front-end</a></li>
        <li><a href="/sections/back.php">Back-end</a></li>
        <li><a href="/sections/full.php">Full-stack</a></li>
    </ul>

</aside>

<?php

// Inclui o rodapé da página
require_once $_SERVER['DOCUMENT_ROOT'] . "/_footer.php";

?>