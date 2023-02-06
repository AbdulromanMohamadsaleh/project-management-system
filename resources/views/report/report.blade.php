<!DOCTYPE html>
<html>

<head>
	<title>Filters in Bootstrap</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,
								initial-scale=1">
	<!--link of Bootstrap 4 css-->
	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- links of Bootstrap 4 JavaScript -->
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	</script>
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
	</script>
	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
	</script>
</head>

<body>
	<div class="container mt-3">
		<h2>Bootstrap filter for table</h2>
		<input type="text"
			class="form-control"
			placeholder="Search Here"
			id="txtInputTable">
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone No.</th>
				</tr>
			</thead>
			<tbody id="tableDetails">
				<tr>
					<td>101</td>
					<td>Ram</td>
					<td>ram@abc.com</td>
					<td>8541236548</td>
				</tr>
				<tr>
					<td>102</td>
					<td>Manish</td>
					<td>manish@abc.com</td>
					<td>2354678951</td>
				</tr>
				<tr>
					<td>104</td>
					<td>Rahul</td>
					<td>rahul@abc.com</td>
					<td>5789632569</td>
				</tr>
				<tr>
					<td>105</td>
					<td>Kirti</td>
					<td>kirti@abc.com</td>
					<td>5846325968</td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- For searching purpose -->
	<script>
		$(document).ready(function () {

			$("#txtInputTable").on("keyup", function () {
				var value = $(this).val().toLowerCase();
				$("#tableDetails tr").filter(function () {
					$(this).toggle($(this).text()
					.toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
</body>

</html>
