let seta = document.getElementById('seta');
let cadastrarConta = document.getElementById('cadastrarConta');
let seta3 = document.getElementById('seta3');
let condicao = true;
let esqueceuSenha = document.getElementById('esquecerSenha')
let seta2 = document.getElementById('seta2');
let entreAqui = document.getElementById('entreAqui')
let entrarConta = document.getElementById('entrarConta');
let seta4 = document.getElementById('seta4');
let recTxt= document.getElementById('recTxt');
let voltarTxt = document.getElementById('voltarInicio');
let voltarCadTxt = document.getElementById('voltarCadTxt');
let mc = document.getElementById('mc');


mc.addEventListener('click', () => {

    if (condicao) {
        cadastrarConta.style.display = 'block';
        seta.style.transform = 'rotate(360deg)';
        seta3.style.display = 'block';
        telaCarrinho.style.display='none';
        seta5.style.display='none';
        condicao = false;
        setTimeout(() => {
            cadastrarConta.style.width='25%';
            cadastrarConta.style.height='75vh';
        }, 0.1);

    } else {
        seta.style.transform = 'rotate(180deg)'
        condicao = true;
        cadastrarConta.style.width='0';
        cadastrarConta.style.height='0';
        entrarConta.style.height='0';
        entrarConta.style.width='0';
        esqueceuSenha.style.width='0';
        esqueceuSenha.style.heigth='0';
        setTimeout(() => {
            cadastrarConta.style.display='none';
            entrarConta.style.display='none';
            seta3.style.display='none';
            seta4.style.display='none';
            esqueceuSenha.style.display='none';
            seta2.style.display='none';
        }, 60);
    }
})

seta.addEventListener('click', () => {

    if (condicao) {
        cadastrarConta.style.display = 'block';
        seta.style.transform = 'rotate(360deg)';
        seta3.style.display = 'block';
        telaCarrinho.style.display='none';
        seta5.style.display='none';
        condicao = false;
        setTimeout(() => {
            cadastrarConta.style.width='25%';
            cadastrarConta.style.height='75vh';
        }, 0.1);

    } else {
        seta.style.transform = 'rotate(180deg)'
        condicao = true;
        cadastrarConta.style.width='0';
        cadastrarConta.style.height='0';
        entrarConta.style.height='0';
        entrarConta.style.width='0';
        esqueceuSenha.style.width='0';
        esqueceuSenha.style.heigth='0';
        setTimeout(() => {
            cadastrarConta.style.display='none';
            entrarConta.style.display='none';
            seta3.style.display='none';
            seta4.style.display='none';
            esqueceuSenha.style.display='none';
            seta2.style.display='none';
        }, 60);
    }
})

entreAqui.addEventListener('click', ()=>{
    entrarConta.style.display='block';
    seta4.style.display='block';
    entrarConta.style.width='25%';
    entrarConta.style.height='75vh';
    cadastrarConta.style.display='none';
    seta3.style.display='none'; 
})

voltarCadTxt.addEventListener('click', ()=>{
    entrarConta.style.display='none';
    seta4.style.display='none';
    cadastrarConta.style.display='block';
    seta3.style.display='block';
})

recTxt.addEventListener('click', ()=>{
    esqueceuSenha.style.display='block';
    esqueceuSenha.style.width='25%';
    esqueceuSenha.style.height='55vh';
    seta2.style.display='block';
    entrarConta.style.display='none';
})

voltarTxt.addEventListener('click', ()=>{
    cadastrarConta.style.display='block';
    seta3.style.display='block';
    esqueceuSenha.style.display='none';
    seta2.style.display='none';
})

// Carrinho //

let seta5 = document.getElementById('seta5');
let telaCarrinho = document.getElementById('telaCarrinho');
let botaoCarrinho = document.getElementById('botaoCarrinho');
let iconeCarrinho = document.getElementById('iconCarrinho');
let condicao2 = true;
let txt_carrinho = document.getElementById('txt_carrinho');

txt_carrinho.addEventListener('click', ()=>{

    if(condicao2){
        setTimeout(() => {
            telaCarrinho.style.width='35%';
            telaCarrinho.style.height='60vh';
        }, 0.1);
        cadastrarConta.style.display='none';
        seta3.style.display='none';
        entrarConta.style.display='none';
        seta4.style.display='none';
        esqueceuSenha.style.display='none';
        seta2.style.display='none';
        telaCarrinho.style.display='flex';
        seta5.style.display='flex';
        condicao2 = false;

    }else{
        condicao2=true;
        telaCarrinho.style.width='0';
        telaCarrinho.style.height='0';
        setTimeout(() => {
            telaCarrinho.style.display='none';
            seta5.style.display='none';
        }, 60);
    }
})

iconeCarrinho.addEventListener('click', ()=>{

    if(condicao2){
        setTimeout(() => {
            telaCarrinho.style.width='35%';
            telaCarrinho.style.height='60vh';
        }, 0.1);
        cadastrarConta.style.display='none';
        seta3.style.display='none';
        entrarConta.style.display='none';
        seta4.style.display='none';
        esqueceuSenha.style.display='none';
        seta2.style.display='none';
        telaCarrinho.style.display='flex';
        seta5.style.display='flex';
        condicao2 = false;

    }else{
        condicao2=true;
        telaCarrinho.style.width='0';
        telaCarrinho.style.height='0';
        setTimeout(() => {
            telaCarrinho.style.display='none';
            seta5.style.display='none';
        }, 60);
    }
})






