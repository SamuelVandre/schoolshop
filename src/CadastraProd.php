<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="#" method="post" enctype="multipart/form-data">
            <img class="mb-4" src="../imgs/logo_remasterizada__2_-removebg-preview.png" alt="" width="300" height="100">
            <h1 class="h3 mb-3 fw-normal">Cadastrar Produtos</h1>

            <div class="form-floating p-1">
                <input type="file" name="imagem" class="form-control" id="floatingInput">
                <label for="floatingInput">Imagem</label>
            </div>
            <div class="form-floating p-1">
                <input type="text" name="nome" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Nome do Produto</label>
            </div>
            <div class="form-floating p-1 mb-3">
                <input type="text" name="desc" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Descrição do Produto</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted"></p>
        </form>
    </main>
    <?php
    include("./conn.php");

    $id = $_GET['id'];
    $query = $conn->query("SELECT * FROM todosprodutos WHERE id='$id'");
    if($query){
        while($row = $query->fetch_assoc()){
            print $row['produtos'];
        }
    }

    if (count($_POST) > 0) {
        $imagem = $_FILES['imagem']['name'];
        $nome = $_POST['nome'];
        $descricao = $_POST['desc'];

        $existe = "SELECT * FROM todosprodutos WHERE '$nome'=produtos";
        $testExiste = $conn->query($existe);
        if ($testExiste->num_rows > 0) {
            print "<script>
                    alert('Produto já cadastrado!')
                </script>";
        } else {
            //ARMAZENA A IMAGEM E UPLOAD NA PASTA
            $caminho = "../produtos_user";
            $insereNome = "INSERT INTO todosprodutos(produtos) VALUES('$nome')";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
                    $destino = "../produtos_user/" . $_FILES["imagem"]["name"]; // Caminho completo do destino, incluindo o nome do arquivo
                    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $destino)) {
                        // Insere o nome do arquivo no banco de dados
                        $sql_insert_image = "INSERT INTO dadosprodutos (imagem) VALUES ('$imagem')";
                        if (($conn->query($sql_insert_image) === TRUE) && ($conn->query($insereNome) === TRUE)) {
                            echo "Upload realizado com sucesso.";
                        } else {
                            echo "Erro ao inserir no banco de dados: " . $conn->error;
                        }


                        echo "O arquivo foi enviado com sucesso.";
                    } else {
                        echo "Erro ao mover o arquivo para o diretório de destino.";
                    }
                } else {
                    $erro = $_FILES["imagem"]["error"];
                    switch ($erro) {
                        case UPLOAD_ERR_INI_SIZE:
                            $mensagem_erro = "O arquivo excede o limite definido pela diretiva upload_max_filesize no php.ini.";
                            break;
                        case UPLOAD_ERR_FORM_SIZE:
                            $mensagem_erro = "O arquivo excede o limite definido pelo formulário HTML.";
                            break;
                        case UPLOAD_ERR_PARTIAL:
                            $mensagem_erro = "O upload do arquivo foi apenas parcialmente concluído.";
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            $mensagem_erro = "Nenhum arquivo foi enviado.";
                            break;
                        case UPLOAD_ERR_NO_TMP_DIR:
                            $mensagem_erro = "Falta uma pasta temporária.";
                            break;
                        case UPLOAD_ERR_CANT_WRITE:
                            $mensagem_erro = "Falha ao gravar o arquivo em disco.";
                            break;
                        case UPLOAD_ERR_EXTENSION:
                            $mensagem_erro = "Uma extensão do PHP interrompeu o upload do arquivo.";
                            break;
                        default:
                            $mensagem_erro = "Erro desconhecido ao enviar o arquivo.";
                            break;
                    }
                    echo "Erro ao enviar o arquivo: $mensagem_erro";
                }
            }
        }
    }
    ?>


</body>

</html>