<?php
require_once __DIR__ . '/vendor/autoload.php';

include("conexao.php");

$mpdf = new \Mpdf\Mpdf();

// CONSULTA
$sql = "SELECT * FROM produtos";
$result = mysqli_query($conection, $sql);

// HTML do relatório
$html = "
<h1 style='text-align:center;'>Relatório de Produtos</h1>
<hr>
<table border='1' width='100%' style='border-collapse: collapse;'>
<tr>
    <th>ID</th>
    <th>NOME</th>
</tr>
";

while($row = mysqli_fetch_assoc($result)){
    $html .= "
    <tr>
        <td>{$row['id']}</td>
        <td>{$row['nome']}</td>
    </tr>
    ";
}

$html .= "</table>";

// Cabeçalho e rodapé
$mpdf->SetHeader('Relatório de Produtos');
$mpdf->SetFooter('Vitor Hugo Abreu Moreira');

// Gerar PDF
$mpdf->WriteHTML($html);
$mpdf->Output();