<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .col1{width: 15%; color: blue; padding-left: 25px;}
        .col2{width: 35%;}
        .dd1{width: 100%; height: 21px;}
        .dd2{width: 100%; height: 26px;}
        tr{height: 35px;}
    </style>
</head>
<body>
    <form method="POST" action="http://localhost/71DCTT12_MVC/DSSinhvien/SuaSinhVien">
        <table>
            <caption style="padding-top: 20px;">CẬP NHẬT THÔNG TIN SINH VIÊN</caption>
            <?php
                if(isset($data['dulieu'])){
                    while($row=mysqli_fetch_array($data['dulieu'])){
                
            ?>
            <tr>
                <td class="col1">Mã hóa đơn:</td>
                <td class="col2">
                    <input type="text" name="txtMahd" class="dd1" readonly
                    value="<?php echo $row['Mahd'] ?>">
                </td>
                <td class="col1">Mã sinh viên:</td>
                <td class="col2">
                    <input type="text" name="txtMasv" class="dd1" 
                    value="<?php echo $row['Masv'] ?>">
                </td>
            </tr>
            <tr>
                <td class="col1">Họ và tên:</td>
                <td class="col2">
                    <input type="text" name="txtHoten" class="dd1"
                    value="<?php echo $row['Hoten'] ?>">
                </td>
                <td class="col1">Mã lớp học:</td>
                <td class="col2">
                <input type="text" name="txtMalop" class="dd1"
                    value="<?php echo $row['Malop'] ?>">
                </td>
            </tr>
            <tr>
                <td class="col1">Mã môn học:</td>
                <td class="col2">
                <input type="text" name="txtMamh" class="dd1"
                    value="<?php echo $row['Mamh'] ?>">
                </td>
                <td class="col1">tình trạnh:</td>
                <td class="col2">
                    <select class="dd2" name="ddlTinhtrang">
                        <option value="">--Tình trạng--</option>
                        <option value="đã đóng"<?php if($row['Tinhtrang']=='đã đóng')echo 'selected'?>>đã đóng</option>
                        <option value="chưa đóng"<?php if($row['Tinhtrang']=='chưa đóng')echo 'selected'?>>chưa đóng</option>
                    </select>
                </td>
            </tr>
            <?php
            }
        }
        ?>
            <tr>
                <td class="col1"></td>
                <td colspan="3">
                    <input type="submit" name="btnLuu" value="sửa">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>