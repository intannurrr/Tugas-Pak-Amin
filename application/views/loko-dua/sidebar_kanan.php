<br>
<div class="widget widget-search">
<?php
echo "<div class='header-search'>
	".form_open('berita/index')."
		<input type='text' placeholder='Masukkan Pencarian + Enter.....' name='kata' class='search-input' required/>
		<input type='submit' value='Search' name='cari' class='search-button'/>
	</form>
</div>";
?>
</div>
<div style="clear:both"></div>
<div class="widget">
	<h3>Artikel Terpopuler</h3>
	<div class="widget-articles">
		<ul>
			<li>
				<?php 
					$populer = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.status' => 'Y'),'dibaca','DESC',0,5);
					foreach ($populer->result_array() as $r2x) {
					$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r2x['id_berita']))->num_rows();
					echo "<li>
							<div class='article-photo'>";
								if ($r2x['gambar'] ==''){
									echo "<a href='".base_url()."berita/detail/$r2x[judul_seo]' class='hover-effect'><img style='width:59px; height:42px;' src='".base_url()."asset/foto_berita/small_no-image.jpg' alt='' /></a>";
								}else{
									echo "<a href='".base_url()."berita/detail/$r2x[judul_seo]' class='hover-effect'><img style='width:59px; height:42px;' src='".base_url()."asset/foto_berita/$r2x[gambar]' alt='' /></a>";
								}
							echo "</div>
							<div class='article-content'>
								<h4><a href='".base_url()."berita/detail/$r2x[judul_seo]'>$r2x[judul]</a><a href='".base_url()."berita/detail/$r2x[judul_seo]' class='h-comment'>$total_komentar</a></h4>
								<span class='meta'>
									<a href='".base_url()."berita/detail/$r2x[judul_seo]'><span class='icon-text'>&#128340;</span>$r2x[jam], ".tgl_indo($r2x['tanggal'])."</a>
								</span>
							</div>
						  </li>";
					}
				?>
			</li>
		</ul>
	</div>
</div>

<div class="widget">
	<h3>Banner / Iklan</h3>
	<?php
	  $pasangiklan2 = $this->model_utama->view_ordering_limit('pasangiklan','id_pasangiklan','DESC',0,10);
	  foreach ($pasangiklan2->result_array() as $b) {
		$string = $b['gambar'];
		if ($b['gambar'] != ''){
			if(preg_match("/swf\z/i", $string)) {
				echo "<embed src='".base_url()."asset/foto_pasangiklan/$b[gambar]' width=100% height=240 quality='high' type='application/x-shockwave-flash'>";
			} else {
				echo "<a href='$b[url]' target='_blank'><img style='width:100%;' src='".base_url()."asset/foto_pasangiklan/$b[gambar]' alt='$b[judul]' /></a>";
			}
			echo "<hr>";
		}
	  }
	?>
</div>