<div class="vc_column  wpb_column vc_column_container td-pb-span8" style='margin-top:20px'>
<div class="wpb_wrapper">
    <div class="td-category-header td-pb-padding-side">
        <header>
            <h1 class="entry-title td-page-title"> <span class='kategori-title'>Agenda</span> </h1>
        </header>
    </div>

    <div class="td-ss-main-content">
    <div class='td-block-row'>
    <?php 
        $no = $this->uri->segment(3)+1;
        foreach ($agenda->result_array() as $h) {   
        $tgl_posting = tgl_indo($h['tgl_posting']);
        $tgl_mulai   = tgl_indo($h['tgl_mulai']);
        $tgl_selesai = tgl_indo($h['tgl_selesai']);
        $baca = $h['dibaca']+1;
        $judull = substr($h['tema'],0,33); 
        $isi_agenda =(strip_tags($h['isi_agenda'])); 
        $isi = substr($isi_agenda,0,120); 
        $isi = substr($isi_agenda,0,strrpos($isi," "));
                echo "<div class='td-block-span6'>
                <div class='td_module_1 td_module_wrap td-animation-stack'>
                    <div class='td-module-image'>
                        <div class='td-module-thumb'>
                        <a href='".base_url()."agenda/detail/$h[tema_seo]' rel='bookmark' title='$h[tema]'>";
                            if ($h['gambar'] ==''){
                                echo "<img style='width:100%; height:160px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_agenda/no-image.jpg' alt='no-image.jpg'/>";
                            }else{
                                echo "<img style='width:100%; height:160px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_agenda/$h[gambar]' alt='$h[gambar]'/>";
                            }
                        echo "</a>
                        </div> 
                    </div>
                    <h3 style='text-align:center' class='entry-title td-module-title'><a href='".base_url()."agenda/detail/$h[tema_seo]' rel='bookmark' title='$h[tema]'>$h[tema]</a></h3>
                    <div style='text-align:center' class='meta-info'>
                        <span class='td-post-date'><time class='entry-date updated td-module-date'>".tgl_indo($h['tgl_mulai'])." s/d ".tgl_indo($h['tgl_selesai'])."</time></span><br>
                        <span class='td-post-author-name'><a href='".base_url()."agenda/detail/$h[tema_seo]'>$h[tempat] View</a></span> 
                    </div>
                    <div class='td-excerpt'>$isi...</div>
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