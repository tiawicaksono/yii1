<?php

class KendaraanKecamatanController extends Controller {

    public function filters() {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }
    
    public function actionIndex() {
        $this->pageTitle = 'Uji Kendaraan';
        $this->render('index');
    }
    
    public function actionSelectKecamatan() {
        $kecamatan = $_POST['kecamatan'];
        $criteria = new CDbCriteria();
        $criteria->addCondition("id_kecamatan = '$kecamatan'");
        $criteria->order = 'nama asc';
        $kelurahan = MKelurahan::model()->findAll($criteria);
        $option = "<option value=''>ALL</pilih>";
        foreach ($kelurahan as $data) :
            $option .= "<option value='$data->id_kelurahan'>$data->nama</pilih>";
        endforeach;

        echo $option;
    }

    public function actionRekap($kecamatan, $kelurahan) {        
        Yii::import("ext.PHPExcel", TRUE);
        $xls = new PHPExcel();
        $sheet = $xls->getActiveSheet();
        $xls->setActiveSheetIndex(0);
        $sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        $sheet->getPageSetup()->setFitToPage(false);
        $sheet->getPageSetup()->setHorizontalCentered(true);
        $sheet->getPageSetup()->setVerticalCentered(true);
        $sheet->getPageSetup()->setScale(90);
        //======================================================================
        //HEADER
        $sheet->mergeCells("A1:H1");
        $sheet->setCellValue("A1", "LAPORAN DATA KENDARAAN");
        $sheet->getStyle("A1")->getFont()->setSize(16);
        $sheet->getStyle("A1")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A1")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->mergeCells("A2:H2");
        $sheet->setCellValue("A2", "PER KECAMATAN & PER KELURAHAN");
        $sheet->getStyle("A2")->getFont()->setSize(16);
        $sheet->getStyle("A2")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A2")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->mergeCells("A3:H3");
        $sheet->setCellValue("A3", "UPTD PENGUJIAN KENDARAAN BERMOTOR DISHUB SAMPANG");
        $sheet->getStyle("A3")->getFont()->setSize(16);
        $sheet->getStyle("A3")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A3")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        
//        $sheet->mergeCells("A4:E4");
//        $sheet->setCellValue("A4", "BULAN : ".date("F Y", strtotime($tgl)));
//        $sheet->getStyle("A4")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
                
//        $sheet->mergeCells("A5:A6");
//        $sheet->setCellValue("A5", "TGL");
//        $sheet->getStyle("A5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
//        $sheet->getStyle("A5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
//        $sheet->getStyle("A")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
//        $sheet->getStyle("A")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
//        $sheet->getColumnDimension('A')->setWidth(10);

        $sheet->setCellValue("A5", "No.");
        $sheet->getStyle("A5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("A")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("A")->setAutoSize(true);

        $sheet->getStyle("B5")->getAlignment()->setWrapText(true);
        $sheet->setCellValue("B5", "Nomor Kendaraan");
        $sheet->getStyle("B5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("B5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("B")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("B")->setAutoSize(true);

        $sheet->getStyle("C5")->getAlignment()->setWrapText(true);
        $sheet->setCellValue("C5", "Nomor Uji");
        $sheet->getStyle("C5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("C5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("C")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("C")->setAutoSize(true);

        $sheet->getStyle("D")->getAlignment()->setWrapText(true);
        $sheet->setCellValue("D5", "Nama Pemilik");
        $sheet->getStyle("D5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("D5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("D")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("D")->setAutoSize(true);

        $sheet->setCellValue("E5", "Alamat");
        $sheet->getStyle("E5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("E5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("E")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("E")->getAlignment()->setWrapText(true);
        $sheet->getColumnDimension("E")->setAutoSize(true);

        
        $sheet->setCellValue("F5", "Komersil / Jenis");
        $sheet->getStyle("F5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("F5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("F")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("F")->setAutoSize(true);

        $sheet->setCellValue("G5", "Merk");
        $sheet->getStyle("G5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("G5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("G")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("G")->setAutoSize(true);

        $sheet->setCellValue("H5", "Sifat");
        $sheet->getStyle("H5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("H5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("H")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("H")->setAutoSize(true);

        $sheet->getStyle('A5:H5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('b3c6cf');
        //END HEADER
        //======================================================================
        if(!empty($kecamatan)){
            $namaKecamatan = MKecamatan::model()->findByAttributes(array('id_kecamatan'=>$kecamatan))->nama;
        }else{
            $namaKecamatan = '';
        }
        
        if(!empty($kelurahan)){
            $namaKelurahan = MKelurahan::model()->findByAttributes(array('id_kelurahan'=>$kelurahan))->nama;
        }else{
            $namaKelurahan = '';
        }
        
        $criteria = new CDbCriteria();
        $criteria->select = 'no_uji,no_kendaraan,nama_pemilik,alamat,kecamatan,kelurahan,nm_komersil,jenis,merk,sifat';
        if(!empty($kecamatan)){
            if(!empty($kelurahan)){
                $criteria->addCondition("kecamatan = '$namaKecamatan'");
                $criteria->addCondition("kelurahan = '$namaKelurahan'");
            }else{
                $criteria->addCondition("kecamatan = '$namaKecamatan'");
            }
        }else{
            $criteria->addCondition("kota ilike 'KABUPATEN PAMEKASAN'");
        }
        $result = VKendaraan::model()->findAll($criteria);
        //======================================================================
        //BODY
        $no = 1;
        $baris = 6;
        foreach ($result as $data):
            $sheet->setCellValue("A" . $baris, $no);
            $sheet->setCellValue("B" . $baris, $data->no_kendaraan);
            $sheet->setCellValue("C" . $baris, $data->no_uji);
            $sheet->setCellValue("D" . $baris, $data->nama_pemilik);
//            $sheet->setCellValue("E" . $baris, $data->alamat.', '.$data->kecamatan.', '.$data->kelurahan);
            $sheet->setCellValue("E" . $baris, $data->alamat);
            $sheet->setCellValue("F" . $baris, $data->nm_komersil.' / '.$data->jenis);
            $sheet->setCellValue("G" . $baris, $data->merk);
            $sheet->setCellValue("H" . $baris, $data->sifat);
            $baris++;
            $no++;
        endforeach;
        //END BODY
        //======================================================================
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $baris = intval($baris)-1;
        $sheet->getStyle("A5:H".$baris)->applyFromArray($styleArray);
        //======================================================================
        ob_clean();

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Kendaraan Per Kecamatan.xls"');
        header('Set-Cookie: fileDownload=true; path=/');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $xlsWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel5');
        $xlsWriter->save('php://output');
        Yii::app()->end();
    }

}
