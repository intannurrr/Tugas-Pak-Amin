<div class="main-content--section pbottom--30">
		<div class="container">
			<div class="main--content">
				<div class="post--items post--items-1 pd--30-0">
					<div class="row gutter--15">
						<?php
							$cekslide = $this->model_utama->view_single('berita',array('headline' => 'Y','status' => 'Y'),'id_berita','DESC');
							if ($cekslide->num_rows() > 0){
							  include "slide.php";
							}
						?>	
					</div>
				</div>
			</div>
			<div class="row">
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="row">
						
						<div class="col-md-12 ptop--30 pbottom--30">
								<?php 
								$r = $this->model_utama->view_where('kategori',array('sidebar' => 3))->row_array();
								$kategori99 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.status' => 'Y'),'id_berita','DESC',0,5);
								$no = 1;
								?>
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4"><?php echo "BERITA TERKINI"; ?></h2>
								</div>
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row" data-ajax-content="inner">
										<?php
										foreach ($kategori99->result_array() as $r99) {
											$tglr = tgl_indo($r99['tanggal']);
											$judul_berita = strip_tags($r99['judul']); 
											if (strlen($judul_berita) >= 45){
												$jdl = substr($judul_berita,0,45); 
												$jdl = substr($judul_berita,0,strrpos($jdl," ")) . "... ";
											}else{
												$jdl = substr($judul_berita,0,45); 
												$jdl = substr($judul_berita,0,45);
											}
											$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r99['id_berita']))->num_rows();
										
										if ($no == 1){
											$isi = substr($r99['isi_berita'],0,140); 
											$isi = substr($isi,0,strrpos($isi," ")) . " .... ";
										?>
										<li class="col-md-6">
											<div class="post--item post--layout-2">
												<div class="post--img">
													<?php
													if ($r99['gambar'] ==''){
														?><a href="<?php echo base_url()."berita/detail/$r99[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/no-image.jpg";?>&amp;w=500&amp;h=338" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."berita/detail/$r99[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r99[gambar]";?>&amp;w=500&amp;h=338" alt=""></a>
														<?php
													}
													?>
													<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo $r99['nama_lengkap'];?></a>
															</li>
															<li>
																<a href="#"><?php echo "$tglr | $r99[jam]";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r99[judul_seo]";?>" class="btn-link"><?php echo $jdl; ?></a></h3>
														</div>
														<div style="padding-top:10px;"><?php echo $isi; ?></div>
													</div>
												</div>
											</div>
										</li>
										<li class="col-md-6">
											<ul class="nav row">
												<li class="col-xs-12 hidden-md hidden-lg">
													<hr class="divider"></li>
										<?php
										}else{
										?>
												<li class="col-xs-6">
													<div class="post--item post--layout-2">
														<div class="post--img">
															<?php
															if ($r99['gambar'] ==''){
																?><a href="<?php echo base_url()."berita/detail/$r99[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/no-image.jpg";?>&amp;w=450&amp;h=265" alt=""></a>
																<?php
															}else{
																?><a href="<?php echo base_url()."berita/detail/$r99[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r99[gambar]";?>&amp;w=450&amp;h=265" alt=""></a>
																<?php
															}
															?>
															<div class="post--info">
																<ul class="nav meta">
																	<li>
																		<a href="#"><?php echo "$tglr | $r99[jam]";?></a>
																	</li>
																</ul>
																<div class="title">
																	<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r99[judul_seo]";?>" class="btn-link"><?php echo $jdl; ?></a></h3>
																</div>
															</div>
														</div>
													</div>
												</li>
												<?php 
												if($no == 3){
													?>
													<li class="col-xs-12">
														<hr class="divider"></li>
													<?php
												}
												}
												$no++;
											}
												?>
											</ul>
										</li>
									</ul>
									<div class="preloader bg--color-0--b" data-preloader="1">
										<div class="preloader--inner"></div>
									</div>
								</div>
							</div>
						
						<div class="col-md-6 ptop--30 pbottom--30">
						<?php 
						$r = $this->model_utama->view_where('kategori',array('sidebar' => 1))->row_array();
						$kategori1 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r['id_kategori'],'berita.status' => 'Y'),'id_berita','DESC',0,5);
						$no = 1;
						?>
							<div class="post--items-title" data-ajax="tab">
								<h2 class="h4"><?php echo "$r[nama_kategori]"; ?></h2>
							</div>
							<div class="post--items post--items-2" data-ajax-content="outer">
								<ul class="nav row gutter--15" data-ajax-content="inner">
						
						<?php
						foreach ($kategori1->result_array() as $r1) {
							$tglr = tgl_indo($r1['tanggal']);
							$judul_berita = strip_tags($r1['judul']); 
							if (strlen($judul_berita) >= 45){
								$jdl = substr($judul_berita,0,45); 
								$jdl = substr($judul_berita,0,strrpos($jdl," ")) . "... ";
							}else{
								$jdl = substr($judul_berita,0,45); 
								$jdl = substr($judul_berita,0,45);
							}
							$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r1['id_berita']))->num_rows();
						if ($no == 1){
						?>
						<li class="col-xs-12">
											<div class="post--item post--layout-1">
												<div class="post--img">
													<?php
													if ($r1['gambar'] ==''){
														?><a href="<?php echo base_url()."berita/detail/$r1[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/no-image.jpg";?>&amp;w=450&amp;h=219" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."berita/detail/$r1[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r1[gambar]";?>&amp;w=450&amp;h=219" alt=""></a>
														<?php
													}
													?>
													
													<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo $r1['nama_lengkap'];?></a>
															</li>
															<li>
																<a href="#"><?php echo "$tglr | $r1[jam]";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r1[judul_seo]";?>" class="btn-link"><?php echo"$jdl"; ?></a></h3>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="col-xs-12">
											<hr class="divider"></li>
						<?php	
						}else{
						?>	
						<li class="col-xs-6">
											<div class="post--item post--layout-2">
												<div class="post--img">
													<?php
													if ($r1['gambar'] ==''){
														?><a href="<?php echo base_url()."berita/detail/$r1[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/small_no-image.jpg";?>&amp;w=450&amp;h=219" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."berita/detail/$r1[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r1[gambar]";?>&amp;w=180&amp;h=100" alt=""></a>
														<?php
													}
													?>
													<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo "$tglr | $r1[jam]";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r1[judul_seo]";?>" class="btn-link"><?php echo $jdl; ?></a></h3>
														</div>
													</div>
												</div>
											</div>
										</li>
						<?php	
						if ($no % 2 <> 0 and $no < 5){
							echo "<li class='col-xs-12'><hr class='divider'></li>";
							
						}
						
						}
						$no++;
						}
						?>
								
									</ul>
									<div class="preloader bg--color-0--b" data-preloader="1">
										<div class="preloader--inner"></div>
									</div>
								</div>
							</div>
							
						<?php 
						$r = $this->model_utama->view_where('kategori',array('sidebar' => 2))->row_array();
						$kategori2 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r['id_kategori'],'berita.status' => 'Y'),'id_berita','DESC',0,5);
						$no = 1;
						?>
							<div class="col-md-6 ptop--30 pbottom--30">
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4"><?php echo "$r[nama_kategori]"; ?></h2>
								</div>
								<div class="post--items post--items-3" data-ajax-content="outer">
									<ul class="nav" data-ajax-content="inner">
										<?php
										foreach ($kategori2->result_array() as $r2) {
											$tglr = tgl_indo($r2['tanggal']);
											$judul_berita = strip_tags($r2['judul']); 
											if (strlen($judul_berita) >= 45){
												$jdl = substr($judul_berita,0,45); 
												$jdl = substr($judul_berita,0,strrpos($jdl," ")) . "... ";
											}else{
												$jdl = substr($judul_berita,0,45); 
												$jdl = substr($judul_berita,0,45);
											}
											$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r2['id_berita']))->num_rows();
										if ($no == 1){
										?>
										<li>
											<div class="post--item post--layout-1">
												<div class="post--img">
													<?php
													if ($r2['gambar'] ==''){
														?><a href="<?php echo base_url()."berita/detail/$r2[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/no-image.jpg";?>&amp;w=450&amp;h=219" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."berita/detail/$r2[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r2[gambar]";?>&amp;w=450&amp;h=219" alt=""></a>
														<?php
													}
													?>
													<a href="#" class="icon"></a>
													<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo $r2['nama_lengkap'];?></a>
															</li>
															<li>
																<a href="#"><?php echo "$r2[jam], $tglr";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r2[judul_seo]";?>" class="btn-link"><?php echo $jdl; ?></a></h3>
														</div>
													</div>
												</div>
											</div>
										</li>
										<?php
										}else{
										?>	
										<li>
											<div class="post--item post--layout-3">
												<div class="post--img">
													<?php
													if ($r2['gambar'] ==''){
														?><a href="<?php echo base_url()."berita/detail/$r2[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/small_no-image.jpg";?>&amp;w=100&amp;h=70" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."berita/detail/$r2[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r2[gambar]";?>&amp;w=100&amp;h=70" alt=""></a>
														<?php
													}
													?>
													<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo "$tglr | $r2[jam]";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r2[judul_seo]";?>" class="btn-link"><?php echo $jdl; ?></a></h3>
														</div>
													</div>
												</div>
											</div>
										</li>
										<?php
										}
										$no++;
										}
										?>
									</ul>
									<div class="preloader bg--color-0--b" data-preloader="1">
										<div class="preloader--inner"></div>
									</div>
								</div>
							</div>
							<div class="col-md-12 ptop--30 pbottom--30">
								<div class="ad--space">
									<?php
										$ia = $this->model_utama->view_ordering_limit('iklantengah','id_iklantengah','ASC',0,1)->row_array();
										echo "<a href='$ia[url]' target='_blank'>";
											$string = $ia['gambar'];
											if ($ia['gambar'] != ''){
												if(preg_match("/swf\z/i", $string)) {
													echo "<embed style='margin-top:-10px' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
												} else {
													echo "<img style='margin-top:-10px; margin-bottom:5px' width='100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' title='$ia[judul]' class='center-block'/>";
												}
											}
										echo "</a>";
									?>
								</div>
							</div>
							
							<div class="col-md-12 ptop--30 pbottom--30">
								<?php 
								$r = $this->model_utama->view_where('kategori',array('sidebar' => 3))->row_array();
								$kategori3 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r['id_kategori'],'berita.status' => 'Y'),'id_berita','DESC',0,5);
								$no = 1;
								?>
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4"><?php echo "$r[nama_kategori]"; ?></h2>
								</div>
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row" data-ajax-content="inner">
										<?php
										foreach ($kategori3->result_array() as $r3) {
											$tglr = tgl_indo($r3['tanggal']);
											$judul_berita = strip_tags($r3['judul']); 
											if (strlen($judul_berita) >= 45){
												$jdl = substr($judul_berita,0,45); 
												$jdl = substr($judul_berita,0,strrpos($jdl," ")) . "... ";
											}else{
												$jdl = substr($judul_berita,0,45); 
												$jdl = substr($judul_berita,0,45);
											}
											$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r3['id_berita']))->num_rows();
										if ($no == 1){
											$isi = substr($r3['isi_berita'],0,140); 
											$isi = substr($isi,0,strrpos($isi," ")) . " .... ";
										?>
										<li class="col-md-6">
											<div class="post--item post--layout-2">
												<div class="post--img">
													<?php
													if ($r3['gambar'] ==''){
														?><a href="<?php echo base_url()."berita/detail/$r3[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/no-image.jpg";?>&amp;w=500&amp;h=338" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."berita/detail/$r3[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r3[gambar]";?>&amp;w=500&amp;h=338" alt=""></a>
														<?php
													}
													?>
													<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo $r3['nama_lengkap'];?></a>
															</li>
															<li>
																<a href="#"><?php echo "$tglr | $r3[jam]";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r3[judul_seo]";?>" class="btn-link"><?php echo $jdl; ?></a></h3>
														</div>
													</div>
													<div style="padding-top:10px;"><?php echo $isi; ?></div>
												</div>
											</div>
										</li>
										<li class="col-md-6">
											<ul class="nav row">
												<li class="col-xs-12 hidden-md hidden-lg">
													<hr class="divider"></li>
										<?php
										}else{
										?>
												<li class="col-xs-6">
													<div class="post--item post--layout-2">
														<div class="post--img">
															<?php
															if ($r3['gambar'] ==''){
																?><a href="<?php echo base_url()."berita/detail/$r3[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/no-image.jpg";?>&amp;w=450&amp;h=265" alt=""></a>
																<?php
															}else{
																?><a href="<?php echo base_url()."berita/detail/$r3[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r3[gambar]";?>&amp;w=450&amp;h=265" alt=""></a>
																<?php
															}
															?>
															<div class="post--info">
																<ul class="nav meta">
																	<li>
																		<a href="#"><?php echo "$tglr | $r3[jam]";?></a>
																	</li>
																</ul>
																<div class="title">
																	<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r3[judul_seo]";?>" class="btn-link"><?php echo $jdl; ?></a></h3>
																</div>
															</div>
														</div>
													</div>
												</li>
												<?php 
												if($no == 3){
													?>
													<li class="col-xs-12">
														<hr class="divider"></li>
													<?php
												}
												}
												$no++;
											}
												?>
											</ul>
										</li>
									</ul>
									<div class="preloader bg--color-0--b" data-preloader="1">
										<div class="preloader--inner"></div>
									</div>
								</div>
							</div>
							<div class="col-md-6 ptop--30 pbottom--30">
						<?php 
						$r = $this->model_utama->view_where('kategori',array('sidebar' => 4))->row_array();
						$kategori4 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r['id_kategori'],'berita.status' => 'Y'),'id_berita','DESC',0,5);
						$no = 1;
						?>
							<div class="post--items-title" data-ajax="tab">
								<h2 class="h4"><?php echo "$r[nama_kategori]"; ?></h2>
							</div>
							<div class="post--items post--items-2" data-ajax-content="outer">
								<ul class="nav row gutter--15" data-ajax-content="inner">
						
						<?php
						foreach ($kategori4->result_array() as $r4) {
							$tglr = tgl_indo($r4['tanggal']);
							$judul_berita = strip_tags($r4['judul']); 
							if (strlen($judul_berita) >= 45){
								$jdl = substr($judul_berita,0,45); 
								$jdl = substr($judul_berita,0,strrpos($jdl," ")) . "... ";
							}else{
								$jdl = substr($judul_berita,0,45); 
								$jdl = substr($judul_berita,0,45);
							}
							$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r4['id_berita']))->num_rows();
						if ($no == 1){
						?>
						<li class="col-xs-12">
											<div class="post--item post--layout-1">
												<div class="post--img">
													<?php
													if ($r4['gambar'] ==''){
														?><a href="<?php echo base_url()."berita/detail/$r4[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/small_no-image.jpg";?>&amp;w=450&amp;h=219" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."berita/detail/$r4[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r4[gambar]";?>&amp;w=450&amp;h=219" alt=""></a>
														<?php
													}
													?>
													
													<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo $r4['nama_lengkap'];?></a>
															</li>
															<li>
																<a href="#"><?php echo "$r4[jam], $tglr";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r4[judul_seo]";?>" class="btn-link"><?php echo $jdl; ?></a></h3>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="col-xs-12">
											<hr class="divider"></li>
						<?php	
						}else{
						?>	
						<li class="col-xs-6">
											<div class="post--item post--layout-2">
												<div class="post--img">
													<?php
													if ($r4['gambar'] ==''){
														?><a href="<?php echo base_url()."berita/detail/$r4[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/small_no-image.jpg";?>&amp;w=450&amp;h=219" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."berita/detail/$r4[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r4[gambar]";?>&amp;w=180&amp;h=100" alt=""></a>
														<?php
													}
													?>
													<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo "$r4[jam], $tglr";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r4[judul_seo]";?>" class="btn-link"><?php echo $jdl; ?></a></h3>
														</div>
													</div>
												</div>
											</div>
										</li>
						<?php	
						if ($no % 2 <> 0 and $no < 5){
							echo "<li class='col-xs-12'><hr class='divider'></li>";
							
						}
						
						}
						$no++;
						}
						?>
								
									</ul>
									<div class="preloader bg--color-0--b" data-preloader="1">
										<div class="preloader--inner"></div>
									</div>
								</div>
							</div>
							<?php 
						$r = $this->model_utama->view_where('kategori',array('sidebar' => 5))->row_array();
						$kategori5 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.id_kategori' => $r['id_kategori'],'berita.status' => 'Y'),'id_berita','DESC',0,5);
						$no = 1;
						?>
							<div class="col-md-6 ptop--30 pbottom--30">
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4"><?php echo "$r[nama_kategori]"; ?></h2>
								</div>
								<div class="post--items post--items-3" data-ajax-content="outer">
									<ul class="nav" data-ajax-content="inner">
										<?php
										foreach ($kategori5->result_array() as $r5) {
											$tglr = tgl_indo($r5['tanggal']);
											$judul_berita = strip_tags($r5['judul']); 
											if (strlen($judul_berita) >= 45){
												$jdl = substr($judul_berita,0,45); 
												$jdl = substr($judul_berita,0,strrpos($jdl," ")) . "... ";
											}else{
												$jdl = substr($judul_berita,0,45); 
												$jdl = substr($judul_berita,0,45);
											}
											$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r5['id_berita']))->num_rows();
										if ($no == 1){
										?>
										<li>
											<div class="post--item post--layout-1">
												<div class="post--img">
													<?php
													if ($r5['gambar'] ==''){
														?><a href="<?php echo base_url()."berita/detail/$r5[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/no-image.jpg";?>&amp;w=450&amp;h=219" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."berita/detail/$r5[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r5[gambar]";?>&amp;w=450&amp;h=219" alt=""></a>
														<?php
													}
													?>
													<a href="#" class="icon"></a>
													<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo $r5['nama_lengkap'];?></a>
															</li>
															<li>
																<a href="#"><?php echo "$r5[jam], $tglr";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r5[judul_seo]";?>" class="btn-link"><?php echo "$jdl"; ?></a></h3>
														</div>
													</div>
												</div>
											</div>
										</li>
										<?php
										}else{
										?>	
										<li>
											<div class="post--item post--layout-3">
												<div class="post--img">
													<?php
													if ($r5['gambar'] ==''){
														?><a href="<?php echo base_url()."berita/detail/$r5[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/small_no-image.jpg";?>&amp;w=100&amp;h=70" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."berita/detail/$r5[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r5[gambar]";?>&amp;w=100&amp;h=70" alt=""></a>
														<?php
													}
													?>
													<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo "$tglr | $r5[jam]";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r5[judul_seo]";?>" class="btn-link"><?php echo $jdl; ?></a></h3>
														</div>
													</div>
												</div>
											</div>
										</li>
										<?php
										}
										$no++;
										}
										?>
									</ul>
									<div class="preloader bg--color-0--b" data-preloader="1">
										<div class="preloader--inner"></div>
									</div>
								</div>
							</div>
							<div class="col-md-12 ptop--30 pbottom--30">
								<div class="post--items-title" data-ajax="tab">
									<a href = "<?php echo base_url(); ?>albums"><h2 class="h4">Photo Gallery</h2></a>
									<div class="nav">
									</div>
								</div>
								<div class="post--items post--items-1" data-ajax-content="outer">
									<ul class="nav row gutter--15" data-ajax-content="inner">
									<?php 
										$no = 1;
										$album = $this->model_utama->view_where_ordering_limit('album',array('aktif' => 'Y'),'id_album','RANDOM',0,3);
										
										foreach ($album->result_array() as $row) {
											$jumlah = $this->model_utama->view_where('gallery',array('id_album' => $row['id_album']))->num_rows();
											if (1 == 1){
											?>
											<li class="col-md-4 col-xs-6 col-xxs-12">
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="<?php echo base_url() ."albums/detail/" . $row['album_seo']; ?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url() . "asset/img_album/$row[gbr_album]"?>&amp;w=450&amp;h=300" alt="<?php echo $row['jdl_album']; ?>"></a>
													<div class="post--info">
														<div class="title">
															<h2 class="h4"><a href="news-single-v1.html" class="btn-link"><?php echo $row['jdl_album'] ?></a></h2>
														</div>
													</div>
												</div>
											</div>
										</li>
											<?php
											$no++;
											}
										}
								    ?>
									</ul>
									<div class="preloader bg--color-0--b" data-preloader="1">
										<div class="preloader--inner"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include "sidebar_kanan.php"; ?>
			</div>
			<div class="main--content pd--30-0">
				<div class="post--items-title" data-ajax="tab">
					<h2 class="h4">Audio &amp; Videos</h2>
				</div>
				<div class="post--items post--items-4" data-ajax-content="outer">
					<ul class="nav row" data-ajax-content="inner">
						
			<?php
			  $no = 1;
			  $video = $this->model_utama->view_ordering_limit('video','id_video','DESC',0,5);
			  foreach ($video->result_array() as $d) {
				 $baca = $d['dilihat']+1;
				 $tgl = tgl_indo($d['tanggal']);
				 $judul = substr($d['jdl_video'],0,55);
				 if (isset($d['gbr_video'])){
					 $gambar_video = base_url() . "template/". template() . "/img/home-img/audio-video-02.jpg";
				 }else{
					 $gambar_video = $d['gbr_video'];
				 }
					 
				 if ($no == 1){
					 ?>
					 <li class="col-md-8">
							<div class="post--item post--layout-1 post--type-video post--title-large">
								<div class="post--img">
									
									<?php
									if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $d['youtube'], $match)) {
                                    echo "<iframe width='100%' height='380' src='https://www.youtube.com/embed/".$match[1]."' frameborder='0' allowfullscreen></iframe>";
									} 
									?>
									<div class="post--info">
										<ul class="nav meta">
											<li>
												<a href="#"><?php echo "$d[hari], $tgl - Dilihat $baca Kali";?></a>
											</li>
										</ul>
										<div class="title">
											<h2 class="h4"><a href="<?php echo base_url()."playlist/watch/$d[video_seo]"; ?>" class="btn-link"><?php echo $judul;?></a></h2>
										</div>
									</div>
								</div>
							</div>
							<hr class="divider hidden-md hidden-lg"></li>
							<li class="col-md-4">
							<ul class="nav">
								
					 <?php
				  }
				  else{
					  ?>
					  <li>
						<div class="post--item post--type-audio post--layout-3">
							<div class="post--img">
								<a href="<?php echo base_url()."playlist/watch/$d[video_seo]"; ?>" class="thumb">
								<?php
									if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $d['youtube'], $match)) {
                                    echo "<iframe width='100' height='70' src='https://www.youtube.com/embed/".$match[1]."' frameborder='0' allowfullscreen></iframe>";
									} 
									?>
								</a>
								<div class="post--info">
									<ul class="nav meta">
										<li>
											<a href="#"><?php echo "$d[hari], $tgl - Dilihat $baca Kali";?></a>
										</li>
									</ul>
									<div class="title">
										<h3 class="h4"><a href="news-single-v1.html" class="btn-link"><?php echo $judul;?></a></h3>
									</div>
								</div>
							</div>
						</div>
					</li>
					  <?php
				  }
				  $no++;
			  }
			?>
				
							</ul>
						</li>
					</ul>
					<div class="preloader bg--color-0--b" data-preloader="1">
						<div class="preloader--inner"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
