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
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">О нас</a>
                    </li>
                    <li>
                        <a href="#">Доставка</a>
                    </li>
                    <li>
                        <a href="#">Контакты</a>
                    </li>
					<li>
                        <a href="#">Корзина</a>
                    </li>
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
                        <a href="section&id=<?php echo $this->items[$i]["id"]; ?>" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> &nbsp; <?php echo $this->items[$i]["title"]; ?></a>
                    <?php } ?>
				</div>
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