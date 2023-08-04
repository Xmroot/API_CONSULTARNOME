<?php

error_reporting(0); 

set_time_limit(0); 
$time = time(); 

$time = time();

function multiexplode($delimiters, $string) {
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}

$lista = $_GET['lista'];
 $cpf = multiexplode(array("|", " "), $lista)[0];
 $mes = multiexplode(array("|", " "), $lista)[1];
$ano = multiexplode(array("|", " "), $lista)[2];
$cvv = multiexplode(array("|", " "), $lista)[3];

$mes1 = substr("$mes", 0, 1);
$cc2 = substr("$cc", 4, 4);
$cc3 = substr("$cc", 8, 4);
 $ano7 = substr("$ano", 2, 2);

 $mes1 = substr("$mes", 1, 1);

function getStr($string, $start, $end) {
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://sistema.consultcenter.com.br/localizador_nacional/consultar/4175');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1
);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: sistema.consultcenter.com.br',
'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
'origin: https://sistema.consultcenter.com.br',
'content-type: application/x-www-form-urlencoded',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'referer: https://sistema.consultcenter.com.br/localizador_nacional/consultar/4175',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7,gl;q=0.6',
'cookie: CakeCookie[comunicado_lido]=Q2FrZQ%3D%3D.; CAKEPHP=ipqnd1uj901ipd4mpr7q8jc6r3; _ga=GA1.1.97640915.1690102436; _ga_1LC0HXTHVZ=GS1.1.1690102435.1.1.1690102457.0.0.0; _ga_YDHQEDCCPS=GS1.1.1690102437.1.1.1690102457.0.0.0'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'nome='.$lista.'&uf=');
 $pay = curl_exec($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://sistema.consultcenter.com.br/localizador_nacional/resultado');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1
);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: sistema.consultcenter.com.br',
'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
'origin: https://sistema.consultcenter.com.br',
'content-type: application/x-www-form-urlencoded',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'referer: https://sistema.consultcenter.com.br/localizador_nacional/consultar/4175',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7,gl;q=0.6',
'cookie: CakeCookie[comunicado_lido]=Q2FrZQ%3D%3D.; CAKEPHP=ipqnd1uj901ipd4mpr7q8jc6r3; _ga=GA1.1.97640915.1690102436; _ga_1LC0HXTHVZ=GS1.1.1690102435.1.1.1690102457.0.0.0; _ga_YDHQEDCCPS=GS1.1.1690102437.1.1.1690102457.0.0.0'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

 $htmlTable = curl_exec($ch);

// Conteúdo da tabela HTML


// Criar um DOMDocument para analisar a tabela HTML
$dom = new DOMDocument();
$dom->loadHTML($htmlTable);

// Inicializar um array vazio para armazenar os dados extraídos
$dadosExtraidos = array();

// Encontrar todas as linhas da tabela (tr)
$linhas = $dom->getElementsByTagName('tr');

// Percorrer cada linha e extrair os dados
foreach ($linhas as $index => $linha) {
    // Limitar a extração de dados para até 10 resultados
    if ($index >= 10) {
        break;
    }

    $dadosLinha = array();

    // Encontrar todas as células da linha (td)
    $celulas = $linha->getElementsByTagName('td');

    // Percorrer cada célula e extrair o conteúdo
    foreach ($celulas as $celula) {
        $dadosLinha[] = trim($celula->nodeValue);
    }

    // Adicionar os dados extraídos da linha ao array de resultado
    $dadosExtraidos[] = $dadosLinha;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Dados</title>
    <style>
        /* Estilo CSS para a tabela */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Dados Extraídos da Tabela</h1>
    <table>
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Idade</th>
            <th>Resultado 1</th>
            <th>Resultado 2</th>
            <th>Resultado 3</th>
            <th>Local</th>
        </tr>
        <?php
        // Exibir os dados extraídos na tabela HTML
        foreach ($dadosExtraidos as $linha) {
            echo '<tr>';
            foreach ($linha as $celula) {
                echo '<td>' . $celula . '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>

?>