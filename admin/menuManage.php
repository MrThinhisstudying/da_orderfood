<div class="container-fluid" style="margin-top:98px">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
				<div class="card mb-3">
					<div class="card-header" style="background-color: rgb(111 202 203);">
						Thêm mới món ăn
				  	</div>
					<div class="card-body">
							<div class="form-group">
								<label class="control-label">Tên món ăn: </label>
								<input type="text" class="form-control" name="name" required>
							</div>
							<div class="form-group">
								<label class="control-label">Mô tả: </label>
								<textarea cols="30" rows="3" class="form-control" name="description" required></textarea>
							</div>
                            <div class="form-group">
								<label class="control-label">Giá</label>
								<input type="number" class="form-control" name="price" required min="1">
							</div>	
							<div class="form-group">
								<label class="control-label">Thực đơn: </label>
								<select name="categoryId" id="categoryId" class="custom-select browser-default" required>
								<option hidden disabled selected value>Không</option>
                                <?php
                                    $catsql = "SELECT * FROM `categories`"; 
                                    $catresult = mysqli_query($conn, $catsql);
                                    while($row = mysqli_fetch_assoc($catresult)){
                                        $catId = $row['categorieId'];
                                        $catName = $row['categorieName'];
                                        echo '<option value="' .$catId. '">' .$catName. '</option>';
                                    }
                                ?>
								</select>
							</div>
							
							<div class="form-group">
								<label for="image" class="control-label">Ảnh minh họa</label>
								<input type="file" name="image" id="image" class="form-control" required style="border:none;">
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="mx-auto">
								<button type="submit" name="createItem" class="btn btn-sm btn-primary"> Thêm mới </button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover mb-0">
							<thead style="background-color: rgb(111 202 203);">
								<tr>
									<th class="text-center" style="width:7%;">Mã thực đơn</th>
									<th class="text-center">Ảnh minh họa</th>
									<th class="text-center" style="width:58%;">Mô tả</th>
									<th class="text-center" style="width:18%;">Chức năng</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                                $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
								$current_page = !empty($_GET['page_pagination']) ? $_GET['page_pagination'] : 1;
								$offset = (((int)$current_page) - 1) * (int)$item_per_page;
                                $sql = "SELECT * FROM `food` LIMIT $item_per_page OFFSET $offset";
								$totalrecords = mysqli_query($conn, "SELECT * FROM food");
                            	$totalrecords = $totalrecords->num_rows;
                            	$totalPages = ceil((int)$totalrecords / (int)$item_per_page);
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $foodId = $row['foodId'];
                                    $foodName = $row['foodName'];
                                    $foodPrice = $row['foodPrice'];
                                    $foodDesc = $row['foodDesc'];
									$image_name = $row['foodImg'];
                                    $foodCategorieId = $row['foodCategorieId'];

                                    echo '<tr>
                                            <td class="text-center">' .$foodCategorieId. '</td>
                                            <td>
                                                <img src="/project_php_orderfood/img/'.$image_name.'"  alt="image for this item" width="150px" height="150px">
                                            </td>
                                            <td>
                                                <p><b>Tên món ăn :</b> ' .$foodName. '</p>
                                                <p> <b class="truncate">Mô tả :</b>' .$foodDesc. '</p>
                                                <p> <b>Giá :</b>' .$foodPrice. ' VND</p>
                                            </td>
                                            <td class="text-center">
												<div class="row mx-auto" style="width:112px">
													<button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#updateItem' .$foodId. '">Chỉnh sửa</button>
													<form action="partials/_menuManage.php" method="POST">
														<button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:9px;">Xóa</button>
														<input type="hidden" name="foodId" value="'.$foodId. '">
														<input type="hidden" name="image_name" value="'.$image_name. '">
													</form>
												</div>
                                            </td>
                                        </tr>';
                                }
                            ?>
							</tbody>
						</table>
					</div>
					<div class="text-center">
                        <?php require 'partials/pagination.php' ?>
                        
                    </div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
</div>

<?php 
    $foodsql = "SELECT * FROM `food`";
    $foodResult = mysqli_query($conn, $foodsql);
    while($foodRow = mysqli_fetch_assoc($foodResult)){
        $foodId = $foodRow['foodId'];
        $foodName = $foodRow['foodName'];
        $foodPrice = $foodRow['foodPrice'];
		$current_image= $foodRow['foodImg'];
        $foodCategorieId = $foodRow['foodCategorieId'];
        $foodDesc = $foodRow['foodDesc'];
?>

<!-- Modal -->
<div class="modal fade" id="updateItem<?php echo $foodId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $foodId; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateItem<?php echo $foodId; ?>">Mã món ăn: <?php echo $foodId; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Ảnh minh họa</label></b>
					<input type="file" name="itemimage" id="itemimage"  class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
					<input type="hidden" id="foodId" name="foodId" value="<?php echo $foodId; ?>">
					<input type="hidden" id="current_image" name="current_image" value="<?php echo $current_image; ?>">
					<button type="submit" class="btn btn-success my-1" name="updateItemPhoto">Cập nhật ảnh</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/project_php_orderfood/img/<?=$current_image?>" id="itemPhoto" name="itemPhoto" alt="item image" width="100" height="100">
				</div>
			</div>
		</form>
		<form action="partials/_menuManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Tên món ăn</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $foodName; ?>" type="text" required>
            </div>
			<div class="text-left my-2 row">
				<div class="form-group col-md-6">
                	<b><label for="price">Giá</label></b>
                	<input class="form-control" id="price" name="price" value="<?php echo $foodPrice; ?>" type="number" min="1" required>
				</div>
				<div class="form-group col-md-6">
					<b><label for="catId">Mã thực đơn</label></b>
                	<input class="form-control" id="catId" name="catId" value="<?php echo $foodCategorieId; ?>" type="number" min="1" required>
				</div>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Mô tả</label></b>
                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo $foodDesc; ?></textarea>
            </div>
            <input type="hidden" id="foodId" name="foodId" value="<?php echo $foodId; ?>">
            <button type="submit" class="btn btn-success" name="updateItem">Cập nhật thông tin</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
	}
?>