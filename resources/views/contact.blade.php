@extends('layout.app')
@section('title')
Contact
@endsection
@section('content')
			<div class="container pt-5">
        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
            <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
          var setting = {"height":300,"width":1920,"zoom":17,"queryString":"8201 Dogwood Ln, Irving, TX 75063, USA","place_id":"ChIJIUIjG1AoTIYRgxNNJGUiT3o","satellite":false,"centerCoord":[32.9197795102812,-96.95375514999999],"cid":"0x7a4f2265244d1383","lang":"en","cityUrl":"/us/tx/dallas","cityAnchorText":"Map of Dallas, Texas, United States","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"534601"};
          var d = document;
          var s = d.createElement('script');
          s.src = 'https://1map.com/js/script-for-user.js?embed_id=534601';
          s.async = true;
          s.onload = function (e) {
            window.OneMap.initMap(setting)
          };
          var to = d.getElementsByTagName('script')[0];
          to.parentNode.insertBefore(s, to);
          })();</script>
          </div>
				<div class="footer-widgets-wrap my-5">
					<div class="row col-mb-50">
						<div class="col-lg-6">
							<div class="widget clearfix">
                <h3 style='color:#d90416;text-transform: uppercase'>Hamro Realty</h3>
								<div class="py-2" style="background: url('images/world-map.png') no-repeat center center;">
									<div class="row col-mb-30">
										<div class="col-6">
											<address class="mb-0">
												<abbr title="Headquarters" style="display: inline-block;margin-bottom: 7px;"><strong>Headquarters:</strong></abbr><br>
												Dallas, Texas 75063, United States
											</address>
										</div>
										<div class="col-6">
											<abbr title="Phone Number"><strong>Phone:</strong></abbr> (469) 688-1640<br>
											<abbr title="Email Address"><strong>Email:</strong></abbr> info@hamrorealty.com
										</div>
									</div>
								</div>
								<a href="#" class="social-icon si-small si-rounded topmargin-sm si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon si-small si-rounded topmargin-sm si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon si-small si-rounded topmargin-sm si-linkedin">
									<i class="icon-linkedin"></i>
									<i class="icon-linkedin"></i>
								</a>
							</div>
						</div>
						<div class="col-sm-11 col-lg-6">
							<div class="widget quick-contact-widget form-widget clearfix">
								<h4>Send Message</h4>
								<div class="form-result"></div>
								<form id="quick-contact-form" name="quick-contact-form" action="include/form.php" method="post" class="quick-contact-form mb-0">
									<div class="form-process">
										<div class="css3-spinner">
											<div class="css3-spinner-scaler"></div>
										</div>
									</div>
									<div class="input-group mx-auto">
										<div class="input-group-text"><i class="icon-user"></i></div>
										<input type="text" class="required form-control" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Full Name" />
									</div>
									<div class="input-group mx-auto">
										<div class="input-group-text"><i class="icon-email2"></i></div>
										<input type="text" class="required form-control email" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email Address" />
									</div>
									<textarea class="required form-control input-block-level short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="4" cols="30" placeholder="Message"></textarea>
									<input type="text" class="d-none" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
									<input type="hidden" name="prefix" value="quick-contact-form-">
									<button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="btn m-0" style='background:#D90416;color:white' value="submit">Send Email</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
    </div>
@endsection