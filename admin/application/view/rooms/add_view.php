<div id="content-wrapper">
  	<div class="container-fluid">
    	<div class="row">
      		<div class="col-md-12">
        		<h2 class="text-center">Form Add Rooms</h2>
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
                <h3>Ten <?= $dupKeyName; ?> da ton tai !</h3>
            <?php endif; ?>
            
    		<div class="col-md-12">
    			<form action="?c=rooms&m=handleAdd" method="POST">
    				<div class="form-group">
    					<label for="nameRoom">Ten Phong</label>
    					<input class="form-control" type="text" name="nameRoom" id="nameRoom" >
    				</div>
    				<div class="form-group">
    					<label for="bossRoom">Truong Phong</label>
    					<input type="text" name="bossRoom" id="bossRoom" class="form-control">
    				</div>
    				<!-- <div class="form-group">
    					<label for="statusRoom">Trang thai</label>
    					<input type="text" name="nameRoom" id="statusRoom" class="form-control">
    				</div> -->
    				<div class="form-group">
    					<label for="dateRoom">Ngay thanh lap</label>
    					<input type="date" name="dateRoom" id="dateRoom" class="form-control">
    				</div>
    				<br>
    				<button class="btn btn-info mx-auto" name="btnSave" type="submit">Save Room</button>
    			</form>
    		</div>
    	</div>
  	</div>
</div>