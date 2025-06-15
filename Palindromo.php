<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method="get">
            <textarea name="texto" maxlength="3000"></textarea>
            <button type="submit" name="verificar" id="verificar">Verificar</button>
        </form>

<?php

/*Para verificar se é palindromo ,é calculado o tamanho
da string e usado um for para extrair apenas letras,ignorando
outros caracteres como pontuacao  , depois, 
o resultado , fica armazenado numa nova variavel.
Entao é feito um novo For , baseando se na nova string que foi
limpada , ela a percorre de tras pra frente , efetuando uma
comparacao   */

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
          "/(ç)/",
          "/(Ç)/",


          
      ],
      explode(" ", "a A e E i I o O u U n N c C  "),
      $textoDigitado
  );



if (isset($_GET["texto"]) && !empty($_GET["texto"])) {
    $frase = $textoDigitado;
   

    $tamanhoString = strlen($frase);

    for ($i = 0; $i < $tamanhoString; $i++) {
        $letra = substr($frase, $i, 1);
        $letra = strtolower($letra);
        if (preg_match("/[a-z]/i", $letra)) {
            $nova .= $letra;
        }
    }
    echo "$nova <br>"  ;

    $tamanhoFraseLimpa = strlen($nova) - 1;
    $diferente = 0;

    for ($i = 0; $i < $tamanhoFraseLimpa; $i++) {
        if (substr($nova, $i, 1) != substr($nova, $tamanhoFraseLimpa, 1)) {
            $diferente++;
        }
        $tamanhoFraseLimpa--;
    }

    if ($diferente > 0) {
        echo "Não é palíndromo";
    } else {
        echo "É palíndromo";
    }
}
?>
    
</body>

</html>