<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title><?=APP_NAME?><?=($title)?' - '.$title:''?></title>
	
	<meta name="author" content="<?=APP_AUTHOR?>">
	<meta name="description" content="<?=APP_DESCRIPTION?>">

	<?php include 'fb.php'; ?>
	<?php include 'tw.php'; ?>
	<?php include 'mobile.php'; ?>

	<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$wroot?>/css/style.css">
	<?=$stylesheets?>
	<!--[if lt IE 9]>
		<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv-printshiv.min.js"></script>
		<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

  	<div class="container">
	  	
  		<?=$body?>

		<hr>
		<footer class="footer">
			<div class="container">
				<p class="text-muted">&copy; <?=date('Y')?> <a href="http://RodrigoPolo.com">RodrigoPolo.com</a></p>
			</div>
		</footer>

  	</div>

	<script src="//cdn.jsdelivr.net/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdn.jsdelivr.net/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
		var wroot = '<?=$wroot?>';
	</script>
	<?=$scripts?>
	<script src="//maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
