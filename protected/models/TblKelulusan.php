<?php

/**
 * This is the model class for table "tbl_kelulusan".
 *
 * The followings are the available columns in table 'tbl_kelulusan':
 * @property string $id_kelulusan
 * @property string $kelulusan
 * @property string $kd_lulus
 * @property string $stts_kirim
 */
class TblKelulusan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_kelulusan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kelulusan', 'length', 'max'=>1000),
			array('kd_lulus', 'length', 'max'=>30),
			array('stts_kirim', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kelulusan, kelulusan, kd_lulus, stts_kirim', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kelulusan' => 'Id Kelulusan',
			'kelulusan' => 'Kelulusan',
			'kd_lulus' => 'Kd Lulus',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_kelulusan',$this->id_kelulusan,true);
		$criteria->compare('kelulusan',$this->kelulusan,true);
		$criteria->compare('kd_lulus',$this->kd_lulus,true);
		$criteria->compare('stts_kirim',$this->stts_kirim,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblKelulusan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
