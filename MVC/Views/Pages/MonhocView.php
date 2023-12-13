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
    <form method="POST" entctype="multipart/form-data" action="http://localhost/71DCTT12_MVC/Monhoc/MonhocAdd">
        <table>
            <caption style="padding-top: 20px;">CẬP NHẬT THÔNG TIN SINH VIÊN</caption>
            <tr>
                <td class="col1">Mã môn học:</td>
                <td class="col2">
                    <input type="text" name="txtMamh" class="dd1">
                </td>
                <td class="col1">Tên môn:</td>
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
            </tr>
           
            <tr>
            <td class="col1"></td>
                <td colspan="3">
                    <input type="submit" name="btnLuu" value="Lưu">
                </td>
        </table>
    </form>
</body>
</html>