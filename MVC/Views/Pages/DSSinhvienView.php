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
    <form method="POST" action="http://localhost/71DCTT12_MVC/DSSinhvien/TimkiemSV">
        <table>
            <tr>
                <td colspan="4" style="text-align: center;">
                    <h2>THÔNG TIN TÌM KIẾM SINH VIÊN</h2>
                </td>
            </tr>
            <tr>
                <td class="col1">Mã hóa đơn:</td>
                <td class="col2">
                    <input type="text" name="txtMahd" class="dd1">
                </td>
                <td class="col1">Mã sinh viên:</td>
                <td class="col2">
                    <input type="text" name="txtMasv" class="dd1">
                </td>
            </tr>
            <tr>
                <td class="col1">Môn học:</td>
                <td class="col2">
                <select class="dd2" name="ddlMamh">
                        <option value="">--Chọn môn--</option>
                        <?php
                            if(isset($data['result2'])){
                                while($row=mysqli_fetch_assoc($data['result2'])){
                                    echo '<option value='.$row['Mamh'].'>'.$row['Mamh'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </td>
                <td class="col1">Lớp:</td>
                <td class="col2">
                    <select class="dd2" name="ddlLophoc">
                        <option value="">--Chọn lớp--</option>
                        <?php
                            if(isset($data['result1'])){
                                while($row=mysqli_fetch_assoc($data['result1'])){
                                    echo '<option value='.$row['Malop'].'>'.$row['Tenlop'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </td>
                <tr>
                    <td colspan="4" style="text-align: center;">
                        <input type="submit" name="btnTimkiem" value="Tìm kiếm">
                        <button type="submit" name="btnXuatexcel">Xuất</button>
                    </td>
                </tr>
            </tr>
        </table>
        <table border="1" cellspacing="0">
            <tr style="background: violet;">
                <th>Mã hóa đơn</th>
                <th>Mã sinh viên</th>
                <th>Họ và tên</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Mã môn</th>
                <th>Tình trạng</th>
                <th></th>
            </tr>
            <?php
                if(isset($data['dulieu'])){
                    while($row1=mysqli_fetch_array($data['dulieu'])){
            ?>
               <tr>                     
                    <td><?php echo $row1['Mahd'] ?></td>
                    <td><?php echo $row1['Masv'] ?></td>
                    <td><?php echo $row1['Hoten'] ?></td>
                    <td><?php echo $row1['Malop'] ?></td>
                    <td><?php echo $row1['Tenlop'] ?></td>
                    <td><?php echo $row1['Mamh'] ?></td>
                    <td><?php echo $row1['Tinhtrang'] ?></td>

                    <td>
                        <a href="http://localhost/71DCTT12_MVC/DSSinhvien/SuaSV/<?php echo $row1['Mahd']?>" style="color: blue;">Sửa</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="http://localhost/71DCTT12_MVC/DSSinhvien/XoaSV/<?php echo $row1['Mahd']?>" style="color: blue;">Xóa</a>
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