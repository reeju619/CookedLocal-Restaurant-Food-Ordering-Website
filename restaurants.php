<?php include ("header.php"); ?>

<section class="hero-section about gap">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
				<div class="about-text">
					<ul class="crumbs d-flex">
						<li><a href="index.php">Home</a></li>
						<li class="two"><a href="index.php"><i class="fa-solid fa-right-long"></i>Restaurants</a></li>
					</ul>
					<h2>Restaurants</h2>
					<p>With a commitment to quality and creativity, our talented chefs bring culinary delights to life,
						crafting unforgettable dishes that reflect the spirit of our community.</p>
					<div class="restaurant">
					</div>
				</div>
			</div>
			<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
				<div class="restaurants-girl-img food-photo-section">
					<img alt="man" src="assets/img/photo-11.png">
					<a href="#" class="one"><i class="fa-solid fa-burger"></i>Burgers</a>
					<a href="#" class="two"><i class="fa-solid fa-drumstick-bite"></i>Chicken</a>
					<a href="#" class="three"><i class="fa-solid fa-cheese"></i>Steaks</a>
					<a href="#" class="for"><i class="fa-solid fa-pizza-slice"></i>Fish</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- banner -->
<section class="banner" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
	<div class="container">
		<div class="banner-img" style="background-image: url(assets/img/food-4.jpg);">
			<div class="banner-logo">
				<h4>Restaurant<br>of the Month
					<span class="chevron chevron--left"></span>
				</h4>
				<div class="banner-wilmington">
					<img alt="logo" src="assets/img/logos-1.jpg">
					<h6>The Wilmington</h6>
				</div>
			</div>

			<div class="row">
				<div class="col-xl-6 col-lg-12">
					<div class="choose-lunches">

						<h2>Choose 2 lunches</h2>
						<h3>pay for one</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- best-restaurants -->
<section class="best-restaurants gap" style="background:#fcfcfc">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
				<div class="city-restaurants">
					<h2>Number 1 in Your City</h2>
					<p>Our mission is simple: to create unforgettable dining experiences that celebrate the richness
						of
						local ingredients and the diversity of global cuisine.</p>
				</div>
			</div>
			<?php while ($restaurant = $restaurants->fetch_assoc()): ?>
				<div class="col-lg-6" data-aos="flip-up" data-aos-delay="300" data-aos-duration="400">
					<div class="logos-card">
						<img alt="logo" src="images/<?php echo htmlspecialchars($restaurant['image']); ?>">
						<div class="cafa">
							<h4><a
									href="restaurant-card.php?id=<?php echo $restaurant['restaurant_id']; ?>"><?php echo htmlspecialchars($restaurant['name']); ?></a>
							</h4>
							</h4>
							<div>
								<!-- Example Static Star Rating, dynamically generate as needed -->
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<div class="cafa-button">
								<a href="#">american</a>
								<a href="#">steakhouse</a>
								<a class="end" href="#">seafood</a>
							</div>
							<p><?php echo htmlspecialchars($restaurant['description']); ?></p>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="button-gap">

		</div>
	</div>
</section>
<!-- subscribe-section -->
<section class="subscribe-section gap" style="background:#fcfcfc">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
				<div class="img-subscribe">
					<img alt="Illustration" src="assets/img/illustration-4.png">
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1" data-aos="flip-up" data-aos-delay="300" data-aos-duration="400">
				<div class="get-the-menu">
					<h2>Get the menu of your favorite restaurants every day</h2>
					<form>
						<i class="fa-regular fa-bell"></i>
						<input type="text" name="email" placeholder="Enter email address">
						<button class="button button-2">Subscribe</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include ("footer.php"); ?>