<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tab</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

	<div class="container">
			<div class="col-md-12">
				<div class="panel panel-danger">
					<div class="panel-heading text-center">
						Tab
					</div>
					<div class="row custom">
						<div class="col-md-3">
							<div class="panel panel-danger">
								<div class="panel-heading">
									Category
								</div>
								<div class="panel-body">
									<ul id="tab-category-demo" class="nav nav-pills nav-stacked">

									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-9">
							<div class="panel panel-danger">
								<div class="panel-heading">
									List Movie
								</div>
								<div class="panel-body">
									<div class="content-movie">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script id="templateHtml" type="text/x-handlebars-template">
		<div class="col-md-4">
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
	<script src="assets/js/tab.js"></script>
</body>

</html>