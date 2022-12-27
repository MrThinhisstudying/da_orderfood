<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="checkoutModal">Thông tin giao hàng:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="partials/_manageCart.php" method="post">
                <div class="form-group">
                    <b><label for="address">Địa chỉ:</label></b>
                    <input class="form-control" id="address" name="address" placeholder="Số nhà, đường, phường, quận,..." type="text" required minlength="3" maxlength="500">
                </div>
                <div class="form-group">
                    <b><label for="address1">Địa chỉ cụ thể:</label></b>
                    <input class="form-control" id="address1" name="address1" placeholder="Số cổng, số hẻm,..." type="text">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 mb-0">
                        <b><label for="phone">Số điện thoại:</label></b>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon">+84</span>
                        </div>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <b><label for="zipcode">Mã xác nhận:</label></b>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Nhập mã"  required pattern="[0-9]{6}" maxlength="6">                    
                    </div>
                </div>
                <div class="form-group">
                    <b><label for="password">Mật khẩu:</label></b>    
                    <input class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" type="password" required minlength="4" maxlength="21" data-toggle="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <input type="hidden" name="amount" value="<?php echo $totalPrice ?>">
                    
                    <button type="submit" name="checkout" class="btn btn-success">Đặt đơn</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>