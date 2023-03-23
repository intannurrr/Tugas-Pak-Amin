<!doctype html >
<html lang="en-US">
<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="author" content="mycoding.net">
    <meta name="robots" content="all,index,follow">
    <meta http-equiv="Content-Language" content="id-ID">
    <meta NAME="Distribution" CONTENT="Global">
    <meta NAME="Rating" CONTENT="General">
    <link rel="canonical" href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
    <?php if ($this->uri->segment(1)=='berita' AND $this->uri->segment(2)=='detail'){ $rows = $this->model_utama->view_where('berita',array('judul_seo' => $this->uri->segment(3)))->row_array();
       echo '<meta property="og:title" content="'.$title.'" />
             <meta property="og:type" content="article" />
             <meta property="og:url" content="'.base_url().''.$this->uri->segment(3).'" />
             <meta property="og:image" content="'.base_url().'asset/foto_berita/'.$rows['gambar'].'" />
             <meta property="og:description" content="'.$description.'"/>';
    } ?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/<?php echo favicon(); ?>" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />

    <link rel='stylesheet' id='google-fonts-style-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%7CRoboto+Condensed%3A300%2C300italic%2C400%2C400italic%2C700%2C700italic&amp;ver=4.2' type='text/css' media='all' />
    <link rel='stylesheet' id='td-theme-css'  href='<?php echo base_url(); ?>template/<?php echo template(); ?>/style-newsmag.css' type='text/css' media='all' />
    <link rel='stylesheet' id='td-theme-css'  href='<?php echo base_url(); ?>template/<?php echo template(); ?>/lokomedia.css' type='text/css' media='all' />
    <script type='text/javascript' src='<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery/jquery.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>template/<?php echo template(); ?>/js/lokomedia.js'></script>
</head>

<body>
<div class="td-scroll-up"><i class="td-icon-menu-up"></i></div>
<div class="td-menu-background"></div>
<?php include "mobile_menu.php"; ?>

<div id="td-outer-wrap">
    <div class="td-outer-container">   
        <?php include "top_menu.php"; ?>
    </div>

    <div class="td-header-row td-header-header">
        <?php include "header.php"; ?>
    </div>

    <div class="td-header-menu-wrap">
        <?php include "main_menu.php"; ?>
    </div>
</div>

<div class="td-main-content-wrap">
    <!-- Start td-main-content-wrap -->
    <div class="td-container tdc-content-wrap">  
    <div class="td-container-border">
        <?php include "trending_ticker.php"; ?>

        <div class="tdc-row">
        <div class="vc_row td-ss-row td-top-border wpb_row td-pb-row" >
            <?php 
            if ($this->uri->segment(1)=='' OR $this->uri->segment(1)=='main'){
                include "slide.php"; 
            }
            ?>
            <?php echo $contents; ?>
            <?php include "sidebar_kanan.php"; ?>
        </div>
        </div>

        
        <?php
            if ($this->uri->segment(1)=='' OR $this->uri->segment(1)=='main'){
            echo "<div class='tdc-row'>";
             include "content_foot.php"; 
            echo "</div>";
            }
         ?>         
    </div>
    </div> 
    <!-- End td-main-content-wrap -->
    
    <!-- Footer -->
    <div class="td-footer-container td-container">
        <?php include "footer.php"; ?>
    </div>

</div>

<!-- Sub Footer -->
<div class="td-sub-footer-container td-container td-container-border ">
    <?php include "footer_sub.php"; ?>
</div>

<script type='text/javascript' src='<?php echo base_url(); ?>template/<?php echo template(); ?>/js/tagdiv_theme.min.js'></script>
<script type="text/javascript">
function jam(){
    var waktu = new Date();
    var jam = waktu.getHours();
    var menit = waktu.getMinutes();
    var detik = waktu.getSeconds();
     
    if (jam < 10){ jam = "0" + jam; }
    if (menit < 10){ menit = "0" + menit; }
    if (detik < 10){ detik = "0" + detik; }
    var jam_div = document.getElementById('jam');
    jam_div.innerHTML = jam + ":" + menit + ":" + detik;
    setTimeout("jam()", 1000);
} jam();
</script>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active-dot", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active-dot";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
}
</script>
</body>
</html>