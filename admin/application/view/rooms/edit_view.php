<div id="content-wrapper">
  	<div class="container-fluid">
    	<div class="row">
      		<div class="col-md-12">
        		<h2 class="text-center">Form Edit Rooms</h2>
    		</div>
    		<div class="col-md-12">
    			<a href="?c=rooms" class="btn btn-primary mb-3 mt-5">Danh sach</a>
    		</div>
    	</div>
    	<div class="row">
	    	<?php if($errosMess && $state === 'err'): ?>
                <div class="col-md-12"> 
                    <ul>
                    <?php foreach($errosMess as $key => $err): ?>
                        <?php if($err): ?>
                            <li style="color: red;"><?= $err; ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if($dupKeyName && $state === 'dup'): ?>
                <h3 class="ml-3">Ten phong <?= $dupKeyName; ?> da ton tai !</h3>
            <?php endif; ?>           
    		<div class="col-md-12">
    			<form action="?c=rooms&m=handleEdit&id=<?=$infoDataRoom['id']?>" method="POST">
    				<div class="form-group">
    					<label for="nameRoom">Ten Phong</label>
    					<input class="form-control" type="text" name="nameRoom" id="nameRoom" value="<?=$infoDataRoom['name'];?>">
    				</div>
    				<div class="form-group">
    					<label for="bossRoom">Truong Phong</label>
    					<input type="text" name="bossRoom" id="bossRoom" class="form-control" value="<?=$infoDataRoom['boss'];?>">
    				</div>
    				<div class="form-group">
    					<label for="dateRoom">Ngay thanh lap</label>
    					<input type="text" name="oldDateRoom" id="oldDateRoom" class="form-control" value="<?=$infoDataRoom['create_time'];?>" readonly="readonly">

    					<input type="date" name="newDateRoom" id="newDateRoom" class="form-control">
    				</div>
    				<div class="form-group">
    					<label for="statusRoom">Trang thai</label>
    					<select class="form-control" id="statusRoom" name="statusRoom">
    						<option value="0" <?= $infoDataRoom['status'] == 0 ? "selected='selected'" : ""; ?>>Deactive</option>
    						<option value="1" <?= $infoDataRoom['status'] == 1 ? "selected='selected'" : ""; ?>>Active</option>
    					</select>
    				</div>
    				<br>
    				<button class="btn btn-info mx-auto" name="btnEdit" type="submit">Edit Room</button>
    			</form>
    		</div>
    	</div>
  	</div>
</div>


