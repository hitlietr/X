<?php
class DSMonhocModel extends ConnectDB{
public function monhoc_tk($mmh,$tm,$st,$th){
    $sql="SELECT monhoc.* FROM monhoc 
    WHERE Mamh like '%$mmh%' AND 
    Tenmh like '%$tm%' AND Sotin like '%$st%' AND Tienhoc like '%$th%'";
    return mysqli_query($this->con,$sql);
}
public function monhoc_del($mmh){
    $sql= "DELETE FROM monhoc where Mamh='$mmh'";
    return mysqli_query($this-> con,$sql);
}
public function monhoc_upd($mmh,$tm,$st,$th){
    $sql="UPDATE monhoc SET
    Sotin='$st',Tenmh='$tm',Tienhoc='$th' Where Mamh='$mmh'";
    return mysqli_query($this->con,$sql);
}
}
?>