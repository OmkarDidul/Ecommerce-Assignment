<!DOCTYPE html>
<html>
<head>
	<title>Products Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			// Send custom email to admin on Buy Now button click
			$(".buy-btn").click(function() {
				var product = $(this).data("product");
				var message = "User is interested in buying "+product;
				window.open("mailto:admin@example.com?subject="+product+"&body="+message);
				alert("Thanks for buying. We will contact you soon.");
			});

			// Add product to cart on Add to Cart button click
			$(".add-to-cart-btn").click(function() {
				var product = $(this).data("product");
				var cartCount = parseInt($("#cart-count").text());
				$("#cart-count").text(cartCount+1);
				alert(product+" added to cart.");
			});
		});
	</script>
</head>
<body>
	
</body>
</html>
