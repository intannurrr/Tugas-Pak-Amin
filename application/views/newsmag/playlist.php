<div class="vc_column  wpb_column vc_column_container td-pb-span8" style='margin-top:20px'>
<div class="wpb_wrapper">
    <div class="td-category-header td-pb-padding-side">
        <header>
            <h1 class="entry-title td-page-title"> <span class='kategori-title'>Playlist</span> </h1>
        </header>
    </div>

    <div class="td-ss-main-content">
    <div class='td-block-row'>
    <?php 
        $no=$this->uri->segment(3)+1;
        foreach ($playlist->result_array() as $h) { 
        $total_video = $this->model_utama->view_where('video',array('id_playlist' => $h['id_playlist']))->num_rows();
                echo "<div class='td-block-span6'>
                <div class='td_module_1 td_module_wrap td-animation-stack'>
                    <div class='td-module-image'>
                        <div class='td-module-thumb'>
                        <a href='".base_url()."playlist/detail/$h[playlist_seo]' rel='bookmark' title='$h[jdl_playlist]'>";
                            if ($h['gbr_playlist'] ==''){
                                echo "<img style='width:300px; height:160px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/img_playlist/no-image.jpg' alt='no-image.jpg'/>";
                            }else{
                                echo "<img style='width:300px; height:160px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/img_playlist/$h[gbr_playlist]' alt='$h[gbr_playlist]'/>";
                            }
                            echo "
                        </a>
                        </div> 
                    </div>
                    <h3 style='text-align:center' class='entry-title td-module-title'><a href='".base_url()."playlist/detail/$h[playlist_seo]' rel='bookmark' title='$h[jdl_playlist]'>$h[jdl_playlist]</a></h3>
                    <div style='text-align:center' class='meta-info'>
                        <span class='td-post-author-name'><a href='".base_url()."playlist/detail/$h[playlist_seo]'>Ada $total_video Video</a></span> 
                    </div>
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