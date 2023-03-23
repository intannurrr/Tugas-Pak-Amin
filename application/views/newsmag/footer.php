<div class="td-pb-row">
    <div class="td-pb-span4">
	<h4 class="block-title"><span class="td-pulldown-size">Contact Us</span></h4>
	    <div class="td-footer-info td-pb-padding-side">
            <?php 
            $iden = $this->model_utama->view_where('identitas',array('id_identitas' => 1))->row_array();
            $alamat = $this->model_utama->view_where('mod_alamat',array('id_alamat' => 1))->row_array();
            echo "<div class='footer-text-wrap'>";
			?>
			<iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo "$iden[maps]"; ?>"></iframe>
			<?php
            echo "<div class='footer-email-wrap'>email: <a href='mailto:$iden[email]'>$iden[email]</a><br/>
												telpon: <a href='#'>$iden[no_telp]</a></div>";
            ?>
        </div>

        <div class="footer-social-wrap td-social-style2">
            <span class="td-social-icon-wrap"><a target="_blank" href="<?php echo $pecahd[0]; ?>" title="Facebook"><i class="td-icon-font td-icon-facebook"></i></a></span>
            <span class="td-social-icon-wrap"><a target="_blank" href="<?php echo $pecahd[1]; ?>" title="Twitter"><i class="td-icon-font td-icon-twitter"></i></a></span>
            <span class="td-social-icon-wrap"><a target="_blank" href="<?php echo $pecahd[2]; ?>" title="Google+"><i class="td-icon-font td-icon-googleplus"></i></a></span>
            <span class="td-social-icon-wrap"><a target="_blank" href="<?php echo $pecahd[3]; ?>" title="Instagram"><i class="td-icon-font td-icon-instagram"></i></a></span>
            <span class="td-social-icon-wrap"><a target="_blank" href="<?php echo $pecahd[4]; ?>" title="Youtube"><i class="td-icon-font td-icon-youtube"></i></a></span>
        </div>
    </div>        
</div>

<div class="td-pb-span4">
<div class="td_block_wrap td_block_7 td_block_template_1">
<?php $r3 = $this->model_utama->view_where('kategori',array('sidebar' => 3))->row_array();  ?>
<h4 class="block-title"><span class="td-pulldown-size" style='text-transform:uppercase'><?php echo $r3['nama_kategori']; ?></span></h4>
<div class="td_block_inner">
<?php 
    $kategori2 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r3['id_kategori'],'berita.status' => 'Y'),'id_berita','DESC',0,3);            
    foreach ($kategori2->result_array() as $r1) {
    $tglr = tgl_indo($r1['tanggal']);
    $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r1['id_berita']))->num_rows();
        echo "<div class='td-block-span12'>
                <div class='td_module_6 td_module_wrap td-animation-stack'>
                    <div class='td-module-thumb'>";
                        if ($r1['gambar'] ==''){
                            echo "<a href='".base_url()."berita/detail/$r1[judul_seo]'><img width='100' height='75' class='entry-thumb' src='".base_url()."asset/foto_berita/small_no-image.jpg' alt='no-image.jpg' /></a>";
                        }else{
                            echo "<a href='".base_url()."berita/detail/$r1[judul_seo]'><img width='100' height='75' class='entry-thumb' src='".base_url()."asset/foto_berita/$r1[gambar]' alt='$r1[gambar]' /></a>";
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

</div>
</div> <!-- ./block -->        
</div>


<div class="td-pb-span4">
<div class="td_block_wrap td_block_popular_categories widget widget_categories td-pb-border-top td_block_template_1">
    <h4 class="block-title"><span class="td-pulldown-size">POPULAR CATEGORY</span></h4>
    <ul class="td-pb-padding-side">
        <?php 
            $kategori_populer = $this->db->query("SELECT * FROM (SELECT a.*, b.jum_dibaca FROM
                                    (SELECT * FROM kategori) as a left join
                                    (SELECT id_kategori, sum(dibaca) as jum_dibaca FROM berita GROUP BY id_kategori) as b on a.id_kategori=b.id_kategori) as c 
                                        where c.aktif='Y' ORDER BY c.jum_dibaca DESC LIMIT 10");           
            foreach ($kategori_populer->result_array() as $row) {
                echo "<li><a href='".base_url()."kategori/detail/$row[kategori_seo]'>$row[nama_kategori]<span class='td-cat-no'>".number_format($row['jum_dibaca'])."</span></a></li>";
            }
        ?>
    </ul>
</div> <!-- ./block -->        
</div>