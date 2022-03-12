<?php

/**
 * This is the model class for table "tbl_rekom_status".
 *
 * The followings are the available columns in table 'tbl_rekom_status':
 * @property string $id_rekom_status
 * @property integer $id_rekom
 * @property boolean $approve1
 * @property string $tgl_approve1
 * @property boolean $approve2
 * @property string $tgl_approve2
 * @property boolean $approve3
 * @property string $tgl_approve3
 */
class TblRekomStatus extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_rekom_status';
    }
    
    public function primaryKey() {
        return array('id_rekom_status');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_rekom', 'required'),
            array('id_rekom', 'numerical', 'integerOnly' => true),
            array('approve1, tgl_approve1, approve2, tgl_approve2, approve3, tgl_approve3', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_rekom_status, id_rekom, approve1, tgl_approve1, approve2, tgl_approve2, approve3, tgl_approve3', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rekom_rel' => array(self::BELONGS_TO, 'TblRekom', 'id_rekom')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_rekom_status' => 'Id Rekom Status',
            'id_rekom' => 'Id Rekom',
            'approve1' => 'Approve1',
            'tgl_approve1' => 'Tgl Approve1',
            'approve2' => 'Approve2',
            'tgl_approve2' => 'Tgl Approve2',
            'approve3' => 'Approve3',
            'tgl_approve3' => 'Tgl Approve3',
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

        $criteria->compare('id_rekom_status', $this->id_rekom_status, true);
        $criteria->compare('id_rekom', $this->id_rekom);
        $criteria->compare('approve1', $this->approve1);
        $criteria->compare('tgl_approve1', $this->tgl_approve1, true);
        $criteria->compare('approve2', $this->approve2);
        $criteria->compare('tgl_approve2', $this->tgl_approve2, true);
        $criteria->compare('approve3', $this->approve3);
        $criteria->compare('tgl_approve3', $this->tgl_approve3, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblRekomStatus the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
