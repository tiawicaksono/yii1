<?php

/**
 * This is the model class for table "v_kementrian_berkala_3501_6000".
 *
 * The followings are the available columns in table 'v_kementrian_berkala_3501_6000':
 * @property string $tgl_uji
 * @property string $mp_u_1
 * @property string $mp_tu_1
 * @property string $mp_u_6
 * @property string $mp_tu_6
 * @property string $mp_u_10
 * @property string $mp_tu_10
 * @property string $mb_u_1
 * @property string $mb_tu_1
 * @property string $mb_u_6
 * @property string $mb_tu_6
 * @property string $mb_u_10
 * @property string $mb_tu_10
 * @property string $bus_u_1
 * @property string $bus_tu_1
 * @property string $bus_u_6
 * @property string $bus_tu_6
 * @property string $bus_u_10
 * @property string $bus_tu_10
 * @property string $mk_u_1
 * @property string $mk_tu_1
 * @property string $mk_u_6
 * @property string $mk_tu_6
 * @property string $mk_u_10
 * @property string $mk_tu_10
 * @property string $kg_u_1
 * @property string $kg_tu_1
 * @property string $kg_u_6
 * @property string $kg_tu_6
 * @property string $kg_u_10
 * @property string $kg_tu_10
 * @property string $kt_u_1
 * @property string $kt_tu_1
 * @property string $kt_u_6
 * @property string $kt_tu_6
 * @property string $kt_u_10
 * @property string $kt_tu_10
 */
class VKementrianBerkala35016000 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_kementrian_berkala_3501_6000';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tgl_uji, mp_u_1, mp_tu_1, mp_u_6, mp_tu_6, mp_u_10, mp_tu_10, mb_u_1, mb_tu_1, mb_u_6, mb_tu_6, mb_u_10, mb_tu_10, bus_u_1, bus_tu_1, bus_u_6, bus_tu_6, bus_u_10, bus_tu_10, mk_u_1, mk_tu_1, mk_u_6, mk_tu_6, mk_u_10, mk_tu_10, kg_u_1, kg_tu_1, kg_u_6, kg_tu_6, kg_u_10, kg_tu_10, kt_u_1, kt_tu_1, kt_u_6, kt_tu_6, kt_u_10, kt_tu_10', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tgl_uji, mp_u_1, mp_tu_1, mp_u_6, mp_tu_6, mp_u_10, mp_tu_10, mb_u_1, mb_tu_1, mb_u_6, mb_tu_6, mb_u_10, mb_tu_10, bus_u_1, bus_tu_1, bus_u_6, bus_tu_6, bus_u_10, bus_tu_10, mk_u_1, mk_tu_1, mk_u_6, mk_tu_6, mk_u_10, mk_tu_10, kg_u_1, kg_tu_1, kg_u_6, kg_tu_6, kg_u_10, kg_tu_10, kt_u_1, kt_tu_1, kt_u_6, kt_tu_6, kt_u_10, kt_tu_10', 'safe', 'on'=>'search'),
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
			'mp_u_1' => 'Mp U 1',
			'mp_tu_1' => 'Mp Tu 1',
			'mp_u_6' => 'Mp U 6',
			'mp_tu_6' => 'Mp Tu 6',
			'mp_u_10' => 'Mp U 10',
			'mp_tu_10' => 'Mp Tu 10',
			'mb_u_1' => 'Mb U 1',
			'mb_tu_1' => 'Mb Tu 1',
			'mb_u_6' => 'Mb U 6',
			'mb_tu_6' => 'Mb Tu 6',
			'mb_u_10' => 'Mb U 10',
			'mb_tu_10' => 'Mb Tu 10',
			'bus_u_1' => 'Bus U 1',
			'bus_tu_1' => 'Bus Tu 1',
			'bus_u_6' => 'Bus U 6',
			'bus_tu_6' => 'Bus Tu 6',
			'bus_u_10' => 'Bus U 10',
			'bus_tu_10' => 'Bus Tu 10',
			'mk_u_1' => 'Mk U 1',
			'mk_tu_1' => 'Mk Tu 1',
			'mk_u_6' => 'Mk U 6',
			'mk_tu_6' => 'Mk Tu 6',
			'mk_u_10' => 'Mk U 10',
			'mk_tu_10' => 'Mk Tu 10',
			'kg_u_1' => 'Kg U 1',
			'kg_tu_1' => 'Kg Tu 1',
			'kg_u_6' => 'Kg U 6',
			'kg_tu_6' => 'Kg Tu 6',
			'kg_u_10' => 'Kg U 10',
			'kg_tu_10' => 'Kg Tu 10',
			'kt_u_1' => 'Kt U 1',
			'kt_tu_1' => 'Kt Tu 1',
			'kt_u_6' => 'Kt U 6',
			'kt_tu_6' => 'Kt Tu 6',
			'kt_u_10' => 'Kt U 10',
			'kt_tu_10' => 'Kt Tu 10',
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
		$criteria->compare('mp_u_1',$this->mp_u_1,true);
		$criteria->compare('mp_tu_1',$this->mp_tu_1,true);
		$criteria->compare('mp_u_6',$this->mp_u_6,true);
		$criteria->compare('mp_tu_6',$this->mp_tu_6,true);
		$criteria->compare('mp_u_10',$this->mp_u_10,true);
		$criteria->compare('mp_tu_10',$this->mp_tu_10,true);
		$criteria->compare('mb_u_1',$this->mb_u_1,true);
		$criteria->compare('mb_tu_1',$this->mb_tu_1,true);
		$criteria->compare('mb_u_6',$this->mb_u_6,true);
		$criteria->compare('mb_tu_6',$this->mb_tu_6,true);
		$criteria->compare('mb_u_10',$this->mb_u_10,true);
		$criteria->compare('mb_tu_10',$this->mb_tu_10,true);
		$criteria->compare('bus_u_1',$this->bus_u_1,true);
		$criteria->compare('bus_tu_1',$this->bus_tu_1,true);
		$criteria->compare('bus_u_6',$this->bus_u_6,true);
		$criteria->compare('bus_tu_6',$this->bus_tu_6,true);
		$criteria->compare('bus_u_10',$this->bus_u_10,true);
		$criteria->compare('bus_tu_10',$this->bus_tu_10,true);
		$criteria->compare('mk_u_1',$this->mk_u_1,true);
		$criteria->compare('mk_tu_1',$this->mk_tu_1,true);
		$criteria->compare('mk_u_6',$this->mk_u_6,true);
		$criteria->compare('mk_tu_6',$this->mk_tu_6,true);
		$criteria->compare('mk_u_10',$this->mk_u_10,true);
		$criteria->compare('mk_tu_10',$this->mk_tu_10,true);
		$criteria->compare('kg_u_1',$this->kg_u_1,true);
		$criteria->compare('kg_tu_1',$this->kg_tu_1,true);
		$criteria->compare('kg_u_6',$this->kg_u_6,true);
		$criteria->compare('kg_tu_6',$this->kg_tu_6,true);
		$criteria->compare('kg_u_10',$this->kg_u_10,true);
		$criteria->compare('kg_tu_10',$this->kg_tu_10,true);
		$criteria->compare('kt_u_1',$this->kt_u_1,true);
		$criteria->compare('kt_tu_1',$this->kt_tu_1,true);
		$criteria->compare('kt_u_6',$this->kt_u_6,true);
		$criteria->compare('kt_tu_6',$this->kt_tu_6,true);
		$criteria->compare('kt_u_10',$this->kt_u_10,true);
		$criteria->compare('kt_tu_10',$this->kt_tu_10,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VKementrianBerkala35016000 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
