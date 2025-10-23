<?php 
session_start(); 

if (!isset($_SESSION['usuario'])) { 
    header("Location: login.php"); 
    exit; 
} 
?> 

<html>
    <head>
        <title>Perfil</title>
            <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="container">
            <div class="topo">
<h2>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h2> 
<p>Essa página só aparece para quem está logado.</p> 
<a href="./phps/sair.php">Sair</a>
            </div>
            	<div class="corpo">
                   <!-- Aqui coloca-se todas as informações como, produtos, preços, serviços, etc -->
					Conteúdo do Sistema 
            </div>
            <div class="rodape">
                <!-- redes sociais, data de criação, endereço -->
            </div>
        </div>         
    </body>
</html>