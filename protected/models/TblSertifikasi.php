<?php

/**
 * This is the model class for table "tbl_sertifikasi".
 *
 * The followings are the available columns in table 'tbl_sertifikasi':
 * @property string $no_regis
 * @property string $no_tipe
 * @property string $tgl_tipe
 * @property string $oleh_tipe
 * @property string $id_kendaraan
 * @property string $no_rancang
 * @property string $tgl_regis
 * @property string $oleh_regis
 * @property string $tgl_rancang
 * @property string $oleh_rancang
 */
class TblSertifikasi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_sertifikasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_regis, no_tipe, no_rancang', 'length', 'max'=>200),
			array('oleh_tipe, oleh_regis, oleh_rancang', 'length', 'max'=>100),
			array('tgl_tipe, id_kendaraan, tgl_regis, tgl_rancang', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('no_regis, no_tipe, tgl_tipe, oleh_tipe, id_kendaraan, no_rancang, tgl_regis, oleh_regis, tgl_rancang, oleh_rancang', 'safe', 'on'=>'search'),
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
			'no_regis' => 'No Regis',
			'no_tipe' => 'No Tipe',
			'tgl_tipe' => 'Tgl Tipe',
			'oleh_tipe' => 'Oleh Tipe',
			'id_kendaraan' => 'Id Kendaraan',
			'no_rancang' => 'No Rancang',
			'tgl_regis' => 'Tgl Regis',
			'oleh_regis' => 'Oleh Regis',
			'tgl_rancang' => 'Tgl Rancang',
			'oleh_rancang' => 'Oleh Rancang',
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

		$criteria->compare('no_regis',$this->no_regis,true);
		$criteria->compare('no_tipe',$this->no_tipe,true);
		$criteria->compare('tgl_tipe',$this->tgl_tipe,true);
		$criteria->compare('oleh_tipe',$this->oleh_tipe,true);
		$criteria->compare('id_kendaraan',$this->id_kendaraan,true);
		$criteria->compare('no_rancang',$this->no_rancang,true);
		$criteria->compare('tgl_regis',$this->tgl_regis,true);
		$criteria->compare('oleh_regis',$this->oleh_regis,true);
		$criteria->compare('tgl_rancang',$this->tgl_rancang,true);
		$criteria->compare('oleh_rancang',$this->oleh_rancang,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblSertifikasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
