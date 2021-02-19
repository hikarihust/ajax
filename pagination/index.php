<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Pagination Ajax</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<div class="container">
		<div class="panel panel-danger">
			<div class="panel-heading text-center">
				Phân trang bằng ajax
			</div>
			<div class="panel-body">
				<div class="row content-movie">
					<!-- show film -->
				</div>
				<div class="row pages">
					<div class="input-group col-md-4 col-md-offset-4">
						<div class="input-group-btn">
							<button type="button" class="btn btn-default pageInfo" disabled="disabled">Page 1 of
								6</button>
							<button type="button" class="btn btn-default goStart">Start</button>
							<button type="button" class="btn btn-default goPrevious">&laquo; Previous</button>
						</div>
						<select class="form-control" id="slbPages" style="width:100px">

						</select>
						<div class="input-group-btn">
							<button type="button" class="btn btn-default goNext">Next &raquo;</button>
							<button type="button" class="btn btn-default goEnd">End</button>
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
	<script src="assets/js/paging.js"></script>
</body>

</html>