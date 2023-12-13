<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		*{margin: 0;}	
		.wrapper{
			width: 1460px;
			margin: 0px auto;
			background: red;
			font-size: 14px;
			line-height: 1.5 line;
		}
		header{
			height: 100px;
			background: lime; ;
			
			
		}
		h1{text-align: center;}
		.nav-menu ul{
			height: 40px;
			background: #4f4590;
		}
		a{text-decoration: none; 
			color: white;}
		.nav-menu>ul>li{
			float: left;
			list-style: none;
			padding: 10px 60px;
		} 
		.nav-menu>ul>li:hover{
			display: block;
			background: cyan;
		}
		.article{
			width: 20%;
			background-color: #666;
			float: left;
			height: 400px;
		}
		.article>ul{padding: 0px;}
		.article>ul>li{
			list-style: none;
			padding: 10px 5px;
			border: #B1B1B1 dotted 1px;
			
		}
		.article>ul>li:hover{
			display: block;
			background: #939393;
		}
		table{width: 80%;padding-top: 20px;
		}
		
		.aside{
			height: 400px;
			background-color: #f3f1f0;
		}
		footer{
			height: 70px;
			background: #4f3590;
		}
		
	</style>
	<link rel="stylesheet" href="http://localhost:8080/71DCTT24_MVC/Public/css/bootstrap.min.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<img src="http://localhost/71DCTT12_MVC//Public/Images/logo.png"
			
		</header>
		<nav class="nav-menu">
			<ul >
				<li><a href="http://localhost/71DCTT12_MVC/giaodien/">Trang chủ</a></li>
				<li><a href="">Đăng nhập</a></li>
				<li><a href="">Chức năng</a></li>
				<li><a href="">Thoát</a></li>
				<li><a href="">Liên hệ</a></li>
			</ul>
		</nav>
		<div class="article">
			<ul>
				<li><a href="http://localhost/71DCTT12_MVC/Sinhvien">Thêm thông học phí</a></li>
				<li><a href="http://localhost/71DCTT12_MVC/DSSinhvien">Tìm kiếm thông tin học phí</a></li>
				<li><a href="http://localhost/71DCTT12_MVC/DSMonhoc">Tìm kiếm thông tin môn học</a></li>
				<li><a href="http://localhost/71DCTT12_MVC/Monhoc">Thêm thông tin môn học</a></li>
			</ul>
		</div>
		<div class="aside">
			<?php
				include_once './MVC/Views/Pages/'.$data['page'].'.php';
			?>
		</div>
	</div>
</body>
</html>