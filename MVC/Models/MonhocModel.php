<?php
class MonhocModel extends ConnectDB{
    public function monhoc_ins($mmh,$tm,$st,$th){
        $sql="INSERT INTO monhoc VALUE('$mmh','$tm','$st','$th')";
        return mysqli_query($this->con,$sql);
    }
}
?>