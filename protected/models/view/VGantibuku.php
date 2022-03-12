<?php

/**
 * This is the model class for table "v_gantibuku".
 *
 * The followings are the available columns in table 'v_gantibuku':
 * @property string $no_uji
 * @property string $no_kendaraan
 * @property string $nama_pemilik
 * @property string $tgl_retribusi
 * @property string $no_seri
 * @property string $numerator
 * @property string $id_kendaraan
 * @property string $id_retribusi
 * @property boolean $cetak
 * @property string $tgl_cetak
 * @property string $jenis
 * @property string $tahun
 * @property string $bahan_bakar
 * @property string $id_uji
 * @property string $petugas
 */
class VGantibuku extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'v_gantibuku';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('no_uji, no_seri, jenis, tahun, bahan_bakar', 'length', 'max' => 30),
            array('no_kendaraan', 'length', 'max' => 12),
            array('nama_pemilik', 'length', 'max' => 100),
            array('petugas', 'length', 'max' => 50),
            array('tgl_retribusi, numerator, id_kendaraan, id_retribusi, cetak, tgl_cetak, id_uji', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('no_uji, no_kendaraan, nama_pemilik, tgl_retribusi, no_seri, numerator, id_kendaraan, id_retribusi, cetak, tgl_cetak, jenis, tahun, bahan_bakar, id_uji, petugas', 'safe', 'on' => 'search'),
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
            'no_uji' => 'No Uji',
            'no_kendaraan' => 'No Kendaraan',
            'nama_pemilik' => 'Nama Pemilik',
            'tgl_retribusi' => 'Tgl Retribusi',
            'no_seri' => 'No Seri',
            'numerator' => 'Numerator',
            'id_kendaraan' => 'Id Kendaraan',
            'id_retribusi' => 'Id Retribusi',
            'cetak' => 'Cetak',
            'tgl_cetak' => 'Tgl Cetak',
            'jenis' => 'Jenis',
            'tahun' => 'Tahun',
            'bahan_bakar' => 'Bahan Bakar',
            'id_uji' => 'Id Uji',
            'petugas' => 'Petugas',
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

        $criteria->compare('no_uji', $this->no_uji, true);
        $criteria->compare('no_kendaraan', $this->no_kendaraan, true);
        $criteria->compare('nama_pemilik', $this->nama_pemilik, true);
        $criteria->compare('tgl_retribusi', $this->tgl_retribusi, true);
        $criteria->compare('no_seri', $this->no_seri, true);
        $criteria->compare('numerator', $this->numerator, true);
        $criteria->compare('id_kendaraan', $this->id_kendaraan, true);
        $criteria->compare('id_retribusi', $this->id_retribusi, true);
        $criteria->compare('cetak', $this->cetak);
        $criteria->compare('tgl_cetak', $this->tgl_cetak, true);
        $criteria->compare('jenis', $this->jenis, true);
        $criteria->compare('tahun', $this->tahun, true);
        $criteria->compare('bahan_bakar', $this->bahan_bakar, true);
        $criteria->compare('id_uji', $this->id_uji, true);
        $criteria->compare('petugas', $this->petugas, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VGantibuku the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
