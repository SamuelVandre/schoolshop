<?php
include_once("./conn.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/pesquisaProd.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap/carousel.rtl.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body style="padding: 0; margin: 0">  

    <header class="mb-3">
        <div onclick="window.location.href='../'" class="logo" style="z-index: 100">
            <img src="../imgs/logo_remasterizada__2_-removebg-preview.png">
        </div>

        <div class="procura">
            <form method="get" action="./produtos.php">
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
                <svg class="seta" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                </svg>
            </a>
        </div>
        <div class="icon1">
            <a href=""><svg class="caminhao" xmlns="http://www.w3.org/2000/svg" width="40" height="35"
                    fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                    <path
                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                </svg></a>
        </div>
        <div class="rastreiotxt">
            <a href="">
                <p>Rastrear Pedido</p>
            </a>
        </div>
        <div class="icon2">
            <a href=""><svg class="carrinho" xmlns="http://www.w3.org/2000/svg" width="40" height="30"
                    fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
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
                        <li><a href="../">Início</a></li>
                        <li><a href="./contato.php">Contato</a></li>
                        <li><a style="cursor: pointer !important;" onclick="busca('caderno')">Cadernos</a></li>
                        <li><a style="cursor: pointer !important;" onclick="busca('estojo')">Estojos</a></li>
                        <li><a style="cursor: pointer !important;" onclick="busca('caneta')">Canetas</a></li>
                        <li><a style="cursor: pointer !important;" onclick="busca('lapiseira')">Lápiseiras</a></li>
                        <li><a style="cursor: pointer !important;" onclick="busca('lapis')">Lápis</a></li>
                        <?php
                        if (@$_SESSION['usuario'] === "admin") {
                           print "<li><a href='./src/contatosEnviados.php'>Mensagens Enviadas</a></li>";
                            print "<li><a href='./src/cadastraProd.php'>Cadastrar Produtos</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <main style=" padding-top: 10%; padding-left: 5%; padding-bottom: 50px">
    <style>
        .rowProd .prod:hover{
            margin: 0 !important
        }
    </style>
    <div class="rowProd" style="display: flex; align-items: center; justify-content:space-around; flex-wrap: wrap">
                <?php
                $produto = '%' . $_GET['pesquisaProd'] . '%';
                $consulta = $conn->prepare("SELECT * FROM todosprodutos WHERE produtos LIKE ?");
                $consulta->bind_param('s', $produto);
                $consulta->execute();

                $result = $consulta->get_result();

                $i = 0;

                while ($row = $result->fetch_assoc()):

                        ?>
                        <div class="prod" onclick="window.location.href = './telaProduto.php?id=<?= $row['id'] ?>'">
                            <div class="img">
                                <img src="../produtos_user/<?= $row['img1'] ?>" id="img1" width="60%" alt="">
                                <span class="discount"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4" />
                                    </svg> <?= $row['desconto'] ?>%</span>
                            </div>
                            <div class="price-container">
                                <h1 class="desc"><?= $row['produtos']; ?></h1>
                                <span class="now-price">R$
                                    <?=
                                        number_format($row['valor'] - $row['valor'] * ($row['desconto'] / 100), 2, ',', '.')

                                        ?><span class="old-price">R$ <?= $row['valor'] ?></span>
                                </span>
                                <div class="buttons">
                                    <span class="installments">Em até 12x de R$
                                        <?= number_format(($row['valor'] - $row['valor'] * ($row['desconto'] / 100)) / 12, 2) ?></span>
                                    <div class="stars">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <h3>(5.0)</h3>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php
                    endwhile;
                ?>
            </div>

    </main>
    <footer>
        <div class="conteudo1">
            <div class="atendimento">
                <p >
                    CONSTEM ARTIGOS ESPORTIVOS
                </p>
                <h2>
                    ATENDIMENTO AO CLIENTE
                </h2>

                <div class="email">
                    <h3>E-mail:</h3>
                    <p>scholshop871@gmail.com.br</p>
                </div>

                <div class="email">
                    <h3>WhatsApp:</h3>
                    <p>+55 (19) 99864-6425</p>
                </div>

            </div>
            <div class="menuFinal">
                <h1>MENU FINAL</h1>
                <a href="">
                    <p>Buscar</p>
                </a>
                <a href="">
                    <p>Politicas de Privacidade e <br> Termos de Uso</p>
                </a>
            </div>
        </div>

        
    </footer>

    <script>
        function detalhe(n) {
            window.location.replace("./telaProduto.php?id=" + n)
        }
    </script>
    <script>
        function busca(n) {
            window.location.replace("./produtos.php?pesquisaProd=" + n)
        }
</script>
</body>

</html>