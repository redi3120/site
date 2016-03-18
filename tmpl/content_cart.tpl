<div class="col-md-9">
	<div class="row">
	<?php if(count($this->cart) == 0): ?>
        <h1 class="text-center">Корзина пуста</h1>
    <?php else: ?>
    <h2>Корзина</h2>
    <form name="cart" action="<?=$this->action?>" method="post">
		<table class="table table-bordered">
			<tr>
				<td colspan="2">Товар</td>
				<td>Цена за 1 шт.</td>
				<td>Количество</td>
				<td>Стоимость</td>
				<td></td>
			</tr>
			<?php for ($i = 0; $i < count($this->cart); $i++) { ?>
				<tr class="cart_row">
					<td class="img">
						<img width="200" src="/images/mini/<?=$this->cart[$i]["img"]?>" alt="<?=$this->cart[$i]["title"]?>" />
					</td>
					<td class="title">
                        <a href="/product?id=<?=$this->cart[$i]['id']?>"><?=$this->cart[$i]["title"]?></a>
                    </td>
					<td><?=$this->cart[$i]["price"]?> гривен</td>
					<td>
						<table width="100%">
							<tr>
								<td>
									<input type="text" class="form-control in_cart" name="count_<?=$this->cart[$i]["id"]?>" value="<?=$this->cart[$i]["count"]?>" /> 
								</td>
								<td> шт.</td>
							</tr>
						</table>
					</td>
					<td class="bold"><?=$this->cart[$i]["summa"]?> гривен</td>
					<td>
						<button type="button" onclick="location.href = '/functions.php?func=delete_cart&id=<?=$this->cart[$i]["id"]?>'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Удалить</button>
					</td>
				</tr>
				
			<?php } ?>
			<tr>
				<td colspan="2">
					<div class="left">
						<button type="input" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-retweet"></span> Пересчитать</button>
     	            </div>
				</td>
				<td colspan="4">
					<div class="right">
						<input type="hidden" name="func" value="cart" />
						<button type="button" class="btn btn-primary btn-lg" onclick="alert('заказ оформлен как бы')"><span class="glyphicon glyphicon-ok"></span> Оформить заказ</button>
					</div>
				</td>
			</tr>
		</table>
	</form><?php endif; ?>
</div>
</div> 