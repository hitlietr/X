<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .col1{width: 15%; color: blue; padding-left: 20px;}
        .col2{width: 35%;}
        .dd1{width: 100%; height: 22px;}
        .dd2{width: 100%;height: 26px;}
        th,tr{height: 30px;}

    </style>
</head>
<body>
    <form method="POST" action="http://localhost/71DCTT12_MVC/DSMonhoc/TimkiemMH">
        <table>
            <tr>
                <td colspan="4" style="text-align: center;">
                    <h2>THÔNG TIN TÌM KIẾM SINH VIÊN</h2>
                </td>
            </tr>
            <tr>
                <td class="col1">Mã môn học:</td>
                <td class="col2">
                    <input type="text" name="txtMamh" class="dd1">
                </td>
                <td class="col1">Tên môn</td>
                <td class="col2">
                    <input type="text" name="txtTenmh" class="dd1">
                </td>
            </tr>
            <tr>
            <td class="col1">Số tín chỉ:</td>
                <td class="col2">
                    <input type="text" name="txtSotin" class="dd1">
                </td>
                <td class="col1">Tiền học:</td>
                <td class="col2">
                    <input type="text" name="txtTienhoc" class="dd1">
                </td>
                <tr>
                    <td colspan="4" style="text-align: center;">
                        <input type="submit" name="btnTimkiem" value="Tìm kiếm">
                    </td>
                </tr>
            </tr>
        </table>
        <table border="1" cellspacing="0">
            <tr style="background: violet;">
                <th>Mã môn học</th>
                <th>Tên môn</th>
                <th>Số tín</th>
                <th>Tiền học</th>
            </tr>
            <?php
                if(isset($data['dulieu'])){
                    while($row1=mysqli_fetch_array($data['dulieu'])){
            ?>
               <tr>                     
                    <td><?php echo $row1['Mamh'] ?></td>
                    <td><?php echo $row1['Tenmh'] ?></td>
                    <td><?php echo $row1['Sotin'] ?></td>
                    <td><?php echo $row1['Tienhoc'] ?></td>
                    <td>
                        <a href="http://localhost/71DCTT12_MVC/DSMonhoc/SuaMH/<?php echo $row1['Mamh']?>" style="color: blue;">Sửa</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="http://localhost/71DCTT12_MVC/DSMonhoc/XoaMH/<?php echo $row1['Mamh']?>" style="color: blue;">Xóa</a>
                    </td>
                </tr>
            <?php
                    }
                }
            ?>
        </table>
    </form>
</body>
</html>