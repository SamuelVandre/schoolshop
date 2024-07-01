// Seleciona todas as miniaturas
const miniImgs = document.querySelectorAll('.miniImgs div');

// Seleciona a imagem grande
const imagemGrande = document.getElementById('imagemGrande');

// Seleciona os botões de quantidade
const botaoMenos = document.querySelector('.quant-btn.menos');
const botaoMais = document.querySelector('.quant-btn.mais');
const spanQuantidade = document.querySelector('.quantidade');

// Variável para armazenar a quantidade atual
let quantidade = 1;

// Adiciona um event listener para cada miniatura
miniImgs.forEach(miniImg => {
    miniImg.addEventListener('click', () => {
        // Obtém o caminho da imagem clicada
        const imgSrc = miniImg.querySelector('img').getAttribute('src');
        
        // Define o caminho da imagem grande como o caminho da imagem clicada
        imagemGrande.setAttribute('src', imgSrc);
    });
});

// Adiciona evento de clique para botão de adicionar
botaoMais.addEventListener('click', () => {
    quantidade++;
    spanQuantidade.textContent = quantidade;
});

// Adiciona evento de clique para botão de remover
botaoMenos.addEventListener('click', () => {
    if (quantidade > 1) {
        quantidade--;
        spanQuantidade.textContent = quantidade;
    }
});



