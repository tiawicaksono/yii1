<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            @page {
                margin-left:0px;
                margin-right:0px;
                margin-top:0px;
                margin-bottom:0px;
            }
            @media print {
                .pages {
                    page-break-after: always;
                    font-family: Arials;
                    font-size: 12pt;
                    font-style: normal;
                    font-variant: normal;
                    overflow: hidden;
                }
                .clearfix:after { 
                    content: "."; 
                    visibility: hidden; 
                    display: block; 
                    height: 0; 
                    clear: both;
                }
                #tanggal_atas {
                    float: left;
                    margin-top: 178px;
                    margin-left: 495px;
                }
                #no_surat {
                    margin-top: 17px;
                    margin-left: 170px;
                }
                #tanggal_tengah {
                    margin-top: 353px;
                    margin-left: 100px;
                }
                #keterangan_kendaraan {
                    margin-left: 310px;
                }
                #keterangan_tl {
                    margin-top: 25px;
                    margin-left: 110px;
                    height: 70px;
                }
                #penguji {
                    margin-top: 250px;
                    margin-left: 470px;
                }
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <link rel="shortcut icon" href="#" type="image/png">
        <title>Print TL Dimensi</title>

    </head>

    <body>
        <!--<div class="pages">a</div>-->
        <div class="pages">
            <?php
            $tanggal = date('m/d/Y');
            $criteria = new CDbCriteria();
            $criteria->addCondition('id_hasil_uji = '.$id);
//            $criteria->addCondition("jdatang::date = '$tanggal'");
            $data = VPrintHasil::model()->find($criteria);
            $tgl  = date('d', strtotime($data->jdatang)) . " " . Yii::app()->params['bulanArrayInd'][date('n', strtotime($data->jdatang)) - 1] . " " . date('Y', strtotime($data->jdatang));
            ?>
            <div id="tanggal_atas">Surabaya, <?php echo $tgl; ?></div>
            <div class="clearfix"></div>
            <div id="no_surat">550 / TL - <?php echo strtoupper($data->no_tldim); ?> / 436.6.10.<?php echo date('n'); ?> / <?php echo date('Y'); ?></div>
            <div class="clearfix"></div>
            <div id="tanggal_tengah"><?php echo $tgl; ?> di Surabaya</div>
            <div class="clearfix"></div>
            <div id="keterangan_kendaraan">
                <div><?php echo $data->nama_pemilik; ?></div>
                <div><?php echo $data->alamat; ?></div>
                <div><?php echo $data->no_uji." / ".$data->no_kendaraan; ?></div>
                <div>-</div>
                <div>-</div>
            </div>
            <div class="clearfix"></div>
            <div id="keterangan_tl">
                <?php
                $criteria = new CDbCriteria();
                $criteria->addCondition('id_hasil_uji = '.$data->id_hasil_uji);
                $dtKelulusan = TblListKelulusan::model()->findAll($criteria);
                foreach($dtKelulusan as $tl):
                ?>
                <div><?php echo $tl->kelulusan; ?></div>
                <?php endforeach; ?>
            </div>
            <div class="clearfix"></div>
            <div id="penguji">
                <?php
                $dtPenguji = TblNamaPenguji::model()->findByAttributes(array('nrp' => $nrp));
                ?>
                <table colspan="0" rowspan="0">
                    <tr>
                        <td align="center"><u><?php echo $dtPenguji->nama_penguji; ?></u></td>
                    </tr>
                    <tr>
                        <td align="center">NRP.<?php echo $dtPenguji->nrp; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <script type="text/javascript">
            window.print();
            setTimeout(window.close, 0);
        </script>

    </body>
</html>