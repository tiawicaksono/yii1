<?php

/**
 * This is the model class for table "v_det_buku".
 *
 * The followings are the available columns in table 'v_det_buku':
 * @property string $tgl_uji
 * @property string $berlaku
 * @property string $tempat
 * @property string $catatan
 * @property string $nama_penguji
 * @property string $nrp
 * @property string $id_kendaraan
 * @property double $ktlamp_kanan
 * @property double $ktlamp_kiri
 * @property double $dev_kanan
 * @property double $dev_kiri
 * @property double $selrem_sb1
 * @property double $selrem_sb2
 * @property double $selrem_sb3
 * @property double $selrem_sb4
 * @property double $beratgaya
 * @property double $selgaya
 * @property double $selkirikanan
 * @property double $ems_diesel
 * @property double $ems_mesin_co
 * @property double $ems_mesin_hc
 */
class VDetBuku extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'v_det_buku';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ktlamp_kanan, ktlamp_kiri, dev_kanan, dev_kiri, selrem_sb1, selrem_sb2, selrem_sb3, selrem_sb4, beratgaya, selgaya1, selgaya2, selgaya3, selgaya4, ems_diesel, ems_mesin_co, ems_mesin_hc', 'numerical'),
            array('tempat', 'length', 'max' => 200),
            array('catatan', 'length', 'max' => 100),
            array('nama_penguji', 'length', 'max' => 120),
            array('nrp', 'length', 'max' => 30),
            array('tgl_uji, berlaku, id_kendaraan', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('tgl_uji, berlaku, tempat, catatan, nama_penguji, nrp, id_kendaraan, ktlamp_kanan, ktlamp_kiri, dev_kanan, dev_kiri, selrem_sb1, selrem_sb2, selrem_sb3, selrem_sb4, beratgaya, selgaya1, selgaya2, selgaya3, selgaya4, ems_diesel, ems_mesin_co, ems_mesin_hc', 'safe', 'on' => 'search'),
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
            'berlaku' => 'Berlaku',
            'tempat' => 'Tempat',
            'catatan' => 'Catatan',
            'nama_penguji' => 'Nama Penguji',
            'nrp' => 'Nrp',
            'id_kendaraan' => 'Id Kendaraan',
            'ktlamp_kanan' => 'Ktlamp Kanan',
            'ktlamp_kiri' => 'Ktlamp Kiri',
            'dev_kanan' => 'Dev Kanan',
            'dev_kiri' => 'Dev Kiri',
            'selrem_sb1' => 'Selrem Sb1',
            'selrem_sb2' => 'Selrem Sb2',
            'selrem_sb3' => 'Selrem Sb3',
            'selrem_sb4' => 'Selrem Sb4',
            'beratgaya' => 'Beratgaya',
            'selgaya1' => 'Selgaya 1',
            'selgaya2' => 'Selgaya 2',
            'selgaya3' => 'Selgaya 3',
            'selgaya4' => 'Selgaya 4',
            'ems_diesel' => 'Ems Diesel',
            'ems_mesin_co' => 'Ems Mesin Co',
            'ems_mesin_hc' => 'Ems Mesin Hc',
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
        $criteria->compare('berlaku', $this->berlaku, true);
        $criteria->compare('tempat', $this->tempat, true);
        $criteria->compare('catatan', $this->catatan, true);
        $criteria->compare('nama_penguji', $this->nama_penguji, true);
        $criteria->compare('nrp', $this->nrp, true);
        $criteria->compare('id_kendaraan', $this->id_kendaraan, true);
        $criteria->compare('ktlamp_kanan', $this->ktlamp_kanan);
        $criteria->compare('ktlamp_kiri', $this->ktlamp_kiri);
        $criteria->compare('dev_kanan', $this->dev_kanan);
        $criteria->compare('dev_kiri', $this->dev_kiri);
        $criteria->compare('selrem_sb1', $this->selrem_sb1);
        $criteria->compare('selrem_sb2', $this->selrem_sb2);
        $criteria->compare('selrem_sb3', $this->selrem_sb3);
        $criteria->compare('selrem_sb4', $this->selrem_sb4);
        $criteria->compare('beratgaya', $this->beratgaya);
        $criteria->compare('selgaya1', $this->selgaya1);
        $criteria->compare('selgaya2', $this->selgaya2);
        $criteria->compare('selgaya3', $this->selgaya3);
        $criteria->compare('selgaya4', $this->selgaya4);
        $criteria->compare('ems_diesel', $this->ems_diesel);
        $criteria->compare('ems_mesin_co', $this->ems_mesin_co);
        $criteria->compare('ems_mesin_hc', $this->ems_mesin_hc);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VDetBuku the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
