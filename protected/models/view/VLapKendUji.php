<?php

/**
 * This is the model class for table "v_lap_kend_uji".
 *
 * The followings are the available columns in table 'v_lap_kend_uji':
 * @property string $tgl_uji
 * @property string $jumberkala
 * @property string $jumextl
 * @property string $dberkala
 * @property string $dextl
 * @property string $tdberkala
 * @property string $tdextl
 * @property string $tlberkala
 * @property string $tlextl
 * @property string $lberkala
 * @property string $lextl
 */
class VLapKendUji extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_lap_kend_uji';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tgl_uji, jumberkala, jumextl, dberkala, dextl, tdberkala, tdextl, tlberkala, tlextl, lberkala, lextl', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tgl_uji, jumberkala, jumextl, dberkala, dextl, tdberkala, tdextl, tlberkala, tlextl, lberkala, lextl', 'safe', 'on'=>'search'),
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
			'tgl_uji' => 'Tgl Uji',
			'jumberkala' => 'Jumberkala',
			'jumextl' => 'Jumextl',
			'dberkala' => 'Dberkala',
			'dextl' => 'Dextl',
			'tdberkala' => 'Tdberkala',
			'tdextl' => 'Tdextl',
			'tlberkala' => 'Tlberkala',
			'tlextl' => 'Tlextl',
			'lberkala' => 'Lberkala',
			'lextl' => 'Lextl',
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

		$criteria->compare('tgl_uji',$this->tgl_uji,true);
		$criteria->compare('jumberkala',$this->jumberkala,true);
		$criteria->compare('jumextl',$this->jumextl,true);
		$criteria->compare('dberkala',$this->dberkala,true);
		$criteria->compare('dextl',$this->dextl,true);
		$criteria->compare('tdberkala',$this->tdberkala,true);
		$criteria->compare('tdextl',$this->tdextl,true);
		$criteria->compare('tlberkala',$this->tlberkala,true);
		$criteria->compare('tlextl',$this->tlextl,true);
		$criteria->compare('lberkala',$this->lberkala,true);
		$criteria->compare('lextl',$this->lextl,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VLapKendUji the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
