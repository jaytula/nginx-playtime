<!DOCTYPE html>
<?php
$url = "http://cra:3000/dist/asset-manifest.json";

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);

$data = curl_exec($curl);

curl_close($curl);

$decoded = json_decode($data);
$script_prefix = '/dist/';
?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div id="root"></div>
  
  <?php foreach($decoded->entrypoints as $entry): ?>
    <script src="<?= $script_prefix . $entry ?>"></script>
  <?php endforeach; ?>
</body>
</html>