<?php

/**
 * This is the model class for table "outbox".
 *
 * The followings are the available columns in table 'outbox':
 * @property string $UpdatedInDB
 * @property string $InsertIntoDB
 * @property string $SendingDateTime
 * @property string $SendBefore
 * @property string $SendAfter
 * @property string $Text
 * @property string $DestinationNumber
 * @property string $Coding
 * @property string $UDH
 * @property integer $Class
 * @property string $TextDecoded
 * @property integer $ID
 * @property boolean $MultiPart
 * @property integer $RelativeValidity
 * @property string $SenderID
 * @property string $SendingTimeOut
 * @property string $DeliveryReport
 * @property string $CreatorID
 */
class Outbox extends MultiActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function connectionId() {
        return 'db_sms';
    }
    public function tableName() {
        return 'outbox';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('UpdatedInDB, InsertIntoDB, SendingDateTime, SendingTimeOut, CreatorID', 'required'),
            array('Class, RelativeValidity', 'numerical', 'integerOnly' => true),
            array('DestinationNumber', 'length', 'max' => 20),
            array('Coding, SenderID', 'length', 'max' => 255),
            array('DeliveryReport', 'length', 'max' => 10),
            array('SendBefore, SendAfter, Text, UDH, TextDecoded, MultiPart', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('UpdatedInDB, InsertIntoDB, SendingDateTime, SendBefore, SendAfter, Text, DestinationNumber, Coding, UDH, Class, TextDecoded, ID, MultiPart, RelativeValidity, SenderID, SendingTimeOut, DeliveryReport, CreatorID', 'safe', 'on' => 'search'),
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
            'UpdatedInDB' => 'Updated In Db',
            'InsertIntoDB' => 'Insert Into Db',
            'SendingDateTime' => 'Sending Date Time',
            'SendBefore' => 'Send Before',
            'SendAfter' => 'Send After',
            'Text' => 'Text',
            'DestinationNumber' => 'Destination Number',
            'Coding' => 'Coding',
            'UDH' => 'Udh',
            'Class' => 'Class',
            'TextDecoded' => 'Text Decoded',
            'ID' => 'ID',
            'MultiPart' => 'Multi Part',
            'RelativeValidity' => 'Relative Validity',
            'SenderID' => 'Sender',
            'SendingTimeOut' => 'Sending Time Out',
            'DeliveryReport' => 'Delivery Report',
            'CreatorID' => 'Creator',
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

        $criteria->compare('UpdatedInDB', $this->UpdatedInDB, true);
        $criteria->compare('InsertIntoDB', $this->InsertIntoDB, true);
        $criteria->compare('SendingDateTime', $this->SendingDateTime, true);
        $criteria->compare('SendBefore', $this->SendBefore, true);
        $criteria->compare('SendAfter', $this->SendAfter, true);
        $criteria->compare('Text', $this->Text, true);
        $criteria->compare('DestinationNumber', $this->DestinationNumber, true);
        $criteria->compare('Coding', $this->Coding, true);
        $criteria->compare('UDH', $this->UDH, true);
        $criteria->compare('Class', $this->Class);
        $criteria->compare('TextDecoded', $this->TextDecoded, true);
        $criteria->compare('ID', $this->ID);
        $criteria->compare('MultiPart', $this->MultiPart);
        $criteria->compare('RelativeValidity', $this->RelativeValidity);
        $criteria->compare('SenderID', $this->SenderID, true);
        $criteria->compare('SendingTimeOut', $this->SendingTimeOut, true);
        $criteria->compare('DeliveryReport', $this->DeliveryReport, true);
        $criteria->compare('CreatorID', $this->CreatorID, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Outbox the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
