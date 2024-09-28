<?php
session_start();
include_once("./src/conn.php");
$inicio = microtime(true);
if (count($_POST) > 0) {
    @$nome = htmlspecialchars(trim($_POST['nome'])); //usado só no cadastro e na session do login
    $email = htmlspecialchars(trim($_POST['email']));
    $senha = htmlspecialchars(trim($_POST['senha']));
    if ($nome != 1 and $nome != null and $nome != "") {
        //Cadastro de pessoa
        $pesquisaEmail = "SELECT * FROM usuarios WHERE email=?";
        $sql = $conn->prepare($pesquisaEmail);
        $sql->bind_param('s', $email);
        $sql->execute();
        // Armazena o resultado da consulta
        $sql->store_result();


        if ($nome == "admin") {
            print "<script>alert('Nome não permitido')</script>";
        } else {
            if ($sql->num_rows > 0) {
                print "<script>alert('E-mail já cadastrado, coloque outro!')</script>";
            } else {
                $script_cadastro = "INSERT INTO usuarios(nome, email, senha) VALUES (?, ?, ?)";
                $sql->close(); // Fecha a declaração anterior
                $sql = $conn->prepare($script_cadastro);
                $sql->bind_param('sss', $nome, $email, $senha);
                $sql->execute();
                print "<script>alert('Faça seu login agora')</script>";
            }
        }
    } else {
        $sql = $conn->prepare("SELECT * FROM usuarios WHERE email=? AND senha=?");
        $sql->bind_param('ss', $email, $senha);
        $sql->execute();
        $result = $sql->get_result();
        //login
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['usuario'] = $row['nome'];
                $_SESSION['email'] = $row['email'];
                print "<script>alert('Login realizado com sucesso')</script>";
            }
        } else {
            print "<script>alert('nenhum email encontrado')</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Shop</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="icon" href="./imgs/logo_sacola-removebg-preview.png">
    <link rel="stylesheet" href="./assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap/carousel.rtl.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/bootstrap/carousel.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>

<body style="margin: 0; padding: 0;">

    <?php
    include("./src/conn.php");

    $sql = $conn->query("SELECT produtos FROM todosprodutos");
    $produtos = [];
    $i = 0;
    print "<script>
            $( function() {
var availableTags = [
           ";
    if ($sql) {
        if ($sql->num_rows > 0) {
            while ($row = $sql->fetch_assoc()) {

                $produtos[$i] = $row['produtos'];
                print "'$produtos[$i]',";
                $i++;
            }
        }
    }
    print " ''
];
            $( '#pesquisa' ).autocomplete({
source: availableTags
});
} );
</script>
";
    ?>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        #btn_backpak {
            transition: 1s;
        }

        #btn_backpak:hover {
            background-color: rgb(1, 167, 1) !important;
            color: white;
            border: 1px solid rgb(1, 167, 1) !important;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <header>
        <div class="logo">
            <img src="./imgs/logo_remasterizada__2_-removebg-preview.png" alt="">
        </div>

        <div class="procura">

            <form method="get" action="./src/produtos.php">
                <input id="pesquisa" placeholder="O que está buscando?" type="text" name="pesquisaProd">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="cadastro">
            <p>Entrar / Cadastrar</p>
            <p id='mc' class="mc">Minha Conta</p>
            <!-- Parte do botao -->
            <svg class="seta" id="seta" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path
                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
            </svg>
            <!-- Fim da parte -->
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
        <div id='iconCarrinho' class="icon2">
            <svg class="carrinho" xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor"
                class="bi bi-cart" viewBox="0 0 16 16">
                <path
                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
            </svg>
        </div>
        <p id='txt_carrinho' class="txt_carrinho">Carrinho</p>
        <div class="qtd_prod">
            <p class="zero">0</p>
        </div>
        <div class="contain-header">
            <div class="conteudo">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
                <div class="menu">
                    <ul>
                        <li><a href="./">Início</a></li>
                        <li><a href="#">Contato</a></li>
                        <li><a href="#" onclick="busca('caderno')">Cadernos</a></li>
                        <li><a href="#" onclick="busca('estojo')">Estojos</a></li>
                        <li><a href="#" onclick="busca('caneta')">Canetas</a></li>
                        <li><a href="#" onclick="busca('lapiseira')">Lapiseiras</a></li>
                        <li><a href="#" onclick="busca('lapis')">Lapis</a></li>
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

        <div class="seta2" id="seta2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                <path
                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
            </svg>
        </div>

        <div id="esquecerSenha" class="esquecerSenha">
            <h4 class="recuperarSenhatxt">Recuperar Senha</h4>
            <p class="insiratxt">Insira seu E-mail:</p>
            <form action="./" method="POST">
                <input class="inputTxt" type="text" placeholder="E-mail">
                <input class="inputSubmit" type="submit" value="Recuperar">
            </form>
            <p id='lembrarTxt'>Lembrar sua senha?</p>
            <p id="voltarInicio" class="voltarInicio">Voltar para o login</p>
        </div>

        <div id="cadastrarConta" class="cadastrarConta">
            <h4 class="cadTxt">Criar minha conta</h4>
            <p class="preenchaTxt">Preencha os campos abaixo:</p>
            <form action="./" method="POST">
                <input class="name" name="nome" type="text" placeholder="Nome Completo"><br>
                <input class="email" name="email" type="text" placeholder="E-mail"><br>
                <input class="senha" name="senha" type="text" placeholder="Senha"><br>
                <input class="btn-criarConta" type="submit" value="Criar minha conta">
            </form>
            <p id="jaTemUmaContatxt">Ja tem uma conta?
            <p id="entreAqui">Entre aqui</p>
            </p>

        </div>

        <div class="seta3" id="seta3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                <path
                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
            </svg>
        </div>

        <div id="entrarConta" class="entrarConta">
            <h4 class="cadTxt">Entrar em minha conta</h4>
            <p class="preenchaTxt">Insira seu e-mail e senha:</p>
            <form action="" method="POST">
                <input type="text" name="email" placeholder="email"><br>
                <input type="text" name="senha" placeholder="Senha"><br>
                <input type="submit" value="Entrar">
            </form>
            <p id="novoClientetxt">Novo Cliente?
            <p id="voltarCadTxt">Cadastre-se Aqui</p>
            <p id="esqueceuSenhatxt">Esqueceu a senha?</p>
            <p id="recTxt">Recuperar sua senha</p>
            </p>
        </div>

        <div class="seta4" id="seta4">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                <path
                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
            </svg>
        </div>

        <div class="seta5" id="seta5">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor"
                class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                <path
                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
            </svg>
        </div>

        <div id="telaCarrinho">
            <div id="descontoCarrinho">
                <p>Gaste mais R$50,00 e ganhe seu frete grátis!</p>
            </div>
            <div id="iconeCarrinho">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-cart3"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg>
            </div>
            <div id="carrinhoTxt">
                <p>Seu carrinho está vazio</p>
            </div>
            <div id="botaoCarrinho">
                <button>Veja nossos Produtos</button>
            </div>
        </div>
    </header>

    <main>
        <div class="carrossel"
            style="width: 100%; height: auto; display: flex; align-items: center;justify-content: center;">
            <div id="myCarousel" style="width: 95%;" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" style="border-radius: 50px;">
                    <div class="carousel-item active">
                        <img src="./imgsBody/backpacks-2048px-2x1-0006 (1).jpg" alt=""><!--IMAGEM CAROUSEL-->
                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1 style="text-shadow: 1px 1px 3px black;">Coleção 2023</h1>
                                <p style="text-shadow: 1px 1px 3px black;">Melhores mochilas de 2023</p>
                                <p><a id="btn_backpak" class="btn btn-lg btn-primary" href="#"
                                        style="box-shadow: 1px 1px 8px rgba(30, 30, 30, 0.5); background-color: rgb(31, 197, 31); border: 1px solid rgb(31, 197, 31);">Comprar</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./imgsBody/e61e1fc2-f786-4add-808a-0c837d85c2bd_1456x728.jpg"
                            alt=""><!--IMAGEM CAROUSEL-->
                        <div class="container">
                            <div class="carousel-caption">
                                <h1 style="text-shadow: 1px 1px 3px black;">O preferido das crianças</h1>
                                <p style="text-shadow: 1px 1px 2px black;">Crianças adoram nossos produtos.</p>
                                <p><a class="btn btn-lg "
                                        style="box-shadow: 1px 1px 8px rgba(30, 30, 30, 0.5); background-color: rgb(31, 197, 31); color: white;"
                                        href="#">Ver materiais infantis</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./imgsBody/materiais.jpg" alt="Materiais"> <!-- IMAGEM CAROUSEL -->
                        <div class="container">
                            <div class="carousel-caption text-end">
                                <h1 style="text-shadow: 1px 1px 3px black;">Melhores materiais para o seu dia-a-dia</h1>
                                <p style="text-shadow: 1px 1px 3px black;">Nossos materiais tem a melhor qualidade do
                                    mercado e com
                                    garantia de 3 meses</p>
                                <p><a class="btn btn-lg"
                                        style="box-shadow: 1px 1px 8px rgba(30, 30, 30, 0.5); background-color: rgb(31, 197, 31); color: white;"
                                        href="#">Ver materiais</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="rowCards">
            <div class="cards">
                <div class="img" onclick="">
                </div>
            </div>
            <div class="cards">
                <div class="img">
                    <img src="" alt="">
                </div>
            </div>
            <div class="cards">
                <div class="img">

                </div>
            </div>
        </div>

        <div class="produtos">
            <div class="titulo">
                <h1>Ofertas do dia
                    <hr>
                </h1>
            </div>
            <div class="rowProd">
                <?php
                $consulta = "SELECT * FROM todosprodutos WHERE img1!='0'";
                $faz_consulta = $conn->query($consulta);
                for ($i = 0; $i < 5; $i++):
                    while ($row = $faz_consulta->fetch_assoc()):

                        ?>
                        <div class="prod" onclick="window.location.href = './src/telaProduto.php?id=<?= $row['id'] ?>'">
                            <div class="img">
                                <img src="./produtos_user/<?= $row['img1'] ?>" id="img1" width="60%" alt="">
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
                endfor;
                ?>
            </div>
        </div>
        <div class="sobreNos">
            <div class="imagem">
                <img src="./imgs/logo_fund_branc-removebg-preview.png" alt="">
            </div>
            <div class="sobreNosTxt">

                <h1>Sobre a School Shop</h1>
                <p>A School Shop é uma loja escola dedicada a fornecer materiais didáticos, uniformes e acessórios para
                    estudantes de todas as idades. Fundada em 2005 por um grupo de educadores visionários, tornou-se um
                    ponto de referência na comunidade educacional, oferecendo produtos de alta qualidade e serviço
                    personalizado. </p>
                <h2>Produtos Autênticos com Nota Fiscal</h2>
                <p>A School Shop se destaca por sua dedicação à transparência e confiabilidade. Todos os produtos
                    adquiridos na loja vêm acompanhados de nota fiscal, garantindo proteção e segurança aos clientes.
                    Essa prática reforça o compromisso da School Shop com a qualidade e a integridade em cada transação,
                    proporcionando tranquilidade aos pais e estudantes em sua jornada educacional.</p>
                <h2>Marcas reconhecidas e produtos de qualidade</h2>
                <p>Na School Shop, a qualidade dos produtos escolares é uma prioridade indiscutível. Trabalhamos
                    incansavelmente para oferecer aos nossos clientes apenas o melhor em termos de durabilidade,
                    funcionalidade e estilo. Trabalhamos com marcas reconhecidas mundialmente, como Faber-Castell para
                    materiais de escrita, Tilibra para cadernos e agendas, e Pritt para materiais de colagem. </p>

            </div>
        </div>


        <div class="container_seguranca">
            <div class="item">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#4CAF50" class="bi bi-credit-card"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                    <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                </svg>
                <h2>Compra Segura</h2>
                <p>Ambiente seguro para pagamentos online</p>
            </div>
            <div class="item">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#4CAF50" class="bi bi-truck"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                </svg>
                <h2>Envio Rápido & Seguro</h2>
                <p>Envio rápido e acompanhado com código de rastreio</p>
            </div>
            <div class="item">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#4CAF50" class="bi bi-envelope"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                </svg>
                <h2>Suporte Profissional</h2>
                <p>Equipe de suporte de extrema qualidade a semana toda</p>
            </div>
            <div class="item">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#4CAF50" class="bi bi-cart3"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 1 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 1 1 0-2" />
                </svg>
                <h2>Satisfação ou Reembolso</h2>
                <p>Caso haja algo, devolvemos seu dinheiro com velocidade</p>
            </div>
        </div>
    </main>

    <footer>
        <div class="conteudo1">
            <div class="atendimento">
                <p>CONSTEM ARTIGOS ESPORTIVOS</p>
                <h2>ATENDIMENTO AO CLIENTE</h2>

                <div class="email">
                    <h3>E-mail:</h3>
                    <p>scholshop871@gmail.com.br</p>
                </div>

                <div class="telefone">
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
                    <p>Políticas de Privacidade e <br> Termos de Uso</p>
                </a>
            </div>

            <div class="pagamento">
                <p>Formas de pagamento</p>
                <img src="./imgs/pagamentos.png" alt="Formas de Pagamento">
            </div>

            <div class="instagram">
                <p>Siga-nos</p>
                <a href="">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </footer>



    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/header.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script>
        function busca(n) {
            window.location.replace("./src/produtos.php?pesquisaProd=" + n)
        }
    </script>
</body>

</html>
<?php
$fim = microtime(true);

$tempo_total = ($fim - $inicio) * 1000;
echo '<script>';
echo 'console.log("Tempo de execução da página: ' . $tempo_total . ' ms");';
echo '</script>';
?>