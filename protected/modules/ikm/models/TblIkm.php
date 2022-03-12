<?php

/**
 * This is the model class for table "tbl_ikm".
 *
 * The followings are the available columns in table 'tbl_ikm':
 * @property string $id_ikm
 * @property string $tgl_ikm
 * @property string $no_kendaraan
 * @property string $jawaban
 */
class TblIkm extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    
    public function tableName() {
        return 'tbl_ikm';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('no_kendaraan, jawaban, jawaban1, jawaban2, jawaban3', 'length', 'max' => 20),
            array('tgl_ikm', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_ikm, tgl_ikm, no_kendaraan, jawaban', 'safe', 'on' => 'search'),
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
            'id_ikm' => 'Id Ikm',
            'tgl_ikm' => 'Tgl Ikm',
            'no_kendaraan' => 'No Kendaraan',
            'jawaban' => 'Jawaban',
            'jawaban1' => 'Jawaban1',
            'jawaban2' => 'Jawaban2',
            'jawaban3' => 'Jawaban3',
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

        $criteria->compare('id_ikm', $this->id_ikm, true);
        $criteria->compare('tgl_ikm', $this->tgl_ikm, true);
        $criteria->compare('no_kendaraan', $this->no_kendaraan, true);
        $criteria->compare('jawaban', $this->jawaban, true);
        $criteria->compare('jawaban1', $this->jawaban1, true);
        $criteria->compare('jawaban2', $this->jawaban2, true);
        $criteria->compare('jawaban3', $this->jawaban3, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblIkm the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
