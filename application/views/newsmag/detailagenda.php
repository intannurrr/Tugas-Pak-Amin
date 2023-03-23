<?php
    $tgl_posting   = tgl_indo($rows['tgl_posting']);
    $tgl_mulai   = tgl_indo($rows['tgl_mulai']);
    $tgl_selesai = tgl_indo($rows['tgl_selesai']);
    $isi_agenda=nl2br($rows['isi_agenda']);
    $baca = $rows['dibaca']+1;
?>   
<div class="td-pb-span8 td-main-content" role="main">
<div class="td-ss-main-content">
<div class="clearfix"></div>
<article class="post type-post status-publish format-standard has-post-thumbnail">
    <div class="td-post-header td-pb-padding-side">
        <div class="entry-crumbs">
            <?php
            echo "<span><a title='' class='entry-crumb' href='".base_url()."'>Home</a></span> 
                  <i class='td-icon-right td-bread-sep td-bred-no-url-last'></i><span><a title='' class='entry-crumb' href='".base_url()."/agenda'>Agenda</a></span> 
                  <i class='td-icon-right td-bread-sep td-bred-no-url-last'></i> <span class='td-bred-no-url-last'>$rows[tema]</span>";
            ?>
        </div>

        <header>
        <?php
        echo "<h1 class='entry-title'>$rows[tema]</h1>
              <div class='meta-info'>
                <div class='td-post-author-name'>
                    <div class='td-author-by'>By</div> <a href='#'>$rows[nama_lengkap]</a><div class='td-author-line'> - </div> 
                </div> 
                <span class='td-post-date'><time class='entry-date updated td-module-date'>".tgl_indo($rows['tgl_posting'])."</time></span> 
                <div class='td-post-views'><i class='td-icon-views'></i><span class='td-nr-views-147'>".number_format($rows['dibaca']+1)."</span></div> 
              </div>";
        ?>
        </header>
    </div>

    <div class="td-post-sharing td-post-sharing-top td-pb-padding-side"><span class="td-post-share-title">SHARE</span>
        <div class="td-default-sharing ">
            <a class="td-social-sharing-buttons td-social-facebook" href="https://www.facebook.com/sharer.php?u=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-facebook"></div><div class="td-social-but-text">Facebook</div></a>
            <a class="td-social-sharing-buttons td-social-twitter" href="https://twitter.com/intent/tweet?text=<?php echo $rows['tema']; ?>&amp;url=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>"><div class="td-sp td-sp-twitter"></div><div class="td-social-but-text">Twitter</div></a>
            <a class="td-social-sharing-buttons td-social-google" href="https://plus.google.com/share?url=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-googleplus"></div></a>
            <a class="td-social-sharing-buttons td-social-pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-pinterest"></div></a>
            <a class="td-social-sharing-buttons td-social-whatsapp" href="whatsapp://send?text=<?php echo $rows['tema']; ?>%20-%20<?php echo base_url(); ?><?php echo $this->uri->segment(3); ?>"><div class="td-sp td-sp-whatsapp"></div></a>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="td-post-content td-pb-padding-side">
        <div class="td-post-featured-image">
            <?php if ($rows['gambar'] !=''){ echo "<img  class='entry-thumb td-animation-stack-type0-2' style='width:100%' src='".base_url()."asset/foto_agenda/$rows[gambar]' alt='$rows[gambar]' /></a>"; } ?>
        </div>

        <div class="td-paragraph-padding-1">
        <?php 
            echo "<table>
                      <tr><td width=65px><b>Tanggal</b></td>   <td> : </td> <td>$tgl_mulai s/d $tgl_selesai</td></tr>
                      <tr><td><b>Tempat</b></td>    <td> : </td> <td>$rows[tempat]</td></tr>
                      <tr><td><b>Jam</b></td>   <td> : </td> <td>$rows[jam]</td></tr>
                      <tr><td><b>Pengirim</b></td>   <td> : </td> <td>$rows[pengirim]</td></tr>
                  </table><br>
                      $rows[isi_agenda]<br>";
        ?>
        </div>
    </div>

    <footer>
    <?php
        $prev = $this->db->query("SELECT * FROM agenda where id_agenda < $rows[id_agenda] ORDER BY id_agenda DESC LIMIT 1")->row_array();
        $next = $this->db->query("SELECT * FROM agenda where id_agenda > $rows[id_agenda] ORDER BY id_agenda ASC LIMIT 1")->row_array();
        echo "<div class='td-block-row td-post-next-prev'>
                <div class='td-block-span6 td-post-prev-post'>
                <div class='td-post-next-prev-content'>
                    <span>Previous article</span><a href='".base_url()."agenda/detail/$prev[tema_seo]'>$prev[tema]</a>
                </div>
                </div>

                <div class='td-next-prev-separator'></div>

                <div class='td-block-span6 td-post-next-post'>
                <div class='td-post-next-prev-content'>
                    <span>Next article</span><a href='".base_url()."agenda/detail/$next[tema_seo]'>$next[tema]</a>
                </div>
                </div>
            </div>"; 
    ?>

    </footer>
</article>

<div class="td_block_wrap td_block_related_posts td_with_ajax_pagination td-pb-border-top td_block_template_1">
<h4 class="td-related-title"><a class="td-related-left td-cur-simple-item" href="#">AGENDA LAINNYA</a></h4>

<div class="td_block_inner">
<div class="td-related-row">
    <?php
      $agenda_lain = $this->model_utama->view_ordering_limit('agenda','id_agenda','RANDOM',0,3);
      foreach ($agenda_lain->result_array() as $row) {  
          echo "<div class='td-related-span4'>
                    <div class='td_module_related_posts td-animation-stack td_mod_related_posts'>
                        <div class='td-module-image'>
                            <div class='td-module-thumb'>
                            <a href='".base_url()."agenda/detail/$row[tema_seo]' rel='bookmark' title='$row[tema]'>";
                                    if ($row['gambar'] ==''){
                                        echo "<img style='width:300px; height:160px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_agenda/no-image.jpg' alt='no-image.jpg'/>";
                                    }else{
                                        echo "<img style='width:300px; height:160px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_agenda/$row[gambar]' alt='$row[gambar]'/>";
                                    }
                                echo "</a>
                            </div> 

                        </div>
                        <div class='item-details'>
                            <h3 class='entry-title td-module-title'><a href='".base_url()."agenda/detail/$row[tema_seo]' rel='bookmark' title='$row[tema]'>$row[tema]</a></h3> 
                        </div>
                    </div>
                </div>";
      }      
    ?>
</div>
</div>
</div>

<div class="clearfix"></div>
</div>
</div>