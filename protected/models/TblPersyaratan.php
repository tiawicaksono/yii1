<?php

/**
 * This is the model class for table "tbl_persyaratan".
 *
 * The followings are the available columns in table 'tbl_persyaratan':
 * @property integer $persyaratan_id
 * @property string $persyaratan
 * @property integer $id_persyaratan_category
 */
class TblPersyaratan extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_persyaratan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_persyaratan_category', 'numerical', 'integerOnly' => true),
            array('persyaratan', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('persyaratan_id, persyaratan, id_persyaratan_category', 'safe', 'on' => 'search'),
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
            'persyaratan_id' => 'Persyaratan',
            'persyaratan' => 'Persyaratan',
            'id_persyaratan_category' => 'Id Persyaratan Category',
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

        $criteria->compare('persyaratan_id', $this->persyaratan_id);
        $criteria->compare('persyaratan', $this->persyaratan, true);
        $criteria->compare('id_persyaratan_category', $this->id_persyaratan_category);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblPersyaratan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getPersyaratan() {
        $category = TblPersyaratanCategory::model()->findAllByAttributes(array('id_rekom' => 1));
        foreach ($category as $dataCategory) {
            $result["category"][$dataCategory->id_persyaratan_category] = $dataCategory;
            $persyaratan = $this->findAllByAttributes(array('id_persyaratan_category' => $dataCategory->id_persyaratan_category));
            foreach ($persyaratan as $dataPersyaratan):
                $result["persyaratan"][$dataCategory->id_persyaratan_category][] = $dataPersyaratan;
            endforeach;
        }
        return $result;
    }

}
