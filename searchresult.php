<?php
require ('php/classes/searchresult.class.php');
if (isset($_POST['findmycar'])) {
    $cartype = $_POST['cartype'];
	$manufacturer = $_POST['car_manufacturer'];
	$fuel_type = $_POST['fuel_type'];
	$millage = $_POST['millage'];
	$transmission = $_POST['transmission'];
	$displacement = $_POST['displacement'];
	$budget = $_POST['budget'];

    if ($obj->createQuery($cartype,$manufacturer,$fuel_type,$millage,$transmission,$displacement,$budget)){

        $data= $obj->output;
        $data2 = $obj->queryResult;
    }
}
?>
<html>
<head>
    <title>Search Result | Easy Cars</title>
    <link href="assets/css/master.css" rel="stylesheet">
</head>
<body>
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
				<h1 class=" wow zoomInLeft" data-wow-delay="0.5s">EASY CARS LISTINGS</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
					<h3>Your search results</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<div class="b-breadCumbs s-shadow">
			<div class="container wow zoomInUp" data-wow-delay="0.5s">
				<a href="index.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="" class="b-breadCumbs__page m-active">Search Results</a>
			</div>
		</div><!--b-breadCumbs-->
		
		
		<div class="b-infoBar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-xs-12">
						<div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s">							
							<a id="compareurl" href="" target="_blank" class="b-infoBar__compare-item"><span class="fa fa-compress"></span>COMPARE VEHICLES:</a>
						</div>
					</div>					
				</div>
			</div>
		</div><!--b-infoBar-->
		
		<section class="b-items s-shadow">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-sm-8 col-xs-12">
						<div class="b-items__cars">
                            <?php
                            if (count($data2) >1) {
                                $counter =1;
                                foreach ($data2 as $keys => $value1) {
                                    ?>
                                    <div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">
                                        <div class="b-items__cars-one-img">
                                            <img src="<?php $obj->getCarImages($value1['id']) ?>"/>
                                            <a data-toggle="modal" data-target="#myModal" href="#"></a>
                                            <form>
                                                <input type="checkbox" id="check<?php echo $counter?>" value="<?php echo $value1['id']; ?>"/>
                                                <label for="check<?php echo $counter?>" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                                            <?php $counter++; ?>
                                            </form>
                                        </div>
                                        <div class="b-items__cars-one-info">
                                            <header class="b-items__cars-one-info-header s-lineDownLeft">
                                                <h2><?php echo strtoupper($value1['manufacturer'] . ' ' . $value1['model']); ?></h2>
                                                <span>Rs.<?php $obj->moneyconv($value1['price']); ?></span>
                                            </header>
                                            <p>
                                                <?php $obj->descCut($value1['description']) ?>
                                            </p>
                                            <div class="b-items__cars-one-info-km">
                                                <span
                                                    class="fa fa-tachometer"></span> <?php echo $value1['fuel_type'] ?>
                                            </div>
                                            <div class="b-items__cars-one-info-details">
                                                <div class="b-featured__item-links">
                                                    <a href="javascript:void(0);"><?php echo $value1['millage'] ?>
                                                        KMPL</a>
                                                    <a href="javascript:void(0);"><?php echo strtoupper($value1['transmission']) ?></a>
                                                    <a href="javascript:void(0);"><?php echo $value1['displacement'] ?>
                                                        CC</a>
                                                    <a href="javascript:void(0);"><?php echo strtoupper($value1['exterior_color']) ?></a>
                                                </div>
                                                <a href="details.php?carid=<?php echo $value1['id']; ?>" target="_blank"
                                                   class="btn m-btn">VIEW DETAILS<span class="fa fa-angle-right"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }elseif(count($data2)<1){
                                    ?>
                                <div class="col-sm-9 col-xs-12">
                                    <div class="b-detail__head-title">
                                        <h1>NO RECORD FOUND</h1>
                                    </div>
                                    <br>
                                </div>
                            <?php
                            }else {
                                ?>
                                <div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="b-items__cars-one-img">
                                        <img src="<?php $obj->getCarImages($data2['id']) ?>"/>
                                        <a data-toggle="modal" data-target="#myModal" href="#"></a>
                                        <form>
                                         <label class="b-items__cars-one-img-check"><span class="fa fa-check" title="Add To Compare"></span>
                                             <input type="checkbox" name="check1" title="Add To Compare"/>
                                         </label>
                                        </form>
                                    </div>
                                    <div class="b-items__cars-one-info">
                                        <header class="b-items__cars-one-info-header s-lineDownLeft">
                                            <h2><?php echo strtoupper($data2['manufacturer'] . ' ' . $data2['model']); ?></h2>
                                            <span>Rs.<?php $obj->moneyconv($data2['price']); ?></span>
                                        </header>
                                        <p>
                                            <?php $obj->descCut($data2['description']) ?>
                                        </p>
                                        <div class="b-items__cars-one-info-km">
                                            <span class="fa fa-tachometer"></span> <?php echo $data2['fuel_type'] ?>
                                        </div>
                                        <div class="b-items__cars-one-info-details">
                                            <div class="b-featured__item-links">
                                                <a href="javascript:void(0);"><?php echo $data2['millage'] ?>
                                                    KMPL</a>
                                                <a href="javascript:void(0);"><?php echo strtoupper($data2['transmission']) ?></a>
                                                <a href="javascript:void(0);"><?php echo $data2['displacement'] ?>
                                                    CC</a>
                                                <a href="javascript:void(0);"><?php echo strtoupper($data2['exterior_color']) ?></a>
                                            </div>
                                            <a href="details.php?carid=<?php echo $data2['id']; ?>" target="_blank"
                                               class="btn m-btn">VIEW DETAILS<span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
						</div>
						<div class="b-items__pagination wow zoomInUp" data-wow-delay="0.5s">
							<div class="b-items__pagination-main">
								<a data-toggle="modal" data-target="#myModal" href="#" class="m-left"><span class="fa fa-angle-left"></span></a>
								<span class="m-active"><a href="#">1</a></span>
								<span><a href="#">2</a></span>
								<span><a href="#">3</a></span>
								<span><a href="#">4</a></span>
								<a href="#" class="m-right"><span class="fa fa-angle-right"></span></a>    
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-4 col-xs-12">
						<aside class="b-items__aside">
							<h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">REFINE YOUR SEARCH</h2>
							<div class="b-items__aside-main wow zoomInUp" data-wow-delay="0.5s">
								<form>
									<div class="b-items__aside-main-body">
										<div class="b-items__aside-main-body-item">
											<label>CAR TYPE</label>
											<div>
												<select name="select1" class="m-select">
													<option value="" selected="">Car Type</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<div class="b-items__aside-main-body-item">
											<label>MANUFACTURER</label>
											<div>
												<select name="select1" class="m-select">
													<option value="" selected="">Manufacturer</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<div class="b-items__aside-main-body-item">
											<label>BUDGET</label>
											<div class="slider"></div>
											<input type="hidden" name="min" value="100" class="j-min" />
											<input type="hidden" name="max" value="1000" class="j-max" />
										</div>
										<div class="b-items__aside-main-body-item">
											<label>MILLAGE</label>
											<div>
												<select name="select1" class="m-select">
													<option value="" selected="">Millage</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<div class="b-items__aside-main-body-item">
											<label>TRANSMISSION</label>
											<div>
												<select name="select1" class="m-select">
													<option value="" selected="">Transmission</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<div class="b-items__aside-main-body-item">
											<label>FUEL TYPE</label>
											<div>
												<select name="select1" class="m-select">
													<option value="" selected="">Fuel Types</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<div class="b-items__aside-main-body-item">
											<label>DISPLACEMENT</label>
											<div>
												<select name="select1" class="m-select">
													<option value="" selected="">Engine</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
									</div>
									<footer class="b-items__aside-main-footer">
										<button type="submit" class="btn m-btn">FILTER VEHICLES<span class="fa fa-angle-right"></span></button><br />
										<a href="#">RESET ALL FILTERS</a>
									</footer>
								</form>
							</div>							
						</aside>
					</div>
				</div>
			</div>
		</section><!--b-items-->
		
		
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
		</body>
		<!--Main-->
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.custom.js"></script>
		<!-- jQuery UI Slider -->
		<script src="assets/plugins/slider/jquery.ui-slider.js"></script>
		
		<script src="assets/js/jquery.smooth-scroll.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script src="assets/js/jquery.placeholder.min.js"></script>
		<script src="assets/js/theme.js"></script>
<script>

    $(document).ready(function() {
        $('#compareurl').bind('click', function(e){
            e.preventDefault();
        });
        if ($('input[type=checkbox]:checked').length == 2){
            $('#compareurl').html('COMPARE NOW : 2 CARS');
        }else if($('input[type=checkbox]:checked').length == 1){
            $('#compareurl').html('COMPARE (SELECT ONE MORE CAR) : 1 CARS');
        }else{
            $('#compareurl').html('COMPARE (SELECT CARS): 0 CARS');
        }
    });
    var $checkboxes;
    $('input[type=checkbox]').on('click', function (e) {
        if ($('input[type=checkbox]:checked').length != 2){
            $('#compareurl').bind('click', function(e){
                e.preventDefault();
            });
        }
        if ($('input[type=checkbox]:checked').length == 2){
            $('#compareurl').html('COMPARE NOW : 2 CARS');
            $('#compareurl').unbind('click');
        }else if($('input[type=checkbox]:checked').length == 1){
            $('#compareurl').html('COMPARE (SELECT ONE MORE CAR) : 1 CARS');
        }else{
            $('#compareurl').html('COMPARE (SELECT CARS) : 0 CARS');
        }

        if ($('input[type=checkbox]:checked').length <= 2){
            $checkboxes = $('input:checkbox').change(storeuser);
        }
        if ($('input[type=checkbox]:checked').length > 2) {
            $(this).prop('checked', false);
            alert("allowed only 2");
        }
    });
    function storeuser() {
        var users = $checkboxes.map(function() {
            if(this.checked) return this.value;
        }).get().join('&carid_two=');
        $("#compareurl").attr("href", "compare.php?compare.php?carid_one="+users)
    }
</script>
		</html>