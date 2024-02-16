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
				<h2>Mobile Friendly Comments Dashboard - now launched!</h2>
				</a>
			</div>
			<div class="pull-right breadcrumb">
				<a href="#">home</a><span class="fa fa-arrow-circle-right sep"></span><a href="#">our blog</a>
			</div>
		</div>
	</div>
</div>
<!-- Search-Section -->
<?php include('components/search.php') ?>
<!-- content-Section -->
<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 blog-content">
				<div class="blog-post">
					<div class="meta-data">
						<div class="meta-data-item">
							<i class="fa fa-calendar-o"></i>
							<a href="#">30 march</a>
							<div class="meta-divider">
							</div>
						</div>
						<div class="meta-data-item">
							<i class="fa fa-user"></i>
							<a href="#">Admin</a>
							<div class="meta-divider">
							</div>
						</div>
						<div class="meta-data-item">
							<i class="fa fa-comments"></i>
							<a href="#">2 comments</a>
							<div class="meta-divider">
							</div>
						</div>
						<div class="meta-data-item">
							<i class="fa fa-tags"></i>
							<a href="#">envato</a>
							<div class="meta-divider">
							</div>
						</div>
					</div>
					<div class="post-content">
						<div class="featured-image">
							<img src="img/blog/21_blog_1.png" alt="blog">
						</div>
						<h2><a href="#">Marketplaces December AEDT</a></h2>
						<p class='first-paragraph'>
							</p>
						<p>
							</p>
					</div>
				</div>
				<div class="comments-section">
					<h4 class="box-title">8 Comments</h4>
					<ul class="media-list">
						<li class="media">
						<a class="pull-left" href="#">
						<img class="media-object" alt="avatar" src="img/single/31_user-avatar.png">
						</a>
						<div class="media-body">
							<h4 class="media-heading">ShaneFreer <span>/ 58 minutes ago</span></h4>
							<p>
								great post!
							</p>
							<!-- Nested media object -->
							<div class="media">
								<div class="connectors">
								</div>
								<a class="pull-left" href="#">
								<img class="media-object" alt="avatar" src="img/single/37_user-avatar.png">
								</a>
								<div class="media-body">
									<h4 class="media-heading">
									<h4 class="media-heading">Collis Ta’eed <span>/ 42 minutes ago</span></h4>
									<p>
										yeah i really like it too, very useful!
									</p>
									<!-- Nested media object -->
									<div class="media">
										<div class="connectors">
										</div>
										<a class="pull-left" href="#">
										<img class="media-object" alt="avatar" src="img/single/35_user-avatar.png">
										</a>
										<div class="media-body">
											<h4 class="media-heading">
											<h4 class="media-heading">jremick <span>/ 22 minutes ago</span></h4>
											<p>
												i found this post very useful too, the comment form works just perfect, keep it up guys :)
											</p>
											<div class="media">
												<div class="connectors">
												</div>
												<a class="pull-left" href="#">
												<img class="media-object" alt="avatar" src="img/single/36_user-avatar.png">
												</a>
												<div class="media-body">
													<h4 class="media-heading">
													<h4 class="media-heading">joshjanssen <span>/ 22 minutes ago</span></h4>
													<p>
														yep, especially when it comes to comment testing
													</p>
												</div>
											</div>
										</div>
									</div>
									<div class="media">
										<div class="connectors">
										</div>
										<a class="pull-left" href="#">
										<img class="media-object" alt="avatar" src="img/single/34_user-avatar.png">
										</a>
										<div class="media-body">
											<h4 class="media-heading">stewboon <span>/ 22 minutes ago</span></h4>
											<p>
												nice job!
											</p>
										</div>
									</div>
								</div>
								<div class="media">
									<div class="connectors">
									</div>
									<a class="pull-left" href="#">
									<img class="media-object" alt="avatar" src="img/single/33_user-avatar.png">
									</a>
									<div class="media-body">
										<h4 class="media-heading">bensmithett <span>/ 42 minutes ago</span></h4>
										<p>
											couldn’t be better :D
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="media">
							<a class="pull-left" href="#">
							<img class="media-object" alt="avatar" src="img/single/32_user-avatar.png">
							</a>
							<div class="media-body">
								<h4 class="media-heading">justinfrench <span>/ 48 minutes ago</span></h4>
								<p>
									looks very promising
								</p>
							</div>
						</div>
						</li>
					</ul>
				</div>
				<div class="contact-form-wrapper comment-form-wrapper">
					<div class="inner-wrapper">
						<h4 class="box-title">Leave a comment</h4>
						<form class='contact-form comment-form'>
							<div class="contact-form-left">
								<span><i class='fa fa-user'></i></span><input type="text" name='name-comment' placeholder='Name'>
								<span><i class='fa fa-envelope-o'></i></span><input type="text" name='email-comment' placeholder='e-mail'>
								<span><i class='fa fa-link'></i></span><input type="text" name='website-comment' placeholder='website'>
							</div>
							<div class="contact-form-right">
								<textarea id="message" name='message-comment' placeholder='Message'></textarea>
								<input type="submit" value='send message'>
							</div>
						</form>
						<div class="clearfix">
						</div>
					</div>
				</div>
				<div class="clearfix">
				</div>
			</div>
			<div class="col-md-4 blog-sidebar">
				<div class="sidebar-widget search-widget">
					<h4 class="widget-title">Search</h4>
					<form class="search-box">
						<input type="text" placeholder='Search here...'>
						<button type='button'><i class='fa fa-search'></i></button>
					</form>
				</div>
				<div class="sidebar-widget tabbed-content">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#popular" data-toggle="tab">popular</a></li>
						<li><a href="#recent" data-toggle="tab">recent</a></li>
						<li><a href="#comments" data-toggle="tab">comments</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade in active" id="popular">
							<ul class="tab-content-wrapper">
								<li class="tab-content-item">
								<div class="pull-left thumb">
									<img src="img/blog/25_blog-thumb_1.png" alt="thumbnail">
								</div>
								<h5><a href="#">Envato’s Most Wanted: Courses & Learning Themes - $7,000</a></h5>
								</li>
								<li class="tab-content-item">
								<div class="pull-left thumb">
									<img src="img/blog/26_blog-thumb_2.png" alt="thumbnail">
								</div>
								<h5><a href="#">Envato’s Most Wanted: Courses & Learning Themes - $7,000</a></h5>
								</li>
								<li class="tab-content-item">
								<div class="pull-left thumb">
									<img src="img/blog/27_blog-thumb_3.png" alt="thumbnail">
								</div>
								<h5><a href="#">Envato’s Most Wanted: Courses & Learning Themes - $7,000</a></h5>
								</li>
							</ul>
						</div>
						<div class="tab-pane fade" id="recent">
							<ul class="tab-content-wrapper">
								<li class="tab-content-item">
								<div class="pull-left thumb">
									<img src="img/blog/25_blog-thumb_1.png" alt="thumbnail">
								</div>
								<h5><a href="#">Envato’s Most Wanted: Courses & Learning Themes - $7,000</a></h5>
								</li>
								<li class="tab-content-item">
								<div class="pull-left thumb">
									<img src="img/blog/26_blog-thumb_2.png" alt="thumbnail">
								</div>
								<h5><a href="#">Envato’s Most Wanted: Courses & Learning Themes - $7,000</a></h5>
								</li>
								<li class="tab-content-item">
								<div class="pull-left thumb">
									<img src="img/blog/27_blog-thumb_3.png" alt="thumbnail">
								</div>
								<h5><a href="#">Envato’s Most Wanted: Courses & Learning Themes - $7,000</a></h5>
								</li>
							</ul>
						</div>
						<div class="tab-pane fade" id="comments">
							<ul class="tab-content-wrapper">
								<li class="tab-content-item">
								<h5><a href="#">consectetur adipisicing elit. Dolor, inventore</a></h5>
								</li>
								<li class="tab-content-item">
								<h5><a href="#">nemo pariatur est laborum. Quidem, dolorem atque in ut</a></h5>
								</li>
								<li class="tab-content-item">
								<h5><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, inventore</a></h5>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sidebar-widget tags">
					<h4 class="widget-title">tags</h4>
					<ul class="tags-wrapper">

						<li class="single-tag"><a href="#">business</a></li>
					</ul>
				</div>
				<div class="sidebar-widget text-widget">
					<h4 class="widget-title">Text Widget</h4>
					<p class='first-paragraph'>
						</p>
					<p>
						</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer-section -->
<?php include('components/footer.php'); ?>
</body>
</html>