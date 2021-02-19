<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Load More</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- <link href="node_modules/jquery-easy-loading/src/loading.css" rel="stylesheet"> -->
</head>
<body>
	<div class="container">
		<h1 class="page-header text-center">List Movie</h1>
		<div id="show-films">
			<!-- showFilm -->
		</div>
		<div class="row">
			<p class="col-md-2 col-md-offset-5">
				<button type="button" class="btn btn-primary btn-block" id="btn-show">Load More</button>
			</p>
		</div>
	</div>	
	<script id="templateHtml" type="text/x-handlebars-template">
		<div class="col-md-3">
			<div class="thumbnail">
				<img src="assets/images/{image}" alt="{title}">
				<div class="caption">
					<h4 class="text-center">{title}</h4>
					<p class="text-center"> Release date: <strong>{description}</strong></p>
				</div>
			</div>
		</div>
	</script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/my-js.js"></script>
</body>
</html>