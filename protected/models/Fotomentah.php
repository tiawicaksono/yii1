<?php

/**
 * This is the model class for table "fotomentah".
 *
 * The followings are the available columns in table 'fotomentah':
 * @property integer $idx
 * @property string $nouji
 * @property string $fotodepanmentah
 * @property string $fotobelakangmentah
 * @property string $fotokananmentah
 * @property string $fotokirimentah
 * @property integer $statuskompres
 */
class Fotomentah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fotomentah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('statuskompres', 'numerical', 'integerOnly'=>true),
			array('nouji, fotodepanmentah, fotobelakangmentah, fotokananmentah, fotokirimentah', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idx, nouji, fotodepanmentah, fotobelakangmentah, fotokananmentah, fotokirimentah, statuskompres', 'safe', 'on'=>'search'),
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
			'idx' => 'Idx',
			'nouji' => 'Nouji',
			'fotodepanmentah' => 'Fotodepanmentah',
			'fotobelakangmentah' => 'Fotobelakangmentah',
			'fotokananmentah' => 'Fotokananmentah',
			'fotokirimentah' => 'Fotokirimentah',
			'statuskompres' => 'Statuskompres',
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

		$criteria->compare('idx',$this->idx);
		$criteria->compare('nouji',$this->nouji,true);
		$criteria->compare('fotodepanmentah',$this->fotodepanmentah,true);
		$criteria->compare('fotobelakangmentah',$this->fotobelakangmentah,true);
		$criteria->compare('fotokananmentah',$this->fotokananmentah,true);
		$criteria->compare('fotokirimentah',$this->fotokirimentah,true);
		$criteria->compare('statuskompres',$this->statuskompres);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fotomentah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
