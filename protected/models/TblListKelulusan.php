<?php

/**
 * This is the model class for table "tbl_list_kelulusan".
 *
 * The followings are the available columns in table 'tbl_list_kelulusan':
 * @property string $id_hasil_uji
 * @property string $kd_lulus
 * @property string $kelulusan
 * @property string $id_list_lulus
 * @property string $input_tl
 * @property string $stts_kirim
 */
class TblListKelulusan extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_list_kelulusan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('kd_lulus, input_tl', 'length', 'max' => 30),
            array('kelulusan', 'length', 'max' => 1000),
            array('stts_kirim', 'length', 'max' => 20),
            array('id_hasil_uji', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_hasil_uji, kd_lulus, kelulusan, id_list_lulus, input_tl, stts_kirim', 'safe', 'on' => 'search'),
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
            'id_hasil_uji' => 'Id Hasil Uji',
            'kd_lulus' => 'Kd Lulus',
            'kelulusan' => 'Kelulusan',
            'id_list_lulus' => 'Id List Lulus',
            'input_tl' => 'Input Tl',
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

        $criteria->compare('id_hasil_uji', $this->id_hasil_uji, true);
        $criteria->compare('kd_lulus', $this->kd_lulus, true);
        $criteria->compare('kelulusan', $this->kelulusan, true);
        $criteria->compare('id_list_lulus', $this->id_list_lulus, true);
        $criteria->compare('input_tl', $this->input_tl, true);
        $criteria->compare('stts_kirim', $this->stts_kirim, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblListKelulusan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
