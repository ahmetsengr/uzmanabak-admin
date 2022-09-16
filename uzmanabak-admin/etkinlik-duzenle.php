<?php include 'inc/functions.php';
$id= $_GET['id'];
   $service = service_get($id);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Etkinlik Düzenle - UzmanaBak Yönetim</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
 <?php include 'sidenav.php' ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
  <?php include 'topnav.php'; ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Etkinlikler</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Etkinlikler</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        
        <div class="col">
      <?php 
      if($_GET['d'] == "ok"){
        echo '  <div class="alert alert-success" role="alert">
        <strong>Başarılı!</strong> düzenleme kaydedildi!
    </div>';
      }
      if($_GET['d'] == "hata"){
        echo '  <div class="alert alert-danger" role="alert">
        <strong>Hata!</strong> '.$_GET['m'].'!
    </div>';
      }
      ?>
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">"<?php echo $service['name']; ?>" Etkinliğini Düzenle</h3>
            </div>
            <!-- Light table -->
            <div class="card-body">
              <form action="inc/update.php" method="post">
                <h6 class="heading-small text-muted mb-4">Etkinlik Bilgileri</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Ad</label>
                        <input type="text" name="name" id="input-username" class="form-control" placeholder="Ad" value="<?php echo $service['name']; ?>">
                        <input type="hidden" name="id" value="<?php echo $service['_id']; ?>">
                        <input type="hidden" name="x" value="service">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Başlık</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Başlık" name="title" value="<?php echo $service['title']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Açıklama</label>
                    <textarea rows="4" name="about" class="form-control" placeholder="Açıklama..."><?php echo $service['about']; ?></textarea>
                  </div>
                </div>
                  </div>
                  <div class="row">
             
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Kategori</label>
                        <select multiple="" class="form-control" name="category[]" >

                          <?php 
                          $categories = category_get_all();
                          $array = array();
                          foreach ($service['category'] as $s) {
                            array_push($array, mb_strtolower($s));
                          }
                          foreach ($categories as $category) {
                            if(array_search($category['name'], $array) > -1)
                            {
                              
                              echo '<option value="'.$category['name'].'" selected>'.$category['name'].'</option>';
                            }else{
                            echo '<option value="'.$category['name'].'">'.$category['name'].'</option>';
                            }

                          }?>                    </select>

                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Sektör</label>
                            <select multiple="" class="form-control" id="sector[]">

                          <?php 
                          $sectors = sector_get_all();
                          $sectorsarray = array();
                          foreach ($service['sector'] as $s) {
                            array_push($sectorsarray, ucfirst($s));
                          }

                          foreach ($sectors as $sector) {
                            if(array_search($sector['name'], $sectorsarray) > -1)
                            {
                              echo '<option value="'.$sector['name'].'" selected>'.$sector['name'].'</option>';
                            }else{
                            echo '<option value="'.$sector['name'].'">'.$sector['name'].'</option>';
                            }

                          }?>                    </select>                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Medya</h6>
                <img src="https://ustasiyapsin-api.herokuapp.com/api/uploadImage/get-image/<?php echo $service['img']; ?>" alt="<?php echo $service['name']; ?> Görseli" height="200"></br>                
                <a href="https://ustasiyapsin-api.herokuapp.com/api/uploadImage/get-image/<?php echo $service['img']; ?>" class="btn btn-sm btn-neutral">Görüntüle</a>
                <a href="resim.php?id=<?php echo $service['img']; ?>" class="btn btn-sm btn-neutral">Değiştir</a></br>
                <center><button class="btn btn-m btn-info" type="submit">Kaydet</button></center>
                          
              </form>
            </div>
            
            <!-- Card footer -->
            <div class="card-footer py-4">
           
            
            <nav aria-label="...">
                <ul class="pagination justify-content-center mb-0">
               
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
   
      <!-- Footer -->
      <?php include 'footer.php';?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
