<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="./assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="./assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="./assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="./assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="./assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="./assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="">
    <div class="container body">
      <div class="">

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="">
                    <h2>User List</h2>
                  </div>
                  <div class="x_content">
                      <div class="row">
                         <div class="col-sm-12">
                            <div class="card-box table-responsive">
			                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
				                    <thead>
				                        <tr>
				                          <th>Name</th>
				                          <th>Profession</th>
				                          <th>Date Of Birth</th>
				                          <th>Age</th>
				                          <th>Locality</th>
				                          <th>Guests</th>
				                          <th>address</th>
				                        </tr>
				                    </thead>

				                    <tbody>
				                    	<?php if(!empty($return_date)){ 
				                    		foreach ($return_date as $key => $value) {
				                    	?>
				                        <tr>
				                          <td><?=(isset($value["name"]) && $value["name"] != "")? $value["name"]: ""; ?></td>
				                          <td><?=(isset($value["profession"]) && $value["profession"] != "")? $value["profession"]: ""; ?></td>
				                          <td><?=(isset($value["dob"]) && $value["dob"] != "")? $value["dob"]: ""; ?></td>
				                          <td><?=(isset($value["age"]) && $value["age"] != "")? $value["age"]: ""; ?></td>
				                          <td><?=(isset($value["locality"]) && $value["locality"] != "")? $value["locality"]: ""; ?></td>
				                          <td><?=(isset($value["guests"]) && $value["guests"] != "")? $value["guests"]: ""; ?></td>
				                          <td><?=(isset($value["address"]) && $value["address"] != "")? $value["address"]: ""; ?></td>
				                        </tr>
				                    	<?php } } ?>
				                    </tbody>
			                    </table>
			                </div>
                  		</div>
                     </div>
                  </div>
                </div>
              </div>

              

              

              

              

              
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Meet Up
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="./assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="./assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="./assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./assets/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="./assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="./assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="./assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="./assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="./assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="./assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="./assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="./assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="./assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="./assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="./assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="./assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="./assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="./assets/build/js/custom.min.js"></script>

  </body>
</html>