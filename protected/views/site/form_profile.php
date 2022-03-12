<div class="widget">
    <div class="header">
    	<span><span class="ico gray administrator"></span>Profile Setting</span>
    </div><!-- End header -->	
    <div class="content">

    <form id="validation_demo" action="<?php echo base_url().uri(1); ?>/updateProfile" method="post" enctype="multipart/form-data" /> 

    <!-- Third / Half column-->
    <div class="widgets">
        <div class="oneThree">
                <div class="profileSetting">
                        <div class="avartar">
                        <?php 
						if( (($data->foto)=="") and ($data->jenis_kelamin=="P") ){
						?>
                        	<img src="<?php echo base_images(); ?>avartar3.png" alt="avatar" />
                        <?php }elseif( (($data->foto)=="") and ($data->jenis_kelamin=="L") ){ ?>
                        	<img src="<?php echo base_images(); ?>avartar2.png" alt="avatar" />
                        <?php }else{ ?>
                            <img src="<?php echo base_url()?>timthumb.php?src=<?php echo base_foto().$data->foto; ?>&q=100&w=180&h=230">
                        <?php } ?>
                        </div>
                       <div class="avartar">
                       <!--<input type="file" class="fileupload" name="userfile" />-->
                       </div>
                </div>
                <hr />
        </div>

        <div class="twoOne">
                <div class="section webcam">
                <label> Take a picture<small>With  webcam</small></label>   
                <div> 
                              <div id="screen"></div>
                              <div class="buttonPane">
                                  <a id="takeButton" class="uibutton">Take Me</a> <a id="closeButton" class="uibutton special">Close</a>
                              </div>
                              <div class="buttonPane hideme">
                                  <a id="uploadAvatar" class="uibutton confirm">Upload Avartar</a> <a id="retakeButton" class="uibutton special">Retake</a> 
                  </div>
                </div>
                </div>

                <div class="section ">
                <label> NIM<small>Text custom</small></label>   
                <div> 
                <input type="hidden" name="nim" id="nim" value="<?php echo $data->nim; ?>" />
                <input type="text" class="validate[required] small" name="nim" id="nim" value="<?php echo $data->nim; ?>" disabled="disabled" />
                </div>
                </div>
                
                <div class="section ">
                <label> Full name<small>Text custom</small></label>   
                <div> 
                <input type="text" class="validate[required] medium" name="nama" id="nama" value="<?php echo $data->nama; ?>" />
                </div>
                </div>
                
                <div class="section ">
                <label> Short name<small>Text custom</small></label>   
                <div> 
                <input type="text" class="validate[required] small" name="nickname" id="nickname" value="<?php echo $data->nama_panggilan; ?>" />
                </div>
                </div>
                
                <div class="section ">
                <label> Religion<small>Text custom</small></label>   
                <div> 
                <?php
				$agama = array(
				'' => '',
				'Islam' => 'Islam',
				'Katolik' => 'Katolik',
				'Protestan' => 'Protestan',
				'Hindu' => 'Hindu',
				'Budha' => 'Budha',
				'Lain-lain' => 'Lain-lain'
				);
				echo form_dropdown('agama" id="agama"', $agama, "{$data->agama}");
				?>
                </div>
                </div>
                
                <div class="section ">
                <label> TTL<small>Text custom</small></label>   
                <div> 
                <input type="text" class="validate[required] medium" name="kota_lahir" id="kota_lahir" value="<?php echo $data->kota_lahir; ?>" />
                <input type="text" id="tgl_lahir" class="birthday  small" name="tgl_lahir" value="<?php echo $data->tgl_lahir; ?>" />
                </div>
                </div>
                
                <div class="section ">
                <label>gender<small>Text custom</small></label>   
                <div> 
                  <div>
                      <input type="radio" name="jenis_kelamin" id="radio-1" value="L" class="ck" <?php if($data->jenis_kelamin=="L") echo "checked";?> />
                      <label for="radio-1">Male</label>
                  </div>
                  <div>
                      <input type="radio" name="jenis_kelamin" id="radio-2" value="P" class="ck" <?php if($data->jenis_kelamin=="P") echo "checked";?> />
                      <label for="radio-2">Female</label>
                  </div>
                </div>
                </div>
                
                <div class="section ">
                <label>Bandung Address<small>Text custom</small></label>   
                <div> 
                  <div>
                      <textarea name="alamat_bandung" id="alamat_bandung" style="width:400px;" class="mceEditor"><?php echo $data->alamat_bandung; ?></textarea>
                  </div>
                </div>
                </div>
                
                <div class="section ">
                <label>Alamat asal<small>Text custom</small></label>   
                <div> 
                  <div>
                      <textarea name="alamat_asal" id="alamat_asal" style="width:400px;" class="mceEditor"><?php echo $data->alamat_asal; ?></textarea>
                  </div>
                </div>
                </div>
                
                <div class="section numericonly">
                <label> Contact Person <small>Text custom</small></label>   
                <div> 
                <input name="no_hp" id="no_hp" type="text" class="small" value="<?php echo $data->no_hp; ?>" />
                </div>
                </div>
                
                <div class="section ">
                <label> Email<small>Text custom</small></label>   
                <div> 
                <input type="text" class="validate[required,custom[email]] large" name="email" id="email" value="<?php echo $data->email; ?>" />
                </div>
                </div>
                
                <div class="section "><hr /></div>
                
                <div class="section ">
                <label> Pertanyaan Keamanan<small>Text custom</small></label>   
                <div> 
                <select name="pertanyaan" id="pertanyaan">
                    <option value="">--Pertanyaan Keamanan--</option>
                    <?php
                    $this->load->model('profile_m');
                    $sql = $this->profile_m->getPertanyaanKeamanan()->result();
                    $id_p = $data->id_pertanyaan_keamanan;
                    foreach($sql as $data_sql){
                    ?>
                    <option value="<?php echo $id = $data_sql->id_pertanyaan_keamanan; ?>" <?php if($id==$id_p) echo "selected";?>>
                    <?php echo $data_sql->pertanyaan_keamanan; ?>
                    </option>
                    <?php } ?>
              	</select>
                </div>
                </div>
                
                <div class="section ">
                <label> Jawaban<small>Text custom</small></label>   
                <div> 
                <input type="text" class="validate[required] large" name="jawaban_keamanan" id="jawaban_keamanan" value="<?php echo $data->jawaban_keamanan; ?>" />
                </div>
                </div>
                
               
                <div class="section last">
                <div>
                  <a class="uibutton submit_form">Update Profile</a>
                </div>
               </div>
          
        </div>

        </div><!-- End Third / Half column-->

        </form>

        <!-- clear fix -->
        <div class="clear"></div>

    </div><!-- End content -->
</div>