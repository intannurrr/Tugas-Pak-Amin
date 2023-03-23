    
	<?php
		
		$slide1 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.utama' => 'Y','status' => 'Y'),'id_berita','DESC',0,4);
		$no=1;
		foreach ($slide1->result_array() as $row) {
			$tgl = tgl_indo($row['tanggal']);
			if ($row['gambar'] ==''){ $foto_slide = 'no-image.jpg'; }else{ $foto_slide = $row['gambar']; }
			if (strlen($row['judul']) > 62){ $judul = substr($row['judul'],0,62).',..';  }else{ $judul = $row['judul']; }
			if ($no == 1){ 
				?>
				<div class="col-md-6">
					<div class="post--item post--layout-1 post--title-larger">
						<div class="post--img">
							<a href="<?php echo base_url()."berita/detail/$row[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url() . "asset/foto_berita/$foto_slide"; ?>&amp;w=562&amp;h=390" alt=""></a>
							<a href="<?php echo base_url()."kategori/detail/$row[kategori_seo]";?>" class="cat"><?php echo $row['nama_kategori'];?></a>
							<div class="post--info">
								<ul class="nav meta">
									<li>
										<a href="#"><?php echo "$row[hari], $tgl | $row[jam]"; ?></a>
									</li>
								</ul>
								<div class="title">
									<h2 class="h4"><a href="<?php echo base_url()."berita/detail/$row[judul_seo]";?>" class="btn-link"><?php echo $judul;?></a></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			?>
			<div class="col-md-6">
				<div class="row gutter--15">
			<?php	
			}elseif ($no == 2){ 
					?>
					<div class="col-xs-6 col-xss-12">
							<div class="post--item post--layout-1 post--title-large">
								<div class="post--img">
									<a href="news-single-v1.html" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url() . "asset/foto_berita/$foto_slide"; ?>&amp;w=562&amp;h=390" alt=""></a>
									<a href="<?php echo base_url()."kategori/detail/$row[kategori_seo]";?>" class="cat"><?php echo $row['nama_kategori'];?></a>
									<div class="post--info">
										<ul class="nav meta">
											<li>
												<a href="#"><?php echo "$row[hari], $tgl | $row[jam]"; ?></a>
											</li>
										</ul>
										<div class="title">
											<h2 class="h4"><a href="<?php echo base_url()."berita/detail/$row[judul_seo]";?>" class="btn-link"><?php echo $judul;?></a></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					elseif ($no == 3){
					?>
						<div class="col-xs-6 hidden-xss">
							<div class="post--item post--layout-1 post--title-large">
								<div class="post--img">
									<a href="news-single-v1.html" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url() . "asset/foto_berita/$foto_slide"; ?>&amp;w=562&amp;h=390" alt=""></a>
									<a href="<?php echo base_url()."kategori/detail/$row[kategori_seo]";?>" class="cat"><?php echo $row['nama_kategori'];?></a>
									<div class="post--info">
										<ul class="nav meta">
											<li>
												<a href="#"><?php echo "$row[hari], $tgl | $row[jam]"; ?></a>
											</li>
										</ul>
										<div class="title">
											<h2 class="h4"><a href="<?php echo base_url()."berita/detail/$row[judul_seo]";?>" class="btn-link"><?php echo $judul;?></a></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}elseif($no == 4){
						?>
						<div class="col-sm-12 hidden-sm hidden-xs">
							<div class="post--item post--layout-1 post--title-larger">
								<div class="post--img">
									<a href="news-single-v1.html" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url() . "asset/foto_berita/$foto_slide"; ?>&amp;w=562&amp;h=186" alt=""></a>
									<a href="<?php echo base_url()."kategori/detail/$row[kategori_seo]";?>" class="cat"><?php echo $row['nama_kategori'];?></a>
									<div class="post--info">
										<ul class="nav meta">
											<li>
												<a href="#"><?php echo "$row[hari], $tgl | $row[jam]"; ?></a>
											</li>
										</ul>
										<div class="title">
											<h2 class="h4"><a href="<?php echo base_url()."berita/detail/$row[judul_seo]";?>" class="btn-link"><?php echo $judul;?></a></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
				$no++;
			}
			?>
				</div>
			</div>
			