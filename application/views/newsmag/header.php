<div class="td-header-sp-logo">
    <h1 class="td-logo">        
    <a class="td-main-logo" href="<?php echo base_url(); ?>">
        <?php 
          $logo = $this->model_utama->view_ordering_limit('logo','id_logo','DESC',0,1);
          foreach ($logo->result_array() as $row) {
            echo "<img class='td-retina-data' src='".base_url()."asset/logo/$row[gambar]'/>";
          }
        ?>
        <span class="td-visual-hidden"><?php echo $title; ?></span>
    </a>
    </h1>        
</div>
<div class="td-header-sp-rec hidden-xs">
    <div class="td-header-ad-wrap  td-ad-m td-ad-tp td-ad-p">
        <div class="td-a-rec td-a-rec-id-header td_block_template_1">
            <div class="td-all-devices">
            <?php
              $iklanatas = $this->model_utama->view('iklanatas');
              foreach ($iklanatas->result_array() as $b) {
                $string = $b['gambar'];
                if ($b['gambar'] != ''){
                    if(preg_match("/swf\z/i", $string)) {
                        echo "<embed src='".base_url()."asset/foto_iklanatas/$b[gambar]' quality='high' type='application/x-shockwave-flash'>";
                    } else {
                        echo "<a href='$b[url]' target='_blank'><img src='".base_url()."asset/foto_iklanatas/$b[gambar]' alt='$b[judul]' /></a>";
                    }
                }
              }
            ?>
            </div>
        </div>
    </div>        
</div>