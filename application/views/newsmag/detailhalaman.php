<div class="td-pb-span8 td-main-content" role="main">
<div class="td-ss-main-content">
<div class="clearfix"></div>
<article class="post type-post status-publish format-standard has-post-thumbnail">
    <div class="td-post-header td-pb-padding-side">
        <div class="entry-crumbs">
            <?php
            echo "<span><a title='' class='entry-crumb' href='".base_url()."'>Home</a></span> 
                  <i class='td-icon-right td-bread-sep td-bred-no-url-last'></i> <span class='td-bred-no-url-last'>$rows[judul]</span>";
            ?>
        </div>

        <header>
        <?php
        echo "<h1 class='entry-title'>$rows[judul]</h1>
              <div class='meta-info'>
                <div class='td-post-author-name'>
                    <div class='td-author-by'>By</div> <a href='#'>$rows[nama_lengkap]</a><div class='td-author-line'> - </div> 
                </div> 
                <span class='td-post-date'><time class='entry-date updated td-module-date'>".tgl_indo($rows['tgl_posting']).", $rows[jam] WIB</time></span> 
                <div class='td-post-views'><i class='td-icon-views'></i><span class='td-nr-views-147'>".number_format($rows['dibaca']+1)."</span></div> 
              </div>";
        ?>
        </header>
    </div>

    <div class="td-post-sharing td-post-sharing-top td-pb-padding-side"><span class="td-post-share-title">SHARE</span>
        <div class="td-default-sharing ">
            <a class="td-social-sharing-buttons td-social-facebook" href="https://www.facebook.com/sharer.php?u=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-facebook"></div><div class="td-social-but-text">Facebook</div></a>
            <a class="td-social-sharing-buttons td-social-twitter" href="https://twitter.com/intent/tweet?text=<?php echo $rows['judul']; ?>&amp;url=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>"><div class="td-sp td-sp-twitter"></div><div class="td-social-but-text">Twitter</div></a>
            <a class="td-social-sharing-buttons td-social-google" href="https://plus.google.com/share?url=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-googleplus"></div></a>
            <a class="td-social-sharing-buttons td-social-pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-pinterest"></div></a>
            <a class="td-social-sharing-buttons td-social-whatsapp" href="whatsapp://send?text=<?php echo $rows['judul']; ?>%20-%20<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>"><div class="td-sp td-sp-whatsapp"></div></a>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="td-post-content td-pb-padding-side">
        <div class="td-post-featured-image">
            <?php if ($rows['gambar'] !=''){ echo "<img  class='entry-thumb td-animation-stack-type0-2' style='width:100%' src='".base_url()."asset/foto_statis/$rows[gambar]' alt='$rows[judul]' /></a>"; } ?>
        </div>

        <div class="td-paragraph-padding-1">
        <?php 
            echo "$rows[isi_halaman]";
        ?>
        </div>
    </div>
</article>
<div class="clearfix"></div>
</div>
</div>