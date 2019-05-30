<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="span9 first">
    <div class="blog-sec-slider">
       
<?php 
$conn = mysqli_connect('localhost', 'root', '', 'phonestores');
$stringsql="SELECT * FROM slides "; 
        $stringquery=mysqli_query($conn,$stringsql); 
while($slide=mysqli_fetch_array($stringquery)){ 
?> <div class="slider5">
        		<div class="slide"><a href="#"><img src="<?php echo PATH_UPLOAD_IMAGE . "/" .$slide['image']; ?>"/></a></div>
 <?php } ?>
        </div>
    </div>