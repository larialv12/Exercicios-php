<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cacluladora</h1>

    <form action ="Calculadora.php " method="get">
    

     <input type="text" name="numero1" id="numero1" />
      <input type="text" name="numero2" id="numero2" />
        <button type="submit" name="calcula" id="calcula" value="somar">Somar (+)</button>
        <button type="submit" name="calcula" id="calcula" value="subtrair">Subtrair (-)</button>
        <button type="submit" name="calcula"id="calcula"  value="multiplicar">Multiplicar (×)</button>
        <button type="submit" name="calcula" id="calcula" value="dividir">Dividir (÷)</button>




    </form>
    
    <?php

  if (isset($_GET['numero1']) && isset($_GET['numero2'])) {
    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];

    if (is_numeric($numero1) && is_numeric($numero2)) {
        switch ($_GET['calcula']) {
            case 'somar':
                $resultado = $numero1 + $numero2;
                echo "Resultado da soma é: $resultado";
                break;
            case 'subtrair':
                $resultado = $numero1 - $numero2;
                echo "Resultado da subtração é: $resultado";
                break;
            case 'multiplicar':
                $resultado = $numero1 * $numero2;
                echo "Resultado da multiplicação é: $resultado";
                break;
            case 'dividir':
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                    echo "Resultado da divisão é: $resultado";
                } else {
                    echo "Divisão por zero inválida.";
                }
                break;
            default:
                echo "Operação inválida.";
        }
    } else {
        echo "Por favor, insira números válidos.";
    }
}


   

    //peguei elementos do formulario pelo get
    //Validacao para verificar se o valor digitado pelo usuario é numero



/* Este código realiza operações matemáticas de acordo com a escolha do usuário.
   Optei por utilizar a estrutura switch para capturar qual operação foi selecionada por meio dos botões.
   Cada case armazena na variável 'resultado', o calculo com  a operação correspondente escolhida.
   Ao final, o resultado é exibido ao usuário por meio do comando echo.
*/



    ?>
    
</body>
</html>