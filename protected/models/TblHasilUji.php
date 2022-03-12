<?php

/**
 * This is the model class for table "tbl_hasil_uji".
 *
 * The followings are the available columns in table 'tbl_hasil_uji':
 * @property string $id_hasil_uji
 * @property string $id_daftar
 * @property double $ktlamp_kanan
 * @property double $dev_kanan
 * @property double $dev_kiri
 * @property double $grem_sb1
 * @property double $grem_sb2
 * @property double $grem_sb3
 * @property double $grem_sb4
 * @property double $selrem_sb1
 * @property double $selrem_sb2
 * @property double $selgaya1
 * @property double $selgaya2
 * @property double $ems_diesel
 * @property double $ems_mesin_co
 * @property double $ems_mesin_hc
 * @property double $ktlamp_kiri
 * @property string $nm_penguji
 * @property integer $no_antrian
 * @property string $jdatang
 * @property string $jselesai
 * @property boolean $penyerahan
 * @property string $no_surat
 * @property string $keterangan
 * @property boolean $prauji
 * @property boolean $cetak
 * @property boolean $no_ujikend
 * @property boolean $no_casmesin
 * @property boolean $lp_arah
 * @property boolean $lp_rem
 * @property boolean $lp_mundur
 * @property boolean $lp_posisi
 * @property boolean $konbody
 * @property boolean $prisaikolong
 * @property boolean $ubansb1
 * @property boolean $ubansb2
 * @property boolean $alurban
 * @property boolean $kuatroda
 * @property boolean $uupanjang
 * @property boolean $uulebar
 * @property boolean $uutinggi
 * @property boolean $uufoh
 * @property boolean $uuroh
 * @property boolean $jssb12
 * @property boolean $dpanjang
 * @property boolean $dlebar
 * @property boolean $dtinggi
 * @property boolean $klipkcdepan
 * @property boolean $kcspion
 * @property boolean $dongkrak
 * @property boolean $peralatan
 * @property boolean $serep
 * @property boolean $tndsgtg
 * @property boolean $sabuk
 * @property boolean $ujimekanis
 * @property boolean $siskem
 * @property boolean $sissus
 * @property boolean $salrem
 * @property boolean $sisdaya
 * @property boolean $msntranmisi
 * @property boolean $tangki
 * @property boolean $salgasbuang
 * @property boolean $klakson
 * @property boolean $spedmeter
 * @property boolean $kincuproda
 * @property double $selrem_sb3
 * @property double $selrem_sb4
 * @property string $id_kendaraan
 * @property integer $alat
 * @property boolean $lulus_prauji
 * @property boolean $lulus_ujimekanis
 * @property string $nrp
 * @property string $jabatan
 * @property string $no_antrian1
 * @property boolean $stts_ant
 * @property integer $id_uji
 * @property boolean $smoke
 * @property boolean $lulus_smoke
 * @property boolean $pitlift
 * @property boolean $lulus_pitlift
 * @property boolean $lampu
 * @property boolean $lulus_lampu
 * @property boolean $break
 * @property boolean $lulus_break
 * @property boolean $uji_ulang
 * @property double $selgaya3
 * @property double $selgaya4
 * @property string $jproses
 * @property string $img_depan
 * @property string $img_belakang
 * @property string $posisi
 * @property double $no_tl
 * @property double $no_tldim
 * @property string $catatan
 * @property string $img_kiri
 * @property string $img_kanan
 */
class TblHasilUji extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_hasil_uji';
    }
    
    public function primaryKey() {
        return 'id_hasil_uji';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('no_antrian, alat, id_uji', 'numerical', 'integerOnly' => true),
            array('ktlamp_kanan, dev_kanan, dev_kiri, grem_sb1, grem_sb2, grem_sb3, grem_sb4, selrem_sb1, selrem_sb2, selgaya1, selgaya2, ems_diesel, ems_mesin_co, ems_mesin_hc, ktlamp_kiri, selrem_sb3, selrem_sb4, selgaya3, selgaya4, no_tl, no_tldim', 'numerical'),
            array('nm_penguji', 'length', 'max' => 50),
            array('no_surat, nrp, jabatan, no_antrian1', 'length', 'max' => 30),
            array('keterangan', 'length', 'max' => 1000),
            array('posisi', 'length', 'max' => 10),
            array('id_daftar, jdatang, jselesai, penyerahan, prauji, cetak, no_ujikend, no_casmesin, lp_arah, lp_rem, lp_mundur, lp_posisi, konbody, prisaikolong, ubansb1, ubansb2, alurban, kuatroda, uupanjang, uulebar, uutinggi, uufoh, uuroh, jssb12, dpanjang, dlebar, dtinggi, klipkcdepan, kcspion, dongkrak, peralatan, serep, tndsgtg, sabuk, ujimekanis, siskem, sissus, salrem, sisdaya, msntranmisi, tangki, salgasbuang, klakson, spedmeter, kincuproda, id_kendaraan, lulus_prauji, lulus_ujimekanis, stts_ant, smoke, lulus_smoke, pitlift, lulus_pitlift, lampu, lulus_lampu, break, lulus_break, uji_ulang, jproses, img_depan, img_belakang, catatan, img_kiri, img_kanan', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_hasil_uji, id_daftar, ktlamp_kanan, dev_kanan, dev_kiri, grem_sb1, grem_sb2, grem_sb3, grem_sb4, selrem_sb1, selrem_sb2, selgaya1, selgaya2, ems_diesel, ems_mesin_co, ems_mesin_hc, ktlamp_kiri, nm_penguji, no_antrian, jdatang, jselesai, penyerahan, no_surat, keterangan, prauji, cetak, no_ujikend, no_casmesin, lp_arah, lp_rem, lp_mundur, lp_posisi, konbody, prisaikolong, ubansb1, ubansb2, alurban, kuatroda, uupanjang, uulebar, uutinggi, uufoh, uuroh, jssb12, dpanjang, dlebar, dtinggi, klipkcdepan, kcspion, dongkrak, peralatan, serep, tndsgtg, sabuk, ujimekanis, siskem, sissus, salrem, sisdaya, msntranmisi, tangki, salgasbuang, klakson, spedmeter, kincuproda, selrem_sb3, selrem_sb4, id_kendaraan, alat, lulus_prauji, lulus_ujimekanis, nrp, jabatan, no_antrian1, stts_ant, id_uji, smoke, lulus_smoke, pitlift, lulus_pitlift, lampu, lulus_lampu, break, lulus_break, uji_ulang, selgaya3, selgaya4, jproses, img_depan, img_belakang, posisi, no_tl, no_tldim, catatan, img_kiri, img_kanan', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_hasil_uji' => 'Id Hasil Uji',
            'id_daftar' => 'Id Daftar',
            'ktlamp_kanan' => 'Ktlamp Kanan',
            'dev_kanan' => 'Dev Kanan',
            'dev_kiri' => 'Dev Kiri',
            'grem_sb1' => 'Grem Sb1',
            'grem_sb2' => 'Grem Sb2',
            'grem_sb3' => 'Grem Sb3',
            'grem_sb4' => 'Grem Sb4',
            'selrem_sb1' => 'Selrem Sb1',
            'selrem_sb2' => 'Selrem Sb2',
            'selgaya1' => 'Selgaya1',
            'selgaya2' => 'Selgaya2',
            'ems_diesel' => 'Ems Diesel',
            'ems_mesin_co' => 'Ems Mesin Co',
            'ems_mesin_hc' => 'Ems Mesin Hc',
            'ktlamp_kiri' => 'Ktlamp Kiri',
            'nm_penguji' => 'Nm Penguji',
            'no_antrian' => 'No Antrian',
            'jdatang' => 'Jdatang',
            'jselesai' => 'Jselesai',
            'penyerahan' => 'Penyerahan',
            'no_surat' => 'No Surat',
            'keterangan' => 'Keterangan',
            'prauji' => 'Prauji',
            'cetak' => 'Cetak',
            'no_ujikend' => 'No Ujikend',
            'no_casmesin' => 'No Casmesin',
            'lp_arah' => 'Lp Arah',
            'lp_rem' => 'Lp Rem',
            'lp_mundur' => 'Lp Mundur',
            'lp_posisi' => 'Lp Posisi',
            'konbody' => 'Konbody',
            'prisaikolong' => 'Prisaikolong',
            'ubansb1' => 'Ubansb1',
            'ubansb2' => 'Ubansb2',
            'alurban' => 'Alurban',
            'kuatroda' => 'Kuatroda',
            'uupanjang' => 'Uupanjang',
            'uulebar' => 'Uulebar',
            'uutinggi' => 'Uutinggi',
            'uufoh' => 'Uufoh',
            'uuroh' => 'Uuroh',
            'jssb12' => 'Jssb12',
            'dpanjang' => 'Dpanjang',
            'dlebar' => 'Dlebar',
            'dtinggi' => 'Dtinggi',
            'klipkcdepan' => 'Klipkcdepan',
            'kcspion' => 'Kcspion',
            'dongkrak' => 'Dongkrak',
            'peralatan' => 'Peralatan',
            'serep' => 'Serep',
            'tndsgtg' => 'Tndsgtg',
            'sabuk' => 'Sabuk',
            'ujimekanis' => 'Ujimekanis',
            'siskem' => 'Siskem',
            'sissus' => 'Sissus',
            'salrem' => 'Salrem',
            'sisdaya' => 'Sisdaya',
            'msntranmisi' => 'Msntranmisi',
            'tangki' => 'Tangki',
            'salgasbuang' => 'Salgasbuang',
            'klakson' => 'Klakson',
            'spedmeter' => 'Spedmeter',
            'kincuproda' => 'Kincuproda',
            'selrem_sb3' => 'Selrem Sb3',
            'selrem_sb4' => 'Selrem Sb4',
            'id_kendaraan' => 'Id Kendaraan',
            'alat' => 'Alat',
            'lulus_prauji' => 'Lulus Prauji',
            'lulus_ujimekanis' => 'Lulus Ujimekanis',
            'nrp' => 'Nrp',
            'jabatan' => 'Jabatan',
            'no_antrian1' => 'No Antrian1',
            'stts_ant' => 'Stts Ant',
            'id_uji' => 'Id Uji',
            'smoke' => 'Smoke',
            'lulus_smoke' => 'Lulus Smoke',
            'pitlift' => 'Pitlift',
            'lulus_pitlift' => 'Lulus Pitlift',
            'lampu' => 'Lampu',
            'lulus_lampu' => 'Lulus Lampu',
            'break' => 'Break',
            'lulus_break' => 'Lulus Break',
            'uji_ulang' => 'Uji Ulang',
            'selgaya3' => 'Selgaya3',
            'selgaya4' => 'Selgaya4',
            'jproses' => 'Jproses',
            'img_depan' => 'Img Depan',
            'img_belakang' => 'Img Belakang',
            'posisi' => 'Posisi',
            'no_tl' => 'No Tl',
            'no_tldim' => 'No Tldim',
            'catatan' => 'Catatan',
            'img_kiri' => 'Img Kiri',
            'img_kanan' => 'Img Kanan',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_hasil_uji', $this->id_hasil_uji, true);
        $criteria->compare('id_daftar', $this->id_daftar, true);
        $criteria->compare('ktlamp_kanan', $this->ktlamp_kanan);
        $criteria->compare('dev_kanan', $this->dev_kanan);
        $criteria->compare('dev_kiri', $this->dev_kiri);
        $criteria->compare('grem_sb1', $this->grem_sb1);
        $criteria->compare('grem_sb2', $this->grem_sb2);
        $criteria->compare('grem_sb3', $this->grem_sb3);
        $criteria->compare('grem_sb4', $this->grem_sb4);
        $criteria->compare('selrem_sb1', $this->selrem_sb1);
        $criteria->compare('selrem_sb2', $this->selrem_sb2);
        $criteria->compare('selgaya1', $this->selgaya1);
        $criteria->compare('selgaya2', $this->selgaya2);
        $criteria->compare('ems_diesel', $this->ems_diesel);
        $criteria->compare('ems_mesin_co', $this->ems_mesin_co);
        $criteria->compare('ems_mesin_hc', $this->ems_mesin_hc);
        $criteria->compare('ktlamp_kiri', $this->ktlamp_kiri);
        $criteria->compare('nm_penguji', $this->nm_penguji, true);
        $criteria->compare('no_antrian', $this->no_antrian);
        $criteria->compare('jdatang', $this->jdatang, true);
        $criteria->compare('jselesai', $this->jselesai, true);
        $criteria->compare('penyerahan', $this->penyerahan);
        $criteria->compare('no_surat', $this->no_surat, true);
        $criteria->compare('keterangan', $this->keterangan, true);
        $criteria->compare('prauji', $this->prauji);
        $criteria->compare('cetak', $this->cetak);
        $criteria->compare('no_ujikend', $this->no_ujikend);
        $criteria->compare('no_casmesin', $this->no_casmesin);
        $criteria->compare('lp_arah', $this->lp_arah);
        $criteria->compare('lp_rem', $this->lp_rem);
        $criteria->compare('lp_mundur', $this->lp_mundur);
        $criteria->compare('lp_posisi', $this->lp_posisi);
        $criteria->compare('konbody', $this->konbody);
        $criteria->compare('prisaikolong', $this->prisaikolong);
        $criteria->compare('ubansb1', $this->ubansb1);
        $criteria->compare('ubansb2', $this->ubansb2);
        $criteria->compare('alurban', $this->alurban);
        $criteria->compare('kuatroda', $this->kuatroda);
        $criteria->compare('uupanjang', $this->uupanjang);
        $criteria->compare('uulebar', $this->uulebar);
        $criteria->compare('uutinggi', $this->uutinggi);
        $criteria->compare('uufoh', $this->uufoh);
        $criteria->compare('uuroh', $this->uuroh);
        $criteria->compare('jssb12', $this->jssb12);
        $criteria->compare('dpanjang', $this->dpanjang);
        $criteria->compare('dlebar', $this->dlebar);
        $criteria->compare('dtinggi', $this->dtinggi);
        $criteria->compare('klipkcdepan', $this->klipkcdepan);
        $criteria->compare('kcspion', $this->kcspion);
        $criteria->compare('dongkrak', $this->dongkrak);
        $criteria->compare('peralatan', $this->peralatan);
        $criteria->compare('serep', $this->serep);
        $criteria->compare('tndsgtg', $this->tndsgtg);
        $criteria->compare('sabuk', $this->sabuk);
        $criteria->compare('ujimekanis', $this->ujimekanis);
        $criteria->compare('siskem', $this->siskem);
        $criteria->compare('sissus', $this->sissus);
        $criteria->compare('salrem', $this->salrem);
        $criteria->compare('sisdaya', $this->sisdaya);
        $criteria->compare('msntranmisi', $this->msntranmisi);
        $criteria->compare('tangki', $this->tangki);
        $criteria->compare('salgasbuang', $this->salgasbuang);
        $criteria->compare('klakson', $this->klakson);
        $criteria->compare('spedmeter', $this->spedmeter);
        $criteria->compare('kincuproda', $this->kincuproda);
        $criteria->compare('selrem_sb3', $this->selrem_sb3);
        $criteria->compare('selrem_sb4', $this->selrem_sb4);
        $criteria->compare('id_kendaraan', $this->id_kendaraan, true);
        $criteria->compare('alat', $this->alat);
        $criteria->compare('lulus_prauji', $this->lulus_prauji);
        $criteria->compare('lulus_ujimekanis', $this->lulus_ujimekanis);
        $criteria->compare('nrp', $this->nrp, true);
        $criteria->compare('jabatan', $this->jabatan, true);
        $criteria->compare('no_antrian1', $this->no_antrian1, true);
        $criteria->compare('stts_ant', $this->stts_ant);
        $criteria->compare('id_uji', $this->id_uji);
        $criteria->compare('smoke', $this->smoke);
        $criteria->compare('lulus_smoke', $this->lulus_smoke);
        $criteria->compare('pitlift', $this->pitlift);
        $criteria->compare('lulus_pitlift', $this->lulus_pitlift);
        $criteria->compare('lampu', $this->lampu);
        $criteria->compare('lulus_lampu', $this->lulus_lampu);
        $criteria->compare('break', $this->break);
        $criteria->compare('lulus_break', $this->lulus_break);
        $criteria->compare('uji_ulang', $this->uji_ulang);
        $criteria->compare('selgaya3', $this->selgaya3);
        $criteria->compare('selgaya4', $this->selgaya4);
        $criteria->compare('jproses', $this->jproses, true);
        $criteria->compare('img_depan', $this->img_depan, true);
        $criteria->compare('img_belakang', $this->img_belakang, true);
        $criteria->compare('posisi', $this->posisi, true);
        $criteria->compare('no_tl', $this->no_tl);
        $criteria->compare('no_tldim', $this->no_tldim);
        $criteria->compare('catatan', $this->catatan, true);
        $criteria->compare('img_kiri', $this->img_kiri, true);
        $criteria->compare('img_kanan', $this->img_kanan, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblHasilUji the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
