<?php
$baseUrl = Yii::app()->request->baseUrl;
$assetsUrl = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($assetsUrl . '/css/check_radio.css');
$cs->registerScriptFile($assetsUrl . '/js/prauji.js', CClientScript::POS_END);
$cs->registerScriptFile($assetsUrl . '/js/jquery.numeric.js', CClientScript::POS_END);
?>
<style>
    .datagrid-row{
        height: 40px !important;
    }
    .datagrid-cell-c1-no_kendaraan {
        font-weight: bold !important;
        font-size: 12pt !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">PRAUJI - KENDARAAN LIST</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-lg-12 col-md-12 no-padding">
                    <div class="col-lg-8 col-md-8 no-padding">
                        <div class="col-lg-3 col-md-4 no-padding">
                            <input type="text" id="text_search_prauji" class="text-besar form-control" placeholder="SEARCH NO KEND / NO UJI">
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-danger" onclick="clearSearchPrauji()">
                                    CLEAR
                                </button>
                                <button type="button" class="btn btn-info" onclick="prosesSearchPrauji()">
                                    <span class="glyphicon glyphicon-refresh"></span> REFRESH
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <table id="praujiListGrid"></table>
                </div>
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <input type="hidden" value="biasa" readonly="readonly" id="text_category_prauji" />
<!--                    <center>
                        <button type="button" class="btn btn-info" onclick="prosesSearchPrauji()">
                            <span class="glyphicon glyphicon-refresh"></span> REFRESH
                        </button>
                    </center>-->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">PRAUJI</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-lg-8 col-md-8">
                        <div class="col-lg-3 col-md-3">
                            <input type="hidden" id="no_antrian_prauji" class="form-control" placeholder="NO ANTRIAN" readonly="readonly" style="font-weight: bold;"/>
                            <input type="hidden" id="username_prauji" readonly="readonly" value="<?php echo Yii::app()->session['username']; ?>"/>
                            <input type="hidden" id="id_hasil_uji_prauji" readonly="readonly"/>
                            <input type="hidden" id="posisi_cis_prauji" readonly="readonly" value="<?php echo Yii::app()->session['posisi_cis']; ?>"/>
                            <input type="text" id="no_kendaraan_prauji" class="form-control" placeholder="NO KEND" readonly="readonly" />
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <input type="text" id="no_uji_prauji" class="form-control" placeholder="NO UJI" readonly="readonly" />
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <button type="button" class="btn btn-primary" onclick="prosesPrauji('<?php echo $this->createUrl('Prauji/Proses'); ?>')">PROSES</button>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom:20px;">
                    <div class="col-md-12" style="padding: 20px;">
                        <div class="col-md-3 tengah">
                            <img id="img_depan" width="200" height="200"/>
                        </div>
                        <div class="col-md-3 tengah">
                            <img id="img_belakang" width="200" height="200"/>
                        </div>
                        <div class="col-md-3 tengah">
                            <img id="img_kanan" width="200" height="200"/>
                        </div>
                        <div class="col-md-3 tengah">
                            <img id="img_kiri" width="200" height="200"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab"><b>Identitas Kendaraan</b></a></li>
                            <li><a href="#tab_2" data-toggle="tab"><b>Sistem Penerangan</b></a></li>
                            <li><a href="#tab_3" data-toggle="tab"><b>Rumah dan Body</b></a></li>
                            <li><a href="#tab_4" data-toggle="tab"><b>Roda - roda</b></a></li>
                            <li><a href="#tab_5" data-toggle="tab"><b>Dimensi Kendaraan</b></a></li>
                            <li><a href="#tab_6" data-toggle="tab"><b>Peralatan dan Perlengkapan</b></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <table width="100%">
                                    <tr>
                                        <td width="25%">1. Nomor Kendaraan</td>
                                        <td width="20%">
                                            <label>
                                                <input id="a1a" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td width="20%">
                                            <label>
                                                <input id="a1b" type="checkbox" class="flat-red"> Tidak Terbaca
                                            </label>
                                        </td>
                                        <td width="20%">
                                            <label>
                                                <input id="a1c" type="checkbox" class="flat-red"> Tidak Sesuai STUK
                                            </label>
                                        </td>
                                        <td width="15%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>2. Nomor Landasan(Chasis)</td>
                                        <td>
                                            <label>
                                                <input id="a2a" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="a2b" type="checkbox" class="flat-red"> Tidak Terbaca
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="a2c" type="checkbox" class="flat-red"> Tidak Sesuai STUK
                                            </label>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>3. Nomor S T U K</td>
                                        <td>
                                            <label>
                                                <input id="a3a" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="a3b" type="checkbox" class="flat-red"> Tidak Terbaca
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="a3c" type="checkbox" class="flat-red"> Tidak Sesuai STUK
                                            </label>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>4. Nomor Mesin</td>
                                        <td>
                                            <label>
                                                <input id="a4a" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="a4b" type="checkbox" class="flat-red"> Tidak Terbaca
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="a4c" type="checkbox" class="flat-red"> Tidak Sesuai STUK
                                            </label>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <table width="100%">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td colspan="2" align="center" bgcolor="#CCFFFF"><b>DEKAT</b></td>
                                        <td colspan="2" align="center" bgcolor="#66FFFF"><b>JAUH</b></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">1. Lampu utama tidak menyala</td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b1b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b1a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b1d" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b1c" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td colspan="2" align="center" bgcolor="#CCFFFF"><b>DEPAN</b></td>
                                        <td colspan="2" align="center" bgcolor="#66FFFF"><b>BELAKANG</b></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">2. Lampu posisi tidak menyala</td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b2b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b2a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b2d" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b2c" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">3. Lampu penunjuk arah tidak menyala</td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b3b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="b3a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b3d" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="b3c" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4. Lampu rem tidak menyala</td>
                                        <td colspan="2" bgcolor="#CCFFFF">&nbsp;</td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b4b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b4a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5. Lampu mundur tidak menyala</td>
                                        <td colspan="2" bgcolor="#CCFFFF"></td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b5b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b5a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6. Lampu tambahan lainnya</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="b6b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="b6a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b6d" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="b6c" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7. Lampu Nomor Kendaraan </td>
                                        <td>
                                            <label>
                                                <input id="b7" type="checkbox" class="flat-red"> Tidak Menyala
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>8. Posisi / dudukan lampu utama tidak sesuai</td>
                                        <td>
                                            <label>
                                                <input id="b8a" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="b8b" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>9. Alat Pemantul Cahaya (Reflektor) Tidak Ada</td>
                                        <td>
                                            <label>
                                                <input id="b9a" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="b9b" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>10. Alat Pemantul Cahaya (Reflektor) Rusak</td>
                                        <td>
                                            <label>
                                                <input id="b10a" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="b10b" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                </table>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <table width="100%">
                                    <tr>
                                        <td>1. Bumper</td>
                                        <td>
                                            <label>
                                                <input id="c1a" type="checkbox" class="flat-red"> &gt; 50 cm
                                            </label>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="c1ain" size="8" maxlength="8"/>
                                                <div class="input-group-addon">cm</div>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <label>
                                                <input id="c1b" type="checkbox" class="flat-red"> Konstruksi membahayakan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2. Kondisi bak/cabin</td>
                                        <td>
                                            <label>
                                                <input id="c2" type="checkbox" class="flat-red"> keropos
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>3. Jumlah tempat duduk tidak sesuai dengan STUK/SRUT</td>
                                        <td>
                                            <label>
                                                <input id="c3" type="checkbox" class="flat-red"> Ya
                                            </label>
                                        </td>
                                        <td colspan="2"><input class="form-control" type="text" id="c3in" size="8" maxlength="8"/></td>
                                    </tr>
                                    <tr>
                                        <td>4. Kondisi bak muatan/cabin</td>
                                        <td>
                                            <label>
                                                <input id="c4" type="checkbox" class="flat-red"> Rusak
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>5. Pintu - pintu</td>
                                        <td>
                                            <label>
                                                <input id="c5" type="checkbox" class="flat-red"> Rusak
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>6. Tutup bak</td>
                                        <td>
                                            <label>
                                                <input id="c6" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>7. Kondisi kaca retak</td>
                                        <td>
                                            <label>
                                                <input id="c7a" type="checkbox" class="flat-red"> Depan
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c7b" type="checkbox" class="flat-red"> Belakang
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>8. Kaca samping retak</td>
                                        <td>
                                            <label>
                                                <input id="c8a" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c8b" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>9. Tutup tangki bahan bakar</td>
                                        <td>
                                            <label>
                                                <input id="c9" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>10. Jenis rumah atau bak</td>
                                        <td>
                                            <label>
                                                <input id="c10" type="checkbox" class="flat-red"> Tidak Sesuai STUK/SRUT
                                            </label>
                                        </td>
                                        <td colspan="3">
                                            <select size="1" class="form-control" id="jnsbody">
                                                <option value="">Pilih Item</option>                       
                                                <?php
                                                $resultNamaKomersil = TblKarJenis::model()->findAll(array('order'=>'kar_jenis'));
                                                foreach ($resultNamaKomersil as $dataNamaKomersil) {
                                                    echo "<option values=" . $dataNamaKomersil['kar_jenis'] . ">" . $dataNamaKomersil['kar_jenis'] . "</option>";
                                                };
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11. Perisai kolong</td>
                                        <td colspan="2" align="center" bgcolor="#CCFFFF"><b>RUSAK</b></td>
                                        <td colspan="2" align="center" bgcolor="#66FFFF"><b>TIDAK ADA</b></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="c11b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF" width="15%">
                                            <label>
                                                <input id="c11a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="c11d" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="15%">
                                            <label>
                                                <input id="c11c" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>12. Cabin/bak diubah</td>
                                        <td colspan="2">
                                            <label>
                                                <input id="c12" type="checkbox" class="flat-red"> Tidak sesuai type kendaraan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>13. Bahan Bak</td>
                                        <td>
                                            <label>
                                                <input id="c13" type="checkbox" class="flat-red"> Tidak Sesuai STUK/SRUT
                                            </label>
                                        </td>
                                        <td colspan="3">
                                            <select size="1" class="form-control ui-state-default" id="jnsbahan">
                                                <option value="">Pilih Item</option>                       
                                                <?php
                                                $resultKarBahan = TblKarBahan::model()->findAll(array('order'=>'kar_bahan'));
                                                foreach ($resultKarBahan as $dataKarBahan) {
                                                    echo "<option values=" . $dataKarBahan['kar_bahan'] . ">" . $dataKarBahan['kar_bahan'] . "</option>";
                                                };
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>14. Hidrolis dump</td>
                                        <td>
                                            <label>
                                                <input id="c14" type="checkbox" class="flat-red"> Tidak Berfungsi
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>15. Kaca pintu</td>
                                        <td>
                                            <label>
                                                <input id="c15a" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c15b" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>16. Pemasangan kaca film</td>
                                        <td colspan="4">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>- Pemasangan kaca film lebih dari 1/3 luas</td>
                                        <td>
                                            <label>
                                                <input id="c16a1" type="checkbox" class="flat-red"> Depan
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id=c16a2" type="checkbox" class="flat-red"> Belakang
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16a3" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16a4" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>- Ketebalan lebih dari 40%</td>
                                        <td>
                                            <label>
                                                <input id="c16b1" type="checkbox" class="flat-red"> Depan
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16b2" type="checkbox" class="flat-red"> Belakang
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16b3" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16b4" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>- Ketebalan lebih dari 30% untuk pemasangan penuh</td>
                                        <td>
                                            <label>
                                                <input id="c16c1" type="checkbox" class="flat-red"> Depan
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16c2" type="checkbox" class="flat-red"> Belakang
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16c3" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="c16c4" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>17. Kondisi body</td>
                                        <td>
                                            <label>
                                                <input id="c17" type="checkbox" class="flat-red"> Keropos
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>18. Pintu - pintu</td>
                                        <td>
                                            <label>
                                                <input id="c18" type="checkbox" class="flat-red"> Keropos
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>19. Kondisi Kursi</td>
                                        <td>
                                            <label>
                                                <input id="c19" type="checkbox" class="flat-red"> Rusak
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                </table>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_4">
                                <table width="100%">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td colspan="4" align="center" bgcolor="#CCFFFF"><b>KIRI</b></td>
                                        <td colspan="4" align="center" bgcolor="#66FFFF"><b>KANAN</b></td>
                                    </tr>
                                    <tr>
                                        <td width="40%">1. Ukuran dan jenis ban tidak sesuai dengan STUK/SRUT</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d1e" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d1f" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d1g" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d1h" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d1a" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d1b" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d1c" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d1d" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2. Kondisi ban rusak</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d2e" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d2f" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d2g" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d2h" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d2a" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d2b" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d2c" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d2d" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3. Kedalaman alur ban < 1 mm</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d3e" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d3f" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d3g" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d3h" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d3a" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d3b" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d3c" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d3d" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4. Penguat ban/roda tidak ada</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d4e" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d4f" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d4g" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d4h" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d4a" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d4b" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d4c" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d4d" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >5. Kondisi pelek rusak</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d5e" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d5f" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d5g" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="d5h" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d5a" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d5b" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d5c" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="d5d" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6. Konfigurasi Sumbu</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="d6" type="checkbox" class="flat-red"> tidak sesuai STUK/SRUT
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7. Kedalaman alur ban cadangan < 1 mm</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="d5" type="checkbox" class="flat-red"> Ya
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8. Kondisi Ban Cadangan</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="d8" type="checkbox" class="flat-red"> Rusak
                                            </label>
                                        </td>
                                    </tr>
                                </table>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_5">
                                <table width="100%">
                                    <tr>
                                        <td>1. Ukuran utama tidak sesuai STUK/SRUT</td>
                                        <td>
                                            <label>
                                                <input id="e1a" type="checkbox" class="flat-red"> Panjang
                                            </label>
                                        </td>  
                                        <td><input type="text" size="6" maxlength="6" id="e1ain"/></td>
                                        <td>
                                            <label>
                                                <input id="e1b" type="checkbox" class="flat-red"> Lebar
                                            </label>
                                        </td>
                                        <td><input type="text" size="6" maxlength="6" id="e1bin"/></td>
                                        <td>
                                            <label>
                                                <input id="e1c" type="checkbox" class="flat-red"> Tinggi
                                            </label>
                                        </td>   
                                        <td><input type="text" size="6" maxlength="6" id="e1cin"/></td>
                                    </tr>
                                    <tr>
                                        <td>2. Ukuran bak muatan tidak sesuai STUK/SRUT</td>
                                        <td>
                                            <label>
                                                <input id="e2a" type="checkbox" class="flat-red"> Panjang
                                            </label>
                                        </td>  
                                        <td><input type="text" size="6" maxlength="6" id="e2ain"/></td>
                                        <td>
                                            <label>
                                                <input id="e2b" type="checkbox" class="flat-red"> Lebar
                                            </label>
                                        </td>
                                        <td><input type="text" size="6" maxlength="6" id="e2bin"/></td>
                                        <td>
                                            <label>
                                                <input id="e2c" type="checkbox" class="flat-red"> Tinggi
                                            </label>
                                        </td>   
                                        <td><input type="text" size="6" maxlength="6" id="e2cin"/></td>
                                    </tr>
                                    <tr>
                                        <td>3. Jarak sumbu tidak sesuai STUK/SRUT</td>
                                        <td>
                                            <label>
                                                <input id="e3a" type="checkbox" class="flat-red"> I - II
                                            </label>
                                        </td>  
                                        <td><input type="text" size="6" maxlength="6" id="e3ain"/></td>
                                        <td>
                                            <label>
                                                <input id="e3b" type="checkbox" class="flat-red"> II - III
                                            </label>
                                        </td>
                                        <td><input type="text" size="6" maxlength="6" id="e3bin"/></td>
                                        <td>
                                            <label>
                                                <input id="e3c" type="checkbox" class="flat-red"> III - IV
                                            </label>
                                        </td>   
                                        <td><input type="text" size="6" maxlength="6" id="e3cin"/></td>
                                    </tr>
                                    <tr>
                                        <td>4. Ukuran tangki tidak sesuai STUK/SRUT</td>
                                        <td>
                                            <label>
                                                <input id="e4a" type="checkbox" class="flat-red"> Panjang
                                            </label>
                                        </td>  
                                        <td><input type="text" size="6" maxlength="6" id="e4ain"/></td>
                                        <td>
                                            <label>
                                                <input id="e4b" type="checkbox" class="flat-red"> Lebar
                                            </label>
                                        </td>
                                        <td><input type="text" size="6" maxlength="6" id="e4bin"/></td>
                                        <td>
                                            <label>
                                                <input id="e4c" type="checkbox" class="flat-red"> Tinggi
                                            </label>
                                        </td>   
                                        <td><input type="text" size="6" maxlength="6" id="e4cin"/></td>
                                    </tr>
                                    <tr>
                                        <td>5. Jenis muatan</td>
                                        <td>
                                            <label>
                                                <input id="e5" type="checkbox" class="flat-red"> Tidak sesuai STUK/SRUT
                                            </label>
                                        </td>
                                        <td>
                                            <input type="text" size="6" id="e5in"/>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>6. FOH tidak sesuai STUK/SRUT</td>
                                        <td>
                                            <label>
                                                <input id="e6" type="checkbox" class="flat-red"> FOH
                                            </label>
                                        </td>
                                        <td>
                                            <input type="text" size="6" id="e6in"/>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>7. ROH tidak sesuai STUK/SRUT</td>
                                        <td>
                                            <label>
                                                <input id="e7" type="checkbox" class="flat-red"> ROH
                                            </label>
                                        </td>
                                        <td>
                                            <input type="text" size="6" id="e7in"/>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>8. Volume tangki tidak sesuai STUK/SRUT</td>
                                        <td>
                                            <label>
                                                <input id="e8" type="checkbox" class="flat-red"> Volume tangki
                                            </label>
                                        </td>
                                        <td>
                                            <input type="text" size="6" id="e8in"/>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>9. Bahan tangki tidak sesuai STUK/SRUT</td>
                                        <td>
                                            <label>
                                                <input id="e9" type="checkbox" class="flat-red"> Bahan tangki
                                            </label>
                                        </td>
                                        <td>
                                            <input type="text" size="6" id="e8in"/>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                </table>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_6">
                                <table width="100%">
                                    <tr>
                                        <td></td>
                                        <td colspan="2" align="center"  bgcolor="#CCFFFF"><b>KIRI</b></td>
                                        <td colspan="2" align="center" bgcolor="#66FFFF"><b>KANAN</b></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">1. Penghapus kaca depan / wiper</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="f1c" type="checkbox" class="flat-red"> Rusak
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="f1d" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="f1a" type="checkbox" class="flat-red"> Rusak
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="f1b" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2. Kaca Spion</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="f2c" type="checkbox" class="flat-red"> Pecah / Rusak
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="f2d" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="f2a" type="checkbox" class="flat-red"> Pecah / Rusak
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="f2b" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3. Spakbor Tidak Ada</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="f3c" type="checkbox" class="flat-red"> Depan
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="f3d" type="checkbox" class="flat-red"> Belakang
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="f3a" type="checkbox" class="flat-red"> Depan
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="f3b" type="checkbox" class="flat-red"> Belakang
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4. Speedometer</td>
                                        <td colspan="2">
                                            <label>
                                                <input id="f4a" type="checkbox" class="flat-red"> Tidak berfungsi
                                            </label>
                                        </td>
                                        <td colspan="2">
                                            <label>
                                                <input id="f4b" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5. Klackson</td>
                                        <td>
                                            <label>
                                                <input id="f5" type="checkbox" class="flat-red"> Tidak Berfungsi
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>6. Dongkrak</td>
                                        <td>
                                            <label>
                                                <input id="f6" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>7. Alat - alat / kunci</td>
                                        <td>
                                            <label>
                                                <input id="f7" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>8. Ban cadangan</td>
                                        <td>
                                            <label>
                                                <input id="f8" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>9. Tanda segitiga pengaman</td>
                                        <td>
                                            <label>
                                                <input id="f9" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>10. Sabuk keselamatan</td>
                                        <td>
                                            <label>
                                                <input id="f10" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>11. Kotak P3K</td>
                                        <td>
                                            <label>
                                                <input id="f11" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>12. Alat pemadam kebakaran</td>
                                        <td>
                                            <label>
                                                <input id="f12" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>13. Alat pemecah kaca</td>
                                        <td>
                                            <label>
                                                <input id="f13" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>14. Tabir matahari</td>
                                        <td>
                                            <label>
                                                <input id="f14" type="checkbox" class="flat-red"> Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>15. Dashboard</td>
                                        <td>
                                            <label>
                                                <input id="f15" type="checkbox" class="flat-red"> Rusak / Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>16. Twist lock</td>
                                        <td>
                                            <label>
                                                <input id="f16" type="checkbox" class="flat-red"> Kurang / Tidak Ada
                                            </label>
                                        </td>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                </table>
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div>
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <div class="box-title"><strong>Lain - lain</strong></div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-lg-4 col-md-4 no-padding" style="margin-top: 20px">
                                <input type="text" id="text_search_kelulusan" class="text-besar form-control" placeholder="SEARCH TL LAIN-LAIN">
                            </div>    
                            <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                                <table id="praujiLainListGrid" style="height: 500px"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#praujiListGrid').datagrid({
        url: '<?php echo $this->createUrl('prauji/ListGrid'); ?>',
        pagination: true,
        singleSelect: true,
        selectOnCheck: true,
        checkOnSelect: true,
        collapsible: true,
        rownumbers: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: true,
        pageNumber: 1,
        pageSize: 5,
        pageList: [5, 10, 20, 50],
        columns: [[
                {field: 'id_kendaraan', title: '', hidden: true},
                {field: 'id_hasil_uji', title: '', hidden: true},
//                {field: 'numerator', width: 100, title: 'Numerator'},
//                {field: 'numerator_hari', width: 100, title: 'Numerator'},
                {field: 'nm_uji', title: 'Jenis Uji', width: 120, sortable: false, align: 'center'},
                {field: 'no_kendaraan', width: 100, title: 'No Kendaraan', sortable: false},
                {field: 'no_uji', title: 'No Uji', width: 120, sortable: false},
                {field: 'no_chasis', title: 'No Chassis', width: 120, sortable: false},
                {field: 'no_mesin', title: 'No Mesin', width: 120, sortable: false},
                {field: 'merk', title: 'Merk', width: 95, sortable: false},
                {field: 'tipe', title: 'Tipe', width: 80, sortable: false},
                {field: 'nm_komersil', title: 'Komersil', width: 130, sortable: false},
                {field: 'karoseri_bahan', title: 'Bahan', width: 120, sortable: false},
                {field: 'karoseri_jenis', title: 'Jenis', width: 120, sortable: false},
                {field: 'tahun', title: 'Tahun', width: 70, sortable: false, align: 'center'},
                {field: 'bahan_bakar', title: 'Bahan Bakar', width: 90, sortable: false},
            ]],
        //        toolbar: "#search",
        onBeforeLoad: function (params) {
//            params.selectGanjilGenap = $('#select_ganjil_genap :selected').val();
            params.textCategory = $('#text_category_prauji').val();
            params.textSearch = $('#text_search_prauji').val();
        },
        onClickRow: function () {
            getInformationPrauji();
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    $('#praujiLainListGrid').datagrid({
        url: '<?php echo $this->createUrl('prauji/LainListGrid'); ?>',
        pagination: true,
        singleSelect: false,
        selectOnCheck: true,
        checkOnSelect: true,
        collapsible: true,
        rownumbers: true,
        striped: true,
        loadMsg: 'Loading...',
        method: 'POST',
        nowrap: false,
        pageNumber: 1,
        pageSize: 200,
        pageList: [50, 100, 200],
        columns: [[
                {field: 'CHECKED', align: 'center', checkbox: true},
                {field: 'kd_lulus', width: 50, title: 'KODE', sortable: false},
                {field: 'kelulusan', width: 600, title: 'KELULUSAN', sortable: false},
            ]],
        //        toolbar: "#search",
        onBeforeLoad: function (params) {
            params.textCategory = $('#text_search_kelulusan').val();            
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });

    $(document).on("keypress", '#text_search_prauji', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearchPrauji();
            return false;
        }
    });
   
    $(document).on("keypress", '#text_search_kelulusan', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            prosesSearch();
            return false;
        }
    });
</script>