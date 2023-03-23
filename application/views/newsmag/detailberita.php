<?php $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $rows['id_berita']))->num_rows(); ?>  
<div class="td-pb-span8 td-main-content" role="main">
<div class="td-ss-main-content">
<div class="clearfix"></div>
<article class="post type-post status-publish format-standard has-post-thumbnail">
    <div class="td-post-header td-pb-padding-side">
        <div class="entry-crumbs">
            <?php
            echo "<span><a title='' class='entry-crumb' href='".base_url()."'>Home</a></span> 
                  <i class='td-icon-right td-bread-sep'></i><span><a title='$rows[nama_kategori]' class='entry-crumb' href='".base_url()."kategori/detail/$rows[kategori_seo]'>$rows[nama_kategori]</a></span> 
                  <i class='td-icon-right td-bread-sep td-bred-no-url-last'></i> <span class='td-bred-no-url-last'>$rows[judul]</span>";
            ?>
        </div>

        <header>
        <?php
        echo "<h1 class='entry-title'>$rows[judul]</h1>
              <h2 style='font-size:14px;margin:0px;color:blue;'>$rows[sub_judul]</h2>
              <div class='meta-info'>
                <div class='td-post-author-name'>
                    <div class='td-author-by'>By</div> <a href='#'>$rows[nama_lengkap]</a><div class='td-author-line'> - </div> 
                </div> 
                <span class='td-post-date'><time class='entry-date updated td-module-date'>".tgl_indo($rows['tanggal']).", $rows[jam] WIB</time></span> 
                <div class='td-post-views'><i class='td-icon-views'></i><span class='td-nr-views-147'>".number_format($rows['dibaca']+1)."</span></div> 
                <div class='td-post-comments'><a href='#'><i class='td-icon-comments'></i>$total_komentar</a></div> 
              </div>";
        ?>
        </header>
    </div>

    <div class="td-post-sharing td-post-sharing-top td-pb-padding-side"><span class="td-post-share-title">SHARE</span>
        <div class="td-default-sharing ">
            <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
		   <div class="clearfix"></div>
        </div>
    </div>

    <div class="td-post-content td-pb-padding-side">
        <div class="td-post-featured-image">
            <?php 
                if ($rows['gambar'] !=''){ echo "<img  class='entry-thumb td-animation-stack-type0-2' style='width:100%' src='".base_url()."asset/foto_berita/$rows[gambar]' alt='$rows[judul]' /></a>"; }
                if ($rows['keterangan_gambar'] !=''){ echo "<center><p style='margin-bottom: 10px;'><i><b>Keterangan Gambar :</b> $rows[keterangan_gambar]</i></p></center>"; }
            ?>
        </div>

        <div class="td-paragraph-padding-1">
        <?php 
            echo "$rows[isi_berita]";
            if ($rows['youtube']!=''){
                echo "<h3>Video Terkait:</h3>";
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $rows['youtube'], $match)) {
                    echo "<iframe width='100%' height='350px' id='ytplayer' type='text/html'
                        src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
                        frameborder='0' allowfullscreen></iframe><div class='garis'></div><br/>";
                } 
            }
        ?>
        </div>
    </div>

    <footer>
    <div class="td-post-source-tags td-pb-padding-side">
        <ul class="td-tags td-post-small-box clearfix">
            <li><span>TAGS</span></li>
            <?php
                $tags = (explode(",",$rows['tag']));
                $hitung = count($tags);
                for ($x=0; $x<=$hitung-1; $x++) {
                    if ($tags[$x] != ''){
                        echo "<li><a href='".base_url()."tag/detail/$tags[$x]'>$tags[$x]</a></li>";
                    }
                }
            ?>
        </ul> 
    </div>
    <?php
        $prev = $this->db->query("SELECT * FROM berita where id_berita < $rows[id_berita] ORDER BY id_berita DESC LIMIT 1")->row_array();
        $next = $this->db->query("SELECT * FROM berita where id_berita > $rows[id_berita] ORDER BY id_berita ASC LIMIT 1")->row_array();
        echo "<div class='td-block-row td-post-next-prev'>
                <div class='td-block-span6 td-post-prev-post'>
                <div class='td-post-next-prev-content'>
                    <span>Previous article</span><a href='".base_url()."berita/detail/$prev[judul_seo]'>$prev[judul]</a>
                </div>
                </div>

                <div class='td-next-prev-separator'></div>

                <div class='td-block-span6 td-post-next-post'>
                <div class='td-post-next-prev-content'>
                    <span>Next article</span><a href='".base_url()."berita/detail/$next[judul_seo]'>$next[judul]</a>
                </div>
                </div>
            </div>"; 
    ?>

    </footer>
</article>

<div class="td_block_wrap td_block_related_posts td_with_ajax_pagination td-pb-border-top td_block_template_1">
<h4 class="td-related-title"><a class="td-related-left td-cur-simple-item" href="#">RELATED ARTICLES</a></h4>

<div class="td_block_inner">
<div class="td-related-row">
    <?php
      $pisah_kata  = explode(",",$rows['tag']);
      $jml_katakan = (integer)count($pisah_kata);
      $jml_kata = $jml_katakan-1; 
      $ambil_id = substr($rows['id_berita'],0,4);
      $cari = "SELECT * FROM berita a JOIN kategori b ON a.id_kategori=b.id_kategori WHERE (a.id_berita<'$ambil_id') and (a.id_berita!='$ambil_id') and (" ;
      for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "a.tag LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
      $cari .= " OR ";}}
      $cari .= ") ORDER BY a.id_berita DESC LIMIT 3";
      $hasil  = $this->db->query($cari);
      foreach ($hasil->result_array() as $row) {   
          echo "<div class='td-related-span4'>
                    <div class='td_module_related_posts td-animation-stack td_mod_related_posts'>
                        <div class='td-module-image'>
                            <div class='td-module-thumb'>";
                                if ($row['gambar'] ==''){
                                    echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='238' height='178' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
                                }else{
                                    echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='238' height='178' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."/asset/foto_berita/$row[gambar]' alt='$row[gambar]' /></a>";
                                }
                            echo "</div> 
                            <a href='".base_url()."kategori/detail/$row[kategori_seo]' class='td-post-category'>$row[nama_kategori]</a> 
                        </div>

                        <div class='item-details'>
                            <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$row[judul_seo]' rel='bookmark' title='$row[judul]'>$row[judul]</a></h3> 
                        </div>
                    </div>
                </div>";
      }      
    ?>
</div>
</div>

<div class="comments" id="comments">
    <?php
    if ($total_komentar>='1'){
    echo "<div class='td-comments-title-wrap td-pb-padding-side td_block_template_1'>
            <h4 class='td-comments-title '><span>$total_komentar COMMENTS</span></h4>
        </div>

        <ol class='comment-list td-pb-padding-side'>";
        $no = 1;
        $komentar = $this->model_utama->view_where_ordering_limit('komentar',array('id_berita' => $rows['id_berita'],'aktif' => 'Y'),'id_komentar','ASC',0,100);
        foreach ($komentar->result_array() as $k) {
            $isian=nl2br($k['isi_komentar']); 
            $komentarku = sensor($isian); 
            if(($no % 2)==0){ $warna="#ffffff;"; }else{ $warna="#e3e3e3"; }
            $test = md5(strtolower(trim($k['email'])));   
            echo "<li class='comment' id='comment-$k[id_komentar]'>
                    <article>
                        <footer>";
                            if ($k['email'] == ''){
                                echo "<img style='width:50px; height:50px' class='avatar avatar-50 wp-user-avatar wp-user-avatar-50 photo avatar-default' src='".base_url()."asset/foto_user/blank.png'/>";
                            }else{
                                echo "<img style='width:50px; height:50px' class='avatar avatar-50 wp-user-avatar wp-user-avatar-50 photo avatar-default' src='http://www.gravatar.com/avatar/$test.jpg?s=50'/>";
                            }
                            echo "<cite>$k[nama_komentar]</cite>
                            <a class='comment-link' href='#comment-$k[id_komentar]'><time pubdate='1407762469'>".tgl_indo($k['tgl']).", $k[jam_komentar] WIB</time></a>
                        </footer>
                        <div class='comment-content'>
                            <p>$komentarku</p>
                        </div>
                    </article>
                   </li>";
            $no++;
        }
        echo "</ol>";
    }
        echo $this->session->flashdata('message');
    ?>

<div class="comment-pagination"></div>
<div id="listcomment" class="comment-respond">
    <h3 id="reply-title" class="comment-reply-title">LEAVE A REPLY <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none">Cancel reply</a></small></h3> 

    <form action="<?php echo base_url(); ?>berita/kirim_komentar" method="post" id="commentform" class="comment-form" novalidate="">
        <input type="hidden" name='a' value='<?php echo "$rows[id_berita]"; ?>'>
        <div class="clearfix"></div>
        <div class="comment-form-input-wrap td-form-comment">
            <textarea placeholder="Comment:" id="comment" name="d" cols="45" rows="8" aria-required="true"></textarea>
            <div class="td-warning-comment">Please enter your comment!</div>
        </div>
        <div class="comment-form-input-wrap td-form-author">
            <input class="" id="author" name="b" placeholder="Name:*" type="text" value="" size="30" aria-required="true">
            <div class="td-warning-author">Please enter your name here</div>
        </div>
        <div class="comment-form-input-wrap td-form-email">
            <input class="" id="email" name="e" placeholder="Email:*" type="text" value="" size="30" aria-required="true">
            <div class="td-warning-email-error">You have entered an incorrect email address!</div>
            <div class="td-warning-email">Please enter your email address here</div>
        </div>
        <div class="comment-form-input-wrap td-form-url">
            <input class="" id="url" name="c" placeholder="Website:" type="text" value="" size="30">
        </div>

        <div class="comment-form-input-wrap td-form-url">
            <input class="captcha" id="url" name="secutity_code" placeholder="Enter Code Here..." type="text" value="" size="30">
            <?php echo $image; ?>
        </div>
        <p class="form-submit">
            <input name="submit" type="submit" id="submit" class="submit" value="Post Comment" onclick="return confirm('Haloo, Pesan anda akan tampil setelah kami setujui?')"> 
        </p> 
    </form>
</div>
</div>
</div>

<div class="clearfix"></div>
</div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b878e417c0d681d"></script>