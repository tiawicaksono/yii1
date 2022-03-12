<?php

/**
 * This is the model class for table "tbl_ikm_question".
 *
 * The followings are the available columns in table 'tbl_ikm_question':
 * @property integer $question_id
 * @property string $question
 * @property integer $question_status
 */
class TblIkmQuestion extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_ikm_question';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('question_status', 'numerical', 'integerOnly' => true),
            array('question', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('question_id, question, question_status', 'safe', 'on' => 'search'),
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
            'question_id' => 'Question',
            'question' => 'Question',
            'question_status' => 'Question Status',
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

        $criteria->compare('question_id', $this->question_id);
        $criteria->compare('question', $this->question, true);
        $criteria->compare('question_status', $this->question_status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblIkmQuestion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
