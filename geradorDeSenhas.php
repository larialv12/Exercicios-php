<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeradorDeSenhas</title>
</head>
<body>
    <form method="get">
        <label>Comprimento da Senha</label>
        <input type="number" name="tamanhoSenha" min="6" placeholder="No minimo 6" />

        <h4>Incluir letras maiúsculas?</h4>
        <select name="maiusculas" id="maiusculas" required>
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select>

        <h4>Incluir letras minúsculas?</h4>
        <select name="minusculas" id="minusculas" required>
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select>

        <h4>Incluir números?</h4>
        <select name="numeros" id="numeros" required>
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select>

        <h4>Incluir Símbolos?</h4>
        <select name="simbolos" id="simbolos" required>
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select>

        <button type="submit" name="gerar" id="gerar">Gerar senha</button>
    </form>

    <?php


/* Para o gerador de senhas, declarei os caracteres que seriam usados em variáveis separadas.
   Através de uma função, converti esses caracteres em um array. Depois, usei os índices desse array 
   como referência as opcoes do HTML. Em seguida, é feito um forEach para verificar se foi marcada 
   a opção de usar caracteres específicos, aplicando o merge dos arrays e criando um novo array com 
   as opções selecionadas. Por fim, utilizo um for para gerar a senha de acordo com o tamanho 
   desejado e de forma aleatória. */


    $numeros = "0123456789";
    $letrasMinusculas = "abcdefghijklmnopqrstuvwxyz";
    $letrasMaiusculas = "ABCDEFGHIJLMNOPQRSTUVWXYZ";
    $simbolos = "!@#$%^&*?/+~";



    /**
         * Converte strings para array multidimensional .
         *
         * 
         * @param array $strings array de  Strings a serem convertidas para array multi .
         * @return array   Retorna um array multidimensional convertido da string .
         */

    function ConvertePraArrayMulti(array $strings): array {
        $arrayConvertidos = [];
        foreach ($strings as $string) {
            $arrayConvertidos[] = str_split($string);
        }
        return $arrayConvertidos;
    }

    if (isset($_GET["gerar"])&& !empty($_GET["tamanhoSenha"])) {
        $tamanhoSenha = $_GET["tamanhoSenha"];

        $arrayDeCaracteres = [$numeros, $letrasMaiusculas, $letrasMinusculas, $simbolos];

        $arrayTotal = ConvertePraArrayMulti($arrayDeCaracteres);

       // array 0 = numeros
//array 1 = Maiusculas 
// array 2 = minusculas
//array 3 = simbolos


        $opcoes = [
            'numeros' => $arrayTotal[0],
            'maiusculas' => $arrayTotal[1],
            'minusculas'    => $arrayTotal[2],
            'simbolos'   => $arrayTotal[3],
        ];

    $arrayEscolhidos = [];
    foreach ($opcoes as $campo => $escolhidos) {
  if ( $_GET[$campo] === "sim") {

            $arrayEscolhidos = array_merge($arrayEscolhidos, $escolhidos);
        }
    }
 


    for ($i = 0; $i < $tamanhoSenha; $i++) {
        $aleatorio = array_rand($arrayEscolhidos);
        $senhaGerada .= $arrayEscolhidos[$aleatorio];
    }

    echo $senhaGerada;
}
    ?>
</body>
</html>
