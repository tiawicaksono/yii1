<?php
$baseUrl = Yii::app()->request->baseUrl;
$assetsUrl = $this->module->assetsUrl;
$cs = Yii::app()->clientScript;
$cs->registerCssFile($assetsUrl . '/css/check_radio.css');
$cs->registerScriptFile($assetsUrl . '/js/pitlift.js', CClientScript::POS_END);
$cs->registerScriptFile($assetsUrl . '/js/jquery.numeric.js', CClientScript::POS_END);
?>
<style>
    .datagrid-row{
        height: 40px !important;
    }
    .datagrid-cell-c4-no_kendaraan {
        font-weight: bold !important;
        font-size: 12pt !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">PITLIFT - KENDARAAN LIST</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <table id="pitliftListGrid"></table>
                </div>
                <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                    <center>
                        <button type="button" class="btn btn-info" onclick="prosesSearchPitlift()">
                            <span class="glyphicon glyphicon-refresh"></span> REFRESH
                        </button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">PITLIFT</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-lg-8 col-md-8">
                        <div class="col-lg-3 col-md-3">
                            <input type="hidden" id="no_antrian_pitlift" class="form-control" placeholder="NO ANTRIAN" readonly="readonly" style="font-weight: bold;"/>
                            <input type="hidden" id="username_pitlift" readonly="readonly" value="<?php echo Yii::app()->session['username']; ?>"/>
                            <input type="hidden" id="id_hasil_uji_pitlift" readonly="readonly"/>
                            <input type="hidden" id="posisi_cis_pitlift" readonly="readonly" value="<?php echo Yii::app()->session['posisi_cis']; ?>"/>
                            <input type="text" id="no_kendaraan_pitlift" class="form-control" placeholder="NO KEND" readonly="readonly" />
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <input type="text" id="no_uji_pitlift" class="form-control" placeholder="NO UJI" readonly="readonly" />
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <button type="button" class="btn btn-primary" onclick="prosesPitlift('<?php echo $this->createUrl('Pitlift/Proses'); ?>')">PROSES</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1_pitlift" data-toggle="tab"><b>Sistem Kemudi dan Landasan</b></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1_pitlift">
                                <table width="100%">
                                    <tr>
                                        <td width="20%">1. Ball joint pitmen arm</td>
                                        <td width="10%">
                                            <label>
                                                <input id="g1" type="checkbox" class="flat-red"> Aus
                                            </label>
                                        </td>
                                        <td colspan="7"></td>
                                    </tr>
                                    <tr>
                                        <td>2. Ball joint draglink</td>
                                        <td>
                                            <label>
                                                <input id="g2" type="checkbox" class="flat-red"> Aus
                                            </label>
                                        </td>
                                        <td colspan="7"></td>
                                    </tr>
                                    <tr>
                                        <td>3. Ball joint idle arm</td>
                                        <td>
                                            <label>
                                                <input id="g3" type="checkbox" class="flat-red"> Aus
                                            </label>
                                        </td>
                                        <td colspan="7"></td>
                                    </tr>
                                    <tr>
                                        <td>4. Ball joint tierod aus</td>
                                        <td>
                                            <label>
                                                <input id="g4b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="g4a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="6"></td>
                                    </tr>
                                    <tr>
                                        <td>5. King pin aus</td>
                                        <td>
                                            <label>
                                                <input id="g5a" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="g5b" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="6"></td>
                                    </tr>
                                    <tr>
                                        <td>6. Kondisi shock absorber</td>
                                        <td colspan="4" align="center" bgcolor="#CCFFFF"><b>KIRI</b></td>
                                        <td colspan="4" align="center" bgcolor="#66FFFF"><b>KANAN</b></td>
                                    </tr>
                                    <tr>
                                        <td>- Shock absorber Patah</td>
                                        <td bgcolor="#CCFFFF" width="10%">
                                            <label>
                                                <input id="g6a1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF" width="10%">
                                            <label>
                                                <input id="g6a2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF" width="10%">
                                            <label>
                                                <input id="g6a3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF" width="10%">
                                            <label>
                                                <input id="g6a4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="10%">
                                            <label>
                                                <input id="g6b1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="10%">
                                            <label>
                                                <input id="g6b2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="10%">
                                            <label>
                                                <input id="g6b3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF" width="10%">
                                            <label>
                                                <input id="g6b4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>- Shock absorber Tidak Ada</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g6c1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g6c2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g6c3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g6c4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g6d1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g6d2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g6d3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g6d4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7. Kondisi pegas / daun leaf spring</td>
                                        <td colspan="8"></td>
                                    </tr>
                                    <tr>
                                        <td>- Pegas / daun leaf spring rusak</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7a1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7a2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7a3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7a4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7b1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7b2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7b3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7b4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>- Pegas / daun leaf spring patah</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7c1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7c2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7c3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7c4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7d1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7d2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7d3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7d4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>- Pengikat pegas/daun(U bolt) kurang panjang</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7e1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7e2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7e3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7e4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7f1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7f2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7f3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7f4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>- Pengikat pegas/daun(U bolt) kendor</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7g1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7g2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7g3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g7g4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7h1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7h2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7h3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g7h4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8. Gantungan leaf spring (hanger&amp;sekel) Rusak</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g8a1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g8a2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g8a3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g8a4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g8b1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g8b2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g8b3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g8b4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9. Bushing Aus</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g9a1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g9a2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g9a3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g9a4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g9b1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g9b2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g9b3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g9b4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10. Suspensi udara (balon) Bocor</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g10a1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g10a2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g10a3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g10a4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g10b1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g10b2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g10b3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g10b4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11. Chamber rem angin Bocor</td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g11a1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g11a2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g11a3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#CCFFFF">
                                            <label>
                                                <input id="g11a4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g11b1" type="checkbox" class="flat-red"> S1
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g11b2" type="checkbox" class="flat-red"> S2
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g11b3" type="checkbox" class="flat-red"> S3
                                            </label>
                                        </td>
                                        <td bgcolor="#66FFFF">
                                            <label>
                                                <input id="g11b4" type="checkbox" class="flat-red"> S4
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>12. Master cylinder</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g11" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>13. Pipa penyalur minyak rem</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g12" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>14. Selang/fleksible recervoir tank</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g13" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15. Tabung compresor angin</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g13a" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>16. Pengatur tekanan angin ( Automatis rem )</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g13b" type="checkbox" class="flat-red"> Rusak
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>17. Radiator</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g14" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>18. Cross joint</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g18" type="checkbox" class="flat-red"> Aus
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>19. Batang kemudi gandengan (king pen)</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g19" type="checkbox" class="flat-red"> Aus
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>20. Baut pengikat body</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g20" type="checkbox" class="flat-red"> Aus
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>21. Cross member</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g21" type="checkbox" class="flat-red"> keropos
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>22. Side member Keropos</td>
                                        <td>
                                            <label>
                                                <input id="g22b" type="checkbox" class="flat-red"> Kiri
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="g22a" type="checkbox" class="flat-red"> Kanan
                                            </label>
                                        </td>
                                        <td colspan="6"></td>
                                    </tr>
                                    <tr>
                                        <td>23. Tangki bahan bakar</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g23" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24. Pipa penyalur bahan bakar</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g22" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>25. Pompa bahan bakar ( bosh pump )</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g24" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>26. Filter bahan bakar</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g26" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>27. Minyak rem kopling</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g27" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>28. Power stering</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g28" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>29. Pipa gas buang</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g29" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>30. Arah pipa gas buang</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g30" type="checkbox" class="flat-red"> tidak sesuai
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>31. Kondisi mufler</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g31" type="checkbox" class="flat-red"> Bocor / Putus
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>32. Gantungan/pengikat mufler</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g32" type="checkbox" class="flat-red"> Aus
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>33. Kebocoran oli</td>
                                        <td>
                                            <label>
                                                <input id="g33a" type="checkbox" class="flat-red"> Gear box
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="g33b" type="checkbox" class="flat-red"> Mesin
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="g33c" type="checkbox" class="flat-red"> Transmisi
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input id="g33d" type="checkbox" class="flat-red"> Gardan
                                            </label>
                                        </td>
                                        <td colspan="4"></td>
                                    </tr>
                                    <tr>
                                        <td>34. Baut meja putar</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g34" type="checkbox" class="flat-red"> Kendor / Kurang
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>35. Selang / pipa penyalur rem angin</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g35" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>36. Rem parkir</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g36" type="checkbox" class="flat-red"> Tidak Berfungsi
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>37. Niple ( penyambung rem angin tempelan )</td>
                                        <td colspan="8">
                                            <label>
                                                <input id="g37" type="checkbox" class="flat-red"> Bocor
                                            </label>
                                        </td>
                                    </tr>
                                </table>
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div>
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Lain - lain</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-lg-12 col-md-12 no-padding" style="margin-top: 20px">
                                <table id="pitliftLainListGrid" style="height: 500px"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#pitliftListGrid').datagrid({
        url: '',
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
        pageList: [5, 10, 20],
        columns: [[
                {field: 'id_hasil_uji', title: '', hidden: true},
//                {field: 'numerator', width: 100, title: 'Numerator', sortable: true},
//                {field: 'numerator_hari', width: 100, title: 'Numerator'},
                {field: 'nm_uji', title: 'Jenis Uji', width: 120, sortable: false, align: 'center'},
//                {field: 'no_antrian', width: 100, title: 'No Antrian', sortable: false},
                {field: 'no_kendaraan', width: 100, title: 'No Kendaraan', sortable: false},
                {field: 'no_uji', title: 'No Uji', width: 120, sortable: false},
                {field: 'merk', title: 'Merk', width: 95, sortable: false},
                {field: 'tipe', title: 'Tipe', width: 80, sortable: false},
                {field: 'nm_komersil', title: 'Komersil', width: 130, sortable: false},
                {field: 'karoseri_jenis', title: 'Jenis', width: 120, sortable: false},
                {field: 'tahun', title: 'Tahun', width: 70, sortable: false, align: 'center'},
                {field: 'bahan_bakar', title: 'Bahan Bakar', width: 90, sortable: false},
            ]],
        onClickRow: function () {
            getInformationPitlift();
        },
    });
    
    $('#pitliftLainListGrid').datagrid({
        url: '<?php echo $this->createUrl('pitlift/LainListGrid'); ?>',
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
        pageSize: 20,
        pageList: [20, 50],
        columns: [[
                {field: 'CHECKED', align: 'center', checkbox: true},
                {field: 'kd_lulus', width: 50, title: 'KODE', sortable: false},
                {field: 'kelulusan', width: 600, title: 'KELULUSAN', sortable: false},
            ]],
        //        toolbar: "#search",
        onBeforeLoad: function (params) {
        },
        onLoadError: function () {
            return false;
        },
        onLoadSuccess: function () {
        }
    });
</script>