<div class="vc_column  wpb_column vc_column_container td-pb-span8" style='margin-top:20px'>
<div class="wpb_wrapper">
    <div class="td-category-header td-pb-padding-side">
        <header>
            <h1 class="entry-title td-page-title"> <span class='kategori-title'><?php echo "$rows[jdl_playlist]"; ?></span> </h1>
        </header>
    </div>

    <div class="td-ss-main-content">
    <div class='td-block-row'>
    <?php 
        $no=$this->uri->segment(3);
        foreach ($detailplaylist->result_array() as $r) {   
        $lihat = $r['dilihat']+1;
        $judull = substr($r['jdl_video'],0,33); 
        $isi_berita =(strip_tags($r['keterangan'])); 
        $isi = substr($isi_berita,0,280); 
        $isi = substr($isi_berita,0,strrpos($isi," "));
        $total_komentar = $this->model_utama->view_where('komentarvid',array('id_video' => $r['id_video']))->num_rows();
                echo "<div class='td-block-span6'>
                <div class='td_module_1 td_module_wrap td-animation-stack'>
                    <div class='td-module-image'>
                        <div class='td-module-thumb'>";
                            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $r['youtube'], $match)) {
                                echo "<iframe width='210' height='150' src='https://www.youtube.com/embed/".$match[1]."' frameborder='0' allowfullscreen></iframe>";
                            }
                        echo "</div> 
                    </div>
                    <h3 class='entry-title td-module-title'><a href='".base_url()."playlist/watch/$r[video_seo]' rel='bookmark' title='$r[jdl_video]'>$r[jdl_video]</a></h3>
                    <div class='meta-info'>
                        <span class='td-post-date'><time class='entry-date updated td-module-date'>$r[hari], $r[jam], ".tgl_indo($r['tanggal'])."</time></span> 
                        <div class='td-module-comments'><a href='".base_url()."playlist/watch/$r[video_seo]'>$total_komentar</a></div> 
                    </div>
                </div>
                </div>";
                if ((int)$no % 2 == 0){
                    echo "<div style='clear:both'></div>";
                }
        $no++;
        }
    ?>
    </div>
    <div class="clearfix"></div>
    </div>

    <div class="page-nav td-pb-padding-side">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
</div>