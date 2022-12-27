<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: rgb(111 202 203);">
            <h5 class="modal-title" id="loginModal">Đăng nhập</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/_handleLogin.php" method="post">
              <div class="text-left my-2">
                  <b><label for="username">Tên đăng nhập</label></b>
                  <input class="form-control" id="loginusername" name="loginusername" placeholder="Nhập tên đăng nhập" type="text" required>
              </div>
              <div class="text-left my-2">
                  <b><label for="password">Mật khẩu</label></b>
                  <input class="form-control" id="loginpassword" name="loginpassword" placeholder="Nhập mật khẩu" type="password" required data-toggle="password">
              </div>
              <button type="submit" class="btn btn-success">Đăng nhập</button>
            </form>
            <p class="mb-0 mt-1">Bạn chưa có tài khoản ? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Đăng ký</a> ngay.</p>
          </div>
        </div>
      </div>
    </div>

