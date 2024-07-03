<?php
    require 'Login_function.php'; 
    require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">FurniturQyu</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="Logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">FurniturQyu</h1>
                        <div class="card mb-4">
                            <div class="col-xl-3 col-md-6"></div>
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Table Produk FurniturQyu
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Warna</th>
                                                <th>Harga</th>
                                                <th>Deskripsi</th>
                                                <th>Jumlah</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                                        <td>{$row['id_product']}</td>
                                                        <td>{$row['name']}</td>
                                                        <td>{$row['color']}</td>
                                                        <td>{$row['price']}</td>
                                                        <td>{$row['quantity']}</td>
                                                        <td><img src='images/{$row['image']}' width='50' height='50'></td>
                                                        <td>
                                                            <button class='btn btn-warning btn-sm edit-btn' data-id='{$row['id_product']}' data-toggle='modal' data-target='#editModal'>Edit</button>
                                                            <button class='btn btn-danger btn-sm delete-btn' data-id='{$row['id_product']}'>Delete</button>
                                                        </td>
                                                    </tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='7'>No products found</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Barang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; FurniturQyu</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script>

        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: 'index.php',
                type: 'post',
                data: {fetch_single_product: true, id: id},
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#edit-id').val(data.id);
                    $('#edit-name').val(data.name);
                    $('#edit-description').val(data.description);
                    $('#edit-quantity').val(data.quantity);
                    $('#edit-price').val(data.price);
                    $('#edit-color').val(data.color);
                }
            });
        });
        
                        $(document).on('click', '.delete-btn', function() {
                    if (confirm('Are you sure you want to delete this product?')) {
                        var id_product = $(this).data('id_product'); 
                        $.ajax({
                            url: 'index.php',
                            type: 'post',
                            data: {deleteproduct: true, id_product: id_product},
                            success: function(response) {
                                alert(response); 
                                location.reload(); 
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText); 
                            }
                        });
                    }
                });
            </script>

        <!-- Add Product Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Produk</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="text" name="name" placeholder="Nama Produk" class="form-control" required>
                            <br>
                            <input type="text" name="desk" placeholder="Deskripsi Produk" class="form-control" required>
                            <br>
                            <input type="number" name="quantity" class="form-control" placeholder="stok" required>
                            <br>
                            <input type="number" name="price" placeholder="harga Produk" class="form-control" required>
                            <br>
                            <input type="text" name="color" placeholder="Warna Produk" class="form-control" required>
                            <br>
                            <input type="file" name="image" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-primary" name="addnewproduct">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Product Modal -->
        <div class="modal" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Produk</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" id="edit-id" name="id">
                            <input type="text" id="edit-name" name="name" placeholder="Nama Produk" class="form-control" required>
                            <br>
                            <input type="text" id="edit-description" name="desk" placeholder="Deskripsi Produk" class="form-control" required>
                            <br>
                            <input type="number" id="edit-quantity" name="quantity" class="form-control" placeholder="stok" required>
                            <br>
                            <input type="number" id="edit-price" name="price" placeholder="harga Produk" class="form-control" required>
                            <br>
                            <input type="text" id="edit-color" name="color" placeholder="Warna Produk" class="form-control" required>
                            <br>
                            <input type="file" id="edit-image" name="image" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-primary" name="updateproduct">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
