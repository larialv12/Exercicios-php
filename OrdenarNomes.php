
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizador de nomes</title>
</head>
<body>
    			<h1>Organizador de nomes</h1>


<form>
			<label for="texto">Digite nomes separados por ,:</label>
			<textarea name="listaNomes" maxlength="3000"></textarea>
			<button type="submit" name="ordenar" id="ordenar">Ordenar nomes</button>

		</form>

          <?php // Usuário digita os nomes separados por vírgula e aperta o botão
// Converte para um array de strings utilizando a vírgula como separador
// Utiliza natsort() para ordenar em ordem alfabética
// Utiliza implode() para retornar a string com os nomes ordenados
// Retorna ao usuário os nomes em ordem alfabética


          if (isset($_GET["ordenar"]) && !empty($_GET["listaNomes"])) {
              $listaNomes = $_GET["listaNomes"];

                  $nomes = explode(",", $listaNomes);
                  natsort($nomes);
                   $nomesConvertidos = implode(",", $nomes);
                   echo $nomesConvertidos;
          } ?>

    
</body>


      
</html>
