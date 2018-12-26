<!DOCTYPE html>
<html lang="en">
<head>
	<title>Facebook Style Infinite Scroll Pagination in Codeigniter using Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
	/* Style buttons */
	.buttonload {
	  background-color: #4CAF50; /* Green background */
	  border: none; /* Remove borders */
	  color: white; /* White text */
	  padding: 12px 16px; /* Some padding */
	  font-size: 16px /* Set a font size */
	}
    </style>
</head>
<body>
	<div class="container">
		<h1>Infinate Scroll Page</h1><br/>
		<div id="load_data"></div>
		<div id="load_data_message"></div><br/>
		<button class="btn btn-primary">Load More</button><br/><br/>
	</div>

	<script>
		$(document).ready(function(){
			var limit = 2;
			var start = 0;

			function lazzy_loader(limit) {
				$("button").html('Loading <i class="fa fa-spinner fa-spin"></i>');
			}
			lazzy_loader(limit);

			function load_data(limit, start) {
				$.ajax({
					url:"http://localhost/ajax-btn/scroll/fetch",
					method:"POST",
					data:{
						limit:limit,
						start:start
					},
					cache:false,
					success:function(data) {
						if(data == '') {
							$('#load_data_message').html('<p>No more post to display!</p>');
						}
						else {
							setTimeout(function(){
								$('#load_data').append(data);
								$("button").html('Load More');
							}, 1000);
						}
					},
					error:function() {
						console.log('bye');
					}
				});
			}
			load_data(limit, start);

			$("button").click(function(){
				lazzy_loader(limit);
				start = start + limit;

				setTimeout(function(){
					load_data(limit, start);
				}, 1000);
			});
		});
	</script>
</body>
</html>