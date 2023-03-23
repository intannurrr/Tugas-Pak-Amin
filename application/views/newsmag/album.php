<div class="vc_column  wpb_column vc_column_container td-pb-span8" style='margin-top:20px'>
<div class="wpb_wrapper">
    <div class="td-category-header td-pb-padding-side">
        <header>
            <h1 class="entry-title td-page-title"> <span class='kategori-title'>Album</span> </h1>
        </header>
    </div>

    <div class="td-ss-main-content">
    <div class='td-block-row'>
    <?php 
        $no = $this->uri->segment(3)+1;
        foreach ($album->result_array() as $h) {    
        $total_foto = $this->model_utama->view_where('gallery',array('id_album' => $h['id_album']))->num_rows();
        $keterangan = strip_tags($h['keterangan']); 
        $isi_keterangan = substr($keterangan,0,120); 
        $isi_keterangan = substr($keterangan,0,strrpos($isi_keterangan," "));
                echo "<div class='td-block-span6'>
                <div class='td_module_1 td_module_wrap td-animation-stack'>
                    <div class='td-module-image'>
                        <div class='td-module-thumb'>
                        <a href='".base_url()."albums/detail/$h[album_seo]' rel='bookmark' title='$h[jdl_album]'>";
                            if ($h['gbr_album'] ==''){
                                echo "<img style='width:100%; height:160px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/img_album/no-image.jpg' alt='no-image.jpg'/>";
                            }else{
                                echo "<img style='width:100%; height:160px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/img_album/$h[gbr_album]' alt='$h[gbr_album]'/>";
                            }
                        echo "</a>
                        </div> 
                    </div>
                    <h3 style='text-align:center' class='entry-title td-module-title'><a href='".base_url()."albums/detail/$h[album_seo]' rel='bookmark' title='$h[jdl_album]'>$h[jdl_album]</a></h3>
                    <div style='text-align:center' class='meta-info'>
                        <span class='td-post-author-name'><a href='".base_url()."albums/detail/$h[album_seo]'>Ada $total_foto Foto</a></span> -  
                        <span class='td-post-date'><time class='entry-date updated td-module-date'>$h[jam], ".tgl_indo($h['tgl_posting'])."</time></span>
                    </div>
                    <div class='td-excerpt'>$isi_keterangan...</div>
                </div>
                </div>";
                if ($no%2==0){
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