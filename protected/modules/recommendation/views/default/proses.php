<div id="tabs-easyui" class="easyui-tabs">
    <div id="mutasi_keluar" class="tab-pane" title="Mutasi keluar" style="padding:10px 3px">
        <?php $this->renderPartial('proses_mk', array('urlAct' => $urlAct, 'step' => $step)); ?>
    </div>
    <div id="numpang_keluar" class="tab-pane" title="Numpang Keluar" style="padding:10px 3px">
        <?php $this->renderPartial('proses_nk', array('urlAct' => $urlAct, 'step' => $step)); ?>
    </div>
    <div id="ubah_sifat" class="tab-pane" title="Ubah Sifat" style="padding:10px 3px">
        <?php $this->renderPartial('proses_us', array('urlAct' => $urlAct, 'step' => $step)); ?>
    </div>
</div>