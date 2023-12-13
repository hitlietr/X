<?php
class Monhoc extends Controller{
    public $sv;
    function __construct()
    {
        $this->sv=$this->model('MonhocModel');
    }
    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'MonhocView',
        ]);
    }
    function MonhocAdd(){
        if(isset($_POST['btnLuu'])){
            $mmh=$_POST['txtMamh'];
            $tm=$_POST['txtTenmh'];
            $st=$_POST['txtSotin'];
            $th=$_POST['txtTienhoc'];
            $kq=$this->sv->monhoc_ins($mmh,$tm,$st,$th);
            if($kq){
                echo "<script type='text/javascript'>alert('Thêm thành công!');</script>";
                $this->view('MasterLayout',[
                    'page'=>'MonhocView',
                ]); 
            }
            else{
                echo "<script type='text/javascript'>alert('Thêm mới thất bại');</script>";
                $this->view('MasterLayout',[
                    'page'=>'MonhocView',
                ]); 
            }

        }
    }
}
?>