<div class="container-fluid" style="margin-top:98px">
    <div class="col-lg-12">
        <div class="row">
            <!-- FORM Panel -->
            <div class="col-md-4">
                <form action="partials/_categoryManage.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header" style="background-color: rgb(111 202 203);">
                            Thêm thực đơn
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label">Tên thực đơn: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Mô tả: </label>
                                <input type="text" class="form-control" name="desc" required>
                            </div> 
                            <div class="form-group">
								<label for="image" class="control-label">Ảnh minh họa</label>
								<input type="file" name="image" id="image" class="form-control" required style="border:none;">
								
							</div>  
                        </div>  
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="createCategory" class="btn btn-sm btn-primary col-sm-3 offset-md-4"> Thêm mới </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- FORM Panel -->
    
            <!-- Table Panel -->
            <div class="col-md-8 mb-3">
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
                            $sql = "SELECT * FROM `categories` LIMIT $item_per_page OFFSET $offset  "; 
                            $totalrecords = mysqli_query($conn, "SELECT * FROM categories");
                            $totalrecords = $totalrecords->num_rows;
                            $totalPages = ceil((int)$totalrecords / (int)$item_per_page);
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $catId = $row['categorieId'];
                                $image_name = $row['image_name'];
                                $catName = $row['categorieName'];
                                $catDesc = $row['categorieDesc'];
                                
                                echo '<tr>
                                        <td class="text-center"><b>' .$catId. '</b></td>
                                
                                
                                        <td><img src="/project_php_orderfood/img/'.$image_name.'" alt="image for this Category" width="150px" height="150px"></td>
                                
                               
                                        <td>
                                            <p><b>Tên thực đơn :</b> ' .$catName. '</p>
                                            <p><b class="truncate">Mô tả :</b> ' .$catDesc. '</p>
                                        </td>
                                        <td class="text-center">
                                            <div class="row mx-auto" style="width:112px">
                                            <button class="btn btn-sm btn-primary edit_cat" type="button" data-toggle="modal" data-target="#updateCat' .$catId. '">Chỉnh sửa</button>
                                            <form action="partials/_categoryManage.php" method="POST">
                                                <button name="removeCategory" class="btn btn-sm btn-danger" style="margin-left:9px;">Xóa</button>
                                                <input type="hidden" name="catId" value="'.$catId. '">
                                                <input type="hidden" name="image_name" value="'.$image_name. '">
                                            </form></div>
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
    $catsql = "SELECT * FROM `categories`";
    $catResult = mysqli_query($conn, $catsql);
    while($catRow = mysqli_fetch_assoc($catResult)){
        $catId = $catRow['categorieId'];
        $catName = $catRow['categorieName'];
        $catDesc = $catRow['categorieDesc'];
        $current_image = $catRow['image_name'];
?>

<!-- Modal -->
<div class="modal fade" id="updateCat<?php echo $catId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateCat<?php echo $catId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateCat<?php echo $catId; ?>">Mã thực đơn: <b><?php echo $catId; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_categoryManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Ảnh minh họa</label></b>
					<input type="file" name="catimage" id="catimage"  class="form-control" required style="border:none;" >
					<input type="hidden" id="catId" name="catId" value="<?php echo $catId; ?>">
                    <input type="hidden" id="current_image" name="current_image" value="<?php echo $current_image; ?>">
					<button type="submit" class="btn btn-success my-1" name="updateCatPhoto">Cập nhật ảnh</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/project_php_orderfood/img/<?=$current_image?>" id="itemPhoto" name="itemPhoto" alt="Category image" width="100" height="100">
				</div>
			</div>
		</form>
        <form action="partials/_categoryManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Tên thực đơn</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $catName; ?>" type="text" required>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Mô tả</label></b>
                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo $catDesc; ?></textarea>
            </div>
            <input type="hidden" id="catId" name="catId" value="<?php echo $catId; ?>">
            <button type="submit" class="btn btn-success" name="updateCategory">Cập nhật thông tin</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    }
?>