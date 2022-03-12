<?php

/**
 * This is the model class for table "tbl_daftar".
 *
 * The followings are the available columns in table 'tbl_daftar':
 * @property string $tgl_uji
 * @property string $no_berkas
 * @property string $id_daftar
 * @property string $id_kendaraan
 * @property boolean $datang
 * @property boolean $daftar_ulang
 * @property string $id_retribusi
 * @property boolean $lulus
 * @property boolean $ktp
 * @property boolean $fcstnk
 * @property boolean $dom_usaha
 * @property boolean $fcbukuji
 * @property boolean $fctrayek
 * @property string $id_uji
 * @property integer $id_jns
 * @property string $numerator_buku
 * @property integer $no_antrian
 * @property boolean $gesekan
 * @property string $no_antrian1
 * @property string $stts_daftar
 */
class TblDaftar extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_daftar';
    }

    public function primaryKey()
    {
        return array('id_daftar');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_jns, no_antrian', 'numerical', 'integerOnly' => true),
            array('numerator_buku, no_antrian1, stts_daftar', 'length', 'max' => 30),
            array('tgl_uji, no_berkas, id_kendaraan, datang, daftar_ulang, id_retribusi, lulus, ktp, fcstnk, dom_usaha, fcbukuji, fctrayek, id_uji, gesekan', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('tgl_uji, no_berkas, id_daftar, id_kendaraan, datang, daftar_ulang, id_retribusi, lulus, ktp, fcstnk, dom_usaha, fcbukuji, fctrayek, id_uji, id_jns, numerator_buku, no_antrian, gesekan, no_antrian1, stts_daftar', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'kendaraan_rel' => array(self::BELONGS_TO, 'TblKendaraan', 'id_kendaraan')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'tgl_uji' => 'Tgl Uji',
            'no_berkas' => 'No Berkas',
            'id_daftar' => 'Id Daftar',
            'id_kendaraan' => 'Id Kendaraan',
            'datang' => 'Datang',
            'daftar_ulang' => 'Daftar Ulang',
            'id_retribusi' => 'Id Retribusi',
            'lulus' => 'Lulus',
            'ktp' => 'Ktp',
            'fcstnk' => 'Fcstnk',
            'dom_usaha' => 'Dom Usaha',
            'fcbukuji' => 'Fcbukuji',
            'fctrayek' => 'Fctrayek',
            'id_uji' => 'Id Uji',
            'id_jns' => 'Id Jns',
            'numerator_buku' => 'Numerator Buku',
            'no_antrian' => 'No Antrian',
            'gesekan' => 'Gesekan',
            'no_antrian1' => 'No Antrian1',
            'stts_daftar' => 'Stts Daftar',
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
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('tgl_uji', $this->tgl_uji, true);
        $criteria->compare('no_berkas', $this->no_berkas, true);
        $criteria->compare('id_daftar', $this->id_daftar, true);
        $criteria->compare('id_kendaraan', $this->id_kendaraan, true);
        $criteria->compare('datang', $this->datang);
        $criteria->compare('daftar_ulang', $this->daftar_ulang);
        $criteria->compare('id_retribusi', $this->id_retribusi, true);
        $criteria->compare('lulus', $this->lulus);
        $criteria->compare('ktp', $this->ktp);
        $criteria->compare('fcstnk', $this->fcstnk);
        $criteria->compare('dom_usaha', $this->dom_usaha);
        $criteria->compare('fcbukuji', $this->fcbukuji);
        $criteria->compare('fctrayek', $this->fctrayek);
        $criteria->compare('id_uji', $this->id_uji, true);
        $criteria->compare('id_jns', $this->id_jns);
        $criteria->compare('numerator_buku', $this->numerator_buku, true);
        $criteria->compare('no_antrian', $this->no_antrian);
        $criteria->compare('gesekan', $this->gesekan);
        $criteria->compare('no_antrian1', $this->no_antrian1, true);
        $criteria->compare('stts_daftar', $this->stts_daftar, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblDaftar the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function totalKendaraan($jenis, $tgl, $umum)
    {
        /**
         * 0 = barang
         * 1 = penumpang
         * 2 = bis
         */
        $criteria = new CDbCriteria();
        $criteria->with = array('kendaraan_rel');
        //        $criteria->addCondition('tgl_uji = now()::date');
        $criteria->join = "LEFT JOIN tbl_type b ON b.id_kendaraan = t.id_kendaraan";
        $criteria->addCondition("tgl_uji = TO_DATE('" . $tgl . "', 'DD-Mon-YY')");
        $criteria->addInCondition('id_jns', array($jenis));
        $criteria->addCondition('"kendaraan_rel".umum = ' . $umum);
        //        $criteria->addCondition("b.nm_komersil not like '%SEDAN TAKSI%'");
        $total = $this->count($criteria);
        return $total;
    }

    //     public function totalKedatanganKendaraan($tgl, $umum) {
    //         $criteria = new CDbCriteria();
    //         $criteria->with = array('kendaraan_rel','daftar_rel');
    // //        $criteria->addCondition('tgl_uji = now()::date');
    //         $criteria->addCondition('"daftar_rel".tgl_uji = TO_DATE(\''.$tgl.'\', \'DD-Mon-YY\')');
    // //        $criteria->addCondition("datang = 'true'");
    //         $criteria->addCondition('"kendaraan_rel".umum = ' . $umum);
    //         $total = VVerifikasiTgl::model()->count($criteria);
    //         return $total;
    //     }

    public function totalKelulusanKendaraan($kondisi, $tgl, $umum)
    {
        $criteria = new CDbCriteria();
        $criteria->with = array('kendaraan_rel');
        //        $criteria->addCondition('tgl_uji = now()::date');
        $criteria->addCondition("tgl_uji = TO_DATE('" . $tgl . "', 'DD-Mon-YY')");
        $criteria->addCondition('lulus = ' . $kondisi);
        $criteria->addCondition("datang = 'true'");
        $criteria->addCondition('"kendaraan_rel".umum = ' . $umum);
        $total = $this->count($criteria);
        return $total;
    }

    public function totalTlTd($tgl, $umum)
    {
        $criteria = new CDbCriteria();
        $criteria->with = array('kendaraan_rel');
        $criteria->addCondition("tgl_uji = TO_DATE('" . $tgl . "', 'DD-Mon-YY')");
        $criteria->addInCondition('id_uji', array(20, 21));
        $criteria->addCondition("datang = 'true'");
        $criteria->addCondition('"kendaraan_rel".umum = ' . $umum);
        $total = $this->count($criteria);
        return $total;
    }

    public function totalKendaraanPerBulan($jenis, $bln, $tahun, $umum)
    {
        /**
         * 0 = barang
         * 1 = penumpang
         * 2 = bis
         */
        $criteria = new CDbCriteria();
        $criteria->with = array('kendaraan_rel');
        $criteria->join = "LEFT JOIN tbl_type b ON b.id_kendaraan = t.id_kendaraan";
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_retribusi) =" . $tahun);
        $criteria->addCondition("EXTRACT(MONTH FROM tgl_retribusi) =" . $bln);
        $criteria->addInCondition('id_jns', array($jenis));
        $criteria->addCondition('"kendaraan_rel".umum = ' . $umum);
        $criteria->addCondition("b.nm_komersil not like '%SEDAN TAKSI%'");
        $total = TblRetribusi::model()->count($criteria);
        return $total;
    }

    public function totalTlTdPerBulan($bln, $tahun, $umum)
    {
        $criteria = new CDbCriteria();
        $criteria->with = array('kendaraan_rel');
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_uji) =" . $tahun);
        $criteria->addCondition("EXTRACT(MONTH FROM tgl_uji) =" . $bln);
        $criteria->addInCondition('id_uji', array(20, 21));
        $criteria->addCondition("datang = 'true'");
        $criteria->addCondition('"kendaraan_rel".umum = ' . $umum);
        $total = $this->count($criteria);
        return $total;
    }

    //     public function totalKedatanganKendaraanPerBulan($bln, $tahun, $umum) {
    //         $criteria = new CDbCriteria();
    //         $criteria->with = array('kendaraan_rel','daftar_rel');
    //         $criteria->addCondition('EXTRACT(YEAR FROM "daftar_rel".tgl_uji) =' . $tahun);
    //         $criteria->addCondition('EXTRACT(MONTH FROM "daftar_rel".tgl_uji) =' . $bln);
    // //        $criteria->addCondition("datang = 'true'");
    //         $criteria->addCondition('"kendaraan_rel".umum = ' . $umum);
    //         $total = VVerifikasiTgl::model()->count($criteria);
    //         return $total;
    //     }

    //     public function totalKelulusanKendaraanPerBulan($kondisi, $bln, $tahun, $umum, $jenis) {
    //         $criteria = new CDbCriteria();
    //         $criteria->with = array('kendaraan_rel');
    // //        $criteria->addCondition('tgl_uji = now()::date');
    //         $criteria->join = "LEFT JOIN tbl_hasil_uji b ON t.id_daftar=b.id_daftar";
    //         $criteria->addCondition("EXTRACT(YEAR FROM tgl_uji) =" . $tahun);
    //         $criteria->addCondition("EXTRACT(MONTH FROM tgl_uji) =" . $bln);
    //         $criteria->addCondition('lulus = ' . $kondisi);
    //         $criteria->addCondition("datang = 'true'");
    //         if ($umum != '') {
    //             $criteria->addCondition('"kendaraan_rel".umum = ' . $umum);
    //         }
    //         if ($jenis != '') {
    //             $criteria->addCondition('id_jns = ' . $jenis);
    //         }
    //         $criteria->addInCondition('id_uji', $idUji);
    //         $criteria->addCondition("b.cetak = 'true'");

    //         $total = $this->count($criteria);
    //         return $total;
    //     }

    public function totalKelulusanKendaraanPerBulans($kondisi, $bln, $tahun, $umum, $jenis, $jenis_uji)
    {
        $criteria = new CDbCriteria();
        $criteria->with = array('kendaraan_rel');
        //        $criteria->addCondition('tgl_uji = now()::date');
        $criteria->join = "LEFT JOIN tbl_hasil_uji b ON t.id_daftar=b.id_daftar";
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_uji) =" . $tahun);
        $criteria->addCondition("EXTRACT(MONTH FROM tgl_uji) =" . $bln);
        $criteria->addCondition("lulus = " . $kondisi);
        $criteria->addCondition("datang = 'true'");
        if ($umum != '') {
            $criteria->addCondition('"kendaraan_rel".umum = ' . $umum);
        }
        if ($jenis != '') {
            $criteria->addCondition('id_jns = ' . $jenis);
        }
        //        $criteria->addInCondition('"t".id_uji', $jenis_uji);
        $criteria->addCondition("b.cetak = 'true'");

        $total = $this->count($criteria);
        return $total;
    }

    public function totalKelulusanKendaraanPerTahun($kondisi, $tahun, $umum)
    {
        $criteria = new CDbCriteria();
        //        $criteria->addCondition('tgl_uji = now()::date');
        $criteria->with = array('kendaraan_rel');
        $criteria->addCondition('"kendaraan_rel".umum = ' . $umum);
        $criteria->join = "LEFT JOIN tbl_hasil_uji b ON t.id_daftar=b.id_daftar";
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_uji) =" . $tahun);
        $criteria->addCondition('lulus = ' . $kondisi);
        $criteria->addCondition("datang = 'true'");
        $criteria->addCondition("b.cetak = 'true'");
        $total = $this->count($criteria);
        return $total;
    }

    public function getDataKendaraanKelulusanUji($kondisi, $bln, $tahun)
    {
        $criteria = new CDbCriteria();
        //        $criteria->with = array('kendaraan_rel');
        //        $criteria->addCondition('tgl_uji = now()::date');
        $criteria->join = "LEFT JOIN tbl_hasil_uji b ON t.id_daftar=b.id_daftar LEFT JOIN tbl_type c ON c.id_kendaraan = t.id_kendaraan";
        //        $criteria->join = "LEFT JOIN tbl_type c ON c.id_kendaraan = t.id_kendaraan";
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_uji) =" . $tahun);
        $criteria->addCondition("EXTRACT(MONTH FROM tgl_uji) =" . $bln);
        $criteria->addCondition("lulus = " . $kondisi);
        $criteria->addCondition("lower(c.nm_komersil) like '%mikrolet%'");
        $criteria->addCondition("datang = 'true'");
        $criteria->addCondition("b.cetak = 'true'");
        return $this->count($criteria);
    }
}
