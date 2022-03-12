<?php

/**
 * This is the model class for table "v_pembayaran".
 *
 * The followings are the available columns in table 'v_pembayaran':
 * @property integer $id_rekam_medis
 * @property string $no_kuitansi
 * @property string $nik_pasien
 * @property string $nama_pasien
 * @property string $alamat_pasien
 * @property string $nama_dokter
 * @property string $nama_perawat
 * @property string $jumlah_obat
 * @property string $jumlah_harga_obat
 * @property integer $biaya_dokter
 * @property string $tanggal_rekam_medis
 */
class VPembayaran extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_pembayaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_rekam_medis, biaya_dokter', 'numerical', 'integerOnly'=>true),
			array('no_kuitansi, nik_pasien, nama_pasien, alamat_pasien, nama_dokter, nama_perawat, jumlah_obat, jumlah_harga_obat, tanggal_rekam_medis', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rekam_medis, no_kuitansi, nik_pasien, nama_pasien, alamat_pasien, nama_dokter, nama_perawat, jumlah_obat, jumlah_harga_obat, biaya_dokter, tanggal_rekam_medis', 'safe', 'on'=>'search'),
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
			'id_rekam_medis' => 'Id Rekam Medis',
			'no_kuitansi' => 'No Kuitansi',
			'nik_pasien' => 'Nik Pasien',
			'nama_pasien' => 'Nama Pasien',
			'alamat_pasien' => 'Alamat Pasien',
			'nama_dokter' => 'Nama Dokter',
			'nama_perawat' => 'Nama Perawat',
			'jumlah_obat' => 'Jumlah Obat',
			'jumlah_harga_obat' => 'Jumlah Harga Obat',
			'biaya_dokter' => 'Biaya Dokter',
			'tanggal_rekam_medis' => 'Tanggal Rekam Medis',
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

		$criteria->compare('id_rekam_medis',$this->id_rekam_medis);
		$criteria->compare('no_kuitansi',$this->no_kuitansi,true);
		$criteria->compare('nik_pasien',$this->nik_pasien,true);
		$criteria->compare('nama_pasien',$this->nama_pasien,true);
		$criteria->compare('alamat_pasien',$this->alamat_pasien,true);
		$criteria->compare('nama_dokter',$this->nama_dokter,true);
		$criteria->compare('nama_perawat',$this->nama_perawat,true);
		$criteria->compare('jumlah_obat',$this->jumlah_obat,true);
		$criteria->compare('jumlah_harga_obat',$this->jumlah_harga_obat,true);
		$criteria->compare('biaya_dokter',$this->biaya_dokter);
		$criteria->compare('tanggal_rekam_medis',$this->tanggal_rekam_medis,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VPembayaran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
