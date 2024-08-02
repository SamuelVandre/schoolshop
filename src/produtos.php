<?php
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
</head>

<body style="padding: 0; margin: 0">  

    <header class="mb-3">
        <div class="logo" style="z-index: 100">
            <img src="../imgs/logo_remasterizada__2_-removebg-preview.png">
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
                        <?php
                            $abas[0] = "Início";
                            $abas[1] = "Contato";
                            $abas[2] = "Cadernos";
                            $abas[3] = "Estojos";
                            $abas[4] = "Canetas";
                            $abas[5] = "Lapiseiras";
                            $abas[6] = "Lápis";        
                            for ($i=0; $i < 7; $i++) { 
                                print "<li><a href='#'>" . $abas[$i] . "</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <main style="background-color: rgba(150,150,150,0.5); padding-top: 10%; padding-left: 5%">
        <?php
        include_once ('./conn.php');
        if (count($_POST) > 0) {
            $pesquisaProd = $_POST['pesquisaProd'];
            $script = "SELECT * FROM todosprodutos WHERE produtos LIKE '%$pesquisaProd%'";
            $query = $conn->query($script);
            if ($query) {
                if ($query->num_rows > 0) {
                    // Exibir os resultados encontrados
                    print "<div class='row'>";
                    while ($row = $query->fetch_assoc()) {

                        print "<div class='prod' onClick='detalhe(" . $row['id'] . ")'>";
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
                    echo  "<style>
                    main{
                        height: fit-content;
                        padding-bottom: 40px;
                        margin: 0;
                    }</style>";
                    echo "<p class='h-100 text-danger font-weight-bold'>Nenhum resultado encontrado.</p>";

                }
            } else {
                echo "Erro na consulta: " . $conn->error; // Exibe mensagem de erro se a consulta falhar
            }
        }

        ?>

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

        <div class="condicoes">
            <p>Lorem muito legal e divertido e bonito de se ver
            <h3>magnam esse amet architecto cumque doloribus voluptate. Minus, id eius.</h3>
            </p>
        </div>

        <div class="endereco">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle"
                viewBox="0 0 16 16">
                <path
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512" />
            </svg>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur molestiae quaerat voluptates
                laudantium, laboriosam illo</p>
        </div>

        <div class="final">
            <div class="pagamento">
                <p>Formas de pagamento</p>
                <img src="./imgs/pagamentos.png">
            </div>

            <div class="selos">
                <img src="./imgs/norton.png" alt="" width="95px" height="50px">
            </div>
        </div>
    </footer>

    <script>
        function detalhe(n) {
            window.location.replace("./telaProduto.php?id=" + n)
        }
    </script>
</body>

</html>