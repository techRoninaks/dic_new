<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.7.1, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.7.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/dic-logo.png" type="image/x-icon">
  <meta name="description" content="Web Page Creator Description">
  <title>Latest News</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/gallery/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
  <script src="dynamicloading.js"></script>


 
</head>
<body>
<div w3-include-html="header.html"></div>
<script >includeHTML();
</script>

<section class="engine"><a href="https://mobirise.ws/n">best website creator app</a></section><section class="mbr-gallery mbr-slider-carousel cid-rfk0gxfSXL" id="gallery3-2p">

    

    

</section>

<section class="mbr-section content4 cid-rfk0lltKU5" id="content4-2q">

    

    <div class="container" style="margin-top:77px">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2">
                News</h2>
                
                
            </div>
        </div>
    </div>
</section>
</body>
</html>


<?php
  $dbname = "db_dic";
    $username = "root";
    $password = "";
    $servername = "localhost";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
     // die("Connection failed: " . $conn->connect_error);
  } 
  $split = 0;

  $sql = "SELECT * FROM `news` order by 'ID' desc";
  $result = $conn->query($sql);
   // $number = 3;
  ?>
  <section class="features17 cid-rfe8POrb7e" id="features17-1z">
    
        <div class="container-fluid">
        <div class="media-container-row">
          <?php
  
    if ($result->num_rows > 0) {
    
 // $count=0;
    
     // <!--  // output data of each row
      // echo "<thead><th>ID</th><th>DATE</th><th>HEADLINE</th><th>SUBHEADLINE</th><th>CONTENT</th></thead><tbody>"; -->
            while($row = $result->fetch_array()) {

            //   $count=0;
            // $res=$row;
            // foreach($res as $rs) {
             
        // // echo "<tr>";
        //  $n = 0;
        //  while($n>$number){  
           
        // echo ".$row[$n].";
        //    $n+=1;
        //   }
        ?>
    		<div class="card p-3 col-12 col-md-6 col-lg-3" id="col" style=" min-height: 700px;">
                <div class="card-wrapper" >
                 
                    <div class="card-img">
                      <img src="admin/assets/img/news/<?php echo $row['ID']?>.jpg" alt="Plastic" title="" style="width:298px; height:167px;">
                    </div>
                     <div class="card-box" style="width: 297px;height: 370px;" >
                    
                      <h4 class="card-title pb-3 mbr-fonts-style display-7" style=" min-height:75px; text-align: justify;text-justify: inter-word;"><?php echo $row['headline'] ?></h4>
                    <h2 class="mbr-text mbr-fonts-style display-7"> <i><?php echo date('j F, Y',strtotime($row['date'])) ?></i> </h2>
                        
                        <p class="mbr-text mbr-fonts-style display-7" style="text-align: justify;text-justify: inter-word;">
                          <?php echo $row['subheadline'] ?>
                  <br>
                        </p>
                        <p class="mbr-text mbr-fonts-style display-7" style="text-align: justify;text-justify: inter-word;">
                           <b><?php echo $row['place'] ?>:</b><?php echo readMoreFunction($row['content'],"readmore.php","ID",$row['ID']); ?>
                  <!-- <br><br> -->
                        </p>
                   </div>  
                 </div>
              </div>
    <?php
$split++;   
    if ($split%4==0){
        echo '</div><div class="media-container-row">';}
      }
    }
	?> 
</div>
            </div>
          </section>
        
 <section>
<div w3-include-html="footer.html"></div>
<script >includeHTML();
</script>
</section>
 
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
  <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
  <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/slidervideo/script.js"></script>

  <script>
</script>


<?php
function readMoreFunction($content,$link,$targetFile,$id) {  
//Number of characters to show  
$chars = 20;  
$content = substr($content,0,$chars);  
$content = substr($content,0,strrpos($content,' '));  
$content = $content." <a href='$link?$targetFile=$id'>Read More...</a>";  
return $content;  

}  

?>
<script type="text/javascript">
  $(document).ready(function(){
$('a').click(function(e){
    $('#col').toggleClass('fullscreen'); 
});
});
</script>
