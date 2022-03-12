<?php

/**
 * This is the model class for table "tbl_transaksi_kulak".
 *
 * The followings are the available columns in table 'tbl_transaksi_kulak':
 * @property string $id
 * @property string $delivery_date
 * @property integer $jumlah_pembelian
 * @property integer $harga_beli
 * @property integer $harga_jual
 * @property string $distributor_obat_list_id
 * @property string $barcode
 * @property string $created_at
 * @property string $updated_at
 */
class TblTransaksiKulak extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_transaksi_kulak';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jumlah_pembelian, harga_beli, harga_jual', 'numerical', 'integerOnly'=>true),
			array('barcode', 'length', 'max'=>20),
			array('delivery_date, distributor_obat_list_id, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, delivery_date, jumlah_pembelian, harga_beli, harga_jual, distributor_obat_list_id, barcode, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'delivery_date' => 'Delivery Date',
			'jumlah_pembelian' => 'Jumlah Pembelian',
			'harga_beli' => 'Harga Beli',
			'harga_jual' => 'Harga Jual',
			'distributor_obat_list_id' => 'Distributor Obat List',
			'barcode' => 'Barcode',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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
		$criteria->compare('delivery_date',$this->delivery_date,true);
		$criteria->compare('jumlah_pembelian',$this->jumlah_pembelian);
		$criteria->compare('harga_beli',$this->harga_beli);
		$criteria->compare('harga_jual',$this->harga_jual);
		$criteria->compare('distributor_obat_list_id',$this->distributor_obat_list_id,true);
		$criteria->compare('barcode',$this->barcode,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblTransaksiKulak the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
