<?php include ("header.php"); ?>
<!-- hero-section -->
<section class="hero-section gap" style="background-image: url(assets/img/background-1.png);">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
				<div class="restaurant">
					<h1>The Best restaurants
						in your home</h1>
					<p>Indulge in a culinary journey like no other at CookedLocal, where passion meets flavor in every
						dish.</p>
					<div class="nice-select-one">

						<a href="restaurants.php" class="button button-2">Order Now</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
				<div class="img-restaurant">
					<img alt="man" src="assets/img/photo-1.png">
					<div class="wilmington">
						<img alt="img" src="assets/img/photo-2.jpg">
						<div>
							<p>Restaurant of the Month</p>
							<h6>The Wilmington</h6>
							<div>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star-half-stroke"></i>
							</div>
						</div>
					</div>
					<div class="wilmington location-restaurant">
						<i class="fa-solid fa-location-dot"></i>
						<div>
							<h6>12 Restaurant</h6>
							<p>In Your city</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- works-section -->
<section class="works-section gap no-top">
	<div class="container">
		<div class="hading" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
			<h2>How it works</h2>
			<p> Discover a fusion of local ingredients and global inspiration, crafted with care and served with a
				smile.</p>
		</div>
		<div class="row ">
			<div class="col-lg-4 col-md-6 col-sm-12" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
				<div class="work-card">
					<img alt="img" src="assets/img/illustration-1.png">
					<h4><span>01</span> Select Restaurant</h4>
					<p> Whether you're craving comfort classics or daring new flavors, our menu has something to satisfy
						every palate. </p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12" data-aos="flip-up" data-aos-delay="300" data-aos-duration="400">
				<div class="work-card">
					<img alt="img" src="assets/img/illustration-2.png">
					<h4><span>02</span> Select menu</h4>
					<p>Indulge in a culinary journey like no other at CookedLocal, where passion meets flavor in every
						dish.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12" data-aos="flip-up" data-aos-delay="400" data-aos-duration="500">
				<div class="work-card">
					<img alt="img" src="assets/img/illustration-3.png">
					<h4><span>03</span> Wait for delivery</h4>
					<p>Join us and experience the magic of CookedLocal today!</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="best-restaurants gap" style="background:#fcfcfc">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
				<div class="city-restaurants">
					<h2>Explore Us in Your City</h2>
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
							<h4><a href="restaurant-card.html"><?php echo htmlspecialchars($restaurant['name']); ?></a>
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
			<a href="restaurants.php" class="button button-2 non">See All<i class="fa-solid fa-arrow-right"></i></a>
		</div>
	</div>
</section>

<!-- your-favorite-food -->
<section class="your-favorite-food gap" style="background-image: url(assets/img/background-1.png);">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
				<div class="food-photo-section">
					<img alt="img" src="assets/img/photo-3.png">
					<a href="#" class="one"><i class="fa-solid fa-burger"></i>Burgers</a>
					<a href="#" class="two"><i class="fa-solid fa-cheese"></i>Steaks</a>
					<a href="#" class="three"><i class="fa-solid fa-pizza-slice"></i>Pizza</a>
				</div>
			</div>
			<div class="col-lg-6 offset-lg-1" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
				<div class="food-content-section">
					<h2>Food from your favorite restaurants
						to your table</h2>
					<p>From farm to table, we source the finest seasonal produce and artisanal ingredients,
						supporting
						local farmers and producers in our community. </p>
					<a href="#" class="button button-2">Order Now</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- counters-section -->
<section class="counters-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-3 col-md-6 col-sm-12" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
				<div>
					<h2>Service shows good taste.</h2>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12" data-aos="flip-up" data-aos-delay="300" data-aos-duration="400">
				<div class="count-time">
					<h2 class="timer count-title count-number" data-to="976" data-speed="2000">976</h2>
					<p>Satisfied<br>
						Customer</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12" data-aos="flip-up" data-aos-delay="400" data-aos-duration="500">
				<div class="count-time">
					<h2 class="timer count-title count-number" data-to="12" data-speed="2000">12</h2>
					<p>Best<br>
						Restaurants</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12" data-aos="flip-up" data-aos-delay="500" data-aos-duration="600">
				<div class="count-time sp">
					<h2 class="timer count-title count-number" data-to="1" data-speed="2000">1</h2>
					<span>k+</span>
					<p>Food<br>
						Delivered</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- reviews-sections -->
<section class="reviews-sections gap">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-6 col-lg-12" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
				<div class="reviews-content">
					<h2>What customers say about us</h2>
					<div class="custome owl-carousel owl-theme">
						<div class="item">
							<h4>"CookedLocal is my go-to spot for delicious meals made with fresh, local
								ingredients.
								Every time I dine here, I'm blown away by the creativity and attention to detail in
								each
								dish. The atmosphere is cozy and inviting, and the staff are always friendly and
								attentive. Highly recommend!".</h4>
							<div class="thomas">
								<img alt="girl" src="assets/img/photo-5.jpg">

								<div>
									<h6>Thomas Kettel</h6>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
								</div>
							</div>
						</div>
						<div class="item">
							<h4>"I recently celebrated my anniversary at CookedLocal, and it was an unforgettable
								experience. From the moment we walked in, we were greeted with warmth and
								hospitality.
								The food was absolutely exquisite, bursting with flavor and beautifully presented.
								It
								was the perfect setting for a romantic evening, and we can't wait to return!".</h4>
							<div class="thomas">
								<img alt="girl" src="assets/img/photo-5.jpg">

								<div>
									<h6>Thomas Adamson</h6>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
								</div>
							</div>
						</div>
						<div class="item">
							<h4>"As a food enthusiast, I'm always on the lookout for new dining experiences, and
								CookedLocal did not disappoint. The menu is a delightful mix of familiar favorites
								and
								innovative creations, all made with the freshest ingredients. ".</h4>
							<div class="thomas">
								<img alt="girl" src="assets/img/photo-5.jpg">

								<div>
									<h6>Thomas Berret</h6>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
									<i class="fa-solid fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-12" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
				<div class="reviews-img">
					<img alt="photo" src="assets/img/photo-4.png">
					<i class="fa-regular fa-thumbs-up"></i>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- join-partnership -->
<section class="join-partnership gap" style="background-color: #363636;">
	<div class="container">
		<h2>Want to Join Partnership?</h2>
		<div class="row">
			<div class="col-lg-6" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
				<div class="join-img">
					<img alt="img" src="assets/img/photo-6.jpg">
					<div class="Join-courier">
						<h3>Join Courier</h3>
						<a href="#" class="button button-2">Comming Soon <i class="fa-solid fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-6" data-aos="flip-up" data-aos-delay="300" data-aos-duration="400">
				<div class="join-img">
					<img alt="img" src="assets/img/photo-7.jpg">
					<div class="Join-courier">
						<h3>Join Merchant</h3>
						<a href="#" class="button button-2">Comming Soon <i class="fa-solid fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- news-section -->
<section class="news-section gap">
	<div class="container">
		<h2>Latest news and events</h2>
		<div class="row">
			<div class="col-xl-6 col-lg-12" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
				<div class="news-posts-one">
					<img alt="man" src="assets/img/photo-8.jpg">
					<div class="quickeat">
						<a href="#">news</a>
						<a href="#">CookedLocalt</a>
					</div>
					<h3>We Have Received An Award For The Quality Of Our Work</h3>
					<p>Each dish on our menu is thoughtfully crafted to showcase the natural flavors and unique
						characteristics of these ingredients, resulting in a dining experience that is both
						authentic
						and inspired.</p>
					<a href="#">Read More<i class="fa-solid fa-arrow-right"></i></a>
					<ul class="data">
						<li>
							<h6><i class="fa-solid fa-user"></i>by CookedLocal</h6>
						</li>
						<li>
							<h6><i class="fa-regular fa-calendar-days"></i>01.Jan. 2022</h6>
						</li>
						<li>
							<h6><i class="fa-solid fa-eye"></i>132</h6>
						</li>
					</ul>

				</div>
			</div>
			<div class="col-xl-6 col-lg-12" data-aos="flip-up" data-aos-delay="300" data-aos-duration="400">
				<div class="news-post-two">
					<img alt="food-img" src="assets/img/food-2.jpg">
					<div class="news-post-two-data">
						<div class="quickeat">
							<a href="#">restaurants</a>
							<a href="#">cooking</a>
						</div>
						<h6><a href="single-blog.php">With CookedLocal you can order food for
								the whole day</a></h6>
						<p> Whether you're joining us for a leisurely brunch with friends, a romantic dinner for
							two, or
							a special celebration with family</p>
						<ul class="data">
							<li>
								<h6><i class="fa-solid fa-user"></i>by CookedLocal</h6>
							</li>
							<li>
								<h6><i class="fa-regular fa-calendar-days"></i>01.Jan. 2022</h6>
							</li>
							<li>
								<h6><i class="fa-solid fa-eye"></i>132</h6>
							</li>
						</ul>
					</div>
				</div>
				<div class="news-post-two">
					<img alt="food-img" src="assets/img/food-3.jpg">
					<div class="news-post-two-data">
						<div class="quickeat">
							<a href="#">restaurants</a>
							<a href="#">cooking</a>
						</div>
						<h6><a href="single-blog.php">127+ Couriers On Our Team!</a></h6>
						<p>Urna condimentum mattis pellentesque id nibh tortor id aliquet. Tellus at urna
							condimentum
							mattis...</p>
						<ul class="data">
							<li>
								<h6><i class="fa-solid fa-user"></i>by CookedLocal</h6>
							</li>
							<li>
								<h6><i class="fa-regular fa-calendar-days"></i>01.Jan. 2022</h6>
							</li>
							<li>
								<h6><i class="fa-solid fa-eye"></i>132</h6>
							</li>
						</ul>
					</div>
				</div>
				<div class="news-post-two end">
					<img alt="food-img" src="assets/img/food-1.jpg">
					<div class="news-post-two-data">
						<div class="quickeat">
							<a href="#">restaurants</a>
							<a href="#">cooking</a>
						</div>
						<h6><a href="single-blog.php">Why You Should Optimize Your
								Menu for Delivery</a></h6>
						<p>Enim lobortis scelerisque fermentum dui. Sit amet cursus sit amet dictum sit amet. Rutrum
							tellus...</p>
						<ul class="data">
							<li>
								<h6><i class="fa-solid fa-user"></i>by CookedLocalt</h6>
							</li>
							<li>
								<h6><i class="fa-regular fa-calendar-days"></i>01.Jan. 2022</h6>
							</li>
							<li>
								<h6><i class="fa-solid fa-eye"></i>132</h6>
							</li>
						</ul>
					</div>
				</div>
			</div>
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