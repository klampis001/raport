<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Isi Nilai</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <td>Nama Peserta Didik</td>
                                <td>:</td>
                                <td><?=$siswa->row()->namasiswa?></td>
                            </tr>
                            <tr>
                                <td>Program Studi Keahlian</td>
                                <td>:</td>
                                <td><?=$kelas->row()->programstudikeahlian?></td>
                            </tr>
                            <tr>
                                <td>Bidang Studi Keahlian</td>
                                <td>:</td>
                                <td><?=$kelas->row()->bidangstudi?></td>
                            </tr>
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td>:</td>
                                <td><?=$mapel->row()->kodemapel?> - <?=$mapel->row()->namamapel?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <td>Nomor Induk Siswa</td>
                                <td>:</td>
                                <td><?=$siswa->row()->nis?></td>
                            </tr>
                            <tr>
                                <td>Kelas/Semester</td>
                                <td>:</td>
                                <td><?=$kelas->row()->namakelas?> / <?php if($kelas->row()->semester == 1){
                                        echo '1 (Satu)';
                                    }else if($kelas->row()->semester == 2){
                                        echo '2 (Dua)';
                                    }else if($kelas->row()->semester == 3){
                                        echo '3 (Tiga)';
                                    }else if($kelas->row()->semester == 4){
                                        echo '4 (Empat)';
                                    }else if($kelas->row()->semester == 5){
                                        echo '5 (Lima)';
                                    }else if($kelas->row()->semester == 6){
                                        echo '6 (Enam)';
                                    }else if($kelas->row()->semester == 7){
                                        echo '7 (Tujuh)';
                                    }else if($kelas->row()->semester == 8){
                                        echo '8 (Delapan)';
                                    } ?>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Tahun Pelajaran</td>
                                <td>:</td>
                                <td><?=$this->input->get('ta', true)?></td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td>:</td>
                                <td><?=$this->input->get('semester', true)?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr/>
                
                <?php if($cek_nilai->num_rows() != 0){?>
                    <div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Info!</strong> Anda sudah mengisi nilai ini !</div>
                <?php }else{?>
                <form action="<?=base_url()?>nilai/simpan_nilai" method="POST">
                    <?=@$this->session->flashdata('msg')?>
                    <input type="hidden" name="id_siswa" value="<?=$this->input->get('id_siswa', true)?>"/>
                    <input type="hidden" name="nis" value="<?=$siswa->row()->nis?>"/>
                    <input type="hidden" name="id_kelas" value="<?=$this->input->get('id_kelas', true)?>">
                    <input type="hidden" name="kodekelas" value="<?=$kelas->row()->kodekelas?>">
                    <input type="hidden" name="idmapel" value="<?=$this->input->get('idmapel', true)?>">
                    <input type="hidden" name="kodemapel" value="<?=$mapel->row()->kodemapel?>">
                    <input type="hidden" name="ta" value="<?=$this->input->get('ta', true)?>">
                    <input type="hidden" name="semester" value="<?=$this->input->get('semester', true)?>">
                    <div class="form-group">
                        <label>Guru:</label>
                        <select name="guru" class="form-control" required>
                            <option value="">--pilih--</option>
                            <?php foreach($guru->result() as $guru){?>
                            <option value="<?=$guru->kodeguru?>"><?=$guru->kodeguru?> - <?=$guru->namaguru?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Explicit message:</label>
                        <input type="text" name="Explicit message" class="form-control" placeholder="Jika tidak ada isi angka 0" value="<?=$this->input->post('sk7', true) ? $this->input->post('sk7', true) : '0'?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Implicit message:</label>
                        <input type="text" name="sk8" class="form-control" placeholder="Jika tidak ada isi angka 0" value="<?=$this->input->post('sk8', true) ? $this->input->post('sk8', true) : '0'?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Spelling and Vocabulary:</label>
                        <input type="text" name="sk9" class="form-control" placeholder="Jika tidak ada isi angka 0" value="<?=$this->input->post('sk9', true) ? $this->input->post('sk9', true) : '0'?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Sentence Constr:</label>
                        <input type="text" name="sk10" class="form-control" placeholder="Jika tidak ada isi angka 0" value="<?=$this->input->post('sk10', true) ? $this->input->post('sk10', true) : '0'?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Critical thinking:</label>
                        <input type="text" name="uts" class="form-control" placeholder="Jika tidak ada isi angka 0" value="<?=$this->input->post('uts', true) ? $this->input->post('uts', true) : '0'?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Creativity:</label>
                        <input type="text" name="uas" class="form-control" placeholder="Jika tidak ada isi angka 0" value="<?=$this->input->post('uas', true) ? $this->input->post('uas', true) : '0'?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi:</label>
                        <textarea name="deskripsi" class="form-control" style="resize: none" required><?=$this->input->post('deskripsi', true) ? $this->input->post('deskripsi', true) : '-'?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    
                </form>
                <?php }?>
            </div>
        </div>
    </div>
</div>