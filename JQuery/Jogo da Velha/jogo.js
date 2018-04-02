var rodada = 1;
var terminou = false;
var matrizJogo = Array(3);

matrizJogo['a'] = Array(3);
matrizJogo['b'] = Array(3);
matrizJogo['c'] = Array(3);

matrizJogo['a'][1] = 0;
matrizJogo['a'][2] = 0;
matrizJogo['a'][3] = 0;

matrizJogo['b'][1] = 0;
matrizJogo['b'][2] = 0;
matrizJogo['b'][3] = 0;

matrizJogo['c'][1] = 0;
matrizJogo['c'][2] = 0;
matrizJogo['c'][3] = 0;

$(document).ready(function(){

  $('#btn-iniciar').click(function(){
    if(rodada == 1){
      if($('#apelido1').val() == ''){
        alert('Apelido do jogar 1 nao foi preenchido');
        return false;
      }

      if($('#apelido2').val() == ''){
        alert('Apelido do jogar 2 nao foi preenchido');
        return false;
      }

      $('#palco-jogo').show();

      $('#nome1').text($('#apelido1').val());
      $('#nome2').text($('#apelido2').val());
    }

    else{
      recomecarJogo();
    }
  });

  $('.jogada').click(function(){
    var idCampoClicado = this.id;
    jogada(idCampoClicado);
  });

  function jogada(id){
    var icone;
    var ponto;

    if((rodada & 1) == 1){
      icone = 'url("imagens/marcacao_1.png")';
      ponto = -1;
    }
    else{
      icone = 'url("imagens/marcacao_2.png")';
      ponto = 1;
    }

    if($('#'+id).css('background-image') == 'none' && terminou == false){
      $('#'+id).css('background-image', icone);
      rodada++;
    }

    matrizJogo[id[0]][id[2]] = ponto;
    if(rodada > 4 && terminou == false)
      verificaVencedor();
  }

  function verificaVencedor(){
    var pontos = 0;
    for(var i = 1; i <= 3; i++){
      pontos += matrizJogo['a'][i];
    }
    vencedor(pontos);

    pontos = 0;
    for(var i = 1; i <= 3; i++){
      pontos += matrizJogo['b'][i];
    }
    vencedor(pontos);

    pontos = 0;
    for(var i = 1; i <= 3; i++){
      pontos += matrizJogo['c'][i];
    }
    vencedor(pontos);

    for(var i = 1; i <= 3; i++){
      pontos = 0;
      pontos += matrizJogo['a'][i];
      pontos += matrizJogo['b'][i];
      pontos += matrizJogo['c'][i];
      if(vencedor(pontos))
        break;
    }

    pontos = matrizJogo['a'][1] + matrizJogo['b'][2] + matrizJogo['c'][3];
    vencedor(pontos);

    pontos = matrizJogo['a'][3] + matrizJogo['b'][2] + matrizJogo['c'][1];
    vencedor(pontos);
  }

  function vencedor(pontos){
    if(pontos == -3){
      var jog1 = $('#apelido1').val();
      alert(jog1 + ' venceu a partida!!');
      terminou = true;
      return true;
    }

    else if(pontos == 3){
      var jog2 = $('#apelido2').val();
      alert(jog2 + ' venceu a partida!!');
      terminou = true;
      return true;
    }
    else if(rodada == 10){
      alert('Deu velha');
    }
  }
});

function recomecarJogo(){
  $('.jogada').css({'background-image': 'none'});

  rodada = 1;
  terminou = false;

  matrizJogo['a'][1] = 0;
  matrizJogo['a'][2] = 0;
  matrizJogo['a'][3] = 0;

  matrizJogo['b'][1] = 0;
  matrizJogo['b'][2] = 0;
  matrizJogo['b'][3] = 0;

  matrizJogo['c'][1] = 0;
  matrizJogo['c'][2] = 0;
  matrizJogo['c'][3] = 0;
}
