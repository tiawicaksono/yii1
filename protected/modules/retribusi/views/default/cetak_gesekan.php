<style>
    @page {
        margin-left:0px;
        margin-right:0px;
        margin-top:0px;
        margin-bottom:0px;
    }
    @media print {
        #pages {
            overflow: hidden;
            font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
            padding-left: 70px;
            padding-top: 60px;
            font-size: 12pt;
            font-weight: bold;
        }
        .center{
            text-align: center;
        }
        #no_mesin{
            margin-left: 35px;
        }
        #no_rangka{
            margin-top: 40px;
        }
        #no_uji{
            margin-top: 40px;
        }
    }
</style>
<?php
$data = VKendaraan::model()->findByAttributes(array('id_kendaraan' => $id_kendaraan));
$data_retribusi = TblRetribusi::model()->findByPk($id_retribusi);
$numerator_hari = $data_retribusi->numerator_hari;
?>
<div id="pages">
    <div style="position: fixed; right: 100px; font-weight: bold; font-size: 20pt; border: #000 solid; top: 30px; padding: 3px;"><?php echo $numerator_hari; ?></div>
    <div id="no_mesin">No.Mesin <br/><?php echo $data->no_mesin; ?></div>
    <div id="no_rangka">No.Rangka <br/><?php echo $data->no_chasis; ?></div>
    <div id="no_uji">No.Uji <br/><?php echo $data->no_uji; ?></div>
</div>
<script type="text/javascript">
    window.print();
    setTimeout(window.close, 0);
</script>