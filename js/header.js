let seta = document.getElementById('seta');
let cadastrarConta = document.getElementById('cadastrarConta');
let seta3 = document.getElementById('seta3');
let condicao = true

seta.addEventListener('click', () => {

    if (condicao) {
        cadastrarConta.style.display = 'block'
        seta.style.transform = 'rotate(360deg)';
        seta3.style.display = 'block';
        condicao = false

    } else {
        seta.style.transform = 'rotate(180deg)';
        cadastrarConta.style.display = 'none';
        seta3.style.display = 'none';
        condicao = true
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
    entrarConta.style.display="block";
    seta4.style.display="block";
})

seta.addEventListener('click', ()=>{
    entrarConta.style.display="none";
    seta4.style.display="none";
})

recTxt.addEventListener('click', ()=>{
    entrarConta.style.display="none";
    seta4.style.display="none";
    cadastrarConta.style.display="none";
    seta3.style.display="none";
    esqueceuSenha.style.display="block";
    seta2.style.display="block";
})

seta.addEventListener('click', ()=>{
    esqueceuSenha.style.display="none";
    seta2.style.display="none";
})

voltarTxt.addEventListener('click', ()=>{
    esqueceuSenha.style.display="none";
    seta2.style.display="none";
    entrarConta.style.display="block";
    seta4.style.display="block";
})

voltarCadTxt.addEventListener('click', ()=>{
    entrarConta.style.display="none";
    seta4.style.display="none";
    cadastrarConta.style.display="block";
    seta3.style.display="block";
})






