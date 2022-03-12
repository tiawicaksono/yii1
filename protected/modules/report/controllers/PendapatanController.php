<?php

class PendapatanController extends Controller
{

    public function actionIndex()
    {
        $this->pageTitle = 'REKAP PENDAPATAN';
        $this->render('index');
    }

    public function actionRekap($tgl)
    {
        $blnThn = date("n-Y", strtotime($tgl));
        $explodeBlnThn = explode('-', $blnThn);
        $bln = $explodeBlnThn[0];
        $thn = $explodeBlnThn[1];

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
        $criteriaIndikator = new CDbCriteria();
        $criteriaIndikator->addInCondition('bulan', array($bln));
        $criteriaIndikator->addInCondition('tahun', array($thn));
        $indikator = TblIndikator::model()->find($criteriaIndikator);
        //======================================================================
        //HEADER
        $sheet->mergeCells("A1:J1");
        $sheet->setCellValue("A1", "REKAPITULASI PENDAPATAN RETRIBUSI");
        $sheet->getStyle("A1")->getFont()->setSize(16);
        $sheet->getStyle("A1")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A1")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->mergeCells("A2:J2");
        $sheet->setCellValue("A2", "PENGUJIAN JENDARAAN BERMOTOR JBB < 3.500 KG");
        $sheet->getStyle("A2")->getFont()->setSize(16);
        $sheet->getStyle("A2")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A2")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->mergeCells("A3:J3");
        $sheet->setCellValue("A3", "UPTD PENGUJIAN KENDARAAN BERMOTOR WIYUNG DISHUB SURABAYA");
        $sheet->getStyle("A3")->getFont()->setSize(16);
        $sheet->getStyle("A3")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A3")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->mergeCells("A4:E4");
        $sheet->setCellValue("A4", "BULAN : " . date("F Y", strtotime($tgl)));
        $sheet->getStyle("A4")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->mergeCells("F4:J4");
        $sheet->setCellValue("F4", "TARGET PAD " . $thn . " : Rp." . number_format($indikator->target));
        $sheet->getStyle("F4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle("F4")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->mergeCells("A5:A6");
        $sheet->setCellValue("A5", "TGL");
        $sheet->getStyle("A5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("A")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension('A')->setWidth(10);

        $sheet->mergeCells("B5:C5");
        $sheet->setCellValue("B5", "RETRIBUSI");
        $sheet->getStyle("B5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("B5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->setCellValue("B6", "KEND");
        $sheet->getStyle("B6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("B6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("B")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("B")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->setCellValue("C6", "NOMINAL (Rp)");
        $sheet->getStyle("C6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("C6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("C")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("C")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension('B')->setWidth(12);
        $sheet->getColumnDimension('C')->setWidth(15);

        $sheet->mergeCells("D5:E5");
        $sheet->setCellValue("D5", "BUKU UJI");
        $sheet->getStyle("D5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("D5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->setCellValue("D6", "JUMLAH");
        $sheet->getStyle("D6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("D6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("D")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("D")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->setCellValue("E6", "NOMINAL (Rp)");
        $sheet->getStyle("E6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("E6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("E")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("E")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension('D')->setWidth(12);
        $sheet->getColumnDimension('E')->setWidth(15);

        $sheet->mergeCells("F5:H5");
        $sheet->setCellValue("F5", "DENDA");
        $sheet->getStyle("F5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("F5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->setCellValue("F6", "JUMLAH");
        $sheet->getStyle("F6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("F6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("F")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("F")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->setCellValue("G6", "BLN");
        $sheet->getStyle("G6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("G6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("G")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("G")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->setCellValue("H6", "NOMINAL (Rp)");
        $sheet->getStyle("H6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("H6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("H")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("H")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension('F')->setWidth(12);
        $sheet->getColumnDimension('G')->setWidth(12);
        $sheet->getColumnDimension('H')->setWidth(15);

        $sheet->mergeCells("I5:J5");
        $sheet->setCellValue("I5", "CAPAIAN");
        $sheet->getStyle("I5")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("I5")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->setCellValue("I6", "PENDAPATAN");
        $sheet->getStyle("I6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("I6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("I")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("I")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->setCellValue("J6", "(%)");
        $sheet->getStyle("J6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("J6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("J")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("J")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension('I')->setWidth(15);
        $sheet->getColumnDimension('J')->setWidth(12);

        $sheet->getStyle('A5:J6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('b3c6cf');
        //END HEADER
        //======================================================================

        //        $criteria = new CDbCriteria();
        //        $criteria->addCondition("EXTRACT(YEAR FROM tgl_pad) =" . $thn);
        //        $criteria->addCondition("EXTRACT(MONTH FROM tgl_pad) =" . $bln);
        //        $criteria->order = "tgl_pad ASC";
        //        $result = TblLapPad::model()->findAll($criteria);
        //        //======================================================================
        //        //BODY
        //        $no = 1;
        //        $baris = 7;
        //        $totalKend = 0;$nominalKend=0;$totalBuku=0;$nominalBuku=0;$blnDenda=0;$nominalDenda=0;$nominalPendapatan=0;$totProses=0;$totKendDenda=0;
        //        foreach ($result as $data):
        //            $bDaftar = $data->b_daftar;
        //            $bBuku = $data->b_buku;
        //            $bDenda = $data->b_denda;
        //            $jmlRet = $data->b_daftar / 65000;
        //            $jmlBuku = $data->b_buku / 15000;
        //            $jmlDenda = $data->b_denda / 1300;
        //            $pendapatan = $bDaftar+$bBuku+$bDenda;
        //            $prosen = ($pendapatan / $indikator->target)*100;
        //            //TOTAL
        //            $totalKend += $jmlRet;
        //            $nominalKend += $bDaftar;
        //            $totalBuku += $jmlBuku;
        //            $nominalBuku += $bBuku;
        //            $blnDenda += $jmlDenda;
        //            $nominalDenda += $bDenda;
        //            $nominalPendapatan += $pendapatan;
        //            $totProses += $prosen;
        //            //DENDA KENDARAAN
        //            $date = date("d", strtotime($data->tgl_pad));
        //            $tanggal = $bln."/".$date."/".$thn;
        //            $criteriaDenda = new CDbCriteria();
        //            $criteriaDenda->addCondition("tgl_retribusi = '$tanggal'");
        //            $criteriaDenda->addCondition('validasi = true');
        //            $criteriaDenda->addCondition('b_tlt_uji != 0');
        //            $result = VRetribusiAll::model()->count($criteriaDenda);
        //            $totKendDenda += $result;
        //            
        //            $sheet->setCellValue("A" . $baris, date("d", strtotime($data->tgl_pad)));
        //            $sheet->setCellValue("B" . $baris, $jmlRet);
        //            $sheet->setCellValue("C" . $baris, $bDaftar);
        //            $sheet->setCellValue("D" . $baris, $jmlBuku);
        //            $sheet->setCellValue("E" . $baris, $bBuku);
        //            $sheet->setCellValue("F" . $baris, $result);
        //            $sheet->setCellValue("G" . $baris, $jmlDenda);
        //            $sheet->setCellValue("H" . $baris, $bDenda);
        //            $sheet->setCellValue("I" . $baris, $pendapatan);
        //            $sheet->setCellValue("J" . $baris, $prosen);
        ////            $sheet->getRowDimension($baris)->setRowHeight(40);
        //            $baris++;
        //            $no++;
        //        endforeach;
        //        //END BODY
        //        //======================================================================
        //        $styleArray = array(
        //            'borders' => array(
        //                'allborders' => array(
        //                    'style' => PHPExcel_Style_Border::BORDER_THIN
        //                )
        //            )
        //        );
        //        $sheet->getStyle("A5:J".$baris)->applyFromArray($styleArray);
        //        $sheet->getStyle("C7:C".$baris)->getNumberFormat()->setFormatCode('#,##0');
        //        $sheet->getStyle("E7:E".$baris)->getNumberFormat()->setFormatCode('#,##0');
        //        $sheet->getStyle("H7:H".$baris)->getNumberFormat()->setFormatCode('#,##0');
        //        $sheet->getStyle("I7:I".$baris)->getNumberFormat()->setFormatCode('#,##0');
        //        $sheet->getStyle("J7:J".$baris)->getNumberFormat()->setFormatCode('#,##0.00');
        //        //======================================================================
        //        //FOOTER
        //        //TOTAL
        //        $sheet->setCellValue("A" . $baris, "TOTAL");
        //        $sheet->getStyle("A" . $baris)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        //        $sheet->getStyle("A" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        //        
        //        $sheet->setCellValue("B" . $baris, $totalKend);
        //        $sheet->getStyle("B" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        //
        //        $sheet->setCellValue("C" . $baris, $nominalKend);
        //        $sheet->getStyle("C" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        //        
        //        $sheet->setCellValue("D" . $baris, $totalBuku);
        //        $sheet->getStyle("D" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        //
        //        $sheet->setCellValue("E" . $baris, $nominalBuku);
        //        $sheet->getStyle("E" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        //        
        //        $sheet->setCellValue("F" . $baris, $totKendDenda);
        //        $sheet->getStyle("F" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        //        
        //        $sheet->setCellValue("G" . $baris, $blnDenda);
        //        $sheet->getStyle("G" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        //        
        //        $sheet->setCellValue("H" . $baris, $nominalDenda);
        //        $sheet->getStyle("H" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        //        
        //        $sheet->setCellValue("I" . $baris, $nominalPendapatan);
        //        $sheet->getStyle("I" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        //        
        //        $sheet->setCellValue("J" . $baris, $totProses);
        //        $sheet->getStyle("J" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        //        
        //        $sheet->getStyle("A".$baris.":J".$baris)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('b3c6cf');
        //        //======================================================================
        //        //TANDA TANGAN
        //        $kepala = $baris + 2;
        //        $sheet->mergeCells("F" . $kepala . ":J" . $kepala);
        //        $sheet->setCellValue("F" . $kepala, "KEPALA UPTD PKB WIYUNG");
        //        $sheet->getStyle("F" . $kepala)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        //
        //        $nama = $kepala + 5;
        //        $sheet->mergeCells("F" . $nama . ":J" . $nama);
        //        $sheet->setCellValue("F" . $nama, "Abdul Manab, SH.");
        //        $sheet->getStyle("F" . $nama)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        //
        //        $penata = $nama + 1;
        //        $sheet->mergeCells("F" . $penata . ":J" . $penata);
        //        $sheet->setCellValue("F" . $penata, "Penata");
        //        $sheet->getStyle("F" . $penata)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        //
        //        $nip = $penata + 1;
        //        $sheet->mergeCells("F" . $nip . ":J" . $nip);
        //        $sheet->setCellValue("F" . $nip, "NIP. 19630402 198910 1 003");
        //        $sheet->getStyle("F" . $nip)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        //END FOOTER
        //======================================================================
        ob_clean();

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Pendapatan [' . $bln . '-' . $thn . '].xls"');
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
