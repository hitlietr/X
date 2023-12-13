<?php
class DSSinhvienModel extends ConnectDB{
    public function lophoc_all(){
        $sql="SELECT * FROM lophoc";
        return mysqli_query($this->con,$sql);
    }
    public function monhoc_all(){
        $sql="SELECT * FROM monhoc";
        return mysqli_query($this->con,$sql);
    }
    public function sinhvien_tk($mhd,$msv,$mmh,$ml){
        $sql="SELECT sinhvien.*,lophoc.Tenlop FROM sinhvien,lophoc 
        WHERE sinhvien.Malop=lophoc.Malop AND Masv like '%$msv%' AND 
        Mahd like '%$mhd%' AND Mamh like '%$mmh%' AND sinhvien.Malop like '%$ml%'";
        return mysqli_query($this->con,$sql);
    }
    public function sinhvien_del($mhd){
        $sql= "DELETE FROM sinhvien where Mahd='$mhd'";
        return mysqli_query($this-> con,$sql);
    }
    public function sinhvien_upd($mhd,$msv,$ht,$ml,$mmh,$tt){
        $sql="UPDATE sinhvien SET Hoten='$ht', Tinhtrang='$tt',
        Masv='$msv',Mamh='$mmh',Malop='$ml' Where Mahd='$mhd'";
        return mysqli_query($this->con,$sql);
    }
}
?>