-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 04:09 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k69_nhom2`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_day` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `name`, `create_day`, `update_day`) VALUES
(1, 'Khóa cơ bản', '2021-12-30 05:33:57', '2021-12-30 05:33:57'),
(2, 'Khóa vòng lặp', '2021-12-30 05:33:57', '2021-12-30 05:33:57'),
(3, 'Khóa hàm', '2021-12-30 05:33:57', '2021-12-30 05:33:57'),
(6, 'khóa giáo sư', '2021-12-31 03:30:24', '2021-12-31 03:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_number` int(11) DEFAULT NULL,
  `total_difficult` int(11) DEFAULT NULL,
  `total_medium` int(11) DEFAULT NULL,
  `total_easy` int(11) DEFAULT NULL,
  `create_day` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `minute` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `course_id`, `name`, `total_number`, `total_difficult`, `total_medium`, `total_easy`, `create_day`, `update_day`, `minute`) VALUES
(1, 1, 'kiêm tra cơ bản 1', 20, 3, 5, 12, '2021-12-30 07:15:54', '2021-12-30 07:32:13', 30),
(2, 1, 'kiểm tra cơ bản 2', 20, 4, 6, 10, '2021-12-30 07:31:14', '2021-12-30 07:32:21', 30),
(3, 1, 'kiểm tra cơ bản 3', 20, 4, 6, 10, '2021-12-30 07:31:18', '2021-12-30 07:32:31', 30),
(4, 2, 'kiểm tra vòng lặp 1', 20, 4, 6, 10, '2021-12-30 07:31:40', '2021-12-30 07:31:40', 30),
(5, 2, 'kiểm tra vòng lặp 2', 20, 4, 6, 10, '2021-12-30 07:31:43', '2021-12-30 07:31:43', 30),
(6, 2, 'kiểm tra vòng lặp 3', 20, 4, 6, 10, '2021-12-30 07:31:46', '2021-12-30 07:31:46', 30),
(7, 3, 'kiểm tra hàm 1', 20, 4, 6, 10, '2021-12-30 07:31:55', '2021-12-30 07:31:55', 30),
(8, 3, 'kiểm tra hàm 2', 20, 4, 6, 10, '2021-12-30 07:31:58', '2021-12-30 07:31:58', 30),
(9, 3, 'kiểm tra hàm 3', 20, 4, 6, 10, '2021-12-30 07:32:00', '2021-12-30 07:32:00', 30),
(10, 3, 'khóa hàm 4', 20, 2, 6, 12, '2021-12-30 09:47:55', '2021-12-30 12:31:40', 30);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `image_url` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `coures_id` int(11) DEFAULT NULL,
  `create_day` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `image_url`, `question`, `is_active`, `level`, `coures_id`, `create_day`, `update_day`, `type`) VALUES
(1, NULL, 'htmlspecialchars(Chúng ta đặt JavaScript bên trong phần tử HTML nào?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-31 13:02:47', 'mutiple choice'),
(2, NULL, 'Cú pháp JavaScript chính xác để thay đổi nội dung của phần tử HTML dưới đây là gì? ', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-31 13:03:10', 'mutiple choice'),
(3, NULL, 'Đâu là nơi chính xác để chèn JavaScript?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-31 13:01:21', 'mutiple choice'),
(4, NULL, 'Cú pháp chính xác để tham chiếu đến tập lệnh bên ngoài có tên \"xxx.js\" là gì?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(7, NULL, 'Làm thế nào để viết câu lệnh IF để thực thi một số mã nếu \"i\" KHÔNG bằng 5?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(8, NULL, 'Làm thế nào để comment trong javaScript?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(9, NULL, 'Làm thế nào để chèn một bình luận có nhiều hơn một dòng?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(10, NULL, 'javaScript giống java?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-31 08:33:08', 'true_false'),
(11, NULL, 'Làm thế nào để khai báo 1 biến trong javaSrcipt?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-31 09:15:50', 'mutiple choice'),
(12, NULL, 'Toán tử nào được sử dụng để gán giá trị cho 1 biến?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(13, NULL, 'javaSrcipt có phân biệt chữ hoa, chữ thường?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-31 08:35:33', 'true_false'),
(14, NULL, 'Chọn những biến hợp lệ?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(15, NULL, 'Đâu là toán tử Not trong javaScript?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(16, NULL, 'biến “ var x= 2” thuộc kiểu dữ liệu nào?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(17, NULL, 'Đâu là phép nhân trong javascript?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(18, NULL, 'phép And ta sử dụng kí tự nào sau đây?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(19, NULL, 'Phép or sử dụng kí tự nào?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(20, NULL, 'Phép XOR sử dụng kí tự nào?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(21, NULL, 'Phép phủ định bit sử dụng kí tự nào?', '1', 1, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(22, NULL, 'Làm thế nào để bạn viết \"Hello World\" trong một hộp cảnh báo?', '1', 2, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(23, NULL, 'Làm thế nào để làm tròn số 7.25 thành số nguyên gần nhất?', '1', 2, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(24, NULL, 'cho đoạn code sau:\nif (hour < 18) {\n  greeting = \"Good day\";\n} else {\n  greeting = \"Good evening\";\n}\nkết quả nếu hour = 29?\n', '1', 2, 1, '2021-12-29 09:16:21', '2021-12-31 08:38:16', 'true_false'),
(25, NULL, 'cho đoạn code sau:\r\nif (hour < 18) {\r\n  greeting = \"Good day\";\r\n} else {\r\n  greeting = \"Good evening\";\r\n}\r\nkết quả nếu hour = 15?', '1', 3, 1, '2021-12-29 09:16:21', '2021-12-31 08:48:02', 'true_false'),
(26, NULL, 'cho đoạn code sau:\r\nif (time < 10) {\r\n  greeting = \"Good morning\";\r\n} else if (time < 20) {\r\n  greeting = \"Good day\";\r\n} else {\r\n  greeting = \"Good evening\";\r\n}\r\nkết quả nếu time = 40?\r\n', '1', 3, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(27, NULL, 'cho đoạn code sau:\r\nif (time < 10) {\r\n  greeting = \"Good morning\";\r\n} else if (time < 20) {\r\n  greeting = \"Good day\";\r\n} else {\r\n  greeting = \"Good evening\";\r\n}\r\nkết quả nếu time = 3?\r\n', '1', 3, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(28, NULL, 'cho đoạn code sau:\r\nif (time < 10) {\r\n  greeting = \"Good morning\";\r\n} else if (time < 20) {\r\n  greeting = \"Good day\";\r\n} else {\r\n  greeting = \"Good evening\";\r\n}\r\nkết quả nếu time = 15?\r\n', '1', 3, 1, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(29, NULL, 'for(var i = 0; i < 3; i++) { console.log(i); } \r\ncho kết quả là :\r\n', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(30, NULL, 'for(var i = 1; i < 5; i*=2) { console.log(i); } cho kết quả là :', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-31 07:12:07', 'mutiple choice'),
(31, NULL, 'for(var i = 5; i > 0; i-=2) { console.log(i); } \r\ncho kết quả là:\r\n', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(32, NULL, 'for(var i = 10; i > 1; i/=2) { console.log(i); } \r\ncho kết quả là :\r\n', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(33, NULL, 'var i = 0; while(i < 2) {console.log(i); i++;}', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-31 09:16:56', 'mutiple choice'),
(34, NULL, 'var i = 1; while(i < 10) {console.log(i); i*=4;}\r\n', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(35, NULL, 'var i = 12; while(i > 1) {console.log(i); i/=3;}\r\n', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(36, NULL, 'var i = 10; while(i > 6) {console.log(i); i--;}', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(37, NULL, 'var i = 10; while(i > 0) {console.log(i); i-=6;}', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(38, NULL, 'var i = 10; do{console.log(i);i++;} while( i > 10 && i < 12)', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(39, NULL, 'var i = 10; do{console.log(i);i++;} while( i > 5 && i < 9)', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(40, NULL, 'var i = 1; do{console.log(i);i*=5;} while( i<100)', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-31 13:03:31', 'mutiple choice'),
(41, NULL, 'var i = 8; do{console.log(i); i/=2;} while( i>1)', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(42, NULL, 'var i = 10; do{console.log(i);i--;} while( i > 8)', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(43, NULL, 'var i = 10; do{console.log(i);i-=5;} while( i >0)', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(44, NULL, 'var i = 10; do{console.log(i);i-=7;} while( i > 0)', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(45, NULL, 'var s = 0;\r\nfor(var i = 0; i < 3; i++) {s += i; }\r\n       Console.log(s);\r\ncho kết quả là :\r\n\r\n', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(46, NULL, 'var s = 0;\r\n for(var i = 1; i < 5; i++) {s += i; }\r\nConsole.log(s);\r\ncho kết quả là :\r\n', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(47, NULL, 'var s = 10;\r\n for(var i = 0; i < 3; i++) {s -= i; }\r\nConsole.log(s);\r\ncho kết quả là :\r\n', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(48, NULL, 'var s = 0;\r\n for(var i = 0; i < 3; i++) {s *= i; }\r\nConsole.log(s);\r\ncho kết quả là :\r\n', '1', 1, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(49, NULL, 'for(var i = 0; i < 5; i++) \r\n{ console.log(i); if(i>=3) break;} \r\ncho kết quả là :\r\n', '1', 2, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(50, NULL, 'for(var i = 0; i < 5; i++) \r\n{ console.log(i); if(==3) continue;} \r\ncho kết quả là :\r\n', '1', 2, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(51, NULL, 'var arr=[10, 20, \'hi\', ,{}];\r\n\r\narr.forEach(function(item, index){\r\n    console.log(\' arr[\'+index+\'] is \'+ item);\r\n});\r\nCó kết quả là:', '1', 2, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(52, NULL, 'let i = 0;\r\nlet j = 10;\r\ncheckiandj:\r\n  while (i < 4) {\r\n    i += 1;\r\n    checkj:\r\n      while (j > 4) {\r\n     \r\n        j -= 1;\r\n        if ((j % 2) === 0) {\r\n          continue checkj;\r\n        }\r\n ', '1', 3, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(53, NULL, 'function* makeRangeIterator(start = 0, end = 100, step = 1) {\r\n    let iterationCount = 0;\r\n    for (let i = start; i < end; i += step) {\r\n        iterationCount++;\r\n        yield i;\r\n    }\r\n    retur', '1', 3, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(54, NULL, 'let i = 0;\r\nlet n = 0;\r\nwhile (i < 5) {\r\n  i++;\r\n  if (i === 3) {\r\n     // continue;\r\n  }\r\n  n += i;\r\n  console.log(n);\r\n}\r\nCó kết quả là ?\r\n', '1', 3, 2, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(55, NULL, 'Làm cách nào để gọi một hàm “myFunction” trong JavaScript?', '1', 1, 3, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(56, NULL, 'Cách nào tạo một hàm trong JavaScript?', '1', 1, 3, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(57, NULL, 'hàm alert() trong JavaScript dùng để làm gì ?', '1', 1, 3, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(58, NULL, ' hàm confirm() trong JavaScript dùng để làm gì ?', '1', 1, 3, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(59, NULL, 'hàm prompt() trong JavaScript dùng để làm gì ?', '1', 1, 3, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(60, NULL, 'function map(f, a) {\r\n  let result = []; // Create a new Array\r\n  let i; // Declare variable\r\n  for (i = 0; i != a.length; i++)\r\n    result[i] = f(a[i]);\r\n  return result;\r\n}\r\nconst f = function(x) {\r', '1', 2, 3, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(61, NULL, 'function outside(x) {\r\n  function inside(y) {\r\n    return x + y;\r\n  }\r\n  return inside;\r\n}\r\n \r\nfn_inside = outside(3); \r\n', '1', 3, 3, '2021-12-29 09:16:21', '2021-12-29 09:16:21', 'mutiple choice'),
(62, NULL, 'const array1 = [\'a\', \'b\', \'c\'];\r\narray1.forEach(element => console.log(element));\r\ncó kết quả là:\r\n', '1', 2, 2, '2021-12-30 04:20:02', '2021-12-30 04:20:02', 'fill'),
(63, NULL, 'var num = [1, 5, 10, 15];\r\nvar doubles = num.map(function(x) {\r\n   return x * 2;\r\n});\r\nCó kết quả là:\r\n', '1', 2, 2, '2021-12-30 04:20:02', '2021-12-30 04:20:02', 'fill'),
(64, NULL, 'var num = [1, 5, 10, 15];\r\nvar doubles = num.map(function(x) {\r\n   return x * 3;\r\n});\r\nCó kết quả là:\r\n', '1', 2, 2, '2021-12-30 04:20:02', '2021-12-30 04:20:02', 'fill'),
(65, NULL, 'var obj = {a: 1, b: 2, c: 3};\r\n\r\nfor (const prop in obj) {\r\n  console.log(`${obj[prop]}`);\r\n}\r\nCó kết quả là :\r\n', '1', 2, 2, '2021-12-30 04:20:02', '2021-12-30 04:20:02', 'fill'),
(66, NULL, 'const iterable = [10, 20, 30];\r\nfor (const value of iterable) {\r\n  console.log(value);\r\n} có kết quả là\r\n', '1', 2, 2, '2021-12-30 04:50:14', '2021-12-30 04:50:14', 'fill'),
(67, NULL, 'let x = 0;\r\nlet z = 0;\r\nlabelCancelLoops: while (true) {\r\n\r\n  x += 1;\r\n  z = 1;\r\n  while (true) {\r\n    z += 1;\r\n    if (z === 10 && x === 10) {\r\n      break labelCancelLoops;\r\n    } else if (z === 10) {\r\n      break;\r\n    }\r\n  }\r\n}\r\nconsole.log(z);\r\nz bằng bao nhiêu ?\r\n', '1', 3, 2, '2021-12-30 04:50:14', '2021-12-30 04:50:14', 'fill'),
(68, NULL, 'let i = 0;\r\nlet n = 0;\r\nwhile (i < 5) {\r\n  i++;\r\n  if (i === 3) {\r\n    continue;\r\n  }\r\n  n += i;\r\n  console.log(n);\r\n} kết quả là :\r\n', '1', 3, 2, '2021-12-30 04:50:14', '2021-12-30 04:50:14', 'fill'),
(69, NULL, 'function square(number) {\r\n  return number * number;\r\n}\r\nconsole.log(square(5));\r\nKết quả là?\r\n', '1', 1, 3, '2021-12-30 05:02:16', '2021-12-30 05:02:16', 'fill'),
(70, NULL, 'function square(number) {\r\n  return number - number;\r\n}\r\nconsole.log(square(5));\r\nKết quả là?\r\n', '1', 1, 3, '2021-12-30 05:02:16', '2021-12-30 05:02:16', 'fill'),
(71, NULL, 'function square(number) {\r\n  return number + number;\r\n}\r\nconsole.log(square(5));\r\nKết quả là\r\n?', '1', 1, 3, '2021-12-30 05:02:16', '2021-12-30 05:02:16', 'fill'),
(72, NULL, 'function square(a, b) {\r\n  return a * b;\r\n}\r\nconsole.log(square(5, 10));\r\nKết quả là \r\n?', '1', 1, 3, '2021-12-30 05:02:16', '2021-12-30 05:02:16', 'fill'),
(73, NULL, 'function square(a, b) {\r\n  return a - b;\r\n}\r\nconsole.log(square(5, 10));\r\nKết quả là \r\n?', '1', 1, 3, '2021-12-30 05:02:16', '2021-12-30 05:02:16', 'fill'),
(74, NULL, 'function square(a, b) {\r\n  return a / b;\r\n}\r\nconsole.log(square(5, 1));\r\nKết quả là ?', '1', 1, 3, '2021-12-30 05:08:23', '2021-12-30 05:08:23', 'fill'),
(75, NULL, 'function inthongbao(a, b) { alert(\"Hello World!\");}\r\ninthongbao();\r\nKết quả là\r\n', '1', 1, 3, '2021-12-30 05:08:23', '2021-12-30 05:08:23', 'fill'),
(76, NULL, 'function max(a, b) {\r\n  if( a>b )   console.log(a);\r\nelse  console.log(b); }\r\nmax(2,2);\r\nKết quả là \r\n', '1', 1, 3, '2021-12-30 05:08:23', '2021-12-30 05:08:23', 'fill'),
(77, NULL, 'function min(a, b) {  if( a<b )   console.log(a);else  console.log(b); }max(5,2);Kết quả là', '1', 1, 3, '2021-12-30 05:08:23', '2021-12-31 09:15:57', 'fill'),
(78, NULL, 'function check(a,) {\r\n  if( a%2 == 0)   console.log(“true”);\r\nelse  console.log(“false”); }\r\ncheck(10);\r\nKết quả là\r\n', '1', 1, 3, '2021-12-30 05:08:23', '2021-12-30 05:08:23', 'fill'),
(79, NULL, 'function work(a) {\r\n  if( a>1 )   console.log(“chào các bạn”)\r\nwork(5);\r\nKết quả là?', '1', 1, 3, '2021-12-30 05:14:32', '2021-12-30 05:14:32', 'fill'),
(80, NULL, 'const factorial = function fac(n) { return n < 2 ? 1 : n * fac(n - 1) }\r\n\r\nconsole.log(factorial(3))\r\ncó kết quả là \r\n', '1', 2, 3, '2021-12-30 05:14:32', '2021-12-30 05:14:32', 'fill'),
(81, NULL, 'const factorial = function fac(n) { return n < 2 ? 1 : n * fac(n - 1) }console.log(factorial(3))có kết quả là ?', '1', 2, 3, '2021-12-30 05:23:27', '2021-12-31 09:16:50', 'fill'),
(82, NULL, 'const factorial = function fac(n) { return n < 2 ? 1 : n * fac(n - 1) }\r\n\r\nconsole.log(factorial(3))\r\ncó kết quả là\r\n', '1', 2, 3, '2021-12-30 05:23:27', '2021-12-30 05:23:27', 'fill'),
(83, NULL, 'const factorial = function fac(n) { return n < 2 ? 1 : n * fac(n - 1) }\r\n\r\nconsole.log(factorial(3))\r\ncó kết quả là \r\n', '1', 2, 3, '2021-12-30 05:23:27', '2021-12-30 05:23:27', 'fill'),
(84, NULL, 'function factorial(n) {\r\n  if ((n === 0) || (n === 1))\r\n    return 1;\r\n  else\r\n    return (n * factorial(n - 1));\r\n}\r\nConsole.log(factorial(5));\r\ncó kết quả là\r\n', '1', 2, 3, '2021-12-30 05:23:27', '2021-12-30 05:23:27', 'fill'),
(85, NULL, 'function factorial(n) {\r\n  if ((n === 0) || (n === 1))\r\n    return 1;\r\n  else\r\n    return (n * factorial(n - 1));\r\n}\r\nConsole.log(factorial(5));\r\ncó kết quả là \r\n', '1', 2, 3, '2021-12-30 05:23:27', '2021-12-30 05:23:27', 'fill'),
(86, NULL, 'function loop(x) {\r\n  if (x >= 10) // \"x >= 10\" is the exit condition (equivalent to \"!(x < 10)\")\r\n    return;\r\n  // do stuff\r\n  loop(x + 1); // the recursive call\r\n}\r\n\r\nconsole.log(loop(1));có kết quả là \r\n', '1', 2, 3, '2021-12-30 05:23:27', '2021-12-30 05:23:27', 'fill'),
(87, NULL, 'function foo(i) {\r\n  if (i < 0)\r\n    return;\r\n  console.log(\'begin: \' + i);\r\n  foo(i - 1);\r\n}\r\nfoo(0);\r\ncó kết quả là\r\n', '1', 2, 3, '2021-12-30 05:23:27', '2021-12-30 05:23:27', 'fill'),
(88, NULL, 'function addSquares(a, b) {  function square(x) {    return x * x;  }  return square(a) + square(b);}a = addSquares(2, 3); có kết quả là ', '1', 2, 3, '2021-12-30 05:23:27', '2021-12-31 09:16:44', 'fill'),
(89, NULL, 'function Name(a, b) {\r\n  this.a = a;\r\n  this.b = b;\r\n}\r\n\r\nconst me = Name(\"Vuong\", \"Nguyen\");\r\n\r\nconsole.log(!(a.length - window.a.length));\r\ncó kết quả là?', '1', 3, 3, '2021-12-30 06:09:46', '2021-12-30 06:09:46', 'fill'),
(90, NULL, 'const x = function (...x) {  let k = (typeof x).length;  let y = () => \"freetut\".length;  let z = { y: y };  return k - z.y();};console.log(Boolean(x()));có kết quả là?', '1', 3, 3, '2021-12-30 06:09:46', '2021-12-31 09:17:03', 'fill'),
(91, NULL, '(function js(x) {\r\n  const y = (j) => j * x;\r\n\r\n  console.log(y(s()));\r\n\r\n  function s() {\r\n    return j();\r\n  }\r\n\r\n  function j() {\r\n    return x ** x;\r\n  }\r\n})(3);\r\nCó kết quả là?', '1', 3, 3, '2021-12-30 06:09:46', '2021-12-30 06:09:46', 'fill'),
(92, NULL, 'var tip = 100;(function () {  console.log(\"I have $\" + husband());  function wife() {    return tip * 2;  }  function husband() {    return wife() / 2;  }  var tip = 10;})();Có kết quả là?', '1', 3, 3, '2021-12-30 06:09:46', '2021-12-31 12:53:32', 'fill'),
(93, NULL, 'var x = 1;\r\n\r\n(() => {\r\n  x += 1;\r\n  ++x;\r\n})();\r\n((y) => {\r\n  x += y;\r\n  x = x % y;\r\n})(2);\r\n(() => (x += x))();\r\n(() => (x *= x))();\r\n\r\nconsole.log(x);\r\ncó kết quả là ?', '1', 3, 3, '2021-12-30 06:09:46', '2021-12-30 06:09:46', 'fill');

-- --------------------------------------------------------

--
-- Table structure for table `question_choices`
--

CREATE TABLE `question_choices` (
  `choice_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `is_right_choice` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `choice` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_choices`
--

INSERT INTO `question_choices` (`choice_id`, `question_id`, `is_right_choice`, `choice`) VALUES
(12, 4, '0', '<script href=”xxx.js”>'),
(13, 4, '0', '<script name=”xxx.js”>'),
(14, 4, '1', '<script src=”xxx.js”>'),
(21, 7, '0', 'if i< >5'),
(22, 7, '1', 'if (i!=5)'),
(23, 7, '0', 'if(i< >5)'),
(24, 7, '0', 'if i!=5 then'),
(25, 8, '0', '<!---- >'),
(26, 8, '0', '\"\"'),
(27, 8, '1', '//'),
(28, 9, '0', '//….//'),
(29, 9, '0', '<!   >'),
(30, 9, '1', '/*  */'),
(31, 10, '1', 'False'),
(32, 10, '0', 'True'),
(36, 12, '0', '*'),
(37, 12, '1', '='),
(38, 12, '0', '-'),
(39, 12, '0', 'x'),
(40, 13, '1', 'có'),
(41, 13, '0', 'không'),
(42, 14, '1', 'Var a=33;'),
(43, 14, '0', 'Variable a=33;'),
(44, 14, '1', 'Var Name;'),
(45, 14, '1', 'Var Name=\"\";'),
(46, 15, '0', '>'),
(47, 15, '0', '<'),
(48, 15, '0', '='),
(49, 15, '1', '!='),
(50, 16, '0', 'String'),
(51, 16, '0', 'boolean'),
(52, 16, '1', 'Number'),
(53, 17, '1', '*'),
(54, 17, '0', '='),
(55, 17, '0', '-'),
(56, 17, '0', 'x'),
(57, 18, '1', '&'),
(58, 18, '0', '|'),
(59, 18, '0', '^'),
(60, 18, '0', '~'),
(61, 19, '0', '&'),
(62, 19, '1', '|'),
(63, 19, '0', '^'),
(64, 19, '0', '~'),
(65, 20, '0', '&'),
(66, 20, '0', '|'),
(67, 20, '1', '^'),
(68, 20, '0', '~'),
(69, 21, '0', '&'),
(70, 21, '0', '|'),
(71, 21, '0', '^'),
(72, 21, '1', '~'),
(73, 22, '0', 'alertBox(\"Hello World”);'),
(74, 22, '0', 'msg(\"Hello World”);'),
(75, 22, '0', 'msgBox(\"Hello World”);'),
(76, 22, '1', 'alert(\"Hello World”);'),
(77, 23, '1', 'Math.round(7.25)'),
(78, 23, '0', 'round(7.25)'),
(79, 23, '0', 'rnd(7.25)'),
(80, 23, '0', 'Math.rnd(7.25)'),
(81, 24, '1', 'Good day'),
(82, 24, '0', 'Good evening'),
(83, 25, '1', 'Good evening'),
(84, 25, '0', 'Good day'),
(85, 26, '0', 'Good day'),
(86, 26, '0', 'Good morning'),
(87, 26, '1', 'Good evening'),
(88, 27, '1', 'Good morning'),
(89, 27, '0', 'Good day'),
(90, 27, '0', 'Good evening'),
(91, 28, '0', 'Good morning'),
(92, 28, '1', 'Good day'),
(93, 28, '0', 'Good evening'),
(94, 29, '1', '0 1 2 3'),
(95, 29, '0', '2 24 5 5'),
(96, 29, '0', '1 2 3 4'),
(97, 29, '0', '1 7'),
(102, 31, '1', '5 3 1'),
(103, 31, '0', '1 4 1'),
(104, 31, '0', '2 24 45'),
(105, 31, '0', '5 7 0'),
(106, 32, '1', '8 4 2'),
(107, 32, '0', '1 4 1'),
(108, 32, '0', '2 24 45'),
(109, 32, '0', '5 7 0'),
(114, 34, '1', '1 4 8'),
(115, 34, '0', '1 4 1'),
(116, 34, '0', '2 24 45'),
(117, 34, '0', '5 7 0'),
(118, 35, '1', '12 6 3'),
(119, 35, '0', '1 4 1'),
(120, 35, '0', '2 24 45'),
(121, 35, '0', '5 7 0'),
(122, 36, '1', '10 9 8 7'),
(123, 36, '0', '1 4 1'),
(124, 36, '0', '2 24 45'),
(125, 36, '0', '5 7 0'),
(126, 37, '1', '10 4'),
(127, 37, '0', '1 4 1'),
(128, 37, '0', '2 24 45'),
(129, 37, '0', '5 7 0'),
(130, 38, '1', '10 11'),
(131, 38, '0', '1 4 1'),
(132, 38, '0', '2 24 45'),
(133, 38, '0', '5 7 0'),
(134, 39, '1', '6 7 8'),
(135, 39, '0', '1 4 1'),
(136, 39, '0', '2 24 45'),
(137, 39, '0', '5 7 0'),
(142, 41, '1', '8 4 2'),
(143, 41, '0', '1 4 1'),
(144, 41, '0', '2 24 45'),
(145, 41, '0', '85 7 0'),
(146, 42, '1', '10 9'),
(147, 42, '0', '1 4 1'),
(148, 42, '0', '2 24 45'),
(149, 42, '0', '5 7 0'),
(150, 43, '1', '10 5'),
(151, 43, '0', '1 4 1'),
(152, 43, '0', '2 24 45'),
(153, 43, '0', '5 7 0'),
(154, 44, '1', '10 3'),
(155, 44, '0', '1 4 1'),
(156, 44, '0', '2 24 45'),
(157, 44, '0', '5 7 0'),
(158, 45, '0', '2'),
(159, 45, '0', '1'),
(160, 45, '0', '3'),
(161, 45, '0', '4'),
(162, 46, '1', '10'),
(163, 46, '0', '15'),
(164, 46, '0', '23'),
(165, 46, '0', '24'),
(166, 47, '1', '7'),
(167, 47, '0', '1'),
(168, 47, '0', '2'),
(169, 47, '0', '4'),
(170, 48, '1', '0'),
(171, 48, '0', '1'),
(172, 48, '0', '2'),
(173, 48, '0', '4'),
(174, 49, '1', '0 1 2'),
(175, 49, '0', '1 2 3 4'),
(176, 49, '0', '2 24 5 5'),
(177, 49, '0', '1 7 8 4'),
(178, 50, '1', '0 1 2 4'),
(179, 50, '0', '1 2 3 4'),
(180, 50, '0', '2 24 5 5'),
(181, 50, '0', '1 7 8 4'),
(182, 51, '0', 'arr[0] is 10'),
(183, 51, '0', 'arr[1] is 20'),
(184, 51, '0', 'arr[2] is hi'),
(185, 51, '0', 'arr[4] is [object Object'),
(186, 52, '1', '4 4'),
(187, 52, '1', '5 0'),
(188, 52, '1', '5 1 '),
(189, 52, '1', '7 0'),
(190, 53, '1', 'undefined'),
(191, 53, '1', '5'),
(192, 53, '1', '15'),
(193, 53, '1', '25'),
(194, 54, '1', '1,3,6,10,15'),
(195, 54, '0', '2,3,6,10,15'),
(196, 54, '0', '1,3,5,10,15'),
(197, 54, '0', '1,3,4,10,15'),
(198, 55, '0', 'call myFunction()'),
(199, 55, '0', 'call function myFunction()'),
(200, 55, '0', 'Myfunction()'),
(201, 55, '1', 'myFunction()'),
(202, 56, '0', 'function:myFunction()'),
(203, 56, '1', 'function myFunction()'),
(204, 56, '0', 'function = myFunction()'),
(205, 56, '0', 'fUnction myFunction()'),
(206, 57, '1', 'có nhiệm vụ in một thông báo popup'),
(207, 57, '0', 'có nhiệm vụ lưu trữ dữ liệu'),
(208, 57, '0', 'có nhiệm vụ in một thông báo popup có yes '),
(209, 57, '0', 'không tồn tại hàm này'),
(210, 58, '0', ', có nhiệm vụ in một thông báo popup'),
(211, 58, '0', 'có nhiệm vụ lưu trữ dữ liệu'),
(212, 58, '1', 'có nhiệm vụ in một thông báo popup có yes và no'),
(213, 58, '0', 'không tồn tại hàm này'),
(214, 59, '0', 'có nhiệm vụ in một thông báo popup'),
(215, 59, '0', ', hàm dùng để lấy thông tin từ người dùng'),
(216, 59, '0', 'có nhiệm vụ in một thông báo popup có yes và no'),
(217, 59, '0', 'không tồn tại hàm này '),
(218, 60, '1', '[0, 1, 8,125, 1000];'),
(219, 60, '1', '[0, 2, 8,125, 1000];'),
(220, 60, '1', '[0, 3, 8,125, 1000];'),
(221, 60, '1', '[0, 1, 4,125, 1000];'),
(235, 4, '0', '<script href=”xxx.java”>'),
(252, 30, '1', '1 2 4'),
(253, 30, '0', '1 4 1'),
(254, 30, '0', '2 24 45'),
(255, 30, '0', '5 7 0'),
(268, 8, '0', '<!---- !>'),
(269, 9, '0', '//….///'),
(271, 16, '0', 'class'),
(272, 26, '0', 'Good mornning'),
(273, 27, '0', 'Good days'),
(274, 28, '0', 'Good evenings'),
(275, 35, '0', '5 7 11'),
(277, 61, '0', '1, 2, 3 and 1, 2, 3'),
(278, 61, '1', '3, 3, 3 and 3, 4, 5'),
(279, 61, '0', '3, 3, 3 and 1, 2, 3'),
(280, 61, '0', '1, 2, 3 and 3, 3, 3'),
(281, 62, '1', 'a b c'),
(282, 63, '1', '(4) [2, 10, 20, 30]'),
(283, 64, '1', '(4) [3, 15, 40, 45]'),
(284, 65, '1', '1 2 3'),
(285, 66, '1', '10 20 30'),
(286, 67, '1', 'z = 10'),
(287, 68, '1', '1 3 7 12'),
(288, 69, '1', '25'),
(289, 70, '1', '0'),
(290, 71, '1', '10'),
(291, 72, '1', '50'),
(292, 73, '1', '-5'),
(293, 74, '1', '5'),
(294, 75, '1', 'Hello World!'),
(295, 76, '1', '2'),
(296, 77, '1', '2'),
(297, 78, '1', 'true'),
(298, 79, '1', 'chào các bạn'),
(299, 80, '1', '6'),
(300, 81, '1', '6'),
(301, 82, '1', '6'),
(302, 83, '1', '6'),
(303, 84, '1', '120'),
(304, 85, '1', '120'),
(305, 86, '1', 'undefined'),
(306, 87, '1', '0'),
(307, 88, '1', '13'),
(308, 89, '1', 'true'),
(309, 90, '1', 'true'),
(310, 91, '1', '81'),
(311, 92, '1', 'I have $NaN;'),
(312, 93, '1', '4'),
(313, 11, '1', 'var Name;'),
(314, 11, '0', 'v Name;'),
(315, 11, '0', 'variable Name'),
(316, 11, '0', 'var1 Name'),
(317, 33, '1', '0 1'),
(318, 33, '0', '1 4 1'),
(319, 33, '0', '2 24 45'),
(320, 33, '0', '5 7 0'),
(463, 3, '1', 'Both the <head> section and the <body> section are correct'),
(464, 3, '0', 'The <body> section'),
(465, 3, '0', 'The <head> section'),
(466, 3, '0', 'The <header> section'),
(475, 1, '1', '<scripting>'),
(476, 1, '0', '<script>'),
(477, 1, '0', '<js>'),
(478, 1, '0', '<javascript>'),
(487, 2, '0', '#demo.innerHTML = '),
(488, 2, '0', 'document.getElement('),
(489, 2, '1', 'document.getElementById('),
(490, 2, '0', 'document.getElementByName('),
(491, 40, '0', '1 5 25 '),
(492, 40, '0', '1 4 1 '),
(493, 40, '1', '2 24 45'),
(494, 40, '0', '5 7 1');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `scores` float DEFAULT NULL,
  `create_day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `exam_id`, `user_id`, `scores`, `create_day`) VALUES
(1, 1, 16, 9.4, '2021-12-30 00:24:58'),
(2, 1, 16, 8.2, '2021-12-30 00:36:49'),
(3, 1, 16, 8.2, '2021-12-30 00:36:49'),
(4, 1, 16, 8.2, '2021-12-30 00:36:49'),
(5, 2, 17, 2.2, '2021-12-30 00:36:49'),
(6, 3, 17, 4.2, '2021-12-30 00:36:49'),
(7, 4, 18, 6.2, '2021-12-30 00:36:49'),
(8, 5, 18, 8, '2021-12-30 00:36:49'),
(9, 6, 19, 5.2, '2021-12-30 00:36:49'),
(10, 7, 16, 8.2, '2021-12-30 00:36:49'),
(11, 8, 16, 8.2, '2021-12-30 00:36:49'),
(12, 9, 17, 2.2, '2021-12-30 00:36:49'),
(13, 7, 17, 4.2, '2021-12-30 00:36:49'),
(14, 8, 18, 6.2, '2021-12-30 00:36:49'),
(15, 9, 18, 8, '2021-12-30 00:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_pass` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `create_day` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `user_name`, `user_pass`, `level`, `create_day`, `update_day`) VALUES
(1, 'hà văn dũng', 'dunghv', 'messi', 1, '2021-12-29 15:10:37', '2021-12-31 04:48:05'),
(2, 'trịnh minh hoàng', 'hoangtm', '1234', 1, '2021-12-30 03:28:29', '2021-12-31 04:35:23'),
(16, 'nguyễn văn A', 'user1', '1234', 0, '2021-12-30 04:41:04', '2021-12-31 04:35:23'),
(17, 'Nguyễn Văn B', 'user2', '1234', 0, '2021-12-30 07:25:51', '2021-12-31 04:35:23'),
(18, 'Nguyễn Văn C', 'user3', '1234', 0, '2021-12-30 07:25:57', '2021-12-31 04:35:23'),
(19, 'Nguyễn Văn D', 'user4', '1234', 0, '2021-12-30 07:26:04', '2021-12-31 04:35:23'),
(20, 'Nguyễn Văn E', 'user5', '1234', 0, '2021-12-30 07:26:09', '2021-12-31 04:35:23'),
(28, 'nguyễn văn F', 'fnv', '1234', 0, '2021-12-31 04:03:40', '2021-12-31 04:35:23'),
(32, 'lê ngô tiến', 'tienln123', '1234', 0, '2021-12-31 04:27:52', '2021-12-31 05:34:10'),
(33, 'lê ngô tiến', 'tienln', '1234', 0, '2021-12-31 04:29:15', '2021-12-31 12:51:12'),
(34, 'lưu quang linh', 'linhql', '123', 0, '2021-12-31 04:30:12', '2021-12-31 14:03:57'),
(39, 'Trịnh thị hiền', 'hientt', '12345', 1, '2021-12-31 09:32:41', '2021-12-31 09:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_question_answers`
--

CREATE TABLE `user_question_answers` (
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `choice_id` int(11) DEFAULT NULL,
  `is_right` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `questions_ibfk_1` (`coures_id`);

--
-- Indexes for table `question_choices`
--
ALTER TABLE `question_choices`
  ADD PRIMARY KEY (`choice_id`),
  ADD KEY `question_choices_ibfk_1` (`question_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_question_answers`
--
ALTER TABLE `user_question_answers`
  ADD PRIMARY KEY (`user_id`,`question_id`),
  ADD KEY `user_question_answers_ibfk_2` (`question_id`),
  ADD KEY `user_question_answers_ibfk_3` (`choice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `question_choices`
--
ALTER TABLE `question_choices`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`coures_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_choices`
--
ALTER TABLE `question_choices`
  ADD CONSTRAINT `question_choices_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_question_answers`
--
ALTER TABLE `user_question_answers`
  ADD CONSTRAINT `user_question_answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_question_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_question_answers_ibfk_3` FOREIGN KEY (`choice_id`) REFERENCES `question_choices` (`choice_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
