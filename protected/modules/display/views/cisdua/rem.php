<script type="text/javascript">
    $(document).ready(function () {
        window.setInterval(function () {
            getKelulusan();
        }, 1000);

        function getKelulusan() {
            var cis = $('#choose_proses').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->createUrl('Prosesuji/GetKelulusanBrake'); ?>',
                data: {cis: cis},
                dataType: "json",
                beforeSend: function () {
                },
                success: function (data) {
                    $('#no_uji').html(data.no_uji);
                    $('#no_kendaraan').html(data.no_kendaraan);
                    $('#kelulusan').html(data.kelulusan);
                    $('#list_kelulusan').html(data.list_kelulusan);
//                    $('#grem_sb1').html(data.grem_sb1);
//                    $('#grem_sb2').html(data.grem_sb2);
                    $('#grem_sb12').html(data.grem_sb12);
                    $('#selrem_sb1').html(data.selrem_sb1);
                    $('#selrem_sb2').html(data.selrem_sb2);
                    if(data.nilai_kelulusan == 1){
                        $('#keterangan_tl').hide();
                    }else{
                        $('#keterangan_tl').show();
                        $('#list_kelulusan').html(data.list_kelulusan);
                    }
                },
                error: function () {
                    return false;
                }
            });
        }
    });
</script>
<style>
    .bold{
        font-weight: bold;
    }
    .center{
        text-align: center;
        vertical-align: middle;
    }
</style>
<input type="hidden" id="choose_proses" value="CIS 2">
<div class="row">
    <div class="col-lg-12" style="width: 100%">
        <div class="box box-info" style="padding: 0px; margin: 0px;">
            <div class="box-header with-border center bg-aqua">
                <span class="box-title bold" style="font-size: 36pt">DISPLAY HASIL REM</span>
            </div><!-- /.box-header -->
            <div class="box-body bg-black" style="width: 100%">
                <div class="col-lg-5 center" style="padding:0px; margin:0px;">
                    <span id="no_uji" class="bold" style="font-size: 52pt;">SB XXXXXX K</span>
                    <br />
                    <span id="no_kendaraan" class="bold" style="font-size: 92pt;">L XXXX XX</span>
                </div>
                <div class="col-lg-7 center" style="padding:0px; margin:0px;">
                    <table width="100%">
                        <tr>
                            <td></td>
                            <td><span class="bold" style="font-size: 36pt;">Total Gaya Rem</span></td>
                            <td><span class="bold" style="font-size: 36pt;">Selisih Rem</span></td>
                        </tr>
                        <tr>
                            <td><span class="bold" style="font-size: 36pt;">Sumbu I</span></td>
                            <td rowspan="2"><span id="grem_sb12" class="bold" style="font-size: 36pt; color: #eef442"></span></td>
                            <td><span id="selrem_sb1" class="bold" style="font-size: 36pt; color: #eef442"></span></td>
                        </tr>
                        <tr>
                            <td><span class="bold" style="font-size: 36pt;">Sumbu II</span></td>
                            <td><span id="selrem_sb2" class="bold" style="font-size: 36pt; color: #eef442"></span></td>
                        </tr>
                    </table>
<!--                    <div class="row">
                        <div class="col-lg-4 center">&nbsp;</div>
                        <div class="col-lg-4 center">
                            <span class="bold" style="font-size: 36pt;">Total Gaya Rem</span>
                        </div>
                        <div class="col-lg-4 center">
                            <span class="bold" style="font-size: 36pt;">Selisih Rem</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4" style="text-align:right">
                            <span class="bold" style="font-size: 36pt;">Sumbu I</span>
                        </div>
                        <div class="col-lg-4 center">
                            <span id="grem_sb1" class="bold" style="font-size: 36pt; color: #eef442"></span>
                        </div>
                        <div class="col-lg-4 center">
                            <span id="selrem_sb1" class="bold" style="font-size: 36pt; color: #eef442"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4" style="text-align:right">
                            <span class="bold" style="font-size: 36pt;">Sumbu II</span>
                        </div>
                        <div class="col-lg-4 center">
                            <span id="grem_sb2" class="bold" style="font-size: 36pt; color: #eef442"></span>
                        </div>
                        <div class="col-lg-4 center">
                            <span id="selrem_sb2" class="bold" style="font-size: 36pt; color: #eef442"></span>
                        </div>
                    </div>-->
                </div>
                <div class="col-lg-12 center" style="padding:0px; margin:0px;">
                    <span id="kelulusan" class="bold" style="font-size: 102pt;">TIDAK LULUS</span>
                </div>
            </div>
        </div>
        <div id="keterangan_tl" class="box box-danger">
            <div class="box-header with-border center bg-red-active">
                <span class="box-title bold" style="font-size: 36pt">KETERANGAN TIDAK LULUS</span>
            </div><!-- /.box-header -->
            <div style="width: 100%; height: 100%;">
                <div class="col-lg-12" style="background-color: #FFF; height: 250px;">
                    <span id="list_kelulusan" style="font-size: 42pt; color:#000;">...</span>
                </div>
            </div>
        </div>
    </div>
</div>