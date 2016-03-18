<div class="col-md-9">
	<div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="/images/big/<?php echo $this->product['img']; ?>" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h1 class="page-header"><?php echo $this->product['title']; ?></h1>
				 <p><b>Размер:</b> <?php echo $this->product['size']; ?></p>
				<p><b>Цена:</b> <?php echo $this->product['price']; ?> гривен</p>
				<p><b>Цвет:</b> <?php echo $this->product['color']; ?></p>
                <p><?php echo $this->product['description']; ?></p>
				<a class="btn btn-primary" href="/functions.php?func=add_cart&id=<?php echo $this->product['id']; ?>">Добавить в корзину <span class="glyphicon glyphicon-shopping-cart"></span></a>
            </div>
    </div>
</div>