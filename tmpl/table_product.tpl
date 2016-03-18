<?php 
for($i=0; $i < count($this->products); $i++){ ?>
<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
		<img src="<?php echo $this->products[$i]["img"]; ?>" alt="">
        <div class="caption">
			<h4 class="pull-right"><span class="label label-primary"><?php echo $this->products[$i]["price"]; ?> грн</span></h4>
            <h4><a href="#"><?php echo $this->products[$i]["title"]; ?></a></h4>
            <p><?php echo $this->products[$i]["description"]; ?></p>
        </div>
    </div>
</div>
<?php } ?>