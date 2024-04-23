<?php
include ("restaurant-card-header.php"); // Assumes this file also connects to the database

include 'db_connect.php';

// Get restaurant ID from URL
$restaurant_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch restaurant details
$query = "SELECT * FROM restaurants WHERE restaurant_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $restaurant_id);
$stmt->execute();
$result = $stmt->get_result();
$restaurant = $result->fetch_assoc();

// Fetch dishes related to the restaurant
$dish_query = "SELECT * FROM dishes WHERE restaurant_id = ?";
$dish_stmt = $conn->prepare($dish_query);
$dish_stmt->bind_param("i", $restaurant_id);
$dish_stmt->execute();
$dishes = $dish_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo htmlspecialchars($restaurant['name']); ?></title>
	<link rel="stylesheet" href="your-style.css">
</head>

<body>
	<section class="hero-section about gap" style="background-image: url(assets/img/background-1.png);">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
					<div class="about-text">
						<ul class="crumbs d-flex">
							<li><a href="index.html">Home</a></li>
							<li><a href="restaurants.php">Restaurants</a></li>
							<li class="two"><a href="#"><?php echo htmlspecialchars($restaurant['name']); ?></a></li>
						</ul>
						<div class="logo-detail">
							<img alt="logo" src="images/<?php echo htmlspecialchars($restaurant['image']); ?>">
							<h2><?php echo htmlspecialchars($restaurant['name']); ?></h2>
						</div>
						<div class="rate">
							<!-- Placeholder for rating system -->
							<span>Rate:</span>
							<div class="star">
								<!-- Static example, replace with dynamic if available -->
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star-half-stroke"></i>
							</div>
							<span>CUISINES:</span>
							<div class="cafa-button">
								<a href="#">american</a>
								<a href="#">steakhouse</a>
								<a href="#">seafood</a>
							</div>
							<span>FEATURES:</span>
							<p><?php echo htmlspecialchars($restaurant['description']); ?></p>
						</div>
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="400" data-aos-duration="500">
					<div class="about-img">
						<img alt="restaurant image" src="images/<?php echo htmlspecialchars($restaurant['image']); ?>">
						<div class="hours">
							<i class="fa-regular fa-clock"></i>
							<h4>9am – 12pm<br><span>Hours</span></h4>
						</div>
						<div class="hours two">
							<i class="fa-solid fa-utensils"></i>
							<h4>Breakfast, Lunch, Dinner<br><span>Meals</span></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- tabs -->
	<section class="tabs gap">
		<div class="container">
			<div class="tabs-img-back">
				<div class="row">
					<div class="col-lg-12">
						<div class="Provides" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
							<div class="like-meal">
								<a href="#"><i class="fa-solid fa-heart"></i>Like Meals</a>
							</div>
						</div>
					</div>
					<?php while ($dish = $dishes->fetch_assoc()): ?>
						<div class="col-lg-4 col-md-6" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
							<div class="dish">
								<img alt="food-dish" src="dishes/<?php echo htmlspecialchars($dish['image']); ?>">
								<div class="dish-foods">
									<h3><?php echo htmlspecialchars($dish['name']); ?></h3>
									<div class="dish-icon">
										<div class="cafa-button">
											<!-- Placeholder for dish tags -->
											<a href="#">Breakfast</a>
											<a href="#">Brunch</a>
										</div>
										<div class="dish-icon end">
											<i class="info fa-solid fa-circle-info"></i>
											<div class="star">
												<a href="#"><i class="fa-solid fa-heart"></i></a>
											</div>
										</div>
									</div>
									<div class="price">
										<h2>$<?php echo htmlspecialchars($dish['price']); ?></h2>
										<!-- <div class="qty-input">
											<button class="qty-count qty-count--minus" data-action="minus"
												type="button">-</button>
											<input class="product-qty" type="number" name="product-qty" min="0" value="1">
											<button class="qty-count qty-count--add" data-action="add"
												type="button">+</button>
										</div> -->
									</div>
									<button class="button-price"
										onclick="window.location.href='checkout.php?dish_id=<?php echo $dish['dish_id']; ?>'">Order
										Now<i class="fa-solid fa-bag-shopping"></i></button>
								</div>
								<div class="dish-info" style="display: none;">
									<i class="info2 fa-solid fa-xmark"></i>
									<h5><?php echo htmlspecialchars($dish['name']); ?></h5>
									<div class="cafa-button">
										<a href="#">Breakfast</a>
										<a href="#">Brunch</a>
									</div>
									<p><?php echo htmlspecialchars($dish['description']); ?></p>
									<ul class="menu-dish">
										<!-- Example dish details -->
										<li>Feature 1</li>
										<li>Feature 2</li>
										<li>Feature 3</li>
									</ul>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
		</div>
	</section>
	<?php include ("footer.php"); ?>
</body>

</html>