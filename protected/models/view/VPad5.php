<?php

/**
 * This is the model class for table "v_pad_5".
 *
 * The followings are the available columns in table 'v_pad_5':
 * @property integer $hr_kerja
 * @property string $tot_hrkerja
 * @property integer $tahun
 * @property string $bulan
 * @property integer $bulan1
 * @property string $per_bln
 * @property string $pro_bln
 * @property string $tot_daftar
 * @property string $tot_buku
 * @property string $tot_denda
 * @property string $total
 * @property string $prosen
 * @property string $pro_interval
 * @property string $tot_interval
 */
class VPad5 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_pad_5';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hr_kerja, tahun, bulan1', 'numerical', 'integerOnly'=>true),
			array('tot_hrkerja, bulan, per_bln, pro_bln, tot_daftar, tot_buku, tot_denda, total, prosen, pro_interval, tot_interval', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('hr_kerja, tot_hrkerja, tahun, bulan, bulan1, per_bln, pro_bln, tot_daftar, tot_buku, tot_denda, total, prosen, pro_interval, tot_interval', 'safe', 'on'=>'search'),
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
			'hr_kerja' => 'Hr Kerja',
			'tot_hrkerja' => 'Tot Hrkerja',
			'tahun' => 'Tahun',
			'bulan' => 'Bulan',
			'bulan1' => 'Bulan1',
			'per_bln' => 'Per Bln',
			'pro_bln' => 'Pro Bln',
			'tot_daftar' => 'Tot Daftar',
			'tot_buku' => 'Tot Buku',
			'tot_denda' => 'Tot Denda',
			'total' => 'Total',
			'prosen' => 'Prosen',
			'pro_interval' => 'Pro Interval',
			'tot_interval' => 'Tot Interval',
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

		$criteria->compare('hr_kerja',$this->hr_kerja);
		$criteria->compare('tot_hrkerja',$this->tot_hrkerja,true);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('bulan',$this->bulan,true);
		$criteria->compare('bulan1',$this->bulan1);
		$criteria->compare('per_bln',$this->per_bln,true);
		$criteria->compare('pro_bln',$this->pro_bln,true);
		$criteria->compare('tot_daftar',$this->tot_daftar,true);
		$criteria->compare('tot_buku',$this->tot_buku,true);
		$criteria->compare('tot_denda',$this->tot_denda,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('prosen',$this->prosen,true);
		$criteria->compare('pro_interval',$this->pro_interval,true);
		$criteria->compare('tot_interval',$this->tot_interval,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VPad5 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
