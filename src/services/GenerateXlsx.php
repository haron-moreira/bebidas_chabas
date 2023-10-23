<?php

namespace HaronMoreira\BebidasChabas\services;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GenerateXlsx
{
    public static function Gen($gastos, $vendas)
    {

        try {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setTitle("Gastos");



            $sheet->setCellValue('A1', 'ID');
            $sheet->setCellValue('B1', 'Valor Gasto');
            $sheet->setCellValue('C1', 'Motivo');
            $sheet->setCellValue('D1', 'Referencia');

            $row = 2;
            foreach ($gastos as $gasto) {
                $sheet->setCellValue('A' . $row, $gasto['ID']);
                $sheet->setCellValue('B' . $row, $gasto['Valor Gasto']);
                $sheet->setCellValue('C' . $row, $gasto['Motivo']);
                $sheet->setCellValue('D' . $row, $gasto['Referencia']);
                $row++;
            }


            $newSheet = $spreadsheet->createSheet();
            $newSheet->setTitle('Vendas');

            $newSheet->setCellValue('A1', 'ID');
            $newSheet->setCellValue('B1', 'Valor');
            $newSheet->setCellValue('C1', 'Quantidade de Produtos');
            $newSheet->setCellValue('D1', 'Referencia');

            $row = 2;
            foreach ($vendas as $venda) {
                error_log($venda['Valor']);
                $newSheet->setCellValue('A' . $row, $venda['Venda']);
                $newSheet->setCellValue('B' . $row, $venda['Valor']);
                $newSheet->setCellValue('C' . $row, $venda['Produtos']);
                $newSheet->setCellValue('D' . $row, $venda['Referencia']);
                $row++;
            }


            $writer = new Xlsx($spreadsheet);
            $writer->save('../files/faturamento.xlsx');

            return True;
        } catch (\Exception $e) {
            error_log($e);
            return False;
        }


    }
}