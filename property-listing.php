<?php include('components/head.php'); ?>
<body id='top'>
<?php include('components/header.php'); ?>
<!-- /Header -->
<div class="slider-section">
<?php include('components/nav.php'); ?>
	<!-- head-Section -->
	<div class="page-title-section">
		<div class="container">
			<div class="pull-left page-title">
				<a href="#">
				<h2>property listing</h2>
				</a>
			</div>
			<div class="pull-right breadcrumb">
				<a href="#">home</a><span class="fa fa-arrow-circle-right sep"></span><a href="#">property listing</a>
			</div>
		</div>
	</div>
</div>
<!-- Search-Section -->
<div class="search-section">
	<div class="container">
		<form>
			<div class="select-wrapper select-smaill" id='select-rent'>
				<p>
					Rent or Sale
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Rent</option>
					<option value="chips-and-salsa">Sale</option>
				</select>
			</div>
			<div class="select-wrapper select-big" id='select-property'>
				<p>
					Property type
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-big">
				<p>
					locations
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-small">
				<p>
					Beds
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-small">
				<p>
					Baths
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-medium">
				<p>
					Sq ft
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-medium">
				<p>
					min price
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-medium">
				<p>
					Max price
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<input type="submit" value="search" class='yellow-btn'>
		</form>
	</div>
</div>
<!-- content-Section -->
<div class="content-section">
	<div class="container">
		<div class="row listings-items-wrapper">
			<div class="col-md-4 listing-single-item">
				<div class="item-inner">
					<div class="image-wrapper">
						<img src="img/listings/02_img-1.png" alt="gallery">
						<a href="#" class='fa fa-home property-type-icon'></a>
					</div>
					<div class="desc-box">
						<h4><a href="#">2211 Summer Ridge Dr</a></h4>
						<ul class="slide-item-features item-features">
							<li><span class="fa fa-arrows-alt"></span>5000 Sq Ft</li>
							<li><span class="fa fa-male"></span>2 bathrooms</li>
							<li><span class="fa fa-inbox"></span>3 bedrooms</li>
						</ul>
						<div class="buttons-wrapper">
							<a href="#" class="yellow-btn">$370,000</a>
							<a href="#" class="gray-btn"><span class="fa fa-file-text-o"></span>Details</a>
						</div>
						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
			<!-- /Single-item -->
			<div class="col-md-4 listing-single-item">
				<div class="item-inner">
					<div class="image-wrapper">
						<img src="img/listings/03_img-2.png" alt="gallery">
						<a href="#" class='fa fa-building-o property-type-icon'></a>
						<a href="#" class='featured'><i class='fa fa-star'></i>featured</a>
					</div>
					<div class="desc-box">
						<h4><a href="#">6571 Mill Creek Cir</a></h4>
						<ul class="slide-item-features item-features">
							<li><span class="fa fa-arrows-alt"></span>5000 Sq Ft</li>
							<li><span class="fa fa-male"></span>2 bathrooms</li>
							<li><span class="fa fa-inbox"></span>3 bedrooms</li>
						</ul>
						<div class="buttons-wrapper">
							<a href="#" class="yellow-btn">$370,000</a>
							<a href="#" class="gray-btn"><span class="fa fa-file-text-o"></span>Details</a>
						</div>
						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
			<!-- /Single-item -->
			<div class="col-md-4 listing-single-item">
				<div class="item-inner">
					<div class="image-wrapper">
						<img src="img/listings/04_img-3.png" alt="gallery">
						<a href="#" class='fa fa-home property-type-icon'></a>
					</div>
					<div class="desc-box">
						<h4><a href="#">1141 14Th Street South</a></h4>
						<ul class="slide-item-features item-features">
							<li><span class="fa fa-arrows-alt"></span>5000 Sq Ft</li>
							<li><span class="fa fa-male"></span>2 bathrooms</li>
							<li><span class="fa fa-inbox"></span>3 bedrooms</li>
						</ul>
						<div class="buttons-wrapper">
							<a href="#" class="yellow-btn">$370,000</a>
							<a href="#" class="gray-btn"><span class="fa fa-file-text-o"></span>Details</a>
						</div>
						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
			<!-- /Single-item -->
			<div class="col-md-4 listing-single-item">
				<div class="item-inner">
					<div class="image-wrapper">
						<img src="img/listings/05_img-4.png" alt="gallery">
						<a href="#" class='fa fa-building-o property-type-icon'></a>
						<a href="#" class='featured'><i class='fa fa-star'></i>featured</a>
					</div>
					<div class="desc-box">
						<h4><a href="#">2627 Garry St</a></h4>
						<ul class="slide-item-features item-features">
							<li><span class="fa fa-arrows-alt"></span>5000 Sq Ft</li>
							<li><span class="fa fa-male"></span>2 bathrooms</li>
							<li><span class="fa fa-inbox"></span>3 bedrooms</li>
						</ul>
						<div class="buttons-wrapper">
							<a href="#" class="yellow-btn">$370,000</a>
							<a href="#" class="gray-btn"><span class="fa fa-file-text-o"></span>Details</a>
						</div>
						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
			<!-- /Single-item -->
			<div class="col-md-4 listing-single-item">
				<div class="item-inner">
					<div class="image-wrapper">
						<img src="img/listings/06_img-5.png" alt="gallery">
						<a href="#" class='fa fa-home property-type-icon'></a>
					</div>
					<div class="desc-box">
						<h4><a href="#">2222 N 2Nd Ave Unit: 311</a></h4>
						<ul class="slide-item-features item-features">
							<li><span class="fa fa-arrows-alt"></span>5000 Sq Ft</li>
							<li><span class="fa fa-male"></span>2 bathrooms</li>
							<li><span class="fa fa-inbox"></span>3 bedrooms</li>
						</ul>
						<div class="buttons-wrapper">
							<a href="#" class="yellow-btn">$370,000</a>
							<a href="#" class="gray-btn"><span class="fa fa-file-text-o"></span>Details</a>
						</div>
						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
			<!-- /Single-item -->
			<div class="col-md-4 listing-single-item">
				<div class="item-inner">
					<div class="image-wrapper">
						<img src="img/listings/07_img-6.png" alt="gallery">
						<a href="#" class='fa fa-home property-type-icon'></a>
						<a href="#" class='featured'><i class='fa fa-star'></i>featured</a>
					</div>
					<div class="desc-box">
						<h4><a href="#">1436 18Th Street South</a></h4>
						<ul class="slide-item-features item-features">
							<li><span class="fa fa-arrows-alt"></span>5000 Sq Ft</li>
							<li><span class="fa fa-male"></span>2 bathrooms</li>
							<li><span class="fa fa-inbox"></span>3 bedrooms</li>
						</ul>
						<div class="buttons-wrapper">
							<a href="#" class="yellow-btn">$370,000</a>
							<a href="#" class="gray-btn"><span class="fa fa-file-text-o"></span>Details</a>
						</div>
						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
			<!-- /Single-item -->
			<div class="col-md-4 listing-single-item">
				<div class="item-inner">
					<div class="image-wrapper">
						<img src="img/listings/17_img-7.png" alt="gallery">
						<a href="#" class='fa fa-building-o property-type-icon'></a>
					</div>
					<div class="desc-box">
						<h4><a href="#">2627 Garry St</a></h4>
						<ul class="slide-item-features item-features">
							<li><span class="fa fa-arrows-alt"></span>5000 Sq Ft</li>
							<li><span class="fa fa-male"></span>2 bathrooms</li>
							<li><span class="fa fa-inbox"></span>3 bedrooms</li>
						</ul>
						<div class="buttons-wrapper">
							<a href="#" class="yellow-btn">$370,000</a>
							<a href="#" class="gray-btn"><span class="fa fa-file-text-o"></span>Details</a>
						</div>
						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
			<!-- /Single-item -->
			<div class="col-md-4 listing-single-item">
				<div class="item-inner">
					<div class="image-wrapper">
						<img src="img/listings/18_img-8.png" alt="gallery">
						<a href="#" class='fa fa-home property-type-icon'></a>
						<a href="#" class='featured'><i class='fa fa-star'></i>featured</a>
					</div>
					<div class="desc-box">
						<h4><a href="#">2222 N 2Nd Ave Unit: 311</a></h4>
						<ul class="slide-item-features item-features">
							<li><span class="fa fa-arrows-alt"></span>5000 Sq Ft</li>
							<li><span class="fa fa-male"></span>2 bathrooms</li>
							<li><span class="fa fa-inbox"></span>3 bedrooms</li>
						</ul>
						<div class="buttons-wrapper">
							<a href="#" class="yellow-btn">$370,000</a>
							<a href="#" class="gray-btn"><span class="fa fa-file-text-o"></span>Details</a>
						</div>
						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
			<!-- /Single-item -->
			<div class="col-md-4 listing-single-item">
				<div class="item-inner">
					<div class="image-wrapper">
						<img src="img/listings/19_img-9.png" alt="gallery">
						<a href="#" class='fa fa-home property-type-icon'></a>
					</div>
					<div class="desc-box">
						<h4><a href="#">1436 18Th Street South</a></h4>
						<ul class="slide-item-features item-features">
							<li><span class="fa fa-arrows-alt"></span>5000 Sq Ft</li>
							<li><span class="fa fa-male"></span>2 bathrooms</li>
							<li><span class="fa fa-inbox"></span>3 bedrooms</li>
						</ul>
						<div class="buttons-wrapper">
							<a href="#" class="yellow-btn">$370,000</a>
							<a href="#" class="gray-btn"><span class="fa fa-file-text-o"></span>Details</a>
						</div>
						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
			<!-- /Single-item -->
		</div>
		<div class="pagination-wrapper">
			<ul class="pagination">
				<li><a href="#">&laquo;</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">&raquo;</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- footer-section -->
<?php include('components/footer.php'); ?>
</body>
</html>