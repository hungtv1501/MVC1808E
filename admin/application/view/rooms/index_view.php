
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center">This is rooms</h2>
      </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<a href="?c=rooms&m=addView" class="btn btn-primary mb-5 mt-5"> Add room + </a>
            <br>
            <input type="text" name="txtSearch" id="txtSearch" class="form-control mb-4" value="<?=$keyword;?>">
            <button type="button" id="btnSearch" name="btnSearch" class="btn btn-primary mb-3">Search</button>
            <a href="?c=rooms" class="btn btn-info mb-3">View All Data</a>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<table class="table text-center">
    			<thead>
    				<tr>
    					<th>Ten phong</th>
    					<th>Truong phong</th>
    					<th>Trang thai</th>
    					<th>Ngay tao</th>
    					<th colspan="2" width="5%">Action</th>
    				</tr>
    			</thead>
    			<tbody>
                    <?php foreach($infoData as $key => $value): ?>
    				<tr>
    					<td><?=$value['name']?></td>
    					<td><?=$value['boss']?></td>
    					<td><?=$value['status'] == 1 ? 'Active' : 'Deactive'?></td>
    					<td><?=$value['create_time']?></td>
    					<td>
                            <a href="?c=rooms&m=editView&id=<?=$value['id'];?>" class="btn btn-info">Edit</a>
                        </td>
    					<td>
                            <a href="?c=rooms&m=delete&id=<?=$value['id'];?>" class='btn btn-danger'>Delete</a>
                        </td>
    				</tr>
                    <?php endforeach; ?>
    			</tbody>
    		</table>
    	</div>
        <div class="col-md-12 text-center">
            <?=$panigation['html'];?>
        </div>
    </div>
  </div>
</div>