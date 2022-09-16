<?php include 'inc/functions.php';
   $all_users = user_get_all();
   $all_demand = demand_get_all();
   $all_sector = sector_get_all();
   $bussines_users = bussines_get_all();
       $bussines_users = array_reverse($bussines_users);
       $services_all = service_get_all();
       $services_all = array_reverse($services_all);
       $all_services = array_reverse(bussines_get_all());
       $all_servicess = array_reverse(service_get_all());
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>UzmanaBak Yönetim</title>
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
    <?php include 'topnav.php' ?>

    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Yönetim Paneli</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Yönetim Paneli</li>
                </ol>
              </nav>
            </div>
         
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Toplam üye</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo count($all_users);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><?php echo count($bussines_users);?></span>
                    <span class="text-nowrap">Kurumsal Üye</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Toplam Etkinlik</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo count($services_all);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Toplam Talep</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo count($all_demand);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sektör</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo count($all_sector);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Son Kurumsal Üyeler</h3>
                </div>
                <div class="col text-right">
                  <a href="./kurumsaluyeler.php" class="btn btn-sm btn-primary">Tümünü Gör</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Firma</th>
                    <th scope="col">Tarih</th>
                    <th scope="col">Kayıt Tarihi</th>
                  </tr>
                </thead>
              
                <tbody>
                <?php 


         for ($i=0; $i < count( $all_services ); $i++) { 
           echo '<tr>
           <th scope="row">
                      <div class="media align-items-center">
                      <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="'.$all_services[$i]['name'].'" src="https://ustasiyapsin-api.herokuapp.com/api/uploadImage/get-image/'.$all_services[$i]['img'].'">
                      </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">'.$all_services[$i]['name'].'</span>
                          </div>
                        </div>
                      </th>
                      <td>'.mb_substr($all_services[$i]['createdAt'],0,10).'</td>
                      <td class="text-right">
               
                    </td> </tr>';
         }
          ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Son Etkinlikler</h3>
                </div>
                <div class="col text-right">
                  <a href="./etkinlikler.php" class="btn btn-sm btn-primary">Tümünü Gör</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Firma</th>
                    <th scope="col">Oluşturulma Tarihi</th>
                  </tr>
                </thead>
                <tbody>
                <?php 

     
         
         for ($i=0; $i < count( $all_servicess ); $i++) { 
           echo '<tr>
           <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="'.$all_servicess[$i]['name'].'" src="https://ustasiyapsin-api.herokuapp.com/api/uploadImage/get-image/'.$all_servicess[$i]['img'].'">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">'.$all_servicess[$i]['name'].'</span>
                          </div>
                        </div>
                      </th>
                      <td>'.implode(', ', $all_servicess[$i]['category']).'</td>
                      <td class="text-right">
                      <a href="etkinlik-duzenle.php?id='.$all_servicess[$i]['_id'].'" class="btn btn-sm btn-default">Düzenle</a>
                      <a href="etkinlik-sil.php?id='.$all_servicess[$i]['_id'].'" class="btn btn-sm btn-primary">Sil</a>
                    </td> </tr>';
         }
          ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php include 'footer.php' ?>

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
