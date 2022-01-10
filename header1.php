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
      border-right: 1px solid #fed100;
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
      background-color: gray;
    }


    .dropdown {
      float: left;
      overflow: hidden;
    }

    .dropdown .dropBtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: black;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .navbar a:hover,
    .dropdown:hover .dropBtn {
      background-color: gray;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>

<body>

  <ul>
    <li><a class="active" href="index1.php">Trang quản trị</a></li>

    <div class="dropdown">
      <button class="dropBtn">Câu hỏi
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="themcauhoi.php">Thêm câu hỏi</a>
        <a href="xoacauhoi.php">Xóa câu hỏi</a>
        <a href="suacauhoi.php">Sửa câu hỏi</a>
        <a href="chitietcauhoi.php">Danh sách các câu hỏi</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropBtn">Thống kê
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="ketquathi.php">Kết quả thi của học viên</a>
        <a href="khoahocchuacodethi.php">Khóa học chưa có đề thi</a>
        <a href="khoahocconhieudethinhat.php">Khóa học có nhiều đề thi nhất</a>
        <a href="hocvienchuavaothi.php">Học viên chưa vào thi</a>
        <a href="hocvienlamnhieubaithinhat.php">Học viên làm nhiều bài thi nhất</a>
      </div>
    </div>

    
    <li><a class="active7" href="timkiem.php">Tìm kiếm</a></li>
    <li><a class="active2" href="khoahoc.php">Khóa học</a></li>

    <li><a class="active3" href="dethi.php">Đề thi</a></li>
    <li><a class="active8" href="hocvien.php">Học viên</a></li>
    <li><a class="active4" href="thaydoimatkhau.php">Thay đổi mật khẩu</a></li>
    <li><a class="active5" href="thongtincanhan.php">Thông tin cá nhân</a></li>
    <li style="float:right"><a class="active6" href="DX.php">Đăng xuất</a></li>
  </ul>



</body>

</html>