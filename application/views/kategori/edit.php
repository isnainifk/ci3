<section class="tm-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                        <section>
                            <h3 class="tm-gold-text tm-form-title">Edit Kategori</h3>
                            <form  method="POST" class="tm-contact-form">
                                                            
                    <?php    
                        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
                    ?>
                    <?php echo validation_errors(); ?>

                    <?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>

                    <?php echo form_open( current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?>


                    <div class="form-group">
                <input type="text" name="nama" value="<?php echo set_value('nama', $kategori->nama) ?>" class="form-control" placeholder="Judul"  />
                                    
                    </div>

                    <div class="form-group">
                <textarea type="text" name="deskripsi" value="" class="form-control" rows="6" placeholder="Deskripsi" ><?php echo set_value('deskripsi', $kategori->deskripsi) ?></textarea>                
                    </div>
                            
                                <button type="submit" name="simpan" value="simpan" class="tm-btn">Submit</button>                          
                            </form>  
                            <br>
                            <br>
                            <a href="<?php echo site_url('artikel_novel/'); ?>" class="btn btn-danger">Back</a>   
                        </section>
                    </div>
                </div>
            </div> 

        </section>