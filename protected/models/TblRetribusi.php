<?php

/**
 * This is the model class for table "tbl_retribusi".
 *
 * The followings are the available columns in table 'tbl_retribusi':
 * @property string $id_retribusi
 * @property string $id_kendaraan
 * @property double $b_daftar
 * @property double $b_lulus_uji
 * @property double $b_tnd_uji
 * @property double $b_gnt_buku
 * @property double $b_rsk_hilang
 * @property string $tgl_retribusi
 * @property double $b_tlt_uji
 * @property string $penerima
 * @property string $numerator
 * @property string $id_bk_masuk
 * @property string $id_uji
 * @property string $nampeng
 * @property boolean $validasi
 * @property string $tglmati
 * @property integer $id_jns
 * @property string $stts_syarat
 * @property string $no_berkas
 * @property boolean $dikuasakan
 * @property string $idnoktp
 * @property string $stts_kuasa
 * @property string $kepada
 * @property string $tgl_uji
 * @property integer $lm_tlt
 * @property double $target
 * @property string $userid
 * @property string $img_scan
 */
class TblRetribusi extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_retribusi';
    }

    public function primaryKey() {
        return array('id_retribusi');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_jns, lm_tlt', 'numerical', 'integerOnly' => true),
            array('b_daftar, b_lulus_uji, b_tnd_uji, b_gnt_buku, b_rsk_hilang, b_tlt_uji, target', 'numerical'),
            array('penerima', 'length', 'max' => 50),
            array('nampeng', 'length', 'max' => 100),
            array('kepada, userid', 'length', 'max' => 30),
            array('id_kendaraan, tgl_retribusi, numerator, id_bk_masuk, id_uji, validasi, tglmati, stts_syarat, no_berkas, dikuasakan, idnoktp, stts_kuasa, tgl_uji, img_scan', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_retribusi, id_kendaraan, b_daftar, b_lulus_uji, b_tnd_uji, b_gnt_buku, b_rsk_hilang, tgl_retribusi, b_tlt_uji, penerima, numerator, id_bk_masuk, id_uji, nampeng, validasi, tglmati, id_jns, stts_syarat, no_berkas, dikuasakan, idnoktp, stts_kuasa, kepada, tgl_uji, lm_tlt, target, userid, img_scan', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tbluji_rel' => array(self::BELONGS_TO, 'TblUji', 'id_uji'),
            'kendaraan_rel' => array(self::BELONGS_TO, 'TblKendaraan', 'id_kendaraan'),
            'typekendaraan_rel' => array(self::BELONGS_TO, 'TblType', 'id_kendaraan')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_retribusi' => 'Id Retribusi',
            'id_kendaraan' => 'Id Kendaraan',
            'b_daftar' => 'B Daftar',
            'b_lulus_uji' => 'B Lulus Uji',
            'b_tnd_uji' => 'B Tnd Uji',
            'b_gnt_buku' => 'B Gnt Buku',
            'b_rsk_hilang' => 'B Rsk Hilang',
            'tgl_retribusi' => 'Tgl Retribusi',
            'b_tlt_uji' => 'B Tlt Uji',
            'penerima' => 'Penerima',
            'numerator' => 'Numerator',
            'id_bk_masuk' => 'Id Bk Masuk',
            'id_uji' => 'Id Uji',
            'nampeng' => 'Nampeng',
            'validasi' => 'Validasi',
            'tglmati' => 'Tglmati',
            'id_jns' => 'Id Jns',
            'stts_syarat' => 'Stts Syarat',
            'no_berkas' => 'No Berkas',
            'dikuasakan' => 'Dikuasakan',
            'idnoktp' => 'Idnoktp',
            'stts_kuasa' => 'Stts Kuasa',
            'kepada' => 'Kepada',
            'tgl_uji' => 'Tgl Uji',
            'lm_tlt' => 'Lm Tlt',
            'target' => 'Target',
            'userid' => 'Userid',
            'img_scan' => 'Img Scan',
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

        $criteria->compare('id_retribusi', $this->id_retribusi, true);
        $criteria->compare('id_kendaraan', $this->id_kendaraan, true);
        $criteria->compare('b_daftar', $this->b_daftar);
        $criteria->compare('b_lulus_uji', $this->b_lulus_uji);
        $criteria->compare('b_tnd_uji', $this->b_tnd_uji);
        $criteria->compare('b_gnt_buku', $this->b_gnt_buku);
        $criteria->compare('b_rsk_hilang', $this->b_rsk_hilang);
        $criteria->compare('tgl_retribusi', $this->tgl_retribusi, true);
        $criteria->compare('b_tlt_uji', $this->b_tlt_uji);
        $criteria->compare('penerima', $this->penerima, true);
        $criteria->compare('numerator', $this->numerator, true);
        $criteria->compare('id_bk_masuk', $this->id_bk_masuk, true);
        $criteria->compare('id_uji', $this->id_uji, true);
        $criteria->compare('nampeng', $this->nampeng, true);
        $criteria->compare('validasi', $this->validasi);
        $criteria->compare('tglmati', $this->tglmati, true);
        $criteria->compare('id_jns', $this->id_jns);
        $criteria->compare('stts_syarat', $this->stts_syarat, true);
        $criteria->compare('no_berkas', $this->no_berkas, true);
        $criteria->compare('dikuasakan', $this->dikuasakan);
        $criteria->compare('idnoktp', $this->idnoktp, true);
        $criteria->compare('stts_kuasa', $this->stts_kuasa, true);
        $criteria->compare('kepada', $this->kepada, true);
        $criteria->compare('tgl_uji', $this->tgl_uji, true);
        $criteria->compare('lm_tlt', $this->lm_tlt);
        $criteria->compare('target', $this->target);
        $criteria->compare('userid', $this->userid, true);
        $criteria->compare('img_scan', $this->img_scan, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblRetribusi the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function totalRetribusiPerBulan($bln, $tahun) {
        $query = "SELECT SUM(b_daftar)::numeric as total_daftar, SUM(b_lulus_uji)::numeric as total_lulus_uji, SUM(b_tnd_uji)::numeric as total_tnd_uji, SUM(b_gnt_buku)::numeric as total_gnt_buku, SUM(b_tlt_uji)::numeric as total_tlt_uji, (SUM(b_daftar)::numeric)+(SUM(b_lulus_uji)::numeric)+(SUM(b_tnd_uji)::numeric)+(SUM(b_gnt_buku)::numeric)+(SUM(b_tlt_uji)::numeric) as total FROM tbl_retribusi WHERE EXTRACT(YEAR FROM tgl_retribusi) = " . $tahun . " AND EXTRACT(MONTH FROM tgl_retribusi) = " . $bln . " and validasi = true";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function totalUji($bln, $tahun, $jenisNumpangUji) {
        $criteria = new CDbCriteria();
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_uji) =" . $tahun);
        $criteria->addCondition("EXTRACT(MONTH FROM tgl_uji) =" . $bln);
        $criteria->addCondition('id_uji = ' . $jenisNumpangUji);
        $criteria->addCondition("validasi = 'true'");
        $total = $this->count($criteria);
        return $total;
    }

    public function totalTaxi($tgl) {
        $criteria = new CDbCriteria();
        $criteria->with = array('kendaraan_rel');
        $criteria->join = "LEFT JOIN tbl_type b ON b.id_kendaraan = t.id_kendaraan";
        $criteria->addCondition("tgl_retribusi = TO_DATE('" . $tgl . "', 'DD-Mon-YY')");
        $criteria->addCondition("jenis like '%M. PENUMPANG%'");
        $criteria->addCondition("b.nm_komersil = 'SEDAN TAKSI'");
        $criteria->addCondition("b_daftar = 65000");
        $criteria->addCondition("validasi = 'true'");
        $total = $this->count($criteria);
        return $total;
    }

    public function totalTaxiPerBulan($bln, $tahun, $idUji) {
        $criteria = new CDbCriteria();
        $criteria->with = array('kendaraan_rel');
        $criteria->join = "LEFT JOIN tbl_type b ON b.id_kendaraan = t.id_kendaraan";
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_uji) =" . $tahun);
        $criteria->addCondition("EXTRACT(MONTH FROM tgl_uji) =" . $bln);
//        $criteria->addCondition("jenis like '%M. PENUMPANG%'");
        $criteria->addCondition("id_jns = 1");
        $criteria->addCondition("b.nm_komersil = 'SEDAN TAKSI'");
        $criteria->addCondition("b_daftar = 65000");
        $criteria->addCondition("validasi = 'true'");
        if ($idUji != '') {
            $criteria->addCondition('id_uji =' . $idUji);
        }
        $total = $this->count($criteria);
        return $total;
    }

    public function totalKendaraanPerBulan($jenis, $bln, $tahun, $umum, $idUji) {
        $criteria = new CDbCriteria();
        $criteria->select = 'id_retribusi';
        $criteria->with = array('kendaraan_rel');
        $criteria->join = "LEFT JOIN tbl_type b ON b.id_kendaraan = t.id_kendaraan";
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_retribusi) =" . $tahun);
        $criteria->addCondition("EXTRACT(MONTH FROM tgl_retribusi) =" . $bln);
        $criteria->addCondition('id_jns = '. $jenis);
        $criteria->addCondition('"kendaraan_rel".umum = ' . $umum);
        $criteria->addCondition("validasi = 'true'");
//        $criteria->addCondition("b_daftar = 65000");
        $criteria->addInCondition('id_uji', $idUji);
        $total = $this->count($criteria);
        return $total;
    }
    
    public function totalKendaraanAllPerBulan($bln, $tahun, $idUji) {
        $criteria = new CDbCriteria();
        $criteria->select = 'id_retribusi';
        $criteria->with = array('kendaraan_rel');
        $criteria->join = "LEFT JOIN tbl_type b ON b.id_kendaraan = t.id_kendaraan";
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_retribusi) =" . $tahun);
        $criteria->addCondition("EXTRACT(MONTH FROM tgl_retribusi) =" . $bln);
        $criteria->addCondition("validasi = 'true'");
//        $criteria->addCondition("b_daftar = 65000");
        $criteria->addInCondition('id_uji', $idUji);
        $total = $this->count($criteria);
        return $total;
    }
    
    public function getLastRetribusi($id_kendaraan) {
        $criteria = new CDbCriteria();
        $criteria->order = 'id_retribusi desc';
        $criteria->addCondition("validasi = 'true'");
        $criteria->addInCondition('id_kendaraan', array($id_kendaraan));
        return $this->find($criteria);
    }
    
    public function getDataKendaraanUji($bln, $tahun) {
        $criteria = new CDbCriteria();
        $criteria->join = "LEFT JOIN tbl_type b ON b.id_kendaraan = t.id_kendaraan";
        $criteria->addCondition("lower(b.nm_komersil) like '%mikrolet%'");
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_retribusi) =" . $tahun);
        $criteria->addCondition("EXTRACT(MONTH FROM tgl_retribusi) =" . $bln);
        $criteria->addCondition("validasi = 'true'");
        return $this->count($criteria);
    }

}
