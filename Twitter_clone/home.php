<?php

  session_start();

  if(!isset($_SESSION['usuario']))
    header('Location: index.php?erro=1');

  require_once('database.php');

  $id_usuario = $_SESSION['id_usuario'];

  $database = new database();
  $link = $database->conecta_mysql();

  $sql = "SELECT COUNT(*) AS qtd_tweets FROM tweet WHERE id_usuario = $id_usuario";

  $res = $link->query($sql);

  $qtd_tweets = 0;
  if($res){
    $registro = $res->fetch_array(MYSQLI_ASSOC);
    $qtd_tweets = $registro['qtd_tweets'];
  }

  $sql = "SELECT COUNT(*) AS qtd_seguidores FROM usuarios_seguidores WHERE seguindo_id_usuario = $id_usuario";

  $res = $link->query($sql);

  $qtd_seguidores = 0;
  if($res){
    $registro = $res->fetch_array(MYSQLI_ASSOC);
    $qtd_seguidores = $registro['qtd_seguidores'];
  }

  $link->close();

?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">

  <title>Twitter clone</title>

  <!-- jquery - link cdn -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

  <!-- bootstrap - link cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <script type="text/javascript">

    $(document).ready(function(){

      $('#btn-tweet').click(function(){
        var tweet = $('#texto-tweet').val();
        if(tweet.length > 0){
          $.ajax({
            url: 'inclui_tweet.php',
            method: 'post',
            // {chave: conteudo}
            // data: {texto_tweet: tweet},
            // Outra forma de fazer eh usando serialize(), sendo necessario utilizar formulario e o name no input
            data: $('#form_tweet').serialize(),
            success: function(){
              $('#texto-tweet').val('')
              atualizaTweet();
            }
          });
        }
      });

      function atualizaTweet(){
        $.ajax({
          url: 'get_tweet.php',
          success: function(data){
            $('#tweets').html(data);
          }
        });
      }

      atualizaTweet();

    });

  </script>

</head>

<body>

  <!-- Static navbar -->
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="index.php"><img src="imagens/icone_twitter.png" /></a>
      </div>

      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php?saiu=true" id="sair">Sair</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>


  <div class="container">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <h4><?= $_SESSION['usuario'] ?></h4>
          <hr/>

          <div class="col-md-6">
            TWEETS<br/> <?= $qtd_tweets ?>
          </div>

          <div class="col-md-6">
            SEGUIDORES<br/> <?= $qtd_seguidores ?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <form id="form_tweet" class="input-group">
            <input type="text" id="texto-tweet" class="form-control" name="texto_tweet" placeholder="O que esta acontecendo agora?" maxlength="140"></input>
            <span class="input-group-btn">
              <button class="btn btn-default" id="btn-tweet" type="button">Tweet</button>
            </span>
          </form>
        </div>
      </div>

      <div id="tweets" class="list-group"></div>
    </div>

    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <h4><a href="procurar_pessoas.php">Procurar por pessoas</a></h4>
        </div>
      </div>
    </div>
  </div>


</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>
