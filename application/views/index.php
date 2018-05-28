<DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Artikel Novel</title>



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


  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Isnaini's Artikel</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">My Book</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Admin</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link js-scroll-trigger" href="#kategori">Kategori</a> -->
              <a href="<?php echo site_url('kategori/'); ?>" class="nav-link">Kategori</a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link js-scroll-trigger" href="#kategori">Kategori</a> -->
              <a href="<?php echo site_url('data/'); ?>" class="nav-link">Data Table</a>
            </li>

            <?php if(!$this->session->userdata('logged_in')) : ?>

                    <div class="btn-group" role="group" aria-label="Data baru">
                        <?php echo anchor('user/register', 'Register', array('class' => 'btn btn-outline-light')); ?>
                        <?php echo anchor('user/login', 'Login', array('class' => 'btn btn-outline-light')); ?>

                    </div>

                <?php endif; ?>

                <?php if($this->session->userdata('logged_in')) : ?>
                    <div class="btn-group" role="group" aria-label="Data baru">

                        <?php echo anchor('blog/create', 'Artikel Baru', array('class' => 'btn btn-outline-light')); ?>
                        <?php echo anchor('category/create', 'Kategori Baru', array('class' => 'btn btn-outline-light')); ?>
                        <?php echo anchor('user/logout', 'Logout', array('class' => 'btn btn-outline-light')); ?>
                    </div>
                <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <?php if($this->session->flashdata('user_registered')): ?>
              <?php echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('user_registered').'</div>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('login_failed')): ?>
              <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('login_failed').'</div>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('user_loggedin')): ?>
              <?php echo '<div class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</div>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('user_loggedout')): ?>
              <?php echo '<div class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</div>'; ?>
            <?php endif; ?>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To My Artikel!</div>
          <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#home">Scroll Me !</a>
        </div>
      </div>
    </header>

    <!-- Home -->
    <section id="home">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About This Artikel</h2>
            <h3 class="section-subheading text-muted">In O'Library you can do this :)</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-book fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Reading Me</h4>
            <p class="text-muted">You can find any book according to your needs. And read or borrow that book.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-wifi fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Wifi</h4>
            <p class="text-muted">Use wifi in there for your task or more information you need. Dont worry "HIGH SPEED" :)</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-group fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Learning</h4>
            <p class="text-muted">Provide information services for learning activities, research, and many more with your group. And remember for dont be noise!</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Book Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">My Book</h2>
            <h3 class="section-subheading text-muted">My Collection Book in O'Library</h3>
          </div>
        </div>
        
	    <div class="row">
	        <?php foreach($result as $d){ ?>
	          <div class="col-md-4 col-sm-6 portfolio-item">
	            <a href="<?php echo base_url()."artikel_novel/do_preview/".$d['id']; ?>">
	              <div class="portfolio-hover">
	                <div class="portfolio-hover-content">
	                  <i class="fa fa-plus fa-3x"></i>
	                </div>
	              </div>
	              <img class="img-fluid" src="<?php echo base_url('images/'.$d['img']); ?>" alt=""> 
	            </a>
	            <div class="portfolio-caption">
	              <h4><?php echo $d['judul_novel']; ?></h4>
	              <p class="text-muted"><?php echo $d['penulis']; ?></p>
                <small class="text-success text-uppercase"><?php echo $d['nama'];?></small>
	            </div>
	          </div>
	          <?php } ?>  
	         </div>
	    	  <center><?php 
        if (isset($links)) {
            echo $links;
        } 
        ?> </center>
	    </div>
    </section>

  
    <!-- Clients -->
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Insert</h2>
            <h3 class="section-subheading text-muted">Form Input</h3>
          </div>
        </div>
       <div class="row">
          <div class="col-lg-12"> 
          <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('artikel_novel/do_insert')?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                  	<input class="form-control" type="text" name="judul_novel" value="<?php echo set_value('judul_novel') ?>" placeholder="Judul Novel"> required>
                    <div class="invalid-feedback">Isi Kolom Judul Dahulu</div>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" name="genre" value="<?php echo set_value('genre') ?>" placeholder="Genre">
                    <div class="invalid-feedback">Isi Kolom Genre Dahulu</div>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="thn_terbit" type="text" value="<?php echo set_value('thn_terbit') ?>" placeholder="Tahun Terbit">
                    <div class="invalid-feedback">Isi Kolom Tahun Terbit Dahulu</div>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="penulis" type="text" value="<?php echo set_value('penulis') ?>" placeholder="Penulis">
                    <div class="invalid-feedback">Isi Kolom Penulis Dahulu</div>
                  </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                  <?php echo form_dropdown('id_cat', $result, set_value('id_cat'), 'class="form-control" required' ); ?> 
                </div>
                  <div class="form-group">
                    <textarea class="form-control" id="message" name="sinopsis" value="<?php echo set_value('sinopsis') ?>" placeholder="Sinopsis"></textarea>
                    <div class="invalid-feedback">Isi Kolom Sinopsis Dahulu</div> 
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="userfile" type="file" value="<?php echo set_value('penulis') ?>" placeholder="Penulis">
                    <div class="invalid-feedback">Isi Kolom Penulis Dahulu</div>
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




    
    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Perpustakaan 2017</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="https://twitter.com/IsnainiFk">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/isnainifk/">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="index.php">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          
        </div>
      </div>
    </footer>
</section>
    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Detik - Detik Ujian</h2>
                  <p class="item-intro text-muted">Detik-Detik Ujian SD, SMP, SMA</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                  <p>Terdapat kumpulan-kumpulan detik-detik SD, SMP, SMA mulai tahun 2010-saat ini. Untuk media pembelajaran siswa sekolah saat ini agar lebih mudah dalam menghadapi ujian</p>
                  <!-- <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Threads</li>
                    <li>Category: Illustration</li>
                  </ul> -->
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
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
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
  </body>

</html>
