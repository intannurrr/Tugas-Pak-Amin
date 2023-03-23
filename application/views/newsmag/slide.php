<div class="slideshow-container">
    <div class="mySlides fade td_block_wrap td_block_big_grid td-grid-style-1 td-hover-1 td-big-grids td-pb-border-top td_block_template_1">
    <div class="td_block_inner">
    <div class="td-big-grid-wrapper">
        <?php 
            $utama1 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('utama' => 'Y','status' => 'Y'),'id_berita','DESC',0,1);
            foreach ($utama1->result_array() as $row) {    
            $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $row['id_berita']))->num_rows();
            $tgl = tgl_indo($row['tanggal']);
            echo "<div class='td_module_mx5 td-animation-stack td-big-grid-post-0 td-big-grid-post td-big-thumb'>
                    <div class='td-module-thumb'>";
                    if ($row['gambar'] ==''){
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='537' height='360' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
                    }else{
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='537' height='360' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."/asset/foto_berita/$row[gambar]' alt='$row[gambar]' /></a>";
                    }
                    echo "</div> 
                    <div class='td-meta-info-container'>
                        <div class='td-meta-align'>
                            <div class='td-big-grid-meta'>
                                <a href='".base_url()."kategori/detail/$row[kategori_seo]' class='td-post-category'>$row[nama_kategori]</a> 
                                <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$row[judul_seo]' rel='bookmark' title='$row[judul]'>$row[judul]</a></h3>
                                <div class='td-module-meta-info'>
                                    <span class='td-post-author-name'><a href='".base_url()."berita/detail/$row[judul_seo]'>$row[nama_lengkap]</a> <span>-</span> </span> 
                                    <span class='td-post-date'><time class='entry-date updated td-module-date'>$row[jam], $tgl</time></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='td-module-comments'><a href='".base_url()."berita/detail/$row[judul_seo]'>$total_komentar</a></div>
                   </div>";
            }

            $no = 1;
            $utama2 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('utama' => 'Y','status' => 'Y'),'id_berita','DESC',1,4);
            foreach ($utama2->result_array() as $row) {    
            $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $row['id_berita']))->num_rows();
            $tgl = tgl_indo($row['tanggal']);
            echo "<div class='td_module_mx6 td-animation-stack td-big-grid-post-$no td-big-grid-post td-tiny-thumb'>
                    <div class='td-module-thumb'>";
                    if ($row['gambar'] ==''){
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='238' height='178' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
                    }else{
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='238' height='178' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."/asset/foto_berita/$row[gambar]' alt='$row[gambar]' /></a>";
                    }
                    echo "</div> 
                    <div class='td-meta-info-container'>
                        <div class='td-meta-align'>
                            <div class='td-big-grid-meta'>
                                <a href='".base_url()."kategori/detail/$row[kategori_seo]' class='td-post-category'>$row[nama_kategori]</a> 
                                <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$row[judul_seo]' rel='bookmark' title='$row[judul]'>$row[judul]</a></h3>
                                <div class='td-module-meta-info'>
                                    <span class='td-post-author-name'><a href='".base_url()."berita/detail/$row[judul_seo]'>$row[nama_lengkap]</a> <span>-</span> </span> 
                                    <span class='td-post-date'><time class='entry-date updated td-module-date'>$row[jam], $tgl</time></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='td-module-comments'><a href='".base_url()."berita/detail/$row[judul_seo]'>$total_komentar</a></div>
                   </div>";
                $no++;
            }
        ?>
    </div>
    </div>
    </div>

    <div class="mySlides fade td_block_wrap td_block_big_grid td-grid-style-1 td-hover-1 td-big-grids td-pb-border-top td_block_template_1">
    <div class="td_block_inner">
    <div class="td-big-grid-wrapper">
        <?php 
            $utama1 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('utama' => 'Y','status' => 'Y'),'id_berita','DESC',5,1);
            foreach ($utama1->result_array() as $row) {    
            $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $row['id_berita']))->num_rows();
            $tgl = tgl_indo($row['tanggal']);
            echo "<div class='td_module_mx5 td-animation-stack td-big-grid-post-0 td-big-grid-post td-big-thumb'>
                    <div class='td-module-thumb'>";
                    if ($row['gambar'] ==''){
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='537' height='360' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
                    }else{
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='537' height='360' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."/asset/foto_berita/$row[gambar]' alt='$row[gambar]' /></a>";
                    }
                    echo "</div> 
                    <div class='td-meta-info-container'>
                        <div class='td-meta-align'>
                            <div class='td-big-grid-meta'>
                                <a href='".base_url()."kategori/detail/$row[kategori_seo]' class='td-post-category'>$row[nama_kategori]</a> 
                                <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$row[judul_seo]' rel='bookmark' title='$row[judul]'>$row[judul]</a></h3>
                                <div class='td-module-meta-info'>
                                    <span class='td-post-author-name'><a href='".base_url()."berita/detail/$row[judul_seo]'>$row[nama_lengkap]</a> <span>-</span> </span> 
                                    <span class='td-post-date'><time class='entry-date updated td-module-date'>$row[jam], $tgl</time></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='td-module-comments'><a href='".base_url()."berita/detail/$row[judul_seo]'>$total_komentar</a></div>
                   </div>";
            }

            $no = 1;
            $utama2 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('utama' => 'Y','status' => 'Y'),'id_berita','DESC',6,4);
            foreach ($utama2->result_array() as $row) {    
            $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $row['id_berita']))->num_rows();
            $tgl = tgl_indo($row['tanggal']);
            echo "<div class='td_module_mx6 td-animation-stack td-big-grid-post-$no td-big-grid-post td-tiny-thumb'>
                    <div class='td-module-thumb'>";
                    if ($row['gambar'] ==''){
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='238' height='178' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
                    }else{
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='238' height='178' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."/asset/foto_berita/$row[gambar]' alt='$row[gambar]' /></a>";
                    }
                    echo "</div> 
                    <div class='td-meta-info-container'>
                        <div class='td-meta-align'>
                            <div class='td-big-grid-meta'>
                                <a href='".base_url()."kategori/detail/$row[kategori_seo]' class='td-post-category'>$row[nama_kategori]</a> 
                                <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$row[judul_seo]' rel='bookmark' title='$row[judul]'>$row[judul]</a></h3>
                                <div class='td-module-meta-info'>
                                    <span class='td-post-author-name'><a href='".base_url()."berita/detail/$row[judul_seo]'>$row[nama_lengkap]</a> <span>-</span> </span> 
                                    <span class='td-post-date'><time class='entry-date updated td-module-date'>$row[jam], $tgl</time></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='td-module-comments'><a href='".base_url()."berita/detail/$row[judul_seo]'>$total_komentar</a></div>
                   </div>";
                $no++;
            }
        ?>
    </div>
    </div>
    </div>

    <div class="mySlides fade td_block_wrap td_block_big_grid td-grid-style-1 td-hover-1 td-big-grids td-pb-border-top td_block_template_1">
    <div class="td_block_inner">
    <div class="td-big-grid-wrapper">
        <?php 
            $utama1 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('utama' => 'Y','status' => 'Y'),'id_berita','DESC',7,1);
            foreach ($utama1->result_array() as $row) {    
            $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $row['id_berita']))->num_rows();
            $tgl = tgl_indo($row['tanggal']);
            echo "<div class='td_module_mx5 td-animation-stack td-big-grid-post-0 td-big-grid-post td-big-thumb'>
                    <div class='td-module-thumb'>";
                    if ($row['gambar'] ==''){
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='537' height='360' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
                    }else{
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='537' height='360' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."/asset/foto_berita/$row[gambar]' alt='$row[gambar]' /></a>";
                    }
                    echo "</div> 
                    <div class='td-meta-info-container'>
                        <div class='td-meta-align'>
                            <div class='td-big-grid-meta'>
                                <a href='".base_url()."kategori/detail/$row[kategori_seo]' class='td-post-category'>$row[nama_kategori]</a> 
                                <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$row[judul_seo]' rel='bookmark' title='$row[judul]'>$row[judul]</a></h3>
                                <div class='td-module-meta-info'>
                                    <span class='td-post-author-name'><a href='".base_url()."berita/detail/$row[judul_seo]'>$row[nama_lengkap]</a> <span>-</span> </span> 
                                    <span class='td-post-date'><time class='entry-date updated td-module-date'>$row[jam], $tgl</time></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='td-module-comments'><a href='".base_url()."berita/detail/$row[judul_seo]'>$total_komentar</a></div>
                   </div>";
            }

            $no = 1;
            $utama2 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('utama' => 'Y','status' => 'Y'),'id_berita','DESC',8,4);
            foreach ($utama2->result_array() as $row) {    
            $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $row['id_berita']))->num_rows();
            $tgl = tgl_indo($row['tanggal']);
            echo "<div class='td_module_mx6 td-animation-stack td-big-grid-post-$no td-big-grid-post td-tiny-thumb'>
                    <div class='td-module-thumb'>";
                    if ($row['gambar'] ==''){
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='238' height='178' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."asset/foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
                    }else{
                        echo "<a href='".base_url()."berita/detail/$row[judul_seo]'><img width='238' height='178' class='entry-thumb td-animation-stack-type0-2' src='".base_url()."/asset/foto_berita/$row[gambar]' alt='$row[gambar]' /></a>";
                    }
                    echo "</div> 
                    <div class='td-meta-info-container'>
                        <div class='td-meta-align'>
                            <div class='td-big-grid-meta'>
                                <a href='".base_url()."kategori/detail/$row[kategori_seo]' class='td-post-category'>$row[nama_kategori]</a> 
                                <h3 class='entry-title td-module-title'><a href='".base_url()."berita/detail/$row[judul_seo]' rel='bookmark' title='$row[judul]'>$row[judul]</a></h3>
                                <div class='td-module-meta-info'>
                                    <span class='td-post-author-name'><a href='".base_url()."berita/detail/$row[judul_seo]'>$row[nama_lengkap]</a> <span>-</span> </span> 
                                    <span class='td-post-date'><time class='entry-date updated td-module-date'>$row[jam], $tgl</time></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='td-module-comments'><a href='".base_url()."berita/detail/$row[judul_seo]'>$total_komentar</a></div>
                   </div>";
                $no++;
            }
        ?>
    </div>
    </div>
    </div>
</div>
<br>
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(1)"></span>  
</div>

<div class="clearfix"></div>