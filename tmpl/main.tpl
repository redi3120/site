<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo $this->title; ?></title>
	<meta name="keywords" content="<?php echo $this->meta_key; ?>" />
	<meta name="description" content="<?php echo $this->meta_desc; ?>" />
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/shop-homepage.css" rel="stylesheet">
</head>

<body>
	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Навигация</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Магазин обуви</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav pull-right">
					<li>
						<a href="/service"><span class="glyphicon glyphicon-earphone"></span> Гарантия и сервис</a>
					</li>
					<li>
						<a href="/deliv"><span class="glyphicon glyphicon-envelope"></span> Доставка</a>
					</li>
					<?php if(isset($_SESSION["user"])): ?>
					<li>
						<a href="/cart"><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</a>
					</li>
					<li>
						<a href="/functions.php?func=exit" class="text-right"><span class="glyphicon glyphicon-log-out"></span> Выход</a>
					</li>
					<?php endif; ?>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<!-- Page Content -->
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<p class="lead">Каталог</p>
				<div class="list-group">
					<?php 
					for ($i = 0; $i < count($this->items); $i++) { ?>
						<a href="section?id=<?php echo $this->items[$i]["id"]; ?>" class="list-group-item"><img src="/images/section/<?php echo $this->items[$i]['img']; ?>"> &nbsp; <?php echo $this->items[$i]["title"]; ?></a>
					<?php } ?>
				</div>
   <?php if(!isset($_SESSION["user"])): ?>		  
   <form class="form-horizontal" name="register" method="post" action="functions.php?func=reg">
  <fieldset>
	<legend>Регистрация</legend>
	<div class="form-group">
 		<label for="inputName" class="control-label col-xs-4">Имя</label>
		<div class="col-xs-8">
			<input type="text" name="name" class="form-control" id="inputName" placeholder="Ваше имя" required>
  		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail" class="control-label col-xs-4">Email</label>
		<div class="col-xs-8">
			<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword" class="control-label col-xs-4">Пароль</label>
		<div class="col-xs-8">
			<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Пароль" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-offset-4 col-xs-3">
			<button type="submit" class="btn btn-primary">Войти</button>
		</div>
	</div>
</fieldset>
</form>
	<? endif; ?>		  
		</div>
		<?php include "content_".$this->content.".tpl";?>
		</div>
	</div>
	<!-- /.container -->
	<div class="container">
		<hr>
		<!-- Footer -->
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>&copy; Все права защищены <?php echo date("Y"); ?></p>
				</div>
			</div>
		</footer>
	</div>
	<!-- /.container -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>