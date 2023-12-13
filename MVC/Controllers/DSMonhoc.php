<?php
    class DSMonhoc extends Controller{
        public $sv;
        function __construct()
        {
            $this->sv=$this->model('DSMonhocModel');
        }
        function Get_data(){
            $this->view('MasterLayout',[
                'page'=>'DSMonhocView',
            ]);
        }
        function TimkiemMH(){
            if(isset($_POST['btnTimkiem'])){
                $mmh=$_POST['txtMamh'];
                $tm=$_POST['txtTenmh'];
                $st=$_POST['txtSotin'];
                $th=$_POST['txtTienhoc'];
                $kq=$this->sv->monhoc_tk($mmh,$tm,$st,$th);
                
                if(mysqli_num_rows($kq)>0){
                    $this->view('MasterLayout',[
                        'page'=>'DSMonhocView',
                        'dulieu'=>$kq
                    ]);
                }
                else{
                    $this->view('MasterLayout',[
                        'page'=>'DSMonhocView',
                    ]);
                }
                
            }
        }
        function XoaMH($mmh){
            $kq=$this->sv->monhoc_del($mmh);
            if($kq){
                echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
                $this->view('MasterLayout',[
                    'page'=>'DSMonhocView',
                    'dulieu'=>$this->sv->monhoc_tk('','','','')
                ]);
            }
            else{
                echo "<script type='text/javascript'>alert('Xóa thất bại!');</script>";
                $this->view('MasterLayout',[
                    'page'=>'DSMonhocView',
                    'dulieu'=>$this->sv->monhoc_tk('','','','')
                ]);
            }
        }
        function SuaMH($mmh){
            $this->view('MasterLayout',[
                'page'=>'MonhocSuaView',
                'dulieu'=>$this->sv->monhoc_tk($mmh,'','','')
            ]);
        }
        function SuaMonhoc(){
            if(isset($_POST['btnLuu'])){
                $mmh=$_POST['txtMamh'];
                $tm=$_POST['txtTenmh'];
                $st=$_POST['txtSotin'];
                $th=$_POST['txtTienhoc'];
                $kq=$this->sv->monhoc_upd($mmh,$tm,$st,$th);
                if($kq){
                    $this->view('MasterLayout',[
                        'page'=>'DSMonhocView',
                        'dulieu'=>$this->sv->monhoc_tk($mmh,'','',''),
                        'thongbao'=>'Sửa thành công'
                    ]); 
                }
                else{
                    $this->view('MasterLayout',[
                        'page'=>'DSMonhocView',
                        'dulieu'=>$this->sv->monhoc_tk($mmh,'','',''),
                        'thongbao'=>'Sửa thất bại'
                    ]); 
                }
    
            }
        }
    }
?>