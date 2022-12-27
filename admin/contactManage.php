<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%" id='notempty'>
    <strong>Thông báo!</strong> Nếu các phản hồi không liên quan đến đơn hàng thì (mã đặt hàng = 0). Xin cảm ơn.
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
</div>
<style>
    .btn-danger-gradiant {
        background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
    }

    .btn-danger-gradiant:hover {
        background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
    }
</style>
<div style="margin-right: 32px;display: table;margin-left: auto;">
<button type="button" class="btn btn-danger-gradiant text-white border-0 py-2 px-3 mx-2" data-toggle="modal" data-target="#history"><span> Lịch sử  <i class="ti-arrow-right"></i></span></button>
</div>
<div class="container-fluid" id='empty'>	
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>Mã phản hồi</th>
                            <th>Mã người dùng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Mã đặt hàng</th>
                            <th>Tin nhắn</th>
                            <th>Ngày/Giờ</th>
                            <th>Trả lời</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                             $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
                             $current_page = !empty($_GET['page_pagination']) ? $_GET['page_pagination'] : 1;
                             $offset = (((int)$current_page) - 1) * (int)$item_per_page;
                             $sql = "SELECT * FROM contact LIMIT $item_per_page OFFSET $offset"; 
                             $totalrecords = mysqli_query($conn, "SELECT * FROM contact");
                             $totalrecords = $totalrecords->num_rows;
                             $totalPages = ceil((int)$totalrecords / (int)$item_per_page);
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row=mysqli_fetch_assoc($result)) {
                                $contactId = $row['contactId'];
                                $userId = $row['userId'];
                                $email = $row['email'];
                                $phoneNo = $row['phoneNo'];
                                $orderId = $row['orderId'];
                                $message = $row['message'];
                                $time = $row['time'];
                                $count++;

                                echo '<tr>
                                        <td>' .$contactId. '</td>
                                        <td>' .$userId. '</td>
                                        <td>' .$email. '</td>
                                        <td>' .$phoneNo. '</td>
                                        <td>' .$orderId. '</td>
                                        <td>' .$message. '</td>
                                        <td>' .$time. '</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#reply' .$contactId. '">Phản hồi</button>
                                        </td>
                                    </tr>';
                            }
                            if($count==0) {
                              ?><script> document.getElementById("notempty").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not recieve any message!	</div>';
                              document.getElementById("empty").innerHTML = '';
                              </script> <?php
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
</div>

    <?php 
        $contactsql = "SELECT * FROM `contact`";
        $contactResult = mysqli_query($conn, $contactsql);
        while($contactRow = mysqli_fetch_assoc($contactResult)){
            $contactId = $contactRow['contactId'];
            $Id = $contactRow['userId'];
    ?>

    <!-- Reply Modal -->
    <div class="modal fade" id="reply<?php echo $contactId; ?>" tabindex="-1" role="dialog" aria-labelledby="reply<?php echo $contactId; ?>" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: rgb(111 202 203);">
            <h5 class="modal-title" id="reply<?php echo $contactId; ?>">Trả lời (Mã phản hồi: <?php echo $contactId; ?>)</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/_contactManage.php" method="post">
                <div class="text-left my-2">
                    <b><label for="message">Tin nhắn: </label></b>
                    <textarea class="form-control" id="message" name="message" rows="2" required minlength="5"></textarea>
                </div>
                <input type="hidden" id="contactId" name="contactId" value="<?php echo $contactId; ?>">
                <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                <button type="submit" class="btn btn-success" name="contactReply">Phản hồi</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
        }
    ?>

    <!-- history Modal -->
    <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(187 188 189);">
              <h5 class="modal-title" id="history">Lịch sử phản hồi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="notReply">
            <table class="table-striped table-bordered col-md-12 text-center">
                <thead style="background-color: rgb(111 202 203);">
                    <tr>
                        <th>Mã phản hồi</th>
                        <th>Tin nhắn</th>
                        <th>Ngày/Giờ</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * FROM `contactreply`"; 
                    $result = mysqli_query($conn, $sql);
                    $totalReply = 0;
                    while($row=mysqli_fetch_assoc($result)) {
                        $contactId = $row['contactId'];
                        $message = $row['message'];
                        $datetime = $row['datetime'];
                        $totalReply++;

                        echo '<tr>
                                <td>' .$contactId. '</td>
                                <td>' .$message. '</td>
                                <td>' .$datetime. '</td>
                              </tr>';
                    }    

                    if($totalReply==0) {
                      ?><script> document.getElementById("notReply").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Reply any message!	</div>';</script> <?php
                    }   

                ?>
                </tbody>
		    </table>
            </div>
          </div>
        </div>
    </div>