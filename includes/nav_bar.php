<!-- Nav bar qui va dans toute les pages-->
<div id="nav_bar">
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<button class="navbar-toggler navbar-toggler-right" type="button"
			data-toggle="collapse" data-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="index.php"> "CACA ASOS" </a>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="index.php"> Accueil <span class="sr-only">
				</span></a></li>
				<li class="nav-item"><a class="nav-link cache" href="ajout.php">Ajout </a></li>
				<li class="nav-item"><a class="nav-link cache" href="list.php">	Liste</a></li>
                                <li class="nav-item"><a class="nav-link cache" href="interface_admin.php"> Administration </a></li>
				<form class="form-inline my-2 my-lg-0" method="post"
					action="./includes/connect_user_login.php">
					<input class="form-control mr-sm-2 visible" type="text"
						name="username" placeholder="log"> <input
						class="form-control mr-sm-2 visible" type="text" name="password"
						placeholder="mdp">
					<button class="form-control visible btn btn-outline-success my-2 my-sm-0" type="submit">OK</button>
					<div class="nav-link cache">Bienvenue <?php echo $_SESSION['user'];?></div>
					<button class="nav-link cache btn btn-outline-success my-2 my-sm-0" type="submit">Deconnexion
					</button>
				</form>
			</ul>
		</div>
	</nav>
</div>