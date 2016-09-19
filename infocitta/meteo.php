<?php
  include 'token.php';
  $meteo = file_get_contents("http://api.wunderground.com/api/".$tokenwg."/conditions/lang:IT/q/Italy/".$_GET['city'].".json");
  $json = json_decode($meteo, true);
  $condizione = $json['current_observation']['weather'];
  $temp= $json['current_observation']['temp_c'];
  $umidita=$json['current_observation']['relative_humidity'];
  $icon=$json['current_observation']['icon'];
  

  switch ($icon) {
    case "clear":
      $icont=":sunny:";
      break;
    case "rain":
      $icont=":umbrella:";
      break;
    case "partlycloudy":
      $icont=":partly_sunny:";
      break;
    case "mostlycloudy":
      $icont=":partly_sunny:";
      break;
    case "cloudy":
      $icont=":cloud:";
      break;
    case "sunny":
      $icont=":sunny:";
      break;      
  }
  
  echo 'Condizioni: '.$condizione." ".$icont."\r\n";
  echo 'Temperatura: '.$temp." C\r\n";
  echo 'Umidita\': '.$umidita."\r\n";
?>
