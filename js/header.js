let seta = document.getElementById('seta');
let cadastrarConta = document.getElementById('cadastrarConta');
let seta3 = document.getElementById('seta3');
let condicao = true;

seta.addEventListener('click', () => {

    if (condicao) {
        cadastrarConta.style.display = 'block';
        seta.style.transform = 'rotate(360deg)';
        seta3.style.display = 'block';
        cadastrarConta.style.opacity = "1";
        seta3.style.opacity = "1";
        condicao = false;

    } else {
        seta.style.transform = 'rotate(180deg)';
        cadastrarConta.style.opacity = "0";
        seta3.style.opacity = "0";
        condicao = true;
    }


})

let esqueceuSenha = document.getElementById('esquecerSenha')
let seta2 = document.getElementById('seta2');
let entreAqui = document.getElementById('entreAqui')
let entrarConta = document.getElementById('entrarConta');
let seta4 = document.getElementById('seta4');
let recTxt= document.getElementById('recTxt');
let voltarTxt = document.getElementById('voltarInicio');
let voltarCadTxt = document.getElementById('voltarCadTxt');

entreAqui.addEventListener('click', ()=>{
    entrarConta.style.opacity="1";
    seta4.style.opacity="1";
    cadastrarConta.style.opacity="0";
    seta3.style.opacity="0";
})