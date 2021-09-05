<?php
  $curl = curl_init("http://localhost:8888/sakila/api/api.php");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $data = curl_exec($curl);
  if ($data == false) {
    var_dump(curl_error($curl));
  } else {
    $data = json_decode($data, true);
    $i = 0;
    while ($i <= count($data)) {
      $result = $data[$i];
      echo $result["title"]."</br>";
      $i++;
    }
  }
  curl_close($curl);