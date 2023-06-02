<?php

namespace HaronMoreira\BebidasChabas\services;

use PHPMailer\PHPMailer\PHPMailer;

class SendMail
{
    public static function EnviarEmail()
    {

        $produtos = GetLowEmail::GetLow();

        $table = "";
        foreach ($produtos as $produto){
            $valores ="
            <tr>
                <td>".$produto['nome_produto']."</td>
                <td>".$produto['qtd_estoque']."</td>
            </tr>";

            $table .= $valores;
        }

        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '9865dd188ba3e4';
        $phpmailer->Password = '89101f917fdac3';
        $phpmailer->isHTML(true);


        $phpmailer->addAddress('haron.moreira@teste.com', 'Haron');

        $phpmailer->Subject = 'Report Estoque';
        $phpmailer->CharSet = 'UTF-8';

        $phpmailer-> Body =

            '<!DOCTYPE html>
            <html lang="pt-br" style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;">
            <head style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;">
                <meta charset="UTF-8" style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;">
                <title style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;">Billing Report</title>
            
              
              <link rel="preconnect" href="https://fonts.googleapis.com" style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;">
              <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;">
              
            </head>
            <body style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;">
              <div class="header" style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;width: 100vw;height: 15vh;background-color: #FF2C00;color: #FFF;display: flex;flex-direction: row;justify-content: center;align-items: center;">
                  <h1 style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif; text-align: center">ATENÇÃO!</h1>
              </div>
            
              <div class="body" style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;display: flex;align-items: center;flex-direction: column;justify-content: center;width: 100vw;min-height: 70vh;">
                <h1 style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;">Os produtos abaixo estão com pouco estoque!</h1>
                <p style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;">(Menos de <span style="color: #FF2C00;padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;">10</span> unidades) </p>
                
                <table>
                      <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                      </tr>
                      '.$table.'
                </table>               
              </div>
            
              <div class="footer" style="padding: 0;box-sizing: border-box;margin: 0;font-family: &quot;Bree Serif&quot;, sans-serif;width: 100vw;height: 15vh;background-color: #FF2C00;color: #FFF;display: flex;flex-direction: row;justify-content: center;align-items: center;text-align: center">
                <p>Bebidas Chabás - 2023</p>
              </div>
            </body>
            </html>';

        if (!$phpmailer -> send()){

            for ($i = 0; $i < 3; $i++) {
                if (!$phpmailer -> send()) {
                    continue;
                } else {
                    break;
                }
            }

        }


    }
}