<?php
require ('php/classes/details.class.php');
if (!empty($_GET)){
	$carid=$_GET['carid'];
	if($obj->getDetails($carid)){
		$data = $obj->result;
	}
	if($obj->getCarImages()){
		$data2 = $obj->images;
	}

}else{
	//header('Location: index.html');
}
?>
<html>
<head>
    <title>Car Details | Easy Cars</title>
    <link href="assets/css/master.css" rel="stylesheet">
</head>
<body class="m-detail">
<header class="b-topBar">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="b-topBar__addr">
                    <span class="fa fa-map-marker"></span>
                    JP Nagar 5th phase, Bangalore
                </div>
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="b-topBar__tel">
                    <span class="fa fa-phone"></span>
                    1800-111-000
                </div>
            </div>
            <div class="col-xs-6">
                <nav class="b-topBar__nav">
                    <ul>
                        <li><a href="#">Register</a></li>
                        <li><a href="#">Sign in</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header><!--b-topBar-->

<nav class="b-nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-4">
                <div class="b-nav__logo wow slideInLeft">
                    <h3><a href="index.html">Easy <span>Cars</span></a></h3>
                    <h2><a href="index.html">Project For SV.CO 2016</a></h2>
                </div>
            </div>
            <div class="col-sm-9 col-xs-8">
                <div class="b-nav__list wow slideInRight">
                    <div class="collapse navbar-collapse navbar-main-slide" id="nav">
                        <ul class="navbar-nav-menu">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>                            
                            <li><a href="contacts.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav><!--b-nav-->

<section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.5s">Vehicle Details Page</h1>
			</div>
		</section><!--b-pageHeader-->

<div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
			<div class="container">
				<a href="index.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="listings.html" class="b-breadCumbs__page">Luxury Cars</a>
			</div>
		</div><!--b-breadCumbs-->
		
		<div class="b-infoBar">
			<div class="container">
				<div class="row wow zoomInUp" data-wow-delay="0.5s">
					<div class="col-xs-3">						
					</div>
					<div class="col-xs-9">
						<div class="b-infoBar__btns">
							<a href="#" class="btn m-btn m-infoBtn">SHARE THIS VEHICLE<span class="fa fa-angle-right"></span></a>
							<a href="#" class="btn m-btn m-infoBtn">PRINT THIS PAGE<span class="fa fa-angle-right"></span></a>
							<a href="#" class="btn m-btn m-infoBtn">ADD TO Compare<span class="fa fa-angle-right"></span></a>
							<a href="#" class="btn m-btn m-infoBtn">DOWNLOAD brochure<span class="fa fa-angle-right"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div><!--b-infoBar-->
		
		
		<section class="b-detail s-shadow">
			<div class="container">
			<header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
					<div class="row">
						<div class="col-sm-9 col-xs-12">
							<div class="b-detail__head-title">
								<h1><?php echo strtoupper($data['manufacturer'].' '.$data['model']) ?></h1>
							</div>
						</div>
						<div class="col-sm-3 col-xs-12">
							<div class="b-detail__head-price">
								<div class="b-detail__head-price-num"><?php $obj->moneyconv(); ?></div>
								<p>Included Taxes &amp; Checkup</p>
							</div>
						</div>
					</div>
				</header>
				<div class="b-detail__main">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<div class="b-detail__main-info">
								<div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
									<div class="row m-smallPadding">
										<div class="col-xs-10">
											<ul class="b-detail__main-info-images-big bxslider enable-bx-slider" data-pager-custom="#bx-pager" data-mode="horizontal" data-pager-slide="true" data-mode-pager="vertical" data-pager-qty="5">
												<li class="s-relative">                                        
													<a data-toggle="modal" data-target="#myModal" href="#" class="b-items__cars-one-img-video"></a>
													<img class="img-responsive center-block" src="<?php echo $data2['image1']; ?>" alt="img" />
												</li>
												<li class="s-relative">                                        
													<a data-toggle="modal" data-target="#myModal" href="#" class="b-items__cars-one-img-video"></a>
													<img class="img-responsive center-block" src="<?php echo $data2['image2']; ?>" alt="img" />
												</li>
												<li class="s-relative">
													<a data-toggle="modal" data-target="#myModal" href="#" class="b-items__cars-one-img-video"></a>
													<img class="img-responsive center-block" src="<?php echo $data2['image3']; ?>" alt="img" />
												</li>
												<li class="s-relative">
													<a data-toggle="modal" data-target="#myModal" href="#" class="b-items__cars-one-img-video"></a>
													<img class="img-responsive center-block" src="<?php echo $data2['image4']; ?>" alt="img" />
												</li>
												<li class="s-relative">
													<a data-toggle="modal" data-target="#myModal" href="#" class="b-items__cars-one-img-video"></a>
													<img class="img-responsive center-block" src="<?php echo $data2['image5']; ?>" alt="img" />
												</li>
											</ul>
										</div>
										<div class="col-xs-2 pagerSlider pagerVertical">
											<div class="b-detail__main-info-images-small" id="bx-pager">
												<a href="#" data-slide-index="0" class="b-detail__main-info-images-small-one">
													<img class="img-responsive" src="<?php echo $data2['image1']; ?>" alt="img" />
												</a>
												<a href="#" data-slide-index="1" class="b-detail__main-info-images-small-one">
													<img class="img-responsive" src="<?php echo $data2['image2']; ?>" alt="img" />
												</a>
												<a href="#" data-slide-index="2" class="b-detail__main-info-images-small-one">
													<img class="img-responsive" src="<?php echo $data2['image3']; ?>" alt="img" />
												</a>
												<a href="#" data-slide-index="3" class="b-detail__main-info-images-small-one">
													<img class="img-responsive" src="<?php echo $data2['image4']; ?>" alt="img" />
												</a>
												<a href="#" data-slide-index="4" class="b-detail__main-info-images-small-one">
													<img class="img-responsive" src="<?php echo $data2['image5']; ?>" alt="img" />
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="b-detail__main-info-characteristics wow zoomInUp" data-wow-delay="0.5s">
									<div class="b-detail__main-info-characteristics-one">
										<div class="b-detail__main-info-characteristics-one-top">
											<div><span class="fa fa-car"></span></div>
											<p><?php echo strtoupper($data['vehical_type']) ?></p>
										</div>
										<div class="b-detail__main-info-characteristics-one-bottom">
											Vehical Type
										</div>
									</div>
									<div class="b-detail__main-info-characteristics-one">
										<div class="b-detail__main-info-characteristics-one-top">
											<div><span class="fa fa-trophy"></span></div>
											<p><?php echo $data['warrenty'] ?></p>
										</div>
										<div class="b-detail__main-info-characteristics-one-bottom">
											Warrenty
										</div>
									</div>
									<div class="b-detail__main-info-characteristics-one">
										<div class="b-detail__main-info-characteristics-one-top">
											<div><span class="fa fa-at"></span></div>
											<p><?php echo strtoupper($data['transmission']) ?></p>
										</div>
										<div class="b-detail__main-info-characteristics-one-bottom">
											Transmission
										</div>
									</div>
									<div class="b-detail__main-info-characteristics-one">
										<div class="b-detail__main-info-characteristics-one-top">
											<div><span class="fa fa-user"></span></div>
											<p><?php echo $data['passengers_doors'] ?></p>
										</div>
										<div class="b-detail__main-info-characteristics-one-bottom">
											Passangers
										</div>
									</div>
									<div class="b-detail__main-info-characteristics-one">
										<div class="b-detail__main-info-characteristics-one-top">
											<div><span class="fa fa-at"></span></div>
											<p><?php echo strtoupper($data['exterior_color']) ?></p>
										</div>
										<div class="b-detail__main-info-characteristics-one-bottom">
											Color
										</div>
									</div>
									<div class="b-detail__main-info-characteristics-one">
										<div class="b-detail__main-info-characteristics-one-top">
											<div><span class="fa fa-fire-extinguisher"></span></div>
											<p><?php echo strtoupper($data['fuel_type']) ?></p>
										</div>
										<div class="b-detail__main-info-characteristics-one-bottom">
											Fuel Type
										</div>
									</div>
									<div class="b-detail__main-info-characteristics-one">
										<div class="b-detail__main-info-characteristics-one-top">
											<div><span class="fa fa-fire-extinguisher"></span></div>
											<p><?php echo $data['millage'] ?> L</p>
										</div>
										<div class="b-detail__main-info-characteristics-one-bottom">
											On Highway
										</div>
									</div>
								</div>
								<div class="b-detail__main-info-text wow zoomInUp" data-wow-delay="0.5s">
									<div class="b-detail__main-aside-about-form-links">
										<a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info1'>GENERAL INQUIRY</a>										
									</div>
									<div id="info1">
										<p></p>
										
									</div>									
								</div>
								<div class="b-detail__main-info-extra wow zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">EXTRA FEATURES</h2>
									<div class="row">
										<div class="col-xs-4">
											<ul>
												<li><span class="fa fa-check"></span>Security System</li>
												<li><span class="fa fa-check"></span>Air Conditioning</li>
												<li><span class="fa fa-check"></span>Alloy Wheels</li>
												<li><span class="fa fa-check"></span>Anti-Lock Brakes (ABS)</li>
												<li><span class="fa fa-check"></span>Anti-Theft</li>
												<li><span class="fa fa-check"></span>Anti-Starter</li>
											</ul>
										</div>
										<div class="col-xs-4">
											<ul>
												<li><span class="fa fa-check"></span>Dual Airbag</li>
												<li><span class="fa fa-check"></span>Intermittent Wipers</li>
												<li><span class="fa fa-check"></span>Keyless Entry</li>
												<li><span class="fa fa-check"></span>Power Mirrors</li>
												<li><span class="fa fa-check"></span>Power Seat</li>
												<li><span class="fa fa-check"></span>Power Steering</li>
											</ul>
										</div>
										<div class="col-xs-4">
											<ul>
												<li><span class="fa fa-check"></span>CD Player</li>
												<li><span class="fa fa-check"></span>Driver Side Airbag</li>
												<li><span class="fa fa-check"></span>Power Windows</li>
												<li><span class="fa fa-check"></span>Remote Start</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12">
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-desc wow zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">Description</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Make</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo strtoupper($data['manufacturer']) ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Model</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo strtoupper($data['model']) ?></p>
										</div>
									</div>									
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Body Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo strtoupper($data['vehical_type']) ?></p>
										</div>
									</div>																		
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Transmission</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo strtoupper($data['transmission']) ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Exterior Color</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo strtoupper($data['exterior_color']) ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Interior color</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo strtoupper($data['interior_color']) ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Passangers/Doors</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo strtoupper($data['passengers_doors']) ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Fuel Type</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo strtoupper($data['fuel_type']) ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Fuel Economy </h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo strtoupper($data['millage']) ?> KMPL</p>
										</div>
									</div>									
								</div>
								<div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">INQUIRE ABOUT THIS VEHICLE</h2>
									<div class="b-detail__main-aside-about-call">
										<span class="fa fa-phone"></span>
										<div>0000-000-000</div>
										<p>Call the seller and they would help you.</p>
									</div>
									<div class="b-detail__main-aside-about-seller">
										<p>Seller Info: <span><?php echo strtoupper($data['manufacturer'])?></span></p>
									</div>
									<div class="b-detail__main-aside-about-form">
										<div class="b-detail__main-aside-about-form-links">
											<a href="#" class="j-tab m-active s-lineDownCenter" data-to='#form1'>GENERAL INQUIRY</a>
											<a href="#" class="j-tab" data-to='#form2'>SCHEDULE TEST DRIVE</a>
										</div>
										<form id="form1" action="" method="post">
											<input type="text" placeholder="YOUR NAME*" value="" name="name" required />
											<input type="email" placeholder="EMAIL ADDRESS*" value="" name="email" required/>
											<input type="text" placeholder="Mobile No*" value="" name="name" required/>
											<textarea name="text" placeholder="Your Message*" required></textarea>											
											<button type="button" id="gebut" class="btn m-btn">SEND MESSAGE<span class="fa fa-angle-right"></span></button>
										</form>
										<form id="form2" action="" method="post">
											<input type="text" placeholder="YOUR NAME" value="" name="name" />
											<textarea name="text" placeholder="message"></textarea>											
											<button type="button" id="stdbut" class="btn m-btn">SEND MESSAGE<span class="fa fa-angle-right"></span></button>
										</form>
									</div>
								</div>
								<div class="b-detail__main-aside-payment wow zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">CAR PAYMENT CALCULATOR</h2>
									<div class="b-detail__main-aside-payment-form">
										<form action="">
											<input type="text" placeholder="LOAN AMOUNT" value="" id="lamt" required />
											<input type="text" placeholder="DOWN PAYMENT" value="" id="dpay" required />
											<div class="s-relative">
												<select id="term" class="m-select" required> 
													<option >LOAN TERM IN MONTHS</option>
													<option value="12">12</option>
													<option value="24">24</option>
													<option value="36">36</option>
													<option value="48">48</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
											<input type="text" placeholder="INTEREST RATE IN %" value="" id="interest" required />
											<button type="button" class="btn m-btn" onclick="calemi()">Calculate<span class="fa fa-angle-right"></span></button>
											<button type="button" class="btn m-btn" onclick="resetemi()">Reset<span class="fa fa-angle-right"></span></button>
										</form>
									</div>
									<div class="b-detail__main-aside-about-call">
										<span class="fa fa-calculator"></span>
										<div id="emi-cal-res"></div><p>PER MONTH</p>
										<p>Interest Payable:  <span id="emi-cal-res1"></span></p>
										<p>Total Amount Paid:  <span id="emi-cal-res2"></span></p>
									</div>
								</div>
							</aside>
						</div>
					</div>
				</div>
			</div>			
			</section>
			
			<div class="b-features">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-offset-3 col-xs-6 col-xs-offset-6">
						<ul class="b-features__items">
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Car Database</li>
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">EMI Calculator</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!--b-features-->
		
		<footer class="b-footer">
			<a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>
			<div class="container">
				<div class="row">
					<div class="col-xs-4">
						<div class="b-footer__company wow fadeInLeft" data-wow-delay="0.3s">
							<div class="b-nav__logo">
								<h3><a href="index.html">Easy<span>Cars</span></a></h3>
								<h2><a href="index.html">Project For SV.CO 2016</a></h2>
							</div>
							
						</div>
					</div>
					<div class="col-xs-8">
						<div class="b-footer__content wow fadeInRight" data-wow-delay="0.3s">
							<div class="b-footer__content-social">
								<a href="#"><span class="fa fa-facebook-square"></span></a>
								<a href="#"><span class="fa fa-twitter-square"></span></a>
								<a href="#"><span class="fa fa-google-plus-square"></span></a>
								<a href="#"><span class="fa fa-instagram"></span></a>
								<a href="#"><span class="fa fa-youtube-square"></span></a>								
							</div>
							<nav class="b-footer__content-nav">
								<ul>
									<li><a href="index.html">Home</a></li>																											
									<li><a href="about.html">About</a></li>
									<li><a href="contacts.html">Contact Us</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</footer><!--b-footer-->
				
		<!--Main-->
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.custom.js"></script>
<!-- -->
<script src="assets/js/sweetalert.min.js"></script>
<!--bxSlider-->
		<script src="assets/plugins/bxslider/jquery.bxslider.js"></script>
		<!-- jQuery UI Slider -->
		<script src="assets/plugins/slider/jquery.ui-slider.js"></script>		
		<script src="assets/js/jquery.smooth-scroll.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script src="assets/js/jquery.placeholder.min.js"></script>
		<script src="assets/js/customfunc.js"></script>
		<script src="assets/js/theme.js"></script>		
	</body>
</html>