<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Del Damiano Website</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a href="index.html" class="title">Del Damiano</a>
				<nav>
					<ul>
						<li><a href="index.php" >Home</a></li>
						<li><a href="random_factions.php" class="active">Random Factions</a></li>
					</ul>
				</nav>
			</header>

		<section id="three" class="wrapper">
						<div class="inner">
							<div class="split style1">
								<section>
									<form method="post" action="#">
										<div class="fields">
											<div class="field">
												<div class="col-6 col-12-xsmall">
												<label for="text">Factions</label>
												<input type="text" name="factionsText" id="factionsText" value="" placeholder="Rome, Grèce, Byzance, Égypte, Carthage" />
											</div>
												<br>
												<label for="text">Players : factions played list</label>
												<textarea name="playersText" id="playersText" rows="5" placeholder="Anthony : Égypte
																													Audrey : Grèce, Carthage
																													Damien : Rome, Grèce
																													Guillaume : Grèce, Byzance, Égypte, Carthage
																													Hugo : Rome, Grèce, Égypte"></textarea>
											</div>
										</div>
										<ul class="actions">
											<li><a href="" class="button submit">Attribute</a></li>
										</ul>
									</form>
								</section>
								<section>
									<ul class="contact">
										<li>
											<span>
											
											<?php	
											
												//include "functions.php";
													
												if(isset($_POST['factionsText']) & isset($_POST['factionsText'])) {
													$factionsArr = splitString($_POST['factionsText'], "," );
													$playersLine = splitString($_POST['playersText'], "\n" );
																											
												$playersMap= mapStringArray($playersLine) ;

												$result = assignFactions($playersMap, $factionsArr);
													
												tableHeader();
												
												foreach ($result as $player => $faction) {
													echo '<tr>';
														echo '<td>'. $player .'</td>';
														echo '<td>'. $faction .'</td>';
													echo '<tr>';
												}
												
												TableFooter();
													
													}
											?>		
												

																																		
												</span>
												
									
												
									</ul>
								</section>
							</div>
						</div>
					</section>

		<!-- Footer -->
			<footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>