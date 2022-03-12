<?php

/**
 * This is the model class for table "v_stock_opname".
 *
 * The followings are the available columns in table 'v_stock_opname':
 * @property string $id
 * @property string $id_transaksi_kulak
 * @property integer $qty
 * @property string $note
 * @property string $input_date
 * @property string $nama_obat
 * @property string $nama_distributor
 */
class VStockOpname extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_stock_opname';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qty', 'numerical', 'integerOnly'=>true),
			array('nama_obat', 'length', 'max'=>100),
			array('nama_distributor', 'length', 'max'=>50),
			array('id, id_transaksi_kulak, note, input_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_transaksi_kulak, qty, note, input_date, nama_obat, nama_distributor', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'id_transaksi_kulak' => 'Id Transaksi Kulak',
			'qty' => 'Qty',
			'note' => 'Note',
			'input_date' => 'Input Date',
			'nama_obat' => 'Nama Obat',
			'nama_distributor' => 'Nama Distributor',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_transaksi_kulak',$this->id_transaksi_kulak,true);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('nama_obat',$this->nama_obat,true);
		$criteria->compare('nama_distributor',$this->nama_distributor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VStockOpname the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
