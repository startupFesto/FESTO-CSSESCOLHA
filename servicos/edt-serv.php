<!-- SCRIPT DO FORMS DE EDIÇÃO DOS DADOS DO USUÁRIO -->
<?php

header("Content-type: text/html; charset=ISO-8859-1");

if (!empty($_GET['id'])) {

    include_once('../conexao-mysql/conexao-banco.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM servicos_prestadores WHERE id_serv=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome_serv = $user_data['nome_serv'];
            $finalidade = $user_data['finalidade'];
            $preco = $user_data['preco'];
            $dias = $user_data['dias'];
            $cidades = $user_data['cidades'];
            $tam_equipe = $user_data['tam_equipe'];
        }
    } else {
        header('Location: meus-servicos.php');
    }
} else {
    header('Location: meus-servicos.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>

<body>
    <div class="box">
        <a href="meus-servicos.php">Voltar</a>
        <form action="savedt-serv.php" method="POST">
            <fieldset>
                <div class="inputBox">
                    <input type="text" name="nome_serv" id="nome_serv" value="<?php echo $nome_serv ?>" class="inputUser" required>
                    <label for="nome_serv" class="labelInput">Nome do serviço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="finalidade" id="finalidade" value="<?php echo $finalidade ?>" class="inputUser" required>
                    <label for="finalidade" class="labelInput">Finalidade (Ex: Casamento, Shows, etc)</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="preco" id="preco" value="<?php echo $preco ?>" class="inputUser" required onkeyup=moeda(this)>
                    <label for="preco" class="labelInput">Preço (R$)</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="dias" id="dias" value="<?php echo $dias ?>" class="inputUser" required>
                    <label for="dias" class="labelInput">Dias disponíveis (da semana)</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidades" id="cidades" value="<?php echo $cidades ?>" class="inputUser" required>
                    <label for="cidades" class="labelInput">Cidades atendidas</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="tam_equipe" id="tam_equipe" value="<?php echo $tam_equipe ?>"class="inputUser" required>
                    <label for="tam_equipe" class="labelInput">Tamanho da equipe</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="file" name="fotos" id="fotos" accept="image/png, image/jpeg" class="inputUser">
                    <label for="fotos" id="btnFoto">Fotos do serviço</label>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    </div>
    <script src="../js/mask.js"></script>
</body>

</html>