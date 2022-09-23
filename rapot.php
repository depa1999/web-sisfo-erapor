<?php
require "tampilan.php";
?>
<section id="mu-contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mu-contact-area">
					<!-- start title -->
					<div class="mu-title">
						<h2>Cek Rapor</h2>
					</div>
					<!-- end title -->
					<!-- start contact content -->
					<div class="mu-contact-content">
						<div class="row">
							<div class="col-md-12">
								<div class="mu-contact-left">
									<form action="hasilcari.php" method="post" class="contactform">
										<p class="comment-form-author">
											<input type="text" required="required" size="30" value="" name="cari" placeholder="Masukan NISN">
										</p>
										<p class="form-submit">
											<input type="submit" value="Cari" class="mu-post-btn" name="submit">
										</p>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- end contact content -->
				</div>
			</div>
		</div>
	</div>
</section>