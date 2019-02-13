<?php
    $id = $_POST["id"];
    $tofind = "assets/img/news/".(string)$id;
    $files = glob("assets/img/news/*.*");
    $supported_file = array('gif','jpg','jpeg','png');
    $flag = 0;
    for ($i = 0; $i < count($files); $i++) {
        $image = $files[$i];
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if (in_array($ext, $supported_file)) {
          $img = explode(".",$image);
          if($tofind == $img[0]){
              echo '<pre align="center"><img src="' . $image . '" alt="Random image" ,width=50%, height=50% style.display="block" /></pre><br>';
              $flag = 1;
              break;
          }
        }
    }
?>