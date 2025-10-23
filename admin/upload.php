<?php
// Conexão com o banco
$conn = new mysqli("sql208.infinityfree", "if0_39925446", "6hWCzFzAb5Fri", "if0_39925446_dan2cunha");
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
 
// Quando o formulário for enviado
if (isset($_POST['upload'])) {
 
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
 
        $pasta = "uploads/"; // <-- mesma pasta do upload.php
        $nomeArquivo = basename($_FILES["imagem"]["name"]);
        $nomeArquivo = mysqli_real_escape_string($conn, $nomeArquivo);
        $caminho = $pasta . $nomeArquivo;
 
        // Cria a pasta se não existir
        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }
 
        // Move o arquivo
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho)) {
            $sql = "INSERT INTO imagens (nome) VALUES ('$nomeArquivo')";
            if ($conn->query($sql) === TRUE) {
                echo "Imagem enviada e salva com sucesso!";
            } else {
                echo "Erro ao salvar no banco: " . $conn->error;
            }
        } else {
            echo "❌ Erro ao mover o arquivo. Caminho: " . $caminho;
        }
 
    } else {
        echo "Nenhum arquivo enviado ou erro no upload.";
    }
}
?>