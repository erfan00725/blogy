<?php 

require_once __DIR__."/../founctions.php";

sessionStart();

?>


<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="/index.php" class="logo m-0 float-start">Blogy<span class="text-primary">.</span></a>
						</div>
						<div class="col-8 text-center">
							<form action="#" class="search-form d-inline-block d-lg-none">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>

							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="/index.php">Home</a></li>
								<li class="has-children">
									<a href="category.php">Pages</a>
									<ul class="dropdown">
										<li><a href="/search-result.php">Search Result</a></li>
										<li><a href="/blog.php">Blog</a></li>
										<li><a href="/single.php">Blog Single</a></li>
										<li><a href="/category.php">Category</a></li>
										<li><a href="/about.php">About</a></li>
										<li><a href="/contact.php">Contact Us</a></li>
										<li><a href="#">Menu One</a></li>
										<li><a href="#">Menu Two</a></li>
										<li class="has-children">
											<a href="#">Dropdown</a>
											<ul class="dropdown">
												<li><a href="#">Sub Menu One</a></li>
												<li><a href="#">Sub Menu Two</a></li>
												<li><a href="#">Sub Menu Three</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li><a href="/category.php">Culture</a></li>
								<li><a href="/category.php">Business</a></li>
								<li><a href="/category.php">Politics</a></li>

								<?php if(isset($_SESSION['role'])) : ?>

									<li>
										<?php if($_SESSION['role'] === 'admin') :?>
										<a href="/panel/adminPanel.php">admin panel</a>
										<?php elseif($_SESSION['role'] === 'writer') :?>
										<a href="/panel/writerPanel.php">writer panel</a>
										<?php endif ; ?>
									</li>
								
								<?php endif ?>

								<?php if(!isset($_SESSION['id'])) : ?>
								<li><a href="/login.php">login</a></li>
								<li><a href="/register.php">register</a></li>
								<?php else : ?>
								<li><a href="/logout.php">logout</a></li>
								<?php endif ?>

							</ul>
						</div>
						<div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
							<form action="#" class="search-form d-none d-lg-inline-block">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>