<?php
class Sinhvien extends Controller{
    public $sv;
    function __construct()
    {
        $this->sv=$this->model('SinhvienModel');
    }
    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'SinhvienView',
            'result1'=>$this->sv->lophoc_all(),
            'result2'=>$this->sv->monhoc_all()
        ]);
    }
    function SinhvienAdd(){
        if(isset($_POST['btnLuu'])){
            $mhd=$_POST['txtMahd'];
            $msv=$_POST['txtMasv'];
            $ht=$_POST['txtHoten'];
            $ml=$_POST['ddlLophoc'];
            $mmh=$_POST['ddlMamh'];
            $tt=$_POST['ddlTinhtrang'];
            $kq=$this->sv->Sinhvien_ins($mhd,$msv,$ht,$ml,$mmh,$tt);
            if($kq){
                $this->view('MasterLayout',[
                    'page'=>'SinhvienView',
                    'result1'=>$this->sv->Lophoc_all(),
                    'result2'=>$this->sv->monhoc_all(),
                    'thongbao'=>'Thêm mới thành công'
                ]); 
            }
            else{
                $this->view('MasterLayout',[
                    'page'=>'SinhvienView',
                    'result1'=>$this->sv->Lophoc_all(),
                    'result2'=>$this->sv->monhoc_all(),
                    'thongbao'=>'Thêm mới thất bại'
                ]); 
            }

        }
        if(isset($_POST['btnImportExcel'])){
            $file=$_FILES['file']['tmp_name'];
            $objReader=PHPExcel_IOFactory::createReaderForFile($file);
            $objExcel=$objReader->load($file);
            //Lấy sheet hiện tại
            $sheet=$objExcel->getSheet(0);
            $sheetData=$sheet->toArray(null,true,true,true);
            for($i=2;$i<=count($sheetData);$i++){
                $mhd=$sheetData[$i]["A"];
                $msv=$sheetData[$i]["B"];
                $ht=$sheetData[$i]["C"];
                $ml=$sheetData[$i]["D"];
                $tl=$sheetData[$i]["E"];
                $mmh=$sheetData[$i]["F"];
                $tt=$sheetData[$i]["G"];
                $kq=$this->sv->Sinhvien_ins($mhd,$msv,$ht,$ml,$tl,$mmh,$tt);
                
            }
             echo "<script type='text/javascript'>alert('Import thành công!');</script>";
             $this->view('MasterLayout',[
                'page'=>'SinhvienView',
                'result'=>$this->sv->Lophoc_all()
            ]);

        }
    }
}
?>