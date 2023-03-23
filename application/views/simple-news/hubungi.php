	<div class="main--breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="home-1.html" class="btn-link"><i class="fa fm fa-home"></i>Home</a>
				</li>
				<li class="active">
					<span>About</span>
				</li>
			</ul>
		</div>
	</div>
	<div class="main-content--section pbottom--30">
		<div class="container">
			<div class="main--content">
				<div class="post--item post--single pd--30-0">
					<div class="row">
					<div style="padding:15px;"
					<div class="sticky-content-inner">
						<div class="page--title ptop--30">
							<h2 class="h2"><?php echo "$rows[nama_kategori]"; ?></h2>
						</div>
									
									<div class="map-border">
										<div class="google-maps">
											<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo "$iden[maps]"; ?>"></iframe>
										</div>
									</div>

									<div class="paragraph-row">
										<div class="column6">
											<?php echo "$rows[alamat]";?>
										</div>
										<div class="column6">
											<div style="width:370px" id="writecomment">
												<form action="<?php echo base_url(); ?>hubungi/kirim" method="POST">
													<p class="contact-form-user">
														<label for="c_name">Nickname<span class="required">*</span></label>
														<input type="text" placeholder="Nickname" name='a' id="c_name" required/>
													</p>
													<p class="contact-form-email">
														<label for="c_email">E-mail<span class="required">*</span></label>
														<input type="text" placeholder="E-mail" name='b' id="c_email" required/>
													</p>
													<p class="contact-form-message">
														<label for="c_message">Message<span class="required">*</span></label>
														<textarea style='width:430px' name='c' placeholder="Your message.." id="c_message" required></textarea>
													</p>
													<p class="contact-form-message">
														<label for="c_message">
														<?php echo $image; ?><br></label>
														<input name='secutity_code' maxlength=6 type="text" class="required" placeholder="Masukkkan kode di sebelah kiri..">
													</p>
													<p><input type="submit" name="submit" class="styled-button" value="Send a message" onclick="return confirm('Pesan anda ini akan kami balas melalui email ?')"/></p>
												</form>
												
											</div>
										</div>
									</div>
									
								</div>
							</div>

						</div>