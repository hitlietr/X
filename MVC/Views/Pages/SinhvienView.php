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
    <form method="POST" entctype="multipart/form-data" action="http://localhost/71DCTT12_MVC/Sinhvien/SinhvienAdd">
        <table>
            <caption style="padding-top: 20px;">CẬP NHẬT THÔNG TIN SINH VIÊN</caption>
            <tr>
                <td class="col1">Mã hóa dơn:</td>
                <td class="col2">
                    <input type="text" name="txtMahd" class="dd1">
                </td>
                <td class="col1">Mã sinh viên:</td>
                <td class="col2">
                    <input type="text" name="txtMasv" class="dd1">
                </td>
            </tr>
            <tr>
            <td class="col1">Họ và tên:</td>
                <td class="col2">
                    <input type="text" name="txtHoten" class="dd1">
                </td>
                <td class="col1">Lớp học:</td>
                <td class="col2">
                    <select class="dd2" name="ddlLophoc">
                        <option value="">--Chọn lớp--</option>
                       <?php
                            if(isset($data['result1'])){
                                while($row=mysqli_fetch_array($data['result1'])){
                                    echo '<option value='.$row['Malop'].'>'.$row['Tenlop'].'</option>';
                                }
                            }
                       ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col1">Môn học:</td>
                <td class="col2">
                    <select class="dd2" name="ddlMamh">
                        <option value="">--Chọn Môn--</option>
                       <?php
                            if(isset($data['result2'])){
                                while($row=mysqli_fetch_array($data['result2'])){
                                    echo '<option value='.$row['Mamh'].'>'.$row['Mamh'].'</option>';
                                }
                            }
                       ?>
                    </select>
                </td>
                <td class="col1">Tình trạng:</td>
                <td class="col2">
                    <select class="dd2" name="ddlTinhtrang">
                        <option value="">--Chọn Tình trạng--</option>
                        <option value="đã đóng">đã đóng</option>
                        <option value="chưa đóng">chưa đóng</option>
                    </select>
                </td>
            </tr>
            <tr>
            <td class="col1">Số tín chỉ:</td>
                <td class="col2">
                <input type="text" name="txtSotin" class="dd1">
                </td>
                
            <tr>
            <td class="col1"></td>
                <td colspan="3">
                    <input type="submit" name="btnLuu" value="Lưu">
                </td>
             
                   
            </tr>
    
            <tr>
                <td class="col1">Chọn file</td>
                <td colspan="3">
                <div class="custom-file">
                        <input type="file" name="file" id="inputGroupFile04" class="form-control-file border" >
                    </div>
                    <button class="btn btn-outline-primary" type="submit" name="btnImportExcel">Upload</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>