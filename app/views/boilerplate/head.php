<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title><?=APP_NAME?><?=($title)?' - '.$title:''?></title>
	
	<meta name="author" content="<?=APP_AUTHOR?>">
	<meta name="description" content="<?=APP_DESCRIPTION?>">

	<!-- Facebook Open Graph -->
	<meta property="og:title" content="<?=APP_DESCRIPTION?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?=$wroot?>/img/<?=APP_THUMB?>" />
	<meta property="og:url" content="<?=$wroot?>/" />
	<meta property="og:description" content="<?=APP_DESCRIPTION?>" />

	<!-- Twitter Card -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="<?=$wroot?>">
	<meta name="twitter:title" content="<?=APP_NAME?>">
	<meta name="twitter:description" content="<?=APP_DESCRIPTION?>">
	<meta name="twitter:image" content="<?=$wroot?>/img/<?=APP_THUMB?>">

	<!-- Mobile -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!-- App Icon -->
	<link rel="icon" href="<?=$wroot?>/favicon.ico">
	<link rel="apple-touch-icon-precomposed" href="<?=$wroot?>/img/favicon/s57.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=$wroot?>/img/favicon/s72.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=$wroot?>/img/favicon/s114.png">
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?=$wroot?>/img/favicon/s120.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=$wroot?>/img/favicon/s144.png">
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?=$wroot?>/img/favicon/s152.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="<?=$wroot?>/img/favicon/s144.png">


	<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$wroot?>/css/style.css">
	<?=$stylesheets?>
	<!--[if lt IE 9]>
		<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv-printshiv.min.js"></script>
		<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>