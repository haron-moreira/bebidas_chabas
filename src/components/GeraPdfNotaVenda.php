<?php

namespace HaronMoreira\BebidasChabas\components;

use Dompdf\Dompdf;
use Dompdf\Options;

class GeraPdfNotaVenda
{
    public static function reportaVenda(array $produtos)
    {

        $date = new \DateTime("now", new \DateTimeZone("America/Sao_paulo"));
        $agora = $date->format("d/m/Y H:i");

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);
        $tableBody = "";
        $id = 1;

        $valor_final = "R$ " . number_format($produtos['soma'], 2,",", ".");

        foreach ($produtos['produtos'] as $key => $produto) {

            $valor_unitario = "R$ " . number_format($produto['valor_unitario']/100, 2,",", ".");
            $valor_total = "R$ " . number_format(intval($produto['valor_unitario']) * intval($produto['quantidade']) /100, 2,",", ".");

            $tableBody .= '<tr>
                              <td style="border: 2px solid black; padding: 5px;">'.$id.'</td>
                              <td style="border: 2px solid black; padding: 5px;">'.$key.'</td>
                              <td style="border: 2px solid black; padding: 5px;">'.$produto['name'].'</td>
                              <td style="border: 2px solid black; padding: 5px;">'.$produto['quantidade'].'</td>
                              <td style="border: 2px solid black; padding: 5px;">'.$valor_unitario.'</td>
                              <td style="border: 2px solid black; padding: 5px;">'.$valor_total.'</td>
                            </tr>';
            $id += 1;
        }

        $html = '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nota</title>
</head>
<body style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 1vh;text-align: center;">
<header style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
  <h1>Registro de Venda</h1>
  <h5>Via única</h5>
  <h3>Bebidas Chabás</h3>
  <p>Data/hora: '.$agora.'</p>
</header>
<main style="text-align: center;">
  <header>
    <p style="font-weight: bold;">Lista de produtos vendidos</p>
  </header>
</main>
<table style="border: 2px solid black; width: 100%; border-collapse: collapse;">
  <thead>
    <th style="border: 2px solid black; padding: 5px;">ID</th>
    <th style="border: 2px solid black; padding: 5px;">Cód Produto</th>
    <th style="border: 2px solid black; padding: 5px;">Nome</th>
    <th style="border: 2px solid black; padding: 5px;">Quantidade</th>
    <th style="border: 2px solid black; padding: 5px;">Valor Unitário</th>
    <th style="border: 2px solid black; padding: 5px;">Valor Total</th>
  </thead>
  <tbody>
'.$tableBody.'
  </tbody>
</table>
<table style="border: 2px solid black; width: 100%; border-collapse: collapse;">
  <tbody>
  <tr>
    <td style="border: 2px solid black; padding: 5px;">Valor Final: '.$valor_final.'</td>
  </tr>
  </tbody>
</table>
<footer>

</footer>
</body>
</html>';

        // Carregue o HTML no Dompdf
        $dompdf->loadHtml($html);

        // Renderize o PDF (saída para o navegador ou salve em um arquivo)
        $dompdf->render();
        $dompdf->stream(__DIR__.'notas/registro-de-venda.pdf');

    }
}