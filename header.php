<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 10px;
  padding: 0;
  overflow: hidden;
  background-color: #fed100;
}

li {
  float: left;
  border-right:1px solid #fed100;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: white;
}


</style>
</head>
<body>

<ul>
  <li><a class="active" href="index.php">Trang chủ</a></li>
  <li><a class="active1" href="khoahoc_user.php">Khóa học</a></li>
  <li><a class="active2" href="thaydoimatkhau_user.php">Thay đổi mật khẩu</a></li>
  <li><a class="active3" href="thongtincanhan_user.php">Thông tin cá nhân</a></li>
  <li  style="float:right"><a class="active4" href="DX.php">Đăng xuất</a></li>
</ul>

</body>
</html>


