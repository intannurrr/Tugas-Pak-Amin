<?php $total_komentar = $this->model_utama->view_where('komentarvid',array('id_video' => $rows['id_video']))->num_rows(); ?>  
<div class="entry-crumbs">
    <?php
    echo "<span><a title='' class='entry-crumb' href='".base_url()."'>Home</a></span> 
          <i class='td-icon-right td-bread-sep'></i><span><a title='$rows[jdl_playlist]' class='entry-crumb' href='".base_url()."playlist/detail/$rows[playlist_seo]'>$rows[jdl_playlist]</a></span> 
          <i class='td-icon-right td-bread-sep td-bred-no-url-last'></i> <span class='td-bred-no-url-last'>$rows[jdl_video]</span>";
    ?>
</div>

<div class="wpb_video_wrapper">
<?php
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $rows['youtube'], $match)) {
        echo "<iframe width='855px' height='500px' src='https://www.youtube.com/embed/".$match[1]."' frameborder='0' allowfullscreen></iframe>";
    }   
?>
</div>
<div class="td-pb-span8 td-main-content" role="main">
<div class="td-ss-main-content">
<div class="clearfix"></div>
<article class="post type-post status-publish format-standard has-post-thumbnail">
    <div class="td-post-header td-pb-padding-side">
        <header>
        <?php
        echo "<h1 class='entry-title'>$rows[jdl_video]</h1>
              <div class='meta-info'>
                <div class='td-post-author-name'>
                    <div class='td-author-by'>By</div> <a href='#'>$rows[nama_lengkap]</a><div class='td-author-line'> - </div> 
                </div> 
                <span class='td-post-date'><time class='entry-date updated td-module-date'>".tgl_indo($rows['tanggal']).", $rows[jam] WIB</time></span> 
                <div class='td-post-views'><i class='td-icon-views'></i><span class='td-nr-views-147'>".number_format($rows['dilihat']+1)."</span></div> 
                <div class='td-post-comments'><a href='#'><i class='td-icon-comments'></i>$total_komentar</a></div> 
              </div>";
        ?>
        </header>
    </div>

    <div class="td-post-sharing td-post-sharing-top td-pb-padding-side"><span class="td-post-share-title">SHARE</span>
        <div class="td-default-sharing ">
            <a class="td-social-sharing-buttons td-social-facebook" href="https://www.facebook.com/sharer.php?u=<?php echo base_url(); ?>playlist/watch/<?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-facebook"></div><div class="td-social-but-text">Facebook</div></a>
            <a class="td-social-sharing-buttons td-social-twitter" href="https://twitter.com/intent/tweet?text=<?php echo $rows['jdl_video']; ?>&amp;url=<?php echo base_url(); ?>playlist/watch/<?php echo $this->uri->segment(3); ?>"><div class="td-sp td-sp-twitter"></div><div class="td-social-but-text">Twitter</div></a>
            <a class="td-social-sharing-buttons td-social-google" href="https://plus.google.com/share?url=<?php echo base_url(); ?>playlist/watch/<?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-googleplus"></div></a>
            <a class="td-social-sharing-buttons td-social-pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo base_url(); ?>playlist/watch/<?php echo $this->uri->segment(3); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><div class="td-sp td-sp-pinterest"></div></a>
            <a class="td-social-sharing-buttons td-social-whatsapp" href="whatsapp://send?text=<?php echo $rows['jdl_video']; ?>%20-%20<?php echo base_url(); ?>playlist/watch/<?php echo $this->uri->segment(3); ?>"><div class="td-sp td-sp-whatsapp"></div></a>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="td-post-content td-pb-padding-side">
        <div class="td-paragraph-padding-1">
            <?php echo $rows['keterangan']; ?>
        </div>
    </div>

    <footer>
    <div class="td-post-source-tags td-pb-padding-side">
        <ul class="td-tags td-post-small-box clearfix">
            <li><span>TAGS</span></li>
            <?php
                $tags = (explode(",",$rows['tagvid']));
                $hitung = count($tags);
                for ($x=0; $x<=$hitung-1; $x++) {
                    if ($tags[$x] != ''){
                        echo "<li><a href='#'>$tags[$x]</a></li>";
                    }
                }
            ?>
        </ul> 
    </div>
    <?php
        $prev = $this->db->query("SELECT * FROM video where id_video < $rows[id_video] ORDER BY id_video DESC LIMIT 1")->row_array();
        $next = $this->db->query("SELECT * FROM video where id_video > $rows[id_video] ORDER BY id_video ASC LIMIT 1")->row_array();
        echo "<div class='td-block-row td-post-next-prev'>
                <div class='td-block-span6 td-post-prev-post'>
                <div class='td-post-next-prev-content'>
                    <span>Previous article</span><a href='".base_url()."playlist/watch/$prev[video_seo]'>$prev[jdl_video] </a>
                </div>
                </div>

                <div class='td-next-prev-separator'></div>

                <div class='td-block-span6 td-post-next-post'>
                <div class='td-post-next-prev-content'>
                    <span>Previous article</span><a href='".base_url()."playlist/watch/$next[video_seo]'>$next[jdl_video] </a>
                </div>
                </div>
            </div>"; 
    ?>

    </footer>
</article>

<div class="td_block_wrap td_block_related_posts td_with_ajax_pagination td-pb-border-top td_block_template_1">
<h4 class="td-related-title"><a class="td-related-left td-cur-simple-item" href="#">VIDEO LAINNYA</a></h4>

<div class="td_block_inner">
<div class="td-related-row">
    <?php
      $randvideo = $this->model_utama->view_ordering_limit('video','id_video','RANDOM',0,3);
      foreach ($randvideo->result_array() as $row) {  
          echo "<div class='td-related-span4'>
                    <div class='td_module_related_posts td-animation-stack td_mod_related_posts'>
                        <div class='td-module-image'>
                            <div class='td-module-thumb'>";
                                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $row['youtube'], $match)) {
                                    echo "<iframe width='855px' height='500px' src='https://www.youtube.com/embed/".$match[1]."' frameborder='0' allowfullscreen></iframe>";
                                }
                            echo "</div> 

                        </div>
                        <div class='item-details'>
                            <h3 class='entry-title td-module-title'><a href='".base_url()."playlist/watch/$row[video_seo]' rel='bookmark' title='$row[jdl_video]'>$row[jdl_video]</a></h3> 
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
        $komentar = $this->model_utama->view_where_ordering_limit('komentarvid',array('id_video' => $rows['id_video'],'aktif' => 'Y'),'id_video','ASC',0,100);
        foreach ($komentar->result_array() as $k) {
            $isian=nl2br($k['isi_komentar']); 
            $komentarku = sensor($isian); 
            if(($no % 2)==0){ $warna="#ffffff;"; }else{ $warna="#e3e3e3"; }
            // $test = md5(strtolower(trim($k['email'])));   
            echo "<li class='comment' id='comment-$k[id_komentar]'>
                    <article>
                        <footer>";
                            // if ($k['email'] == ''){
                                echo "<img style='width:50px; height:50px' class='avatar avatar-50 wp-user-avatar wp-user-avatar-50 photo avatar-default' src='".base_url()."asset/foto_user/blank.png'/>";
                            // }else{
                                // echo "<img style='width:50px; height:50px' class='avatar avatar-50 wp-user-avatar wp-user-avatar-50 photo avatar-default' src='http://www.gravatar.com/avatar/$test.jpg?s=50'/>";
                            // }
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

    <form action="<?php echo base_url(); ?>playlist/kirim_komentar" method="post" id="commentform" class="comment-form" novalidate="">
        <input type="hidden" name='a' value='<?php echo "$rows[id_video]"; ?>'>
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
            <input class="" id="email" name="c" placeholder="Email:*" type="text" value="" size="30" aria-required="true">
            <div class="td-warning-email-error">You have entered an incorrect email address!</div>
            <div class="td-warning-email">Please enter your email address here</div>
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