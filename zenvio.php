<html>
 <head>
  <title>API Onnibank</title>
 </head>
 <body>
 <?php 
   $warq = $_GET['warq'];
   //$wcam = $_POST['wcam'];   
   //$wcam2 = br2nl($wcam);
   //$wcam2 = nl2br($wcam);

	$entityBody = file_get_contents('php://input');
   
   $wcam = $entityBody;
   $wcam2 = strtr($wcam, '#', chr(13));
   $wcam2 = $wcam;
   
   //$wcam = 'Bla' . PHP_EOL . 'Bla';
   
   echo '<br>' ; 
   
   echo '<template>' . $warq . '</template>'; 
   //echo '<p>' . $wcam . '</p>'; 

   echo '<conteudo>' . $wcam2 . '</conteudo>';    
   
   //$arquivo = fopen($warq,'w');
   //fwrite($arquivo, $wcam);
   //fclose($arquivo);
 
 file_put_contents($warq,$wcam2);


$url = 'https://hml-paycheck.onnibank.com.br/service-gateway/paycheck/batch';

$headers = array(
    'requester-token:ZxfS1oAamTeIYELtFitnrFrESahFsqcHb6Vro1/rK7GLIX7UVTtJBrmNUR32CYwXEf5nS68TohDfTSHOL+5Obvo1T8fpIW87rC6+cF2glkxQ14h76c8Ah361CmjQtPc/2qFwe6XX9LOGFpivVpzf4GE/vBYw7yFMurVa7Hb+UQuab0sN2iXjI1rW8qWL6ovpOMmz9QasSrUDU2Ds7NEW7MX/NIybtoVmRa9SSYQvckOzXSi8vP9kv0ojvaMl8t/p4+DXWL3Yn9z9d75gLKFIicZpb4/bjI9oQCcdYjjGVEn+c6mWRggyIjZgcWTRC3jEKy',
    'requester-id: onibank.ws',
    'authentication-mode: BASIC',
    'Content-Type: application/json',
    'unique-trx-id: 337',
);
$json_data = $wcam2;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Executar
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Erro na requisi��o cURL: ' . curl_error($ch);
}
curl_close($ch);

// Mostra resposta
echo $response;
file_put_contents('respostaDev.json', $response);






  
 function br2nl ( $string )
{
    return preg_replace('/\<br(\s*)?\/?\>/i', PHP_EOL, $string);
}
 
 ?> 
 </body>
</html>

