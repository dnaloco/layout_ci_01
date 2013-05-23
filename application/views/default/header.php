<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>header</title>
		<meta name="description" content="" />
		<meta name="author" content="arthur" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<?php 
		echo load_css(
			array(
				'ie.css',
				array('print.css', 'print'),
				array('screen.css', 'screen')
			)
		);
		 ?>
	</head>

	<body>
	<div id="wrapper_page">
		<header id="header">
			<h1 id="titulo_pagina"><?= $title_page ?></h1>
			<p>DESCRIÇÃO: <?= $description_page ?></p>
			<br />
			olá <?php 
			if($this->session->userdata('username')) {
				echo 'usuário ' . $this->session->userdata('username');
			} else {
				echo "visitante";
			}
			?>
		</header>
