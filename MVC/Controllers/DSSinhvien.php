<?php
    class DSSinhvien extends Controller{
        public $sv;
        function __construct()
        {
            $this->sv=$this->model('DSSinhvienModel');
        }
        function Get_data(){
            $this->view('MasterLayout',[
                'page'=>'DSSinhvienView',
                'result1'=>$this->sv->lophoc_all(),
                'result2'=>$this->sv->monhoc_all()
            ]);
        }
        function TimkiemSV(){
            if(isset($_POST['btnTimkiem'])){
                $mhd=$_POST['txtMahd'];
                $msv=$_POST['txtMasv'];
                $mmh=$_POST['ddlMamh'];
                $ml=$_POST['ddlLophoc'];
                $kq=$this->sv->sinhvien_tk($mhd,$msv,$mmh,$ml);
                
                if(mysqli_num_rows($kq)>0){
                    $this->view('MasterLayout',[
                        'page'=>'DSSinhvienView',
                        'result1'=>$this->sv->lophoc_all(),
                        'result2'=>$this->sv->monhoc_all(),
                        'dulieu'=>$kq
                    ]);
                }
                else{
                    $this->view('MasterLayout',[
                        'page'=>'DSSinhvienView',
                        'result1'=>$this->sv->lophoc_all(),
                'result2'=>$this->sv->monhoc_all(),
                    ]);
                }
                
            }
            if(isset($_POST['btnXuatexcel'])){
                //code xuất excel
            $objExcel=new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet=$objExcel->getActiveSheet()->setTitle('DSSV');
            $rowCount=1;
            //Tạo tiêu đề cho cột trong excel
            $sheet->setCellValue('A'.$rowCount,'Mã hóa đơn');
            $sheet->setCellValue('B'.$rowCount,'Mã sinh viên');
            $sheet->setCellValue('C'.$rowCount,'Họ và Tên');
            $sheet->setCellValue('D'.$rowCount,'mã lớp');
            $sheet->setCellValue('E'.$rowCount,'tên lớp');
            $sheet->setCellValue('F'.$rowCount,'mã môn');
            $sheet->setCellValue('G'.$rowCount,'tình trạng');
            //định dạng cột tiêu đề
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);
            //gán màu nền
            $sheet->getStyle('A1:G1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            //căn giữa
            $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $mhd=$_POST['txtMahd'];
            $msv=$_POST['txtMasv'];
            $mmh=$_POST['ddlMonhoc'];
            $ml=$_POST['ddlLophoc'];
            $kq=$this->sv->sinhvien_tk($mhd,$msv,$mmh,$ml);
           
            while($row=mysqli_fetch_array($kq)){
                $rowCount++;
                $sheet->setCellValue('A'.$rowCount,$row['Mahd']);
                $sheet->setCellValue('B'.$rowCount,$row['Masv']);
                $sheet->setCellValue('C'.$rowCount,$row['Hoten']);
                $sheet->setCellValue('D'.$rowCount,$row['Malop']);
                $sheet->setCellValue('E'.$rowCount,$row['Tenlop']);
                $sheet->setCellValue('F'.$rowCount,$row['Mamh']);
                $sheet->setCellValue('G'.$rowCount,$row['Tinhtrang']);

            }
            //Kẻ bảng 
            $styleAray=array(
                'borders'=>array(
                    'allborders'=>array(
                        'style'=>PHPExcel_Style_Border::BORDER_THIN
                    )
                )
                );
            $sheet->getStyle('A1:'.'G'.($rowCount))->applyFromArray($styleAray);
            $objWriter=new PHPExcel_Writer_Excel2007($objExcel);
            $fileName='ExportExcel.xlsx';
            $objWriter->save($fileName);
            header('Content-Disposition: attachment; filename="'.$fileName.'"');
            header('Content-Type: application/vnd.openxlmformatsofficedocument.speadsheetml.sheet');
            header('Content-Length: '.filesize($fileName));
            header('Content-Transfer-Encoding:binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile($fileName);
            }
        }
        function XoaSV($mhd){
            $kq=$this->sv->sinhvien_del($mhd);
            if($kq){
                echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
                $this->view('MasterLayout',[
                    'page'=>'DSSinhvienView',
                    'result1'=>$this->sv->lophoc_all(),
                    'result2'=>$this->sv->monhoc_all(),
                    'dulieu'=>$this->sv->sinhvien_tk('','','','')
                ]);
            }
            else{
                echo "<script type='text/javascript'>alert('Xóa thất bại!');</script>";
                $this->view('MasterLayout',[
                    'page'=>'DSSinhvienView',
                    'result1'=>$this->sv->lophoc_all(),
                    'result2'=>$this->sv->monhoc_all(),
                    'dulieu'=>$this->sv->sinhvien_tk('','','','')
                ]);
            }
        }
        function SuaSV($mhd){
            $this->view('MasterLayout',[
                'page'=>'SinhvienSuaView',
                'dulieu'=>$this->sv->sinhvien_tk($mhd,'','','')
            ]);
        }
        function SuaSinhVien(){
            if(isset($_POST['btnLuu'])){
                $mhd=$_POST['txtMahd'];
                $msv=$_POST['txtMasv'];
                $ht=$_POST['txtHoten'];
                $ml=$_POST['txtMalop'];
                $mmh=$_POST['txtMamh'];
                $tt=$_POST['ddlTinhtrang'];
                $kq=$this->sv->Sinhvien_upd($mhd,$msv,$ht,$ml,$mmh,$tt);
                if($kq){
                    $this->view('MasterLayout',[
                        'page'=>'DSSinhvienView',
                        'result1'=>$this->sv->lophoc_all(),
                        'result2'=>$this->sv->monhoc_all(),
                        'dulieu'=>$this->sv->sinhvien_tk($mhd,'','',''),
                        'thongbao'=>'Sửa thành công'
                    ]); 
                }
                else{
                    $this->view('MasterLayout',[
                        'page'=>'DSSinhvienView',
                        'result1'=>$this->sv->lophoc_all(),
                        'result2'=>$this->sv->monhoc_all(),
                        'dulieu'=>$this->sv->sinhvien_tk($mhd,'','',''),
                        'thongbao'=>'Sửa thất bại'
                    ]); 
                }
    
            }
        }
    }
?>