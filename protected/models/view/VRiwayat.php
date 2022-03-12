<?php

/**
 * This is the model class for table "v_riwayat".
 *
 * The followings are the available columns in table 'v_riwayat':
 * @property string $tgl_uji
 * @property string $tglmati
 * @property string $tempat
 * @property string $tempat_tujuan
 * @property string $catatan
 * @property string $nama_penguji
 * @property string $nrp
 * @property string $merk
 * @property string $tipe
 * @property string $no_chasis
 * @property string $no_mesin
 * @property string $no_uji
 * @property string $no_kendaraan
 * @property string $id_kendaraan
 * @property string $id_riwayat
 * @property string $stts_kirim
 */
class VRiwayat extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'v_riwayat';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tempat', 'length', 'max' => 200),
            array('tempat_tujuan', 'length', 'max' => 50),
            array('catatan', 'length', 'max' => 100),
            array('nama_penguji', 'length', 'max' => 120),
            array('nrp, merk, tipe, no_chasis, no_mesin, no_uji', 'length', 'max' => 30),
            array('no_kendaraan', 'length', 'max' => 12),
            array('stts_kirim', 'length', 'max' => 20),
            array('tgl_uji, tglmati, id_kendaraan, id_riwayat', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('tgl_uji, tglmati, tempat, tempat_tujuan, catatan, nama_penguji, nrp, merk, tipe, no_chasis, no_mesin, no_uji, no_kendaraan, id_kendaraan, id_riwayat, stts_kirim', 'safe', 'on' => 'search'),
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
            'tgl_uji' => 'Tgl Uji',
            'tglmati' => 'Tglmati',
            'tempat' => 'Tempat',
            'tempat_tujuan' => 'Tempat Tujuan',
            'catatan' => 'Catatan',
            'nama_penguji' => 'Nama Penguji',
            'nrp' => 'Nrp',
            'merk' => 'Merk',
            'tipe' => 'Tipe',
            'no_chasis' => 'No Chasis',
            'no_mesin' => 'No Mesin',
            'no_uji' => 'No Uji',
            'no_kendaraan' => 'No Kendaraan',
            'id_kendaraan' => 'Id Kendaraan',
            'id_riwayat' => 'Id Riwayat',
            'stts_kirim' => 'Stts Kirim',
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

        $criteria->compare('tgl_uji', $this->tgl_uji, true);
        $criteria->compare('tglmati', $this->tglmati, true);
        $criteria->compare('tempat', $this->tempat, true);
        $criteria->compare('tempat_tujuan', $this->tempat_tujuan, true);
        $criteria->compare('catatan', $this->catatan, true);
        $criteria->compare('nama_penguji', $this->nama_penguji, true);
        $criteria->compare('nrp', $this->nrp, true);
        $criteria->compare('merk', $this->merk, true);
        $criteria->compare('tipe', $this->tipe, true);
        $criteria->compare('no_chasis', $this->no_chasis, true);
        $criteria->compare('no_mesin', $this->no_mesin, true);
        $criteria->compare('no_uji', $this->no_uji, true);
        $criteria->compare('no_kendaraan', $this->no_kendaraan, true);
        $criteria->compare('id_kendaraan', $this->id_kendaraan, true);
        $criteria->compare('id_riwayat', $this->id_riwayat, true);
        $criteria->compare('stts_kirim', $this->stts_kirim, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VRiwayat the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getLastRiwayat($id_kendaraan) {
        $criteria = new CDbCriteria();
        $criteria->order = 'tgl_uji desc';
        $criteria->addCondition("tglmati IS NOT NULL");
        $criteria->addCondition("nrp IS NOT NULL");
        $criteria->addInCondition('id_kendaraan', array($id_kendaraan));
        return $this->find($criteria);
    }

}
