<?php
    require '../../vendor/autoload.php'; // Carrega o autoloader do Composer
    require '../config.php'; // Conexão com o banco de dados

    use Dompdf\Dompdf;
    use Dompdf\Options;

    // Configurações do Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    // Consulta ao banco de dados para obter as consultas
    $query = $pdo->prepare("
            SELECT CONSULTA.ID_CON, 
                CONSULTA.ID_MEDICO,
                CONSULTA.DATA_CONSULTA,
                CONSULTA.HORA_CONSULTA,
                PACIENTE.NOME AS PACIENTE,
                MEDICO.NOME AS MEDICO,
                MEDICO.ESPECIALIDADE AS ESPECIALIDADE
            FROM CONSULTA
            INNER JOIN MEDICO ON CONSULTA.ID_MEDICO = MEDICO.ID
            INNER JOIN PACIENTE ON CONSULTA.ID_PACIENTE = PACIENTE.ID
            ORDER BY CONSULTA.ID_CON");
    $query->execute();
    $consultas = $query->fetchAll(PDO::FETCH_ASSOC);

    $html = '
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consultas</title>
        <style>
            body { font-family: Arial, sans-serif; font-size: 12px; }
            h1 { font-size: 18px; }
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { border: 1px solid #000; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; }
        </style>
    </head>
    <body>

        <h1>Detalhes das consultas</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Especialidade</th>
                    <th>Data</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>';
                foreach ($consultas as $consulta) {
                    $html .= '<tr>
                        <td>' . $consulta['ID_CON'] . '</td>
                        <td>' . $consulta['PACIENTE'] . '</td>
                        <td>' . $consulta['MEDICO'] . '</td>
                        <td>' . $consulta['ESPECIALIDADE'] . '</td>
                        <td>' . date('d/m/Y', strtotime($consulta['DATA_CONSULTA'])) . '</td>
                        <td>' . $consulta['HORA_CONSULTA'] . '</td>
                    </tr>';
                }
    $html .= '
            </tbody>
        </table>
    </body>
    </html>';

    // Carrega o HTML no Dompdf
    $dompdf->loadHtml($html);

    // Define o tamanho do papel e a orientação
    $dompdf->setPaper('A4', 'portrait');

    // Renderiza o PDF
    $dompdf->render();

    // Envia o PDF para o navegador
    $dompdf->stream("lista_consultas.pdf", ["Attachment" => false]);
 ?>