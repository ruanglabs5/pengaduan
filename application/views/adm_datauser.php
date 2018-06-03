<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?>  rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css")?> >

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="background-color: #005580">
            <div class="navbar-header">

                <a class="navbar-brand" style="color: #ffffff" >SI PENGADUAN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown 
                <li class="dropdown">
                    <a style="color: #ffffff" href=<?php //echo base_url("login")?> ><i class="fa fa-fw fa-sign-out"></i>Isnaini Barochatun</a>
                </li> -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
                        <i class="fa fa-user fa-fw"></i> Isnaini barochatun</i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a data-toggle="modal" data-target="#settingModal"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li><a href="<?php echo base_url('logout_karyawan')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

            </ul>
            <!-- /.navbar-top-links -->

            <!--- user panel -->
            <section class="sidebar">
                <div class="pull-center image">
                    <img src='<?php echo base_url("img/user2.png")?>' class="img-circle" alt="User Image"  style="margin-left: 24%; margin-right: 24%; margin-top: 10%; width: 50%">
                </div>
            </section>

            <!-- MENU -->
            <div class="navbar-default sidebar" role="navigation" style="margin-top: 15%;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li class="sidebar-search" >
                            <div class="input-group custom-search-form" style="margin-left: 20%">
                                <p>Isnaini Barochatun</p>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        <!-- menu -->
                        
                        <li>
                            <a href=<?php echo base_url('admin')?> ><i class="fa fa-archive"></i>&nbsp; Log Penanganan</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/data_lokasi')?> ><i class="fa fa-home"></i>&nbsp; Data Lokasi</a>
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-users"></i>&nbsp; Data User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href=<?php echo base_url('admin/data_user')?> style="color: #000000"><b>Data user</b></a>
                                </li>
                            </ul>
                        </li>
                        <!-- menu -->
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pengguna</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <a href="#" class="btn btn-success btn-md" data-toggle="modal" data-target="#modalUpload"><span class="fa fa-upload"></span> Unggah </a>

                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID Pengguna</th>
                                        <th>Nama Pengguna</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th style="width: 40px;">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($user as $data)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $data->id_user ?></td>
                                            <td><?php echo $data->nama_pengguna ?></td>
                                            <td><?php echo $data->email ?></td>
                                            <td><?php echo $data->role ?></td>
                                            <td>
                                                <?php 
                                                    if($data->status == 1)
                                                {
                                                   echo "<span class='badge success'>aktif</span>";
                                                }
                                               else
                                                {
                                                   echo "<span class='badge danger'>tidak aktif</span>";
                                                } 
                                                ?></td>
                                                <td>
                                                    <a href="#" style="color: blue"><i class="fa fa-edit"></i></a>&nbsp;
                                                    <a href="#" style="color: red"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- modal setting -->
        <div class="modal modal-primary fade" id="settingModal" style="margin-top: 5%">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">RESET PASSWORD</h4>
              </div>

              <form method="POST" action="<?php echo base_url('#') ?>">
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password Baru :</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>

            </form>
        </div>
    </div>
</div>
<!-- modal setting -->

<!-- modal upload -->
<div class="modal modal-primary fade" id="modalUpload" style="margin-top: 5%">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">UPLOAD DATA PENGGUNA</h4>
      </div>

      
          <div class="modal-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Perhatian!</b> Jika Anda ingin mengunggah data excel, pastikan data Anda sudah sesuai dengan syarat upload di bawah:
                    </div>
                        1. Data yang dapat diunggah dalam format <b>xls, xlsx, dan csv</b>.<br>
                        2. Ukuran file maksimum 10 mb.<br>
                        3. Untuk menghindari kegagalan, Anda dapat mengunduh contoh format file di bawah:<br>
                        <a href="<?php echo base_url('admin/download') ?>" class="btn btn-sm btn-success" style="margin-top: 10px"><i class="fa fa-download"></i> Unduh</a><br><br>
                        4. Jika telah memenuhi syarat, silahkan unggah data Anda.
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <form action="<?php echo base_url()?>admin/data_user/upload" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" required>
                <input type="submit" value="unggah" class="btn btn-primary">
            </form>
        </div>
    
</div>
</div>
</div>
<!-- modal setting -->

<script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables/js/jquery.dataTables.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.js")?> ></script>
<script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>
