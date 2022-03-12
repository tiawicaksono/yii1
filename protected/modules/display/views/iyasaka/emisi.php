<script type="text/javascript">
    $(document).ready(function () {
        window.setInterval(function () {
            getKelulusan();
        }, 1000);

        function getKelulusan() {
            var cis = $('#choose_proses').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->createUrl('Prosesuji/GetKelulusanEmisi'); ?>',
                data: {cis: cis},
                dataType: "json",
                beforeSend: function () {
                },
                success: function (data) {
                    $('#no_uji').html(data.no_uji);
                    $('#no_kendaraan').html(data.no_kendaraan);
                    $('#kelulusan').html(data.kelulusan);
                    $('#list_kelulusan').html(data.list_kelulusan);
                    $('#diesel').html(data.diesel);
                    $('#mesin_co').html(data.mesin_co);
                    $('#mesin_hc').html(data.mesin_hc);
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
<input type="hidden" id="choose_proses" value="Iyasaka">
<div class="row">
    <div class="col-lg-12" style="width: 100%">
        <div class="box box-info" style="padding: 0px; margin: 0px;">
            <div class="box-header with-border center bg-aqua">
                <span class="box-title bold" style="font-size: 36pt">DISPLAY HASIL EMISI</span>
            </div><!-- /.box-header -->
            <div class="box-body bg-black" style="width: 100%">
                <div class="col-lg-5 center" style="padding:0px; margin:0px;">
                    <span id="no_uji" class="bold" style="font-size: 52pt;">SB XXXXXX K</span>
                    <br />
                    <span id="no_kendaraan" class="bold" style="font-size: 92pt;">L XXXX XX</span>
                </div>
                <div class="col-lg-7 center" style="padding:0px; margin:0px;">
                    <div class="row">
                        <div class="col-lg-4 center">&nbsp;</div>
                        <div class="col-lg-4 center">
                            <span class="bold" style="font-size: 36pt;">Nilai</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4" style="text-align:right">
                            <span class="bold" style="font-size: 36pt;">Diesel</span>
                        </div>
                        <div class="col-lg-4 center">
                            <span id="diesel" class="bold" style="font-size: 36pt; color: #eef442"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4" style="text-align:right">
                            <span class="bold" style="font-size: 36pt;">Mesin CO</span>
                        </div>
                        <div class="col-lg-4 center">
                            <span id="mesin_co" class="bold" style="font-size: 36pt; color: #eef442"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4" style="text-align:right">
                            <span class="bold" style="font-size: 36pt;">Mesin HC</span>
                        </div>
                        <div class="col-lg-4 center">
                            <span id="mesin_hc" class="bold" style="font-size: 36pt; color: #eef442"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 center" style="padding:0px; margin:0px;">
                    <span id="kelulusan" class="bold" style="font-size: 102pt;">TIDAK LULUS</span>
                </div>
            </div>
        </div>
        <div class="box box-danger">
            <div class="box-header with-border center bg-red-active">
                <span class="box-title bold" style="font-size: 36pt">KETERANGAN TIDAK LULUS</span>
            </div><!-- /.box-header -->
            <div style="width: 100%; height: 100%">
                <div class="col-lg-12">
                    <span id="list_kelulusan" style="font-size: 42pt;">...</span>
                </div>
            </div>
        </div>
    </div>
</div>