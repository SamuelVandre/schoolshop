<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/pesquisaProd.css">
</head>

<body>
    <style>
        header a {
            text-decoration: none;
        }
    </style>
    <header>
        <div class="logo">
            <img src="../imgs/logo_remasterizada (2).png">
        </div>

        <div class="procura">

            <form method="post" action="#">
                <input placeholder="O que está buscando?" type="text" name="pesquisaProd">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </button>
            </form>

        </div>

        <div class="cadastro">
            <p>Entrar / Cadastrar</p>
            <a href="">
                <p class="mc">Minha Conta</p>
            </a>
            <a href="">
                <svg class="seta" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                </svg>
            </a>
        </div>
        <div class="icon1">
            <a href=""><svg class="caminhao" xmlns="http://www.w3.org/2000/svg" width="40" height="35" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                </svg></a>
        </div>
        <div class="rastreiotxt">
            <a href="">
                <p>Rastrear Pedido</p>
            </a>
        </div>
        <div class="icon2">
            <a href=""><svg class="carrinho" xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg></a>
            <a href="">
                <p class="txt_carrinho">Carrinho</p>
            </a>
        </div>

        <div class="qtd_prod">
            <p class="zero">0</p>
        </div>
        <div class="contain-header">
            <div class="conteudo">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
                <div class="menu">
                    <ul>
                    <?php
                            include("../components/header_nav.php");
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main>

<?php
include_once('./conn.php');
if (count($_POST) > 0) {
    $pesquisaProd = $_POST['pesquisaProd'];
    $script = "SELECT * FROM todosprodutos WHERE produtos LIKE '%$pesquisaProd%'";
    $query = $conn->query($script);
    if ($query) {
        if ($query->num_rows > 0) {
            // Exibir os resultados encontrados
            print "<div class='row'>";
                while ($row = $query->fetch_assoc()) {
                    
                print "<div class='prod' onClick='detalhe(".$row['id'].");'>";
                    print "<div class='imgProd'>";
                        print "<img src=''>";
                    print "</div>";
                    print "<div class='descProd'>";
                        print "<p>" . $row['produtos'] . "</p>";
                    print "</div>";
                print "</div>";
            }
            print "</div>";
            } else {
                echo "Nenhum resultado encontrado.";
            }
            } else {
                echo "Erro na consulta: " . $conn->error; // Exibe mensagem de erro se a consulta falhar
            }
}

            ?>

            </main>

            <script>
                function detalhe(n){
                    window.location.replace("./telaProduto.php?id=" + n)
                }
            </script>
</body>

</html>

