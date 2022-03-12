<?php

/**
 * This is the model class for table "v_retribusi".
 *
 * The followings are the available columns in table 'v_retribusi':
 * @property string $bk_masuk
 * @property string $nm_uji
 * @property string $no_uji
 * @property string $nama_pemilik
 * @property string $no_chasis
 * @property string $no_mesin
 * @property string $alamat
 * @property string $no_kendaraan
 * @property string $id_kendaraan
 * @property double $b_daftar
 * @property double $b_gnt_buku
 * @property integer $lama_tlt
 * @property double $b_rsk_hilang
 * @property double $tlt_uji
 * @property double $rettotal
 * @property string $tgl_retribusi
 * @property string $penerima
 * @property string $numerator
 * @property string $pengurus
 * @property string $tgl_uji
 * @property string $no_berkas
 * @property boolean $validasi
 * @property string $id_retribusi
 * @property integer $id_jns
 * @property string $nm_komersil
 * @property string $karoseri_jenis
 * @property string $karoseri_bahan
 * @property string $karoseri_duduk
 * @property string $img_scan
 */
class VRetribusiAll extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'v_retribusi_all';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('lama_tlt, id_jns', 'numerical', 'integerOnly' => true),
            array('b_daftar, b_gnt_buku, b_rsk_hilang, tlt_uji, rettotal', 'numerical'),
            array('bk_masuk, no_uji, no_chasis, no_mesin, karoseri_jenis, karoseri_bahan, karoseri_duduk', 'length', 'max' => 30),
            array('nm_uji, penerima', 'length', 'max' => 50),
            array('nama_pemilik, pengurus, nm_komersil', 'length', 'max' => 100),
            array('alamat', 'length', 'max' => 200),
            array('no_kendaraan', 'length', 'max' => 12),
            array('id_kendaraan, tgl_retribusi, numerator, tgl_uji, no_berkas, validasi, id_retribusi, img_scan', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('bk_masuk, nm_uji, no_uji, nama_pemilik, no_chasis, no_mesin, alamat, no_kendaraan, id_kendaraan, b_daftar, b_gnt_buku, lama_tlt, b_rsk_hilang, tlt_uji, rettotal, tgl_retribusi, penerima, numerator, pengurus, tgl_uji, no_berkas, validasi, id_retribusi, id_jns, nm_komersil, karoseri_jenis, karoseri_bahan, karoseri_duduk, img_scan', 'safe', 'on' => 'search'),
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
            'bk_masuk' => 'Bk Masuk',
            'nm_uji' => 'Nm Uji',
            'no_uji' => 'No Uji',
            'nama_pemilik' => 'Nama Pemilik',
            'no_chasis' => 'No Chasis',
            'no_mesin' => 'No Mesin',
            'alamat' => 'Alamat',
            'no_kendaraan' => 'No Kendaraan',
            'id_kendaraan' => 'Id Kendaraan',
            'b_daftar' => 'B Daftar',
            'b_gnt_buku' => 'B Gnt Buku',
            'lama_tlt' => 'Lama Tlt',
            'b_rsk_hilang' => 'B Rsk Hilang',
            'tlt_uji' => 'Tlt Uji',
            'rettotal' => 'Rettotal',
            'tgl_retribusi' => 'Tgl Retribusi',
            'penerima' => 'Penerima',
            'numerator' => 'Numerator',
            'pengurus' => 'Pengurus',
            'tgl_uji' => 'Tgl Uji',
            'no_berkas' => 'No Berkas',
            'validasi' => 'Validasi',
            'id_retribusi' => 'Id Retribusi',
            'id_jns' => 'Id Jns',
            'nm_komersil' => 'Nm Komersil',
            'karoseri_jenis' => 'Karoseri Jenis',
            'karoseri_bahan' => 'Karoseri Bahan',
            'karoseri_duduk' => 'Karoseri Duduk',
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

        $criteria->compare('bk_masuk', $this->bk_masuk, true);
        $criteria->compare('nm_uji', $this->nm_uji, true);
        $criteria->compare('no_uji', $this->no_uji, true);
        $criteria->compare('nama_pemilik', $this->nama_pemilik, true);
        $criteria->compare('no_chasis', $this->no_chasis, true);
        $criteria->compare('no_mesin', $this->no_mesin, true);
        $criteria->compare('alamat', $this->alamat, true);
        $criteria->compare('no_kendaraan', $this->no_kendaraan, true);
        $criteria->compare('id_kendaraan', $this->id_kendaraan, true);
        $criteria->compare('b_daftar', $this->b_daftar);
        $criteria->compare('b_gnt_buku', $this->b_gnt_buku);
        $criteria->compare('lama_tlt', $this->lama_tlt);
        $criteria->compare('b_rsk_hilang', $this->b_rsk_hilang);
        $criteria->compare('tlt_uji', $this->tlt_uji);
        $criteria->compare('rettotal', $this->rettotal);
        $criteria->compare('tgl_retribusi', $this->tgl_retribusi, true);
        $criteria->compare('penerima', $this->penerima, true);
        $criteria->compare('numerator', $this->numerator, true);
        $criteria->compare('pengurus', $this->pengurus, true);
        $criteria->compare('tgl_uji', $this->tgl_uji, true);
        $criteria->compare('no_berkas', $this->no_berkas, true);
        $criteria->compare('validasi', $this->validasi);
        $criteria->compare('id_retribusi', $this->id_retribusi, true);
        $criteria->compare('id_jns', $this->id_jns);
        $criteria->compare('nm_komersil', $this->nm_komersil, true);
        $criteria->compare('karoseri_jenis', $this->karoseri_jenis, true);
        $criteria->compare('karoseri_bahan', $this->karoseri_bahan, true);
        $criteria->compare('karoseri_duduk', $this->karoseri_duduk, true);
        $criteria->compare('img_scan', $this->img_scan, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VRetribusi the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
