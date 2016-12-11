<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exemplo Stopwatch Fibonacci</title>
  </head>
  <body>
    <?php
      use Symfony\Component\Stopwatch\Stopwatch;

      // criação de um exemplo de função fibonacci já feito em sala de aula (modelo recursivo)
      function fibonacci($value) {
        if ($value <= 2) {
          return 1;
        } else {
          return fibonacci($value - 1) + fibonacci($value - 2);
        }
      }

      // criação do stopwatch
      $stopwatch = new Stopwatch();
      // vamos medir o tempo de execução dos 35 primeiros termos da sequência de fibonacci
      for ($i=1; $i <= 30; $i++) {
        $nomeEvento = sprintf('Fibonacci %d', $i);
        // criando o nome do evento a ser medido
        $evento = $stopwatch->start($nomeEvento, 'fibonacci');
        echo "termo $i da sequência de Fibonacci é: ".fibonacci($i)." - - - - - - - -";
        $evento->stop();

        echo "O evento ". $nomeEvento ." durou ". $evento->getDuration() . "ms. <br/>";
      }
      echo "Como percebemos, à medida em que o valor vai aumentando, o tempo de processamento aumenta,
            por causa da recursividade feita com um valor alto.";
    ?>
  </body>
</html>
