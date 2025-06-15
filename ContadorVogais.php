<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8" />
		<title>title</title>
	</head>

	<body>
		<form>
			<h1>Contador de Vogais</h1>
			<label for="texto">Digite um texto:</label>
			<textarea name="texto" maxlength="3000"></textarea>
			<button type="submit" name="contar" id="contar">Contar Vogais</button>

		</form>



		</table>


		<?php
  $textoDigitado = $_GET["texto"];

  $textoDigitado = preg_replace(
      [
          "/(á|à|ã|â|ä)/",
          "/(Á|À|Ã|Â|Ä)/",
          "/(é|è|ê|ë)/",
          "/(É|È|Ê|Ë)/",
          "/(í|ì|î|ï)/",
          "/(Í|Ì|Î|Ï)/",
          "/(ó|ò|õ|ô|ö)/",
          "/(Ó|Ò|Õ|Ô|Ö)/",
          "/(ú|ù|û|ü)/",
          "/(Ú|Ù|Û|Ü)/",
          "/(ñ)/",
          "/(Ñ)/",
      ],
      explode(" ", "a A e E i I o O u U "),
      $textoDigitado
  );

  $arrayDeCaracteres = str_split($textoDigitado);

  //alterar aqui

  $arrayVogais = ["a", "e", "i", "o", "u"];

  //usuario digita o texto
  // o texto é transformado em um array de caracteres
  //percorre o array de caracteres
  //encontra as vogais
  //conta as vogais
  // exibe a quantidade de vogais

  if (isset($_GET["contar"]) && !empty($textoDigitado)) {
      $contagem = [];

      foreach ($arrayVogais as $vogal) {
          $contagem[$vogal] = 0;
      }

      for ($i = 0; $i < count($arrayDeCaracteres); $i++) {
          $letra = $arrayDeCaracteres[$i];
          if (in_array($letra, $arrayVogais)) {
              $contagem[$letra]++;
          }
      }

      echo '<table border="1">
            <tr>
                <th>Vogal</th>
                <th>Quantidade</th>
            </tr>';

      foreach ($contagem as $vogal => $quantidade) {
          $totalVogais += $quantidade;

        echo "<tr><td>$vogal</td><td>$quantidade</td></tr>";
      }
      echo "</table>";

    echo '<table border="1"><tr><th>Total : </th><td>' . $totalVogais . '</td></tr></table>';
  }
  ?>


	</body>

</html>