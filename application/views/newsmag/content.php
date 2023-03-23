<div class="vc_column  wpb_column vc_column_container td-pb-span8" style='margin-top:20px'>
<div class="wpb_wrapper">
    <div class="td_block_wrap td_block_slide td-pb-border-top td_block_template_1 td_normal_slide">
    <div class="td_block_inner td-column-2">
        <?php 
            $pilihan = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.aktif' => 'Y','status' => 'Y'),'id_berita','DESC',0,3);
            foreach ($pilihan->result_array() as $row) {    
            $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $row['id_berita']))->num_rows();
            $tgl = tgl_indo($row['tanggal']);
            $isi_berita = strip_tags($row['isi_berita']); 
            $isi = substr($isi_berita,0,120); 
            $isi = substr($isi_berita,0,strrpos($isi," "));
            echo "<div class='td-block-span12'>
                    <div class='td_module_10 td_module_wrap td-animation-stack'>
                        <div class='td-module-thumb'>";                            
                            if ($row['gambar'] ==''){
                                echo "<a href='".base_url()."berita/detail/$row[judul_seo]' rel='bookmark' title='$row[judul]'><img width='180' height='135' class='entry-thumb' src='".base_url()."asset/foto_berita/no-image.jpg' alt='$row[gambar]' title='$row[judul]'/></a>";
                            }else{
                                echo "<a href='".base_url()."berita/detail/$row[judul_seo]' rel='bookmark' title='$row[judul]'><img width='180' height='135' class='entry-thumb' src='".base_url()."/asset/foto_berita/$row[gambar]' alt='$row[gambar]' title='$row[judul]'/></a>";
                            }
                        echo "</div>
                        <div class='item-details'>
                            <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$row[judul_seo]' rel='bookmark' title='$row[judul]'>$row[judul]</a></h3>
                            <div class='meta-info'>
                                <a href='".base_url()."kategori/detail/$row[kategori_seo]' class='td-post-category'>$row[nama_kategori]</a>                    
                                <span class='td-post-author-name'><a href='".base_url()."berita/detail/$row[judul_seo]'>$row[nama_lengkap]</a> <span>-</span> </span>                    
                                <span class='td-post-date'><time class='entry-date updated td-module-date'>$row[jam], $tgl</time></span>
                                <div class='td-module-comments'><a href='".base_url()."berita/detail/$row[judul_seo]'>$total_komentar</a></div>                
                            </div>
                        <div class='td-excerpt'>$isi...</div>
                        </div>
                    </div>
                   </div>";
            }
        ?>
    </div>
    </div> <!-- ./block -->


    <div class="td-a-rec td-a-rec-id-custom_ad_1 td_block_template_1">
        <div class="td-all-devices">
        <?php
            $ia = $this->model_utama->view_ordering_limit('iklantengah','id_iklantengah','ASC',0,1)->row_array();
            echo "<a href='$ia[url]' target='_blank'>";
                $string = $ia['gambar'];
                if ($ia['gambar'] != ''){
                    if(preg_match("/swf\z/i", $string)) {
                        echo "<embed style='width:100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' quality='high' type='application/x-shockwave-flash'>";
                    } else {
                        echo "<img width='100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' title='$ia[judul]' />";
                    }
                }
            echo "</a>";
        ?>
        </div>
    </div>

    <?php $r = $this->model_utama->view_where('kategori',array('sidebar' => 1))->row_array(); ?>
    <div class="td-block-row">
        <?php 
            $kategori1 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r['id_kategori'],'berita.status' => 'Y'),'id_berita','DESC',0,1);            
            foreach ($kategori1->result_array() as $r1) {
            $tglr = tgl_indo($r1['tanggal']);
            $isi_berita = strip_tags($r1['isi_berita']); 
            $isi = substr($isi_berita,0,130); 
            $isi = substr($isi_berita,0,strrpos($isi," "));
            $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r1['id_berita']))->num_rows();
            echo "<div class='td-block-span6'>
                    <div class='td_module_4 td_module_wrap td-animation-stack'>
                        <div class='td-module-image'>
                            <div class='td-module-thumb'>";
                            if ($r1['gambar'] ==''){
                                echo "<a href='".base_url()."$r1[judul_seo]'><img width='300' height='194' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/small_no-image.jpg' alt='no-image.jpg' /></a>";
                            }else{
                                echo "<a href='".base_url()."$r1[judul_seo]'><img width='300' height='194' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/$r1[gambar]' alt='$r1[gambar]' /></a>";
                            }
                            echo "</div> 
                            <a href='".base_url()."kategori/detail/$r1[kategori_seo]' class='td-post-category'>$r1[nama_kategori]</a> 
                        </div>
                        <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$r1[judul_seo]' rel='bookmark' title='$r1[judul]'>$r1[judul]</a></h3>
                        <div class='meta-info'>
                            <span class='td-post-author-name'><a href='".base_url()."berita/detail/$r1[judul_seo]'>$r1[nama_lengkap]</a> <span>-</span> </span> 
                            <span class='td-post-date'><time class='entry-date updated td-module-date'>$r1[jam], $tglr</time></span> 
                            <div class='td-module-comments'><a href='".base_url()."berita/detail/$r1[judul_seo]'>$total_komentar</a></div> 
                        </div>
                        <div class='td-excerpt'>$isi... </div>
                    </div>
                   </div>";
            }
        ?>

        <div class='td-block-span6'>
        <?php 
            $kategori11 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r['id_kategori'],'berita.status' => 'Y'),'id_berita','DESC',1,4);            
            foreach ($kategori11->result_array() as $r1) {
            $tglr = tgl_indo($r1['tanggal']);
            $isi_berita = strip_tags($r1['isi_berita']); 
            $isi = substr($isi_berita,0,130); 
            $isi = substr($isi_berita,0,strrpos($isi," "));
            $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r1['id_berita']))->num_rows();
            echo "<div class='td_module_6 td_module_wrap td-animation-stack'>
                    <div class='td-module-thumb'>";
                    if ($r1['gambar'] ==''){
                        echo "<a href='".base_url()."berita/detail/$r1[judul_seo]'><img width='100' height='75' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/small_no-image.jpg' alt='no-image.jpg' /></a>";
                    }else{
                        echo "<a href='".base_url()."berita/detail/$r1[judul_seo]'><img width='100' height='75' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/$r1[gambar]' alt='$r1[gambar]' /></a>";
                    }
                    echo "</div>
                    <div class='item-details'>
                        <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$r1[judul_seo]' rel='bookmark' title='$r1[judul]'>$r1[judul]</a></h3> 
                        <div class='meta-info'><span class='td-post-date'><time class='entry-date updated td-module-date'>$r1[jam], $tglr</time></span> </div>
                    </div>
                  </div>";
            }
        ?>
        </div> 
    </div>


    <div class="td-a-rec td-a-rec-id-custom_ad_1 td_block_template_1">
        <div class="td-all-devices">
        <?php
            $ia = $this->model_utama->view_ordering_limit('iklantengah','id_iklantengah','ASC',1,1)->row_array();
            echo "<a href='$ia[url]' target='_blank'>";
                $string = $ia['gambar'];
                if ($ia['gambar'] != ''){
                    if(preg_match("/swf\z/i", $string)) {
                        echo "<embed  style='width:100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' quality='high' type='application/x-shockwave-flash'>";
                    } else {
                        echo "<img width='100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' title='$ia[judul]' />";
                    }
                }
            echo "</a>";
        ?>
        </div>
    </div>

    <div class="td_block_wrap td_block_slide td-pb-border-top td_block_template_1 td_normal_slide"> <!-- Block -->
    <div class="td_block_inner td_animated_xlong td_fadeInLeft" style="height: auto;">
        <div class="td-block-row">
            <?php 
            $r2 = $this->model_utama->view_where('kategori',array('sidebar' => 2))->row_array();
            $kategori2 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r2['id_kategori'],'berita.status' => 'Y'),'id_berita','DESC',0,2);            
            foreach ($kategori2->result_array() as $r1) {
            $tglr = tgl_indo($r1['tanggal']);
            $isi_berita = strip_tags($r1['isi_berita']); 
            $isi = substr($isi_berita,0,130); 
            $isi = substr($isi_berita,0,strrpos($isi," "));
            $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r1['id_berita']))->num_rows();
                echo "<div class='td-block-span6'>
                        <div class='td_module_4 td_module_wrap td-animation-stack'>
                            <div class='td-module-image'>
                                <div class='td-module-thumb'>";
                                if ($r1['gambar'] ==''){
                                    echo "<a href='".base_url()."berita/detail/$r1[judul_seo]'><img style='width:100%; height:194px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/small_no-image.jpg' alt='no-image.jpg' /></a>";
                                }else{
                                    echo "<a href='".base_url()."berita/detail/$r1[judul_seo]'><img style='width:100%; height:194px' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/$r1[gambar]' alt='$r1[gambar]' /></a>";
                                }
                                echo "</div> 
                                <a href='".base_url()."kategori/detail/$r1[kategori_seo]' class='td-post-category'>$r1[nama_kategori]</a>           
                            </div>
                            <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$r1[judul_seo]' rel='bookmark' title='$r1[judul]'>$r1[judul]</a></h3>
                            <div class='meta-info'>
                                <span class='td-post-author-name'><a href='".base_url()."berita/detail/$r1[judul_seo]'>$r1[nama_lengkap]</a> <span>-</span> </span> 
                                <span class='td-post-date'><time class='entry-date updated td-module-date'>$r1[jam], $tglr</time></span> 
                                <div class='td-module-comments'><a href='".base_url()."berita/detail/$r1[judul_seo]'>$total_komentar</a></div> 
                            </div>
                            <div class='td-excerpt'>$isi...</div>
                        </div>
                    </div>";
            }
            ?>
        </div><!--./row-fluid-->


        <div class="td-block-row">
        <?php 
            $kategori22 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r2['id_kategori'],'berita.status' => 'Y'),'id_berita','DESC',2,4);            
            foreach ($kategori22->result_array() as $r1) {
            $tglr = tgl_indo($r1['tanggal']);
            $isi_berita = strip_tags($r1['isi_berita']); 
            $isi = substr($isi_berita,0,130); 
            $isi = substr($isi_berita,0,strrpos($isi," "));
            $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r1['id_berita']))->num_rows();
                echo "<div class='td-block-span6'>
                        <div class='td_module_6 td_module_wrap td-animation-stack'>
                            <div class='td-module-thumb'>";
                                if ($r1['gambar'] ==''){
                                    echo "<a href='".base_url()."berita/detail/$r1[judul_seo]'><img width='100' height='75' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/small_no-image.jpg' alt='no-image.jpg' /></a>";
                                }else{
                                    echo "<a href='".base_url()."berita/detail/$r1[judul_seo]'><img width='100' height='75' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/$r1[gambar]' alt='$r1[gambar]' /></a>";
                                }
                            echo "</div> 
                            <div class='item-details'>
                                <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$r1[judul_seo]' rel='bookmark' title='$r1[judul]'>$r1[judul]</a></h3>            
                                <div class='meta-info'>
                                  <span class='td-post-date'><time class='entry-date updated td-module-date'>$r1[jam], $tglr</time></span>                            
                                </div>
                            </div>
                        </div>
                      </div>";
            }
        ?>
        </div><!--./row-fluid-->

    </div>
    </div> <!-- ./block -->

</div>
</div>