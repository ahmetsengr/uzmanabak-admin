<?php include 'inc/functions.php';
   $all_services = array_reverse(category_get_all());
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Kategoriler - UzmanaBak Yönetim</title>
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
              <h6 class="h2 text-white d-inline-block mb-0">Kategoriler</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Kategoriler</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="kategori-ekle.php" class="btn btn-sm btn-neutral">Kategori Ekle</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Tüm Sektörler</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="kategoriler">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="budget">Kategori</th>
                    <th scope="col" class="sort" data-sort="status">Oluşturulma Tarihi</th>
                    <th scope="col">İşlem</th>
                  </tr>
                </thead>
                <tbody class="list">
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
                      <a href="kategori-duzenle.php?id='.$all_services[$i]['_id'].'" class="btn btn-sm btn-default">Düzenle</a>
                      <a href="kategori-sil.php?id='.$all_services[$i]['_id'].'" class="btn btn-sm btn-primary">Sil</a>
                    </td> </tr>';
         }
          ?>
                 
                  
                </tbody>
              </table>
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
 
 
      <!-- TABLO SİSTEMİ  TABLEYE ID VERILECEK-->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready( function () {
    $('#kategoriler').DataTable();
    } );
  </script>



</body>

</html>
