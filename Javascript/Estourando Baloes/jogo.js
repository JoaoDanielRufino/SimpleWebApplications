var timerId = null;

function iniciaJogo(){
  var url = window.location.search;
  var nivel_jogo = url[1];
  var tempo;

  switch(nivel_jogo){
    case '1':
      tempo = 120;
      break;
    case '2':
      tempo = 60;
      break;
    case '3':
      tempo = 30;
  }

  document.getElementById('cronometro').innerHTML = tempo;

  var qtdBaloes = 80;
  criaBaloes(qtdBaloes);

  document.getElementById('baloes-inteiros').innerHTML = qtdBaloes;
  document.getElementById('baloes-estourados').innerHTML = 0;

  contagemTempo(tempo);
}

function criaBaloes(qtdBaloes){
  var balao;
  for(var i = 0; i < qtdBaloes; i++){
    balao = document.createElement("img");
    balao.src = 'imagens/balao_azul_pequeno.png';
    balao.style.margin = '10px';
    balao.style.padding = '2px 0px 0px 3px';
    balao.id = 'b'+i;
    balao.onclick = function(){estourar(this);};
    document.getElementById('baloes-cenario').appendChild(balao);
  }
}

function contagemTempo(segundos){
  if(segundos == -1){
    clearTimeout(timerId);
    gameOver();
    return;
  }

  document.getElementById('cronometro').innerHTML = segundos--;

  timerId = setTimeout("contagemTempo("+segundos+")", 1000);
}

function estourar(balao){
  document.getElementById(balao.id).setAttribute("onclick", ""); //Eliminando a possibilidade de contar pontos em baloes ja estourados
  document.getElementById(balao.id).src = 'imagens/balao_azul_pequeno_estourado.png';
  pontuacao();
}

function pontuacao(){
  var baloesInteiros = parseInt(document.getElementById('baloes-inteiros').innerHTML);
  var baloesEstourados = parseInt(document.getElementById('baloes-estourados').innerHTML);

  baloesInteiros--;
  baloesEstourados++;

  document.getElementById('baloes-inteiros').innerHTML = baloesInteiros;
  document.getElementById('baloes-estourados').innerHTML = baloesEstourados;

  if(baloesInteiros == 0)
    venceu();
}

function venceu(){
  alert('Parabens!! Voçê estourou todos os balões no tempo!!!');
  clearTimeout(timerId);
}

function gameOver(){
  removeBaloes();
  alert('Fim de Jogo!! Você não estourou todos os balões no tempo!!');
}

function removeBaloes(){
  var i = 0;
  while(document.getElementById('b'+i)){
    document.getElementById('b'+i).onclick = '';
    i++;
  }
}
