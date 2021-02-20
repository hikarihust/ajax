<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tooltip</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-danger" id="body-demo">
				<div class="panel-heading text-center">
					Demo Tooltip
				</div>
				<div class="panel-body">
					<div class="content-movie">
						<div id="content-movie">

						</div>
						<div id="save-position-content"></div>
						<div id="demo-position-content"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	<script id="templateHtml" type="text/x-handlebars-template">
		<div class="col-md-3 tooltip-custom" id="{id}">
			<div class="thumbnail">
				<img class="media-object" src="assets/images/{image}" alt="{title}">
				<div class="caption">
					<h4 class="text-center">{title}</h4>
					<p class="text-center"> Release date: <strong>{description}</strong></p>
				</div>
			</div>
		</div>
	</script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/tooltip.js"></script>
</body>

</html>