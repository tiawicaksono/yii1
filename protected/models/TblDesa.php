<?php

/**
 * This is the model class for table "tbl_desa".
 *
 * The followings are the available columns in table 'tbl_desa':
 * @property string $id_nm_desa
 * @property string $nm_desa
 * @property integer $id_kecamatan
 */
class TblDesa extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_desa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_kecamatan', 'numerical', 'integerOnly' => true),
            array('nm_desa', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_nm_desa, nm_desa, id_kecamatan', 'safe', 'on' => 'search'),
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
            'id_nm_desa' => 'Id Nm Desa',
            'nm_desa' => 'Nm Desa',
            'id_kecamatan' => 'Id Kecamatan',
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

        $criteria->compare('id_nm_desa', $this->id_nm_desa, true);
        $criteria->compare('nm_desa', $this->nm_desa, true);
        $criteria->compare('id_kecamatan', $this->id_kecamatan);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblDesa the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
