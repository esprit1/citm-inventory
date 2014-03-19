<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Oil Change Service</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
		<link href="datepicker/css/datepicker.css" rel="stylesheet">
		<!-- Le styles -->
		<style type="text/css">
			body {
				padding-top: 20px;
				padding-bottom: 40px;
			}

			/* Custom container */
			.container-narrow {
				margin: 0 auto;
				max-width: 700px;
			}
			.container-narrow > hr {
				margin: 30px 0;
			}

			/* Main marketing message and sign up button */
			.jumbotron {
				margin: 60px 0;
				text-align: center;
			}
			.jumbotron h1 {
				font-size: 72px;
				line-height: 1;
			}
			.jumbotron .btn {
				font-size: 21px;
				padding: 14px 24px;
			}

			/* Supporting marketing content */
			.marketing {
				margin: 60px 0;
			}
			.marketing p + h4 {
				margin-top: 28px;
			}
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<![endif]-->

		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="../assets/ico/favicon.png">
	</head>

	<body>

		<div class="container-narrow">

			<div class="masthead">
				<ul class="nav nav-pills pull-right">
					<li class="active">
						<a href="admin.html">Dashboard</a>
					</li>
					<li>
						<!--<a href="#">Sign Out</a>-->
					</li>
				</ul>
				<h3 class="muted">Oil Change Service Inc.</h3>
			</div>

			<hr>

			<div class="row-fluid marketing">

				<div class="span12">
					<h1>Search for an Inspection</h1>
					<br/>
					<div class="span5">
						<h3>Work Order</h3>
						<input type="text" id="workordersearch" name="workordersearch" />
						<a class="btn btn-success" href="javascript:void(null);" onclick="searchWorkOrder()" style="margin-top:-10px;">Go</a>
					</div>

					<div class="span5">
						<h3>Date</h3>
						<input type="text" id="datesearch" name="datesearch" />
						<a class="btn btn-success" href="javascript:void(null);" onclick="searchDate()" style="margin-top:-10px;">Go</a>
					</div>
				</div>

			</div>

			<hr>
			
			<div id="results"></div>

			<hr>

			<div class="footer">
				<p>
					&copy; Oil Change Service Inc. 2013
				</p>
			</div>

		</div>
		<!-- /container -->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
		<script src="datepicker/js/bootstrap-datepicker.js"></script>
		<script src="https://raw.github.com/timrwood/moment/2.0.0/min/moment.min.js"></script>

		<script type="text/javascript">
			$(function() {
				$('#datesearch').datepicker();
			});

			var buildResults = function(data) {
				var html = [
					'<table class="table table-striped">',
					'<thead><tr><td>Work Order</td><td>Inspector</td><td>VIN</td><td>Date Inspected</td><td>Sent To</td><td></td></tr></thead>',
					'<tbody>'
				];
				var cnt = 0;
				data.forEach(function(element, index, array) {
					html.push('<tr><td>'+element['inspectionWO']+'</td><td>'+element['inspectorName']+'</td><td>'+element['vehicleNumber']+'</td><td>'+element['dateInspected']+'</td><td>'+element['lastSentToName']+'</td><td><a href="http://ocsi.gopagoda.com/detail.html?id='+element['id']+'" target="_blank">View</a></td></tr>');
					cnt++;
				});
				html.push('</tbody></table>');
	
				if(cnt == 0)
					$('#results').html( '<h2>No results.</h2>' );
				else
					$('#results').html( html.join('') );
			},
			searchWorkOrder = function() {
				var num = $('#workordersearch').val(),
					url = 'http://ocsi.gopagoda.com/oilInspections/inspectionWO/'+num;
		
				$.ajax({ url: url }).done(function(data) {
					buildResults(data);
				});
			},
			searchDate = function() {
				if( moment($('#datesearch').val()).isValid() ) {
					var dt = moment($('#datesearch').val()),
						url = 'http://ocsi.gopagoda.com/oilInspections/date/'+dt.format("YYYY-MM-DD");
						//
					console.log(url);
			
					$.ajax({ url: url }).done(function(data) {
						buildResults(data);
					});
				}
			};
		</script>
	</body>
</html>
