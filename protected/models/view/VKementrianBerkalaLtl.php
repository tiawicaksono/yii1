<?php

/**
 * This is the model class for table "v_kementrian_berkala_ltl".
 *
 * The followings are the available columns in table 'v_kementrian_berkala_ltl':
 * @property string $tgl_uji
 * @property string $mb_l_1
 * @property string $mb_l_6
 * @property string $mb_l_10
 * @property string $mb_tl_1
 * @property string $mb_tl_6
 * @property string $mb_tl_10
 * @property string $bus_l_1
 * @property string $bus_l_6
 * @property string $bus_l_10
 * @property string $bus_tl_1
 * @property string $bus_tl_6
 * @property string $bus_tl_10
 * @property string $mp_l_1
 * @property string $mp_l_6
 * @property string $mp_l_10
 * @property string $mp_tl_1
 * @property string $mp_tl_6
 * @property string $mp_tl_10
 * @property string $mk_l_1
 * @property string $mk_l_6
 * @property string $mk_l_10
 * @property string $mk_tl_1
 * @property string $mk_tl_6
 * @property string $mk_tl_10
 * @property string $kg_l_1
 * @property string $kg_l_6
 * @property string $kg_l_10
 * @property string $kg_tl_1
 * @property string $kg_tl_6
 * @property string $kg_tl_10
 * @property string $kt_l_1
 * @property string $kt_l_6
 * @property string $kt_l_10
 * @property string $kt_tl_1
 * @property string $kt_tl_6
 * @property string $kt_tl_10
 */
class VKementrianBerkalaLtl extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_kementrian_berkala_ltl';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tgl_uji, mb_l_1, mb_l_6, mb_l_10, mb_tl_1, mb_tl_6, mb_tl_10, bus_l_1, bus_l_6, bus_l_10, bus_tl_1, bus_tl_6, bus_tl_10, mp_l_1, mp_l_6, mp_l_10, mp_tl_1, mp_tl_6, mp_tl_10, mk_l_1, mk_l_6, mk_l_10, mk_tl_1, mk_tl_6, mk_tl_10, kg_l_1, kg_l_6, kg_l_10, kg_tl_1, kg_tl_6, kg_tl_10, kt_l_1, kt_l_6, kt_l_10, kt_tl_1, kt_tl_6, kt_tl_10', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tgl_uji, mb_l_1, mb_l_6, mb_l_10, mb_tl_1, mb_tl_6, mb_tl_10, bus_l_1, bus_l_6, bus_l_10, bus_tl_1, bus_tl_6, bus_tl_10, mp_l_1, mp_l_6, mp_l_10, mp_tl_1, mp_tl_6, mp_tl_10, mk_l_1, mk_l_6, mk_l_10, mk_tl_1, mk_tl_6, mk_tl_10, kg_l_1, kg_l_6, kg_l_10, kg_tl_1, kg_tl_6, kg_tl_10, kt_l_1, kt_l_6, kt_l_10, kt_tl_1, kt_tl_6, kt_tl_10', 'safe', 'on'=>'search'),
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
			'mb_l_1' => 'Mb L 1',
			'mb_l_6' => 'Mb L 6',
			'mb_l_10' => 'Mb L 10',
			'mb_tl_1' => 'Mb Tl 1',
			'mb_tl_6' => 'Mb Tl 6',
			'mb_tl_10' => 'Mb Tl 10',
			'bus_l_1' => 'Bus L 1',
			'bus_l_6' => 'Bus L 6',
			'bus_l_10' => 'Bus L 10',
			'bus_tl_1' => 'Bus Tl 1',
			'bus_tl_6' => 'Bus Tl 6',
			'bus_tl_10' => 'Bus Tl 10',
			'mp_l_1' => 'Mp L 1',
			'mp_l_6' => 'Mp L 6',
			'mp_l_10' => 'Mp L 10',
			'mp_tl_1' => 'Mp Tl 1',
			'mp_tl_6' => 'Mp Tl 6',
			'mp_tl_10' => 'Mp Tl 10',
			'mk_l_1' => 'Mk L 1',
			'mk_l_6' => 'Mk L 6',
			'mk_l_10' => 'Mk L 10',
			'mk_tl_1' => 'Mk Tl 1',
			'mk_tl_6' => 'Mk Tl 6',
			'mk_tl_10' => 'Mk Tl 10',
			'kg_l_1' => 'Kg L 1',
			'kg_l_6' => 'Kg L 6',
			'kg_l_10' => 'Kg L 10',
			'kg_tl_1' => 'Kg Tl 1',
			'kg_tl_6' => 'Kg Tl 6',
			'kg_tl_10' => 'Kg Tl 10',
			'kt_l_1' => 'Kt L 1',
			'kt_l_6' => 'Kt L 6',
			'kt_l_10' => 'Kt L 10',
			'kt_tl_1' => 'Kt Tl 1',
			'kt_tl_6' => 'Kt Tl 6',
			'kt_tl_10' => 'Kt Tl 10',
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
		$criteria->compare('mb_l_1',$this->mb_l_1,true);
		$criteria->compare('mb_l_6',$this->mb_l_6,true);
		$criteria->compare('mb_l_10',$this->mb_l_10,true);
		$criteria->compare('mb_tl_1',$this->mb_tl_1,true);
		$criteria->compare('mb_tl_6',$this->mb_tl_6,true);
		$criteria->compare('mb_tl_10',$this->mb_tl_10,true);
		$criteria->compare('bus_l_1',$this->bus_l_1,true);
		$criteria->compare('bus_l_6',$this->bus_l_6,true);
		$criteria->compare('bus_l_10',$this->bus_l_10,true);
		$criteria->compare('bus_tl_1',$this->bus_tl_1,true);
		$criteria->compare('bus_tl_6',$this->bus_tl_6,true);
		$criteria->compare('bus_tl_10',$this->bus_tl_10,true);
		$criteria->compare('mp_l_1',$this->mp_l_1,true);
		$criteria->compare('mp_l_6',$this->mp_l_6,true);
		$criteria->compare('mp_l_10',$this->mp_l_10,true);
		$criteria->compare('mp_tl_1',$this->mp_tl_1,true);
		$criteria->compare('mp_tl_6',$this->mp_tl_6,true);
		$criteria->compare('mp_tl_10',$this->mp_tl_10,true);
		$criteria->compare('mk_l_1',$this->mk_l_1,true);
		$criteria->compare('mk_l_6',$this->mk_l_6,true);
		$criteria->compare('mk_l_10',$this->mk_l_10,true);
		$criteria->compare('mk_tl_1',$this->mk_tl_1,true);
		$criteria->compare('mk_tl_6',$this->mk_tl_6,true);
		$criteria->compare('mk_tl_10',$this->mk_tl_10,true);
		$criteria->compare('kg_l_1',$this->kg_l_1,true);
		$criteria->compare('kg_l_6',$this->kg_l_6,true);
		$criteria->compare('kg_l_10',$this->kg_l_10,true);
		$criteria->compare('kg_tl_1',$this->kg_tl_1,true);
		$criteria->compare('kg_tl_6',$this->kg_tl_6,true);
		$criteria->compare('kg_tl_10',$this->kg_tl_10,true);
		$criteria->compare('kt_l_1',$this->kt_l_1,true);
		$criteria->compare('kt_l_6',$this->kt_l_6,true);
		$criteria->compare('kt_l_10',$this->kt_l_10,true);
		$criteria->compare('kt_tl_1',$this->kt_tl_1,true);
		$criteria->compare('kt_tl_6',$this->kt_tl_6,true);
		$criteria->compare('kt_tl_10',$this->kt_tl_10,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VKementrianBerkalaLtl the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
