<script type="text/javascript">
    $(document).ready(function () {
        window.setInterval(function () {
            getKelulusan();
        }, 1000);

        function getKelulusan() {
            var cis = $('#choose_proses').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->createUrl('Prosesuji/GetKelulusanPrauji'); ?>',
                data: {cis: cis},
                dataType: "json",
                beforeSend: function () {
                },
                success: function (data) {
                    $('#no_uji').html(data.no_uji);
                    $('#no_kendaraan').html(data.no_kendaraan);
                    $('#kelulusan').html(data.kelulusan);
                    $('#list_kelulusan').html(data.list_kelulusan);
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
<input type="hidden" id="choose_proses" value="CIS 1">
<div class="row">
    <div class="col-lg-12" style="width: 100%">
        <div class="box box-info" style="padding: 0px; margin: 0px;">
            <div class="box-header with-border center bg-aqua">
                <span class="box-title bold" style="font-size: 36pt">DISPLAY HASIL PRAUJI</span>
            </div><!-- /.box-header -->
            <div class="box-body bg-black" style="width: 100%">
                <div class="col-lg-6 center">
                    <span id="no_uji" class="bold" style="font-size: 62pt;">SB XXXXXX K</span>
                    <br />
                    <span id="no_kendaraan" class="bold" style="font-size: 82pt;">L XXXX XX</span>
                </div>
                <div class="col-lg-6 center">
                    <span id="kelulusan" class="bold" style="font-size: 92pt;">TIDAK LULUS</span>
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