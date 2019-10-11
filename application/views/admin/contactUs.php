<?php include_once("includes/htmlFile.php");
//Ul7fw5B9y4 ?>
<script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>
<?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
  <div class="content-wrapper">
 <div class="container-fluid">
<div id="wrapper">
<section id="content">
	<div style="width: 100%;">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d792.6493793842311!2d75.64060229075609!3d35.2813915914046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38e46392bac10283%3A0xc2f7a786f9833d7!2sSkardu!5e1!3m2!1sen!2sus!4v1518695219880" width="100%" height="650" frameborder="20" style="border:30" allowfullscreen></iframe>
	</div>
			<div class="map">
				<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2>Contact us <small>get in touch with us by filling form below</small></h2>
						<hr class="colorgraph">
						<div id="sendmessage">Your message has been sent. Thank you!</div>
						<div id="errormessage"></div>
						<form action="" method="post" role="form" class="contactForm">
							<div class="form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
								<div class="validation"></div>
							</div>

							<div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md">Send Message</button></div>
						</form>
						<hr class="colorgraph">

					</div>
				</div>
			</div>
		</section>
	</div>
</div>
</div>
		 <?php include_once("includes/jqueryFile.php") ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN4_mfiQSiWxtrXTBTaZhgi78iOlWuafA"></script>

		<script>
		jQuery(document).ready(function($) {

			//Google Map
			var get_latitude = $('#google-map').data('latitude');
			var get_longitude = $('#google-map').data('longitude');

			function initialize_google_map() {
				var myLatlng = new google.maps.LatLng(get_latitude, get_longitude);
				var mapOptions = {
					zoom: 14,
					scrollwheel: false,
					center: myLatlng
				};
				var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
				var marker = new google.maps.Marker({
					position: myLatlng,
					map: map
				});
			}
			google.maps.event.addDomListener(window, 'load', initialize_google_map);

		});
	</script>