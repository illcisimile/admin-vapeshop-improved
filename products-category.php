<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<?php include 'includes/header.html' ?>
<!-- Header -->

<body>
  <div id="app">
    <!-- Sidebar -->
    <div id="sidebar" class="active">
      <div class="sidebar-wrapper active">
        <div class="sidebar-header">
          <div class="d-flex justify-content-between">
            <div class="logo">
              <a href="index.php"><img src="assets/images/logo/logo.png" alt="Logo" srcset="" /></a>
            </div>
            <div class="toggler">
              <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
          </div>
        </div>
        <div class="sidebar-menu">
          <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item">
              <a href="index.php" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
              </a>
            </li>

            <li class="sidebar-title">Modules</li>

            <li class="sidebar-item active has-sub">
              <a href="#" class="sidebar-link">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Products</span>
              </a>
              <ul class="submenu active">
                <li class="submenu-item">
                  <a href="index.php">List of Products</a>
                </li>
                <li class="submenu-item">
                  <a href="products-archive.php">Products Archive</a>
                </li>
                <li class="submenu-item active">
                  <a href="products-category.php">Products Category</a>
                </li>
              </ul>
            </li>

            <li class="sidebar-item has-sub">
              <a href="#" class="sidebar-link">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Stocks</span>
              </a>
              <ul class="submenu">
                <li class="submenu-item">
                  <a href="add-new-stock.php">Add New Stock</a>
                </li>
                <li class="submenu-item">
                  <a href="stocks.php">Manage Stocks</a>
                </li>
                <li class="submenu-item">
                  <a href="critical-stocks.php">Critical Stocks</a>
                </li>
              </ul>
            </li>

            <li class="sidebar-item has-sub">
              <a href="#" class="sidebar-link">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Supplier</span>
              </a>
              <ul class="submenu">
                <li class="submenu-item">
                  <a href="suppliers.php">List of Suppliers</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
      </div>
    </div>
    <!-- Sidebar -->
    <div id="main" class="layout-navbar">
      <!-- Navbar -->
      <?php include 'includes/navbar.html' ?>
      <!-- Navbar -->

      <!-- Main content -->
      <div id="main-content">
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Products Category</h3>
                <p class="text-subtitle text-muted">Dummy content here!</p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products Category</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          <section class="section">
            <div class="card">
              <div class="card-body">
                <!-- Add category modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add new category</button>
                <hr />
                <table class="table table-hover" id="productsCategoryDataTable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Category name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- Main content -->
    </div>
  </div>

  <?php include 'includes/scripts.html' ?>

  <!-- CRUD operations for Products Category -->
  <script src="crud-products-category/products-category.js"></script>
  <?php include 'crud-products-category/products-category-modal.php' ?>
</body>

</html>