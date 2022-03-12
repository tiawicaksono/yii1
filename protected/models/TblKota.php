<?php

/**
 * This is the model class for table "tbl_kota".
 *
 * The followings are the available columns in table 'tbl_kota':
 * @property string $id_kota
 * @property string $kd_kota
 * @property string $nama_kota
 * @property string $kd_propinsi
 */
class TblKota extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_kota';
    }

    public function primaryKey() {
        return array('kd_kota');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('kd_kota', 'length', 'max' => 20),
            array('nm_kota', 'length', 'max' => 200),
            array('kd_propinsi', 'length', 'max' => 30),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_kota, kd_kota, nm_kota, kd_propinsi', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'propinsi_rel' => array(self::BELONGS_TO, 'TblPropinsi', 'kd_propinsi')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_kota' => 'Id Kota',
            'kd_kota' => 'Kd Kota',
            'nm_kota' => 'Nama Kota',
            'kd_propinsi' => 'Kd Propinsi',
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

        $criteria->compare('id_kota', $this->id_kota, true);
        $criteria->compare('kd_kota', $this->kd_kota, true);
        $criteria->compare('nm_kota', $this->nm_kota, true);
        $criteria->compare('kd_propinsi', $this->kd_propinsi, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblKota the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function detailKotaPropinsi($kd_kota) {
        $criteria = new CDbCriteria();
//        $criteria->with = array(
//            'propinsi_rel'
//        );
        $criteria->addCondition("kd_kota = '$kd_kota'");
        return TblKota::model()->find($criteria);
    }

}
