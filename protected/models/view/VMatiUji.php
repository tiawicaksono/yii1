<?php

/**
 * This is the model class for table "v_mati_uji".
 *
 * The followings are the available columns in table 'v_mati_uji':
 * @property string $id_kendaraan
 * @property string $alamat
 * @property string $nama_pemilik
 * @property string $no_chasis
 * @property string $no_telp
 * @property string $no_mesin
 * @property string $no_uji
 * @property string $no_kendaraan
 * @property string $no_identitas
 * @property string $tgl_mati_uji
 * @property boolean $cetak
 * @property string $nm_komersil
 * @property string $merk
 * @property string $tipe
 * @property string $tahun
 * @property string $bahan_bakar
 * @property string $jenis
 */
class VMatiUji extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'v_mati_uji';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('alamat', 'length', 'max' => 200),
            array('nama_pemilik, nm_komersil', 'length', 'max' => 100),
            array('no_chasis, no_mesin, no_uji, merk, tipe, tahun, bahan_bakar, jenis', 'length', 'max' => 30),
            array('no_kendaraan', 'length', 'max' => 12),
            array('no_identitas', 'length', 'max' => 60),
            array('id_kendaraan, no_telp, tgl_mati_uji, cetak', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_kendaraan, alamat, nama_pemilik, no_chasis, no_telp, no_mesin, no_uji, no_kendaraan, no_identitas, tgl_mati_uji, cetak, nm_komersil, merk, tipe, tahun, bahan_bakar, jenis', 'safe', 'on' => 'search'),
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
            'id_kendaraan' => 'Id Kendaraan',
            'alamat' => 'Alamat',
            'nama_pemilik' => 'Nama Pemilik',
            'no_chasis' => 'No Chasis',
            'no_telp' => 'No Telp',
            'no_mesin' => 'No Mesin',
            'no_uji' => 'No Uji',
            'no_kendaraan' => 'No Kendaraan',
            'no_identitas' => 'No Identitas',
            'tgl_mati_uji' => 'Tgl Mati Uji',
            'cetak' => 'Cetak',
            'nm_komersil' => 'Nm Komersil',
            'merk' => 'Merk',
            'tipe' => 'Tipe',
            'tahun' => 'Tahun',
            'bahan_bakar' => 'Bahan Bakar',
            'jenis' => 'Jenis',
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

        $criteria->compare('id_kendaraan', $this->id_kendaraan, true);
        $criteria->compare('alamat', $this->alamat, true);
        $criteria->compare('nama_pemilik', $this->nama_pemilik, true);
        $criteria->compare('no_chasis', $this->no_chasis, true);
        $criteria->compare('no_telp', $this->no_telp, true);
        $criteria->compare('no_mesin', $this->no_mesin, true);
        $criteria->compare('no_uji', $this->no_uji, true);
        $criteria->compare('no_kendaraan', $this->no_kendaraan, true);
        $criteria->compare('no_identitas', $this->no_identitas, true);
        $criteria->compare('tgl_mati_uji', $this->tgl_mati_uji, true);
        $criteria->compare('cetak', $this->cetak);
        $criteria->compare('nm_komersil', $this->nm_komersil, true);
        $criteria->compare('merk', $this->merk, true);
        $criteria->compare('tipe', $this->tipe, true);
        $criteria->compare('tahun', $this->tahun, true);
        $criteria->compare('bahan_bakar', $this->bahan_bakar, true);
        $criteria->compare('jenis', $this->jenis, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VMatiUji the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function totalKendaraanMatiUjiPerBulan($bln, $tahun, $idUji) {
        $criteria = new CDbCriteria();
        $criteria->addCondition("EXTRACT(YEAR FROM tgl_mati_uji) =" . $tahun);
        $criteria->addCondition("EXTRACT(MONTH FROM tgl_mati_uji) =" . $bln);
        $criteria->addCondition("jenis like '$idUji'");
        $total = $this->count($criteria);
        return $total;
    }

}
