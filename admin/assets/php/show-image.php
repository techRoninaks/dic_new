<?php
    $id = $_POST["id"];
    
    $fullpath = dirname(__FILE__);
    $assets_dir = str_replace('php','img/news/',$fullpath);
    // $assets_dir = 'dic-repo/admin/assets/img/news/';
    $tofind = $assets_dir.(string)$id.".";
    $files = glob($assets_dir."*.*");
    $supported_file = array('gif','jpg','jpeg','png');
    $flag = 0;
    for ($i = 0; $i < count($files); $i++) {
        $image = $files[$i];
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if (in_array($ext, $supported_file)) {
          //$img = explode(".",$image);
        //   echo $tofind."<br/>".$image;
          if(strpos( $image, $tofind ) !== false){
              $image = str_replace($assets_dir,'assets/img/news/',$image);
              echo '<pre align="center"><img src="' . $image . '" alt="Random image" ,width=50%, height=50% style.display="block" /></pre><br>';
              $flag = 1;
              break;
          }
        }
    }
?>