<?php
require ('php/classes/compare.class.php');
if(!empty($_GET)){

    if(filter_var($_GET['carid_one'], FILTER_VALIDATE_INT) && (!empty($_GET['carid_one']))){
        $car_one = $_GET['carid_one'];
    }else{
        $car_one = 0;
    }

    if(filter_var($_GET['carid_two'], FILTER_VALIDATE_INT) && (!empty($_GET['carid_two']))){
        $car_two = $_GET['carid_two'];
    }else{
        $car_two = 0;
    }

    if ($obj->validate($car_one,$car_two)){
    if($obj->getCarsIdOne($car_one)){
        $data = $obj->getCarsIdOne_result;
    }
    if($obj->getCarsIdTwo($car_two)){
        $data2 = $obj->getCarsIdTwo_result;
    }
    }else{
        header('Location: 404.html?invalidcar');
        die();
    }
}else{
    header('Location: index.html');
    die();
}
?>
<html>
<head>
    <title>Compare | Easy Cars</title>
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
        <h1 class=" wow zoomInLeft" data-wow-delay="0.3s">Auto Listings</h1>
        <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.3s">
            <h3>Compare Favourite Cars</h3>
        </div>
    </div>
</section><!--b-pageHeader-->

<div class="b-breadCumbs s-shadow">
    <div class="container wow zoomInUp" data-wow-delay="0.3s">
        <a href="index.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a
            href="javascript(0);" class="b-breadCumbs__page m-active">Compare Vehicles</a>
    </div>
</div><!--b-breadCumbs-->

<div class="b-infoBar">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-xs-12 wow zoomInUp" data-wow-delay="0.3s">
                <h5>QUESTIONS? CALL US : <span>1800-111-000</span></h5>
            </div>
        </div>
    </div>
</div><!--b-infoBar-->

<section class="b-compare s-shadow">
    <div class="container">
        <div class="b-compare__images">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12 col-md-offset-3">
                    <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s">
                        <h3><?php echo $data['model']; ?></h3>
                        <img class="img-responsive center-block" src="<?php echo $obj->getCarImage($car_one) ?>" alt="<?php echo $data['model']?>"/>
                        <div class="b-compare__images-item-price m-right">
                            <div class="b-compare__images-item-price-vs">vs</div>
                            Rs.<?php $obj->moneyconv($data['price']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12 ">
                    <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s">
                        <h3><?php echo $data2['model'] ?></h3>
                        <img class="img-responsive center-block" src="<?php echo $obj->getCarImage($car_two)?>" alt="<?php echo $data2['model']?>"/>
                        <div class="b-compare__images-item-price m-right m-left">Rs.<?php $obj->moneyconv($data2['price']); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-compare__block wow zoomInUp" data-wow-delay="0.3s">
            <div class="b-compare__block-title s-whiteShadow m-active">
                <h3 class="s-titleDet">BASIC INFO</h3>
                <a class="j-more" href="#"><span class="fa fa-angle-left"></span></a>
            </div>
            <div class="b-compare__block-inside j-inside m-active">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            TOP SPEED
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data['top_speed'] ?> KMPH
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data2['top_speed'] ?> KMPH
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Acceleration (0-100 kmph)
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data['acceleration'] ?> Seconds
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data2['acceleration'] ?> Seconds
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Engine Displacement
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data['eng_displace'] ?> CC
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data2['eng_displace'] ?> CC
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Engine Description
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data['eng_discrip'] ?> Engine
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data2['eng_discrip'] ?> Engine
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Maximum Power
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data['max_power'] ?>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data2['max_power'] ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Maximum Torque
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data['max_torque'] ?>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data2['max_torque'] ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Gear Box
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data['gear_box'] ?> Speed
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data2['gear_box'] ?> Speed
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Gross Weight
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data['gross wieght'] ?> KG
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value">
                            <?php echo $data2['gross wieght'] ?> KG
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="b-compare__block wow zoomInUp" data-wow-delay="0.3s">
            <div class="b-compare__block-title s-whiteShadow m-active">
                <h3 class="s-titleDet">OTHER OPTIONS</h3>
                <a class="j-more" href="#"><span class="fa fa-angle-left"></span></a>
            </div>
            <div class="b-compare__block-inside j-inside m-active">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-title">
                            Fetures
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value s-lineDownCenter">
                            <ul>
                                <?php
                                $features_array = $obj->getFeatures($data['extra_features']);
                                foreach ($features_array as $key => $value){
                                    echo '<li><span class="fa fa-check"></span>'.$value.'</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="b-compare__block-inside-value s-lineDownCenter">
                            <ul>
                                <?php
                                $features_array = $obj->getFeatures($data2['extra_features']);
                                foreach ($features_array as $key => $value){
                                    echo '<li><span class="fa fa-check"></span>'.$value.'</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-compare__links wow zoomInUp" data-wow-delay="0.3s">
            <div class="row">
                <div class="col-sm-3 col-xs-12 col-sm-offset-3">
                    <a href="details.php?carid=<?php echo $car_one;?>" target="_blank" class="btn m-btn">VIEW LISTING<span class="fa fa-angle-right"></span></a>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <a href="details.php?carid=<?php echo $car_two; ?>" target="_blank" class="btn m-btn">VIEW LISTING<span class="fa fa-angle-right"></span></a>
                </div>
            </div>
        </div>
    </div>
</section><!--b-compare-->

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
<script src="assets/js/jquery.placeholder.min.js"></script>
<script src="assets/js/theme.js"></script>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/55f6df43c80442b36814b1b5/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>