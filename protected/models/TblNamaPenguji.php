<?php

/**
 * This is the model class for table "tbl_nama_penguji".
 *
 * The followings are the available columns in table 'tbl_nama_penguji':
 * @property string $nama_penguji
 * @property string $id_nama_penguji
 * @property string $nrp
 * @property string $jabatan
 * @property boolean $status_penguji
 */
class TblNamaPenguji extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_nama_penguji';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nama_penguji', 'length', 'max' => 120),
            array('nrp', 'length', 'max' => 30),
            array('jabatan', 'length', 'max' => 20),
            array('status_penguji', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('nama_penguji, id_nama_penguji, nrp, jabatan, status_penguji', 'safe', 'on' => 'search'),
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
            'nama_penguji' => 'Nama Penguji',
            'id_nama_penguji' => 'Id Nama Penguji',
            'nrp' => 'Nrp',
            'jabatan' => 'Jabatan',
            'status_penguji' => 'Status Penguji',
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

        $criteria->compare('nama_penguji', $this->nama_penguji, true);
        $criteria->compare('id_nama_penguji', $this->id_nama_penguji, true);
        $criteria->compare('nrp', $this->nrp, true);
        $criteria->compare('jabatan', $this->jabatan, true);
        $criteria->compare('status_penguji', $this->status_penguji);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblNamaPenguji the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
