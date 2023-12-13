<?php
class SinhvienModel extends ConnectDB{
    public function Lophoc_all(){
        $sql="SELECT * FROM lophoc";
        return mysqli_query($this->con,$sql);
    }
    public function Monhoc_all(){
        $sql="SELECT * FROM monhoc";
        return mysqli_query($this->con,$sql);
    }
    public function sinhvien_ins($mhd,$msv,$ht,$ml,$mmh,$tt){
        $sql="INSERT INTO sinhvien VALUE('$mhd','$msv','$ht','$ml','$mmh','$tt')";
        return mysqli_query($this->con,$sql);
    }
}
?>