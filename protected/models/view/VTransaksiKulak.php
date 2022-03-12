<?php

/**
 * This is the model class for table "v_transaksi_kulak".
 *
 * The followings are the available columns in table 'v_transaksi_kulak':
 * @property string $id
 * @property string $delivery_date
 * @property integer $jumlah_pembelian
 * @property integer $harga_beli
 * @property integer $harga_jual
 * @property string $barcode
 * @property integer $profit
 * @property string $nama_distributor
 * @property string $alamat
 * @property string $telp
 * @property string $hp
 * @property string $nama_obat
 * @property string $stok_obat
 */
class VTransaksiKulak extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_transaksi_kulak';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jumlah_pembelian, harga_beli, harga_jual, profit', 'numerical', 'integerOnly'=>true),
			array('barcode', 'length', 'max'=>20),
			array('nama_distributor', 'length', 'max'=>50),
			array('telp, hp', 'length', 'max'=>255),
			array('nama_obat', 'length', 'max'=>100),
			array('id, delivery_date, alamat, stok_obat', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, delivery_date, jumlah_pembelian, harga_beli, harga_jual, barcode, profit, nama_distributor, alamat, telp, hp, nama_obat, stok_obat', 'safe', 'on'=>'search'),
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
			'barcode' => 'Barcode',
			'profit' => 'Profit',
			'nama_distributor' => 'Nama Distributor',
			'alamat' => 'Alamat',
			'telp' => 'Telp',
			'hp' => 'Hp',
			'nama_obat' => 'Nama Obat',
			'stok_obat' => 'Stok Obat',
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
		$criteria->compare('barcode',$this->barcode,true);
		$criteria->compare('profit',$this->profit);
		$criteria->compare('nama_distributor',$this->nama_distributor,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('nama_obat',$this->nama_obat,true);
		$criteria->compare('stok_obat',$this->stok_obat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VTransaksiKulak the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
