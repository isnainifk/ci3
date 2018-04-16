 <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('./assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url('./assets/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('./assets/css/agency.min.css'); ?>" rel="stylesheet">

 <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">Contact O'Library</h3>
          </div>
        </div>
       <div class="row">
          <div class="col-lg-12">
            <?php echo form_open_multipart('artikel_novel/do_update')?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">

                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input class="form-control" type="text" name="judul_novel" placeholder="Judul Novel" value="<?php echo $judul_novel; ?>">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" name="genre" placeholder="Genre" value="<?php echo $genre; ?>">
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="thn_terbit" type="text" placeholder="Tahun Terbit" value="<?php echo $thn_terbit; ?>">
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="penulis" type="text" placeholder="Penulis" value="<?php echo $penulis; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" name="sinopsis" placeholder="Sinopsis" ><?php echo $sinopsis; ?></textarea>
                    
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="userfile" type="file" placeholder="Penulis" value="<?php echo $penulis; ?>">
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <input type="submit" class="btn btn-primary btn-xl text-uppercase" name="btnSubmit" value="Simpan"/>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url('./assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('./assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url('./assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Contact form JavaScript -->
    <script src="<?php echo base_url('./assets/js/jqBootstrapValidation.js'); ?>"></script>
    <script src="<?php echo base_url('./assets/js/contact_me.js'); ?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url('./assets/js/agency.min.js'); ?>"></script>