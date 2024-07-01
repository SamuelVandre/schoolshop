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
            <div class="form-floating p-2">
                <input type="file" name="imagem0" class="form-control" id="floatingInput">
                <label for="floatingInput">Imagem 1</label>
            </div>
            <div class="form-floating p-2">
                <input type="file" name="imagem1" class="form-control" id="floatingInput">
                <label for="floatingInput">Imagem 2</label>
            </div>
            <div class="form-floating p-2">
                <input type="file" name="imagem2" class="form-control" id="floatingInput">
                <label for="floatingInput">Imagem 3</label>
            </div>
            <div class="form-floating p-2">
                <input type="file" name="imagem3" class="form-control" id="floatingInput">
                <label for="floatingInput">Imagem 4</label>
            </div>
            <div class="form-floating p-2">
                <input type="file" name="imagem4" class="form-control" id="floatingInput">
                <label for="floatingInput">Imagem 5</label>
            </div>
            <div class="form-floating p-2">
                <input type="text" name="nome" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Nome do Produto</label>
            </div>
            <div class="form-floating p-2">
                <input type="number" min="1" name="qtd" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Quantidade do Produto</label>
            </div>
            <div class="form-floating p-2">
                <input type="number" step="0.01" name="valor" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Valor do Produto</label>
            </div>
            
            <div class="form-floating p-2 mb-3">
                <input type="text" name="desc" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Descrição do Produto</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted"></p>
        </form>
    </main>
    <?php
    include("./conn.php");

    
    if (count($_POST) > 0) {
        $imagem1 = $_FILES['imagem0']['name'];
        $imagem2 = $_FILES['imagem1']['name'];
        $imagem3 = $_FILES['imagem2']['name'];
        $imagem4 = $_FILES['imagem3']['name'];
        $imagem5 = $_FILES['imagem4']['name'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['qtd'];
        $valor = $_POST['valor'];
        $descricao = $_POST['desc'];

        $existe = "SELECT * FROM todosprodutos WHERE '$nome'=produtos";
        $testExiste = $conn->query($existe);
        if ($testExiste->num_rows > 0) {
            print "<script>
                    alert('Produto já cadastrado!')
                </script>";
        } else {
            //ARMAZENA A IMAGEM E FAZ UPLOAD NA PASTA
            $caminho = "../produtos_user";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if ($_FILES["imagem0"]["error"] == UPLOAD_ERR_OK) {
                
                    for($i=0;$i < 5; $i++){
                        $destino[$i] = "../produtos_user/" . $_FILES["imagem".$i]["name"]; // Caminho completo do destino, incluindo o nome do arquivo
                    }
                
                    if (move_uploaded_file($_FILES["imagem0"]["tmp_name"], $destino[0])
                        AND move_uploaded_file($_FILES["imagem1"]["tmp_name"], $destino[1])
                        AND move_uploaded_file($_FILES["imagem2"]["tmp_name"], $destino[2])
                        AND move_uploaded_file($_FILES["imagem3"]["tmp_name"], $destino[3])
                        AND move_uploaded_file($_FILES["imagem4"]["tmp_name"], $destino[4])) {
                        
                            echo "Imagens armazenadas";
                        // Insere o nome do arquivo no banco de dados
                        $sql_insert = "INSERT INTO todosprodutos (produtos, quantidade, valor, img1, img2, img3, img4, img5, descricao) VALUES ('$nome', '$quantidade', '$valor','$imagem1', '$imagem2','$imagem3', '$imagem4', '$imagem5', '$descricao')";
                        
                        
                        $inserir_dados = $conn->query($sql_insert);
                        


                        //echo "<script> alert('O arquivo foi enviado com sucesso.')</script>";
                        
                        
                        if ($inserir_dados) {
                            echo "
                                <script>alert('Upload no banco realizado com sucesso.')</script>
                            ";
                        } else {
                            echo "<br>Erro ao inserir no banco de dados: " . $conn->error;
                        }

                    } else {
                        echo "<script>alert('Erro ao mover o arquivo para o diretório de destino.')</script>";
                    }
                } else {
                    //!mostra o erro que teve ao enviar a imagem
                    $erro[0] = $_FILES["imagem0"]["error"];
                    $erro[1] = $_FILES["imagem1"]["error"];
                    $erro[2] = $_FILES["imagem2"]["error"];
                    $erro[3] = $_FILES["imagem3"]["error"];
                    $erro[4] = $_FILES["imagem4"]["error"];
                    switch ($erro) {
                        case UPLOAD_ERR_INI_SIZE:
                            $mensagem_erro = "<script>alert('O arquivo excede o limite definido pela diretiva upload_max_filesize no php.ini.')</script>";
                            break;
                        case UPLOAD_ERR_FORM_SIZE:
                            $mensagem_erro = "<script>alert('O arquivo excede o limite definido pelo formulário HTML.')</script>";
                            break;
                        case UPLOAD_ERR_PARTIAL:
                            $mensagem_erro = "<script>alert('O upload do arquivo foi apenas parcialmente concluído.')</script>";
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            $mensagem_erro = "<script>alert('Nenhum arquivo foi enviado.')</script>";
                            break;
                        case UPLOAD_ERR_NO_TMP_DIR:
                            $mensagem_erro = "<script>alert('Falta uma pasta temporária.')</script>";
                            break;
                        case UPLOAD_ERR_CANT_WRITE:
                            $mensagem_erro = "<script>alert('Falha ao gravar o arquivo em disco.')</script>";
                            break;
                        case UPLOAD_ERR_EXTENSION:
                            $mensagem_erro = "<script>alert('Uma extensão do PHP interrompeu o upload do arquivo.')</script>";
                            break;
                        default:
                            $mensagem_erro = "<script>alert('Erro desconhecido ao enviar o arquivo.')</script>";
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