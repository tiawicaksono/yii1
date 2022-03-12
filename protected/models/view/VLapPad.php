<?php

/**
 * This is the model class for table "v_lap_pad".
 *
 * The followings are the available columns in table 'v_lap_pad':
 * @property string $tgl_pad
 * @property string $b_daftar
 * @property string $b_rekom
 * @property string $b_kartu_rusak
 * @property string $b_denda
 * @property string $total
 * @property integer $jum_kend
 * @property double $tahun
 * @property double $bulan
 * @property double $tanggal
 */
class VLapPad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_lap_pad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jum_kend', 'numerical', 'integerOnly' => true),
			array('tahun, bulan, tanggal', 'numerical'),
			array('b_rekom, b_kartu_rusak', 'length', 'max' => 30),
			array('tgl_pad, b_daftar, b_denda, total', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tgl_pad, b_daftar, b_rekom, b_kartu_rusak, b_denda, total, jum_kend, tahun, bulan, tanggal', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tgl_pad' => 'Tgl Pad',
			'b_daftar' => 'B Daftar',
			'b_rekom' => 'B Rekom',
			'b_kartu_rusak' => 'B Kartu Rusak',
			'b_denda' => 'B Denda',
			'total' => 'Total',
			'jum_kend' => 'Jum Kend',
			'tahun' => 'Tahun',
			'bulan' => 'Bulan',
			'tanggal' => 'Tanggal',
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

		$criteria = new CDbCriteria;

		$criteria->compare('tgl_pad', $this->tgl_pad, true);
		$criteria->compare('b_daftar', $this->b_daftar, true);
		$criteria->compare('b_rekom', $this->b_rekom, true);
		$criteria->compare('b_kartu_rusak', $this->b_kartu_rusak, true);
		$criteria->compare('b_denda', $this->b_denda, true);
		$criteria->compare('total', $this->total, true);
		$criteria->compare('jum_kend', $this->jum_kend);
		$criteria->compare('tahun', $this->tahun);
		$criteria->compare('bulan', $this->bulan);
		$criteria->compare('tanggal', $this->tanggal);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VLapPad the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
