<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $username
 * @property string $password
 * @property string $otoritas
 * @property string $id_user
 * @property boolean $prauji
 * @property boolean $emisi
 * @property boolean $pitlift
 * @property boolean $headlight
 * @property boolean $brake
 * @property boolean $gandengan
 * @property string $posisi_cis
 * @property string $password_
 */
class TblUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'required'),
			array('username', 'length', 'max'=>100),
			array('password', 'length', 'max'=>32),
			array('otoritas', 'length', 'max'=>30),
			array('posisi_cis, password_', 'length', 'max'=>20),
			array('prauji, emisi, pitlift, headlight, brake, gandengan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('username, password, otoritas, id_user, prauji, emisi, pitlift, headlight, brake, gandengan, posisi_cis, password_', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'otoritas' => 'Otoritas',
			'id_user' => 'Id User',
			'prauji' => 'Prauji',
			'emisi' => 'Emisi',
			'pitlift' => 'Pitlift',
			'headlight' => 'Headlight',
			'brake' => 'Brake',
			'gandengan' => 'Gandengan',
			'posisi_cis' => 'Posisi Cis',
			'password_' => 'Password',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('otoritas',$this->otoritas,true);
		$criteria->compare('id_user',$this->id_user,true);
		$criteria->compare('prauji',$this->prauji);
		$criteria->compare('emisi',$this->emisi);
		$criteria->compare('pitlift',$this->pitlift);
		$criteria->compare('headlight',$this->headlight);
		$criteria->compare('brake',$this->brake);
		$criteria->compare('gandengan',$this->gandengan);
		$criteria->compare('posisi_cis',$this->posisi_cis,true);
		$criteria->compare('password_',$this->password_,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
