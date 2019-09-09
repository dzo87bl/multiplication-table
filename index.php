<?php 
	include_once('includes/config.php');
	include_once('class/calculator.class.php');
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<!-- META -->
		<meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript"/>
		<meta name="keywords" content=""/>
		<meta name="description" content=""/>
		<meta name="author" content=""/>
		<meta name="copyright" content=""/>
		<meta name="generator" content=""/>
		<meta name="distribution" content=""/>
		<meta name="date" content=""/>
		<!-- SCRIPTS -->
		<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui-1.12.1.min.js" type="text/javascript"></script>
		<script src="js/popper.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<!-- TITLE -->
		<title>Multiplication table</title>
		<!-- FAVICON -->
		<link rel="icon" href="img/favicon.png">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
        <link rel="apple-touch-icon" type="image/png" href="img/favicon.png"><!-- iPhone -->
        <link rel="apple-touch-icon" type="image/png" sizes="72x72" href="img/favicon.png"><!-- iPad -->
        <link rel="apple-touch-icon" type="image/png" sizes="114x114" href="img/favicon.png"><!-- iPhone4 -->
		<!-- PLUGINS -->
		<link rel="stylesheet" type="text/css" href="plugins/fontawesome-free-5.4.2-web/css/all.min.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/animate/animate.min.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/hover/hover.css"/>
		<script src="plugins/pace/pace.js" type="text/javascript"></script>
		<!-- <script src="plugins/smooth-mouse-scrolling-scrollspeed/jQuery.scrollSpeed.js" type="text/javascript"></script> -->
		<!-- GOOGLE -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- STYLE -->
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<!-- -->
        <div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col">
							<!-- title -->
							<h1 class="text-center display-1 mt-5 mb-5">Multiplication table</h1>
							<!-- / title -->
							<!-- table -->
							<?php
								$mt = new multiplication_table();
								$mt -> render_table();
							?>
							<!-- / table -->
							<!-- modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Multiplication table</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p id="modal-txt">...</p>
									</div>
									<div class="modal-footer">
										<!-- form -->
										<form name="mt_log" id="mt_log" method="post" action="" accept-charset="utf-8" enctype="multipart/form-data">
											<input type="hidden" id="factor1" name="factor1" value="">
											<input type="hidden" id="factor2" name="factor2" value="">
											<input type="hidden" id="result" name="result" value="">
											<button type="submit" id="mt_btn" class="btn btn-secondary">OK</button>
										</form>
										<!-- / form -->
									</div>
									</div>
								</div>
							</div>
							<!-- / modal -->
							<!-- alert -->
							<div id="alert" class="alert alert-success" role="alert">
								<strong>Multiplication table!</strong> Log is successful.
							</div>
							<!-- alert -->
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- / -->
		<a href="#" class="scrollup">Scroll</a>
		<!-- SCRIPTS -->
		<script language="javascript" src="js/main.js"></script>
		<script language="javascript" src="js/calculator.js"></script>
		<script language="javascript">
			$(document).ready(function(){
				
			});
		</script>
	</body>
</html>
