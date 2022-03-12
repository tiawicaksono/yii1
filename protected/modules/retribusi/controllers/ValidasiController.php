<?php

class ValidasiController extends Controller
{

    public function filters()
    {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    public function actionIndex()
    {
        $this->pageTitle = 'VALIDASI';
        $this->render('list_validasi');
    }

    public function actionValidasilistgrid()
    {
        $ok = Yii::app()->baseUrl . "/images/icon_approve.png";
        $reject = Yii::app()->baseUrl . "/images/icon_reject.png";
        $validasi = $_POST['chooseValidasi'];
        $selectCategory = $_POST['selectCategory'];
        $textCategory = strtoupper($_POST['textCategory']);
        $selectDate = strtoupper($_POST['selectDate']);
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_retribusi';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page - 1) * $rows;

        $criteria = new CDbCriteria();
        $criteria->order = "$sort $order";
        $criteria->limit = $rows;
        $criteria->offset = $offset;
        if (!empty($textCategory)) {
            if ($selectCategory == 'numerator') {
                $criteria->addCondition("$selectCategory = $textCategory");
            } else {
                $criteria->addCondition("(replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','') OR replace(LOWER(no_kendaraan),' ','') like replace(LOWER('" . $textCategory . "'),' ',''))");
            }
        }
        if ($validasi != 'all') {
            $criteria->addCondition("validasi = $validasi");
        }
        $criteria->addCondition("tgl_retribusi = TO_DATE('" . $selectDate . "', 'DD-Mon-YY')");
        //        $criteria->addCondition("tgl_retribusi = 'now' ::text::date");
        //        $criteria->addCondition("tgl_retribusi = TO_DATE('26/10/16', 'DD/MM/YY')");
        $result = VValidasi::model()->findAll($criteria);
        $dataJson = array();

        foreach ($result as $p) {
            $tgl_mati = TblRetribusi::model()->findByPk($p->id_retribusi)->tglmati;
            //            $numerator_hari = sprintf('%03d', $p->numerator_hari);
            //            $bln = date('n');
            //            $bln_romawi = Yii::app()->params['bulanRomawi'][$bln - 1];
            $bk_masuk = '';
            if ($p->id_bk_masuk != 1) {
                $bk_masuk = "(" . $p->bk_masuk . ")";
            }
            if (floor($p->lm_tlt / 12) != 0) {
                $tlt_retribusi = floor($p->lm_tlt / 12);
            } else {
                $tlt_retribusi = 0;
            }
            $dataJson[] = array(
                "delete" => $p->id_retribusi,
                "kwitansi_skrd" => $p->id_retribusi,
                "kwitansi" => $p->id_retribusi,
                "skrd" => $p->id_retribusi,
                "ACTIONS" => $p->id_retribusi,
                "id_retribusi" => $p->id_retribusi,
                "idret_tglmati" => $p->id_retribusi . "_" . $tgl_mati,
                "penerima" => strtoupper($p->penerima),
                "numerator" => $p->numerator,
                "numerator_hari" => $p->numerator_hari,
                "no_uji" => $p->no_uji,
                "no_kendaraan" => $p->no_kendaraan,
                "uji" => $p->nm_uji,
                "nama_pemilik" => $p->nama_pemilik,
                "b_retribusi_lebih" => number_format($p->b_retribusi_lebih, 0, ',', '.') . " <br/><b>(" . $tlt_retribusi . ")</b>",
                "b_berkala" => number_format($p->b_berkala, 0, ',', '.'),
                "b_rekom" => number_format($p->b_rekom, 0, ',', '.'),
                "b_buku" => number_format($p->b_buku, 0, ',', '.') . " <br/><b>" . $bk_masuk . "</b>",
                "b_tlt_uji" => number_format($p->b_tlt_uji, 0, ',', '.') . " <br/><b>(" . $p->lm_tlt . " bln)</b>",
                "b_tanda_uji" => number_format($p->b_tanda_uji, 0, ',', '.'),
                "b_plat_uji" => number_format($p->b_plat_uji, 0, ',', '.'),
                "total" => "<font color='red'><b>" . number_format($p->total, 0, ',', '.') . "</b></font>",
                "buku" => ($p->id_bk_masuk != 1) ? "<img src='$ok'>" : "<img src='$reject'>",
            );
        }
        header('Content-Type: application/json');
        echo CJSON::encode(
            array(
                'total' => VValidasi::model()->count($criteria),
                'rows' => $dataJson,
            )
        );
        Yii::app()->end();
    }

    public function actionDeleteRetribusi()
    {
        $id = $_POST['id'];
        $sql = "DELETE FROM tbl_retribusi WHERE id_retribusi = $id";
        Yii::app()->db->createCommand($sql)->execute();
    }

    public function actionProsesValidChecked()
    {
        $petugas = Yii::app()->session['username'];
        $idArray = $_POST['idArray'];
        $kondisi = $_POST['kondisi'];
        foreach ($idArray as $key => $arrayId) :
            $sqlUpdRetribusi = "UPDATE tbl_retribusi SET validasi = $kondisi, petugas_validasi = '$petugas' WHERE id_retribusi = $arrayId ";
            Yii::app()->db->createCommand($sqlUpdRetribusi)->execute();
        endforeach;
    }

    public function actionProsesValid()
    {
        $petugas = Yii::app()->session['username'];
        $idRetribusi = $_POST['idRetribusi'];
        $kondisi = $_POST['kondisi'];
        $sqlUpdRetribusi = "UPDATE tbl_retribusi SET validasi = $kondisi, petugas_validasi = '$petugas' WHERE id_retribusi = $idRetribusi";
        Yii::app()->db->createCommand($sqlUpdRetribusi)->execute();
    }

    public function actionRekapValidasi($tgl)
    {
        Yii::import("ext.PHPExcel", TRUE);
        $xls = new PHPExcel();
        $sheet = $xls->getActiveSheet();
        $xls->setActiveSheetIndex(0);
        $tglIndonesia = date("d", strtotime($tgl)) . " " . strtoupper(Yii::app()->params['bulanArrayInd'][date("n", strtotime($tgl)) - 1]) . " " . date("Y", strtotime($tgl));
        //======================================================================
        //HEADER
        $sheet->mergeCells("A1:L1");
        $sheet->setCellValue("A1", "DINAS PERHUBUNGAN");
        $sheet->getStyle("A1")->getFont()->setSize(16);
        $sheet->getStyle("A1")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A1")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("A1")->getFont()->setBold(true);

        $sheet->mergeCells("A2:L2");
        $sheet->setCellValue("A2", "PENGUJIAN KENDARAAN BERMOTOR - KABUPATEN SAMPANG");
        $sheet->getStyle("A2")->getFont()->setSize(16);
        $sheet->getStyle("A2")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A2")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("A2")->getFont()->setBold(true);

        $sheet->mergeCells("A3:L3");
        $sheet->setCellValue("A3", "DAFTAR PENERIMAAN UANG PENGUJIAN KENDARAAN BERMOTOR");
        $sheet->getStyle("A3")->getFont()->setSize(12);
        $sheet->getStyle("A3")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A3")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("A3")->getFont()->setBold(true);

        $sheet->mergeCells("A4:L4");
        $sheet->setCellValue("A4", $tglIndonesia);
        $sheet->getStyle("A4")->getFont()->setSize(12);
        $sheet->getStyle("A4")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A4")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("A4")->getFont()->setBold(true);

        $sheet->mergeCells("A6:A7");
        $sheet->setCellValue("A6", "NO");
        $sheet->getStyle("A6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("A")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("A")->setWidth(5);

        $sheet->mergeCells("B6:B7");
        $sheet->setCellValue("B6", "NUMERATOR");
        $sheet->getStyle("B6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("B6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("B")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("B")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("B")->setWidth(13);

        $sheet->mergeCells("C6:C7");
        $sheet->setCellValue("C6", "JENIS UJI");
        $sheet->getStyle("C6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("C6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("C")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("C")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("C")->setWidth(19);

        $sheet->getRowDimension(6)->setRowHeight(30);
        $sheet->getRowDimension(7)->setRowHeight(30);

        $sheet->mergeCells("D6:F6");
        $sheet->setCellValue("D6", "URAIAN");
        $sheet->setCellValue("D7", "NO. UJI");
        $sheet->getStyle("D7")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("D7")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("D")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("D")->setWidth(16);
        $sheet->setCellValue("E7", "NO. KENDARAAN");
        $sheet->getStyle("E7")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("E7")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("E")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("E")->setAutoSize(true);
        $sheet->getColumnDimension("E")->setWidth(16);
        $sheet->setCellValue("F7", "NAMA PEMILIK");
        $sheet->getStyle("F7")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("F7")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("F")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("F")->setAutoSize(true);

        $sheet->mergeCells("G6:G7");
        $sheet->setCellValue("G6", "RETRIBUSI");
        $sheet->getStyle("G6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("G6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("G")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle("G")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("G")->setWidth(12);

        $sheet->mergeCells("H6:H7");
        $sheet->setCellValue("H6", "REKOM");
        $sheet->getStyle("H6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("H6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("H")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle("H")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("H")->setWidth(12);

        $sheet->mergeCells("I6:I7");
        $sheet->setCellValue("I6", "KARTU UJI");
        $sheet->getStyle("I6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("I6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("I")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle("I")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("I")->setWidth(12);

        $sheet->mergeCells("J6:J7");
        $sheet->setCellValue("J6", "DENDA");
        $sheet->getStyle("J6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("J6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("J")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle("J")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("J")->setWidth(12);

        $sheet->mergeCells("K6:K7");
        $sheet->setCellValue("K6", "TANDA SAMPING");
        $sheet->getStyle("K6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("K6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("K")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle("K")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("K")->setWidth(12);
        //        
        $sheet->mergeCells("L6:L7");
        $sheet->setCellValue("L6", "TOTAL");
        $sheet->getStyle("L6")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("L6")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getStyle("L")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle("L")->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        $sheet->getColumnDimension("L")->setWidth(12);

        $sheet->getStyle("A6:L7")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('b3c6cf');
        //END HEADER
        //======================================================================
        $criteria = new CDbCriteria();
        $criteria->addCondition("tgl_retribusi = TO_DATE('" . $tgl . "', 'DD-Mon-YY')");
        $criteria->addCondition('validasi = true');
        $result = VValidasi::model()->findAll($criteria);
        //======================================================================
        //BODY
        $no = 1;
        $baris = 8;
        foreach ($result as $data) :
            $sheet->setCellValue("A" . $baris, $no);
            $sheet->setCellValue("B" . $baris, $data->numerator);
            $sheet->setCellValue("C" . $baris, $data->nm_uji);
            $sheet->setCellValue("D" . $baris, $data->no_uji);
            $sheet->setCellValue("E" . $baris, $data->no_kendaraan);
            $sheet->setCellValue("F" . $baris, $data->nama_pemilik);
            $sheet->setCellValue("G" . $baris, floatval($data->b_berkala));
            $sheet->setCellValue("H" . $baris, floatval($data->b_rekom));
            $sheet->setCellValue("I" . $baris, floatval($data->b_buku));
            $sheet->setCellValue("J" . $baris, floatval($data->b_tlt_uji));
            $sheet->setCellValue("K" . $baris, floatval($data->b_plat_uji));
            $sheet->setCellValue("L" . $baris, "=SUM(G" . $baris . ":K" . $baris . ")");
            $sheet->getRowDimension($baris)->setRowHeight(20);
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
        $baris_border = $baris - 1;
        $sheet->getStyle("A" . $baris . ":L" . $baris)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('b3c6cf');
        $sheet->getStyle("A6:L" . $baris)->applyFromArray($styleArray);
        $sheet->getStyle("G8:L" . $baris)->getNumberFormat()->setFormatCode('#,##0');
        //======================================================================
        //FOOTER
        $sheet->mergeCells("A" . $baris . ":F" . $baris);
        $sheet->setCellValue("A" . $baris, "TOTAL");
        $sheet->getStyle("A" . $baris)->getFont()->setBold(true);
        $sheet->getStyle("A" . $baris)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $sheet->getStyle("A" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->setCellValue("G" . $baris, '=SUM(G8:G' . $baris_border . ')');
        $sheet->getStyle("G" . $baris)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));
        $sheet->getStyle("G" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->setCellValue("H" . $baris, '=SUM(H8:H' . $baris_border . ')');
        $sheet->getStyle("H" . $baris)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));
        $sheet->getStyle("H" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->setCellValue("I" . $baris, '=SUM(I8:I' . $baris_border . ')');
        $sheet->getStyle("I" . $baris)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));
        $sheet->getStyle("I" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->setCellValue("J" . $baris, '=SUM(J8:J' . $baris_border . ')');
        $sheet->getStyle("J" . $baris)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));
        $sheet->getStyle("J" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->setCellValue("K" . $baris, '=SUM(K8:K' . $baris_border . ')');
        $sheet->getStyle("K" . $baris)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));
        $sheet->getStyle("K" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));

        $sheet->setCellValue("L" . $baris, '=SUM(L8:L' . $baris_border . ')');
        $sheet->getStyle("L" . $baris)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));
        $sheet->getStyle("L" . $baris)->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER));
        //======================================================================
        ob_clean();

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="RETRIBUSI_' . $tglIndonesia . '.xls"');
        header('Set-Cookie: fileDownload=true; path=/');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $xlsWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel5');
        $xlsWriter->save('php://output');

        //        $objWriter = new PHPExcel_Writer_Excel2007($excel);
        //        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        //        header("Content-Disposition: attachment;filename=RETRIBUSI.xlsx");
        //        header('Cache-Control: max-age=0');
        //        $objWriter->save('php://output');
        Yii::app()->end();
    }

    public function actionCetakKuitansiSkrd($id)
    {
        $this->layout = '//';
        $data_retribusi = VValidasi::model()->findByAttributes(array('id_retribusi' => $id));
        $this->render('cetak_retribusi_skrd', array('id' => $id, 'data_retribusi' => $data_retribusi));
    }

    public function actionCetakRetribusi($id)
    {
        $this->layout = '//';
        $data_retribusi = VValidasi::model()->findByAttributes(array('id_retribusi' => $id));
        $this->render('cetak_retribusi', array('id' => $id, 'data_retribusi' => $data_retribusi));
    }

    public function actionCetakSkrd($id)
    {
        $this->layout = '//';
        $data_retribusi = VValidasi::model()->findByAttributes(array('id_retribusi' => $id));
        $this->render('cetak_skrd', array('id' => $id, 'data_retribusi' => $data_retribusi));
    }

    public function actionCetakCheckedRetribusi()
    {
        $this->layout = '//';
        $arrayId = $_REQUEST['idArray'];
        $idArray = explode(',', $arrayId);
        $this->render('cetak_checked_retribusi', array(
            'idArray' => $idArray
        ));
    }

    public function actionGetListSelect()
    {
        $pilih = $_POST['pilih'];
        $option = '';
        switch ($pilih) {
            case 'jenis_kendaraan':
                $tbl_jns_kend = TblJnsKend::model()->findAll();
                foreach ($tbl_jns_kend as $jns_kend) :
                    $option .= "<option value='$jns_kend->id_jns_kend'>$jns_kend->jns_kend</pilih>";
                endforeach;
                break;
            case 'jenis_uji':
                $tbl_uji = TblUji::model()->getEditRetribusi();
                foreach ($tbl_uji as $uji) :
                    $option .= "<option value='$uji->id_uji'>$uji->nm_uji</pilih>";
                endforeach;
                break;
            case 'buku':
                $tbl_bk_uji = TblBkMasuk::model()->findAll();
                foreach ($tbl_bk_uji as $bk_uji) :
                    $option .= "<option value='$bk_uji->id_bk_masuk'>$bk_uji->bk_masuk</pilih>";
                endforeach;
                break;
        }

        echo $option;
    }

    public function actionUpdateRetribusi()
    {
        $ex_idret_tglmati = explode('_', $_POST['dlg_idret_tglmati']);
        $id_retribusi = $ex_idret_tglmati[0];
        $tgl_mati = $ex_idret_tglmati[1];
        $pilih_kategori = $_POST['pilih_kategori'];
        $kategori = 0;
        $textJbb = 0;
        $id_kendaraan = 0;
        if ($pilih_kategori == 'tgluji') {
            $tgl_mati = date("m/d/Y", strtotime($_POST['ganti_tgl_uji']));
        } elseif ($pilih_kategori == 'denda') {
            $tgl_mati = $_POST['ganti_tgl_mati'];
            //            Yii::app()->db->createCommand($updateDenda)->query();
        } elseif ($pilih_kategori == 'replace') {
            $textCategory = $_POST['ganti_replace'];
            $criteria = new CDbCriteria();
            $criteria->addCondition("( (replace(LOWER(no_uji),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','')) OR (replace(LOWER(no_kendaraan),' ','') like replace(LOWER('%" . $textCategory . "%'),' ','')) )");
            $dtKend = TblKendaraan::model()->find($criteria);
            $id_kendaraan = $dtKend->id_kendaraan;
        } elseif ($pilih_kategori == 'jbb') {
            $textJbb = $_POST['ganti_jbb'];
        } elseif ($pilih_kategori == 'jenis_uji' || $pilih_kategori == 'buku') {
            $kategori = $_POST['kategori'];
        }
        $updateRetribusi = "Select edit_retribusi(" . $id_retribusi . ",'" . $tgl_mati . "','" . $pilih_kategori . "',$kategori, $textJbb, $id_kendaraan)";
        Yii::app()->db->createCommand($updateRetribusi)->query();
    }

    public function actionGetListCalculator()
    {
        $idArray = $_POST['idArray'];

        $jmlTotal = 0;
        foreach ($idArray as $key => $arrayId) :
            $dtRetribusi = VValidasi::model()->findByAttributes(array('id_retribusi' => $arrayId));
            $no_uji = $dtRetribusi->no_uji;
            $numerator = $dtRetribusi->numerator;
            $total = number_format($dtRetribusi->total, 0, ',', '.');
            $jmlTotal += $dtRetribusi->total;
            $dataJson[] = array(
                "no_uji" => $no_uji,
                "numerator" => $numerator,
                "total" => $total,
            );
        endforeach;
        header('Content-Type: application/json');
        echo CJSON::encode(
            array(
                'total' => count($idArray),
                'rows' => $dataJson,
                'totalcalculator' => number_format($jmlTotal, 0, ',', '.'),
            )
        );
    }

    public function actionCetakCheckedSkrd()
    {
        $this->layout = '//';
        $arrayId = $_REQUEST['idArray'];
        $idArray = explode(',', $arrayId);
        $this->render('cetak_checked_skrd', array(
            'idArray' => $idArray
        ));
    }
}
