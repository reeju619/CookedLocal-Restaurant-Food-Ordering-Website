<?php include ("checkout-header.php"); ?>
<?php
include 'db_connect.php'; // Ensure this points to your database connection script

$dish_id = isset($_GET['dish_id']) ? intval($_GET['dish_id']) : 0;

// Fetch dish details
$query = "SELECT * FROM dishes WHERE dish_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $dish_id);
$stmt->execute();
$result = $stmt->get_result();
$dish = $result->fetch_assoc();
?>
<section class="hero-section about checkout gap" style="background-image: url(assets/img/background-3.png);">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="about-text pricing-table">
					<ul class="crumbs d-flex" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
						<li><a href="index.html">Home</a></li>
						<li><a href="index.html"><i class="fa-solid fa-right-long"></i>Restaurants </a></li>
						<li><a href="index.html"><i class="fa-solid fa-right-long"></i>Restaurant Сard</a></li>
						<li class="two"><a href="index.html"><i class="fa-solid fa-right-long"></i>Checkout</a></li>
					</ul>
					<h2 data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">Checkout</h2>
					<p data-aos="fade-up" data-aos-delay="400" data-aos-duration="500">With a commitment to quality and
						creativity, our talented chefs bring culinary delights to life.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- checkout-order -->
<section class="gap">
	<div class="container">
		<div class="row">
			<div class="col-xl-5 col-lg-12" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
				<div class="checkout-order">
					<div class="title-checkout">
						<h2>Your order:</h2>
					</div>
					<?php if ($dish): ?>
						<div class="checkout-item">
							<img src="dishes/<?php echo htmlspecialchars($dish['image']); ?>"
								alt="<?php echo htmlspecialchars($dish['name']); ?>" class="img-fluid">
							<h2><?php echo htmlspecialchars($dish['name']); ?></h2>
							<p>Price: $<?php echo htmlspecialchars($dish['price']); ?></p>
							<!-- Additional checkout details and form here -->
						</div>
					<?php else: ?>
						<p>Dish not found.</p>
					<?php endif; ?>

				</div>
			</div>
			<div class="offset-xl-1 col-xl-6 col-lg-12" data-aos="flip-up" data-aos-delay="300" data-aos-duration="400">
				<form class="checkout-form" name="checkoutForm" onsubmit="return validateForm()">
					<h4>Buyer information</h4>
					<input type="text" name="fullName" placeholder="Full Name">
					<div class="row">
						<div class="col-lg-6">
							<input type="text" name="email" placeholder="E-mail">
						</div>
						<div class="col-lg-6">
							<input type="text" name="phone" placeholder="Phone">
						</div>
					</div>
					<h4 class="two">Delivery addresses</h4>
					<div class="col-lg-6">
						<input type="text" name="country" placeholder="Country">
					</div>
					<input type="text" name="street" placeholder="Street">
					<div class="row">
						<div class="col-lg-6">
							<input type="text" name="housenumber" placeholder="House number">
						</div>
						<div class="col-lg-6">
							<input type="number" name="apartmentnumber" placeholder="Apartment number">
							<span>*dispensable</span>
						</div>
					</div>
					<h4 class="two">Payment method</h4>
					<div class="nav nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
							data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
							aria-selected="true">Card</button>
						<button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
							data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
							aria-selected="false">Cash</button>
					</div>
					<div class="tab-content" id="v-pills-tabContent">

						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
							aria-labelledby="v-pills-home-tab">
							<label>
								<input type="radio" name="test" value="small" checked>
								<img alt="checkbox-img" src="assets/img/checkbox-1.png">
							</label>

							<label>
								<input type="radio" name="test" value="big">
								<img alt="checkbox-img" src="assets/img/checkbox-2.png">
							</label>
							<label>
								<input type="radio" name="test" value="big">
								<img alt="checkbox-img" src="assets/img/checkbox-3.png">
							</label>
							<input type="number" name="cardnumber" placeholder="Card number">
							<div class="row">
								<div class="col-lg-6">
									<input type="text" name="exp" placeholder="Expiration Date">
								</div>
								<div class="col-lg-6">
									<input type="password" placeholder="CVV">
								</div>
							</div>
							<label class="checkbox-one">Save my payments details for future purchases
								<input type="checkbox" checked="checked">
								<span class="checkmark"></span>
							</label>

							<div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
								aria-labelledby="v-pills-profile-tab">

							</div>


						</div>
					</div>
					<button class="button-price" type="submit">Send</button>
				</form>
			</div>
		</div>
	</div>
</section>

<script>
	function validateForm() {
		var fullName = document.forms["checkoutForm"]["fullName"].value;
		var email = document.forms["checkoutForm"]["email"].value;
		var phone = document.forms["checkoutForm"]["phone"].value;
		var country = document.forms["checkoutForm"]["country"].value;
		var street = document.forms["checkoutForm"]["street"].value;
		var houseNumber = document.forms["checkoutForm"]["housenumber"].value;

		if (!fullName || !email || !phone || !country || !street || !houseNumber) {
			alert("Please fill in all required fields.");
			return false;
		} else {
			alert("Payment successful. Your order has been submitted.");
			window.location.href = 'restaurants.php';
			return false; // Prevent form submission since we handle it manually
		}
	}
</script>





<?php include ("footer.php"); ?>