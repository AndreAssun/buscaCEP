<?php

function get_endereco($cep){

    // ..formatar o cep removendo caracteres nao numericos
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url ="http://viacep.com.br/ws/$cep/xml/";

    $xml = simplexml_load_file($url);
    return $xml;
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Pesquisar Endereço</h1>
<form action="" method="POST">

<input class="form-control" type="text" name="cep">

<button type="submit" class="btn btn primary">Pesquisar endereço</button>

</form>

<?php if($_POST['cep']){ ?>
<h2>Resultado da pesquisa</h2>
<p>
    <?php $endereco = get_endereco($_POST['cep']); ?>
    <b>CEP:</b> <?php echo $endereco->cep; ?><br>
    <b>Logradouro</b> <?php echo $endereco ->logradouro; ?> <br>
    <b>Bairro:</b>  <?php echo $endereco ->bairro; ?> <br>
    <b>Localidade:</b>  <?php echo $endereco ->localidade; ?> <br>
    <b>UF:</b>  <?php echo $endereco ->uf; ?> <br> 
</p>

<?php } ?>
    





    
</body>
</html>
