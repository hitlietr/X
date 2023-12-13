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
    <form method="POST" action="http://localhost/71DCTT12_MVC/DSMonhoc/SuaMonhoc">
        <table>
            <caption style="padding-top: 20px;">CẬP NHẬT THÔNG TIN SINH VIÊN</caption>
            <?php
                if(isset($data['dulieu'])){
                    while($row=mysqli_fetch_array($data['dulieu'])){
                
            ?>
            <tr>
                <td class="col1">Mã môn học:</td>
                <td class="col2">
                    <input type="text" name="txtMamh" class="dd1" readonly
                    value="<?php echo $row['Mamh'] ?>">
                </td>
                <td class="col1">Tên môn học:</td>
                <td class="col2">
                    <input type="text" name="txtTenmh" class="dd1" 
                    value="<?php echo $row['Tenmh'] ?>">
                </td>
            </tr>
            <tr>
            <td class="col1">Số tín chỉ:</td>
                <td class="col2">
                    <input type="text" name="txtSotin" class="dd1"
                    value="<?php echo $row['Sotin'] ?>">
                </td>
                <td class="col1">Tiền học:</td>
                <td class="col2">
                    <input type="text" name="txtTienhoc" class="dd1" 
                    value="<?php echo $row['Tienhoc'] ?>">
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