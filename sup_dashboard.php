<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight">Supplier</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3></h3>
            <p class="text-bold"> Orders </p>
          </div>
          <div class="icon">
            <i class="fa fa-cart-plus"></i>
          </div>
          <a href="main.php?dir=supp_dash&page=all_emp" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <?php
      if (isset($_SESSION['supp_id'])) {
      ?>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3></h3>
              <p class="text-bold"> Today Orders </p>
            </div>
            <div class="icon">
              <i class="fa fa-golf-ball"></i>
            </div>
            <a href="main.php?dir=supp_dash&page=today_orders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>
</div>