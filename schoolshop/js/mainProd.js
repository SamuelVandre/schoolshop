const miniImgs = document.querySelectorAll('.miniImgs div');
const imagemGrande = document.getElementById('imagemGrande');
const botaoMenos = document.querySelector('.quant-btn.menos');
const botaoMais = document.querySelector('.quant-btn.mais');
const spanQuantidade = document.querySelector('.quantidade');

let quantidade = 1;

miniImgs.forEach(miniImg => {
    miniImg.addEventListener('click', () => {
        // Obtém o caminho da imagem clicada
        const imgSrc = miniImg.querySelector('img').getAttribute('src');
        
        // Define o caminho da imagem grande como o caminho da imagem clicada
        imagemGrande.setAttribute('src', imgSrc);
    });
});

botaoMais.addEventListener('click', () => {
    quantidade++;
    spanQuantidade.textContent = quantidade;
});

botaoMenos.addEventListener('click', () => {
    if (quantidade > 1) {
        quantidade--;
        spanQuantidade.textContent = quantidade;
    }
});