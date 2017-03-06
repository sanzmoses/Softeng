<?php
session_start();
include "../process/functions.php";
if(!isset($_SESSION['admin'])){
	header('Location: ../index.php?error=2');
}
elseif($_SESSION['admin'] != "dean") {
  header('Location: ../index.php?error=3');
}

$admin = $_SESSION['admin'];
$db = connect();

$var = "disabled";
if(isset($_GET['enable'])){
	$var = "";
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Superadmin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../icons/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SRS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                      &nbsp Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../process/logout.php">
														<i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active" id="superuser">
                				<a href="superuser.php"><i class="fa fa-fw fa-rocket"></i> Superuser</a>
        						</li>
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="students.php"><i class="fa fa-fw fa-group"></i> Students</a>
                    </li>
                    <li>
                        <a href="meetings.php"><i class="fa fa-fw fa-bar-chart-o"></i> Meetings</a>
                    </li>
                    <li>
                        <a href="sanctions.php"><i class="fa fa-fw fa-table"></i> Sanctions</a>
                    </li>
										<li>
												<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-download"></i> Downloads <i class="fa fa-fw fa-caret-down"></i></a>
												<ul id="demo" class="collapse">
													<li>
															<a href="../process/filedownload.php?file=1">
																<i class="fa fa-database"></i> &nbsp Sql File</a>
													</li>
													<li>
															<a href="../process/filedownload.php?file=2">
																<i class="fa fa-file-excel-o"></i> &nbsp CSV format</a>
													</li>
													<li>
															<a href="../process/filedownload.php?file=3">
																<i class="fa fa-file-text-o"></i> &nbsp Txt format</a>
													</li>
													<li>
															<a href="../process/filedownload.php?file=4">
																<i class="fa fa-list-alt"></i> &nbsp Sanction Record</a>
													</li>
												</ul>
										</li>
										<li>
												<a href="#"><i class="fa fa-fw fa-file-text"></i> Documentation </a>
										</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Dean
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
									<div class="col-lg-4">
											<div class="panel panel-green">
													<div class="panel-heading">
															<h3 class="panel-title"><i class="fa fa-user-circle-o"></i>&nbsp Manage Admins</h3>
													</div>
													<div class="panel-body" style="overflow-x: hidden;">
														<div class="text-center">
																<h4 style="margin-top: 0px;"><strong>Register Admin</strong>
																	<a href="" data-toggle="tooltip" data-placement="right"
																	title="Maximum of 3 admins">
																	<i class="fa fa-info-circle"
																	style="font-size: 15px; color: black;
																	margin-left: 10px;"></i></a></h4>
														</div>
														<div class="form-group">
															<form class="" action="../process/registerprocess.php" method="post">
																<label for="#user">Admin Name: </label>
																<input id="user" class="form-control" type="text" name="name" value="">
																<label for="pw">Password: </label>
																<input id="pw" class="form-control" type="password" name="pass" value="">
																<div class="text-right">
																	<button style="margin-top: 10px;"
																	type="submit" name="add-admin" class="btn btn-default">Submit New Admin</button>
																</div>
															</form>
														</div>
													</div>
											</div> <!--End Panel -->
											<div class="panel panel-red">
													<div class="panel-heading">
															<h3 class="panel-title"><i class="fa fa-refresh"></i>&nbsp System Refresh
																<a href="" data-toggle="tooltip" data-placement="right"
																title="Proceed with caution!">
																<i class="fa fa-info-circle"
																style="font-size: 15px; color: black;
																margin-left: 10px;"></i></a></h3>
													</div>
													<div class="panel-body" style="overflow-x: hidden;">
														<div class="text-center">

														</div>
														<div class="form-group">
															<form class="" action="../process/delete.php" method="post">
																<div class="text-center">
																	<label>Note: There is no recovery option.
																	<a href="superuser.php?enable">Enable</a></label>
																	<button type="submit" class="btn btn-warning" <?php echo $var; ?>
																	name="d-log" style="margin-bottom: 10px;">Delete Login Records</button>
																	<button type="submit" class="btn btn-danger" <?php echo $var; ?>
																	name="d-system">Delete System Records</button>
																</div>
															</form>
														</div>
													</div>
											</div> <!--Panel End -->
									</div><!-- end of column 4 -->

									  <div class="col-lg-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
															<div class="row">
																<div class="col-md-6">
																	<h3 style="font-size: 1.5em;" class="panel-title">
																		<i class="fa fa-list"></i>&nbsp Admins List</h3>
																</div>
																<!-- end of search -->
															</div>
															<!-- End of row -->
                            </div>
														<!-- end of panel heading -->
														<div class="row">
															<div class="col-md-12">
																<table class="table block" style="margin-bottom: 0px;">
																	<thead class="text-center">
																		<tr>
																			<th width="10%" class="indent">Id</th>
																			<th width="30%" class="text-center">User</th>
																			<th width="20%" class="text-center">Pass</th>
																			<th width="40%" class="text-center">Option</th>
																		</tr>
																	</thead>
																</table>
															</div>
														</div>
														<!-- end of row table header -->
                            <div class="panel-body" style="padding-top: 0px;">
															<div class="row"style="overflow: auto;">
																<div  id="admins-table" class="flot-chart"																>
																	<table class="table table-hover table-striped">
																		<tbody>
																			<?php foreach(getadmins() as $g): ?>
																			<tr>
																				<td class="indent"><?php echo  $g->id; ?></td>
																				<td class="text-center"><?php echo  $g->user; ?></td>
																				<td class="text-center"><?php echo  $g->pass; ?></td>
																				<td class="text-center"><a data-toggle="modal"
																					data-id="<?php echo $g->id;?>" title="Add this item"
																					class="editAdmin btn btn-primary" data-target="#edit-admin">
																				<i class="fa fa-edit"></i></a>
																				<a class="deleteAdmin btn btn-danger" data-id="<?php echo $g->id?>">
																				<i class="fa fa-trash"></i></a></td>
																			</tr>
																		<?php endforeach; ?>
																		</tbody>
																	</table>
																</div>
															</div> <!-- end of row -->
																<div class="col-md-12" style="margin-top: 10px;">
																	<a type="button" href="../process/delete.php?action=deleteadmins"
																	onclick="return confirm('Are you sure?')"
																	class="btn btn-danger" name="button" data-toggle="tooltip"
																	title="Proceed with caution!">
																	<i class="fa fa-warning"></i> &nbsp Delete All</a>
																	<a href="" data-toggle="tooltip" data-placement="right"
																	title="Warning! This will delete everything in the list">
																	<i class="fa fa-exclamation-circle"
																	style="font-size: 1.5em; color: #BB1A1A; margin-left: 10px;"></i></a>
																</div>
                            </div>
                        </div>
                    </div> <!--Column End -->
                </div>
                <!-- /.row -->

								<div class="modal fade" id="edit-admin" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content form-group">
											<form class="" action="../process/updatestudent.php" method="post">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h3 class="modal-title font2">Record</h3>
											</div>
											<div class="modal-body" id="admin-details">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default"
												data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary" name="updateadmin">Save Changes</button>
											</div>
											</form>
										</div>
									</div>
								</div>
								<!-- end of modal -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

		<!-- Custom JS -->
		<script src="../js/master.js"></script>

		<!-- Activate bootstrap tooltip -->
		<script type="text/javascript">
			$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip();
			});
		</script>

<?php
if(isset($_GET['success']) && $_GET['success'] == 1){
	echo ' <script type="text/javascript">
			$(document).ready(function(){
				alert("Update Success");
			});
	 </script>';
}
if(isset($_GET['success']) && $_GET['success'] == 2){
	echo ' <script type="text/javascript">
			$(document).ready(function(){
				alert("Successfully deleted!");
			});
	 </script>';
}
if(isset($_GET['error']) && $_GET['error'] == 1){
	echo ' <script type="text/javascript">
			$(document).ready(function(){
				alert("Delete meetings first");
			});
	 </script>';
}
if(isset($_GET['error']) && $_GET['error'] == 2){
	echo ' <script type="text/javascript">
			$(document).ready(function(){
				alert("Something went wrong!");
			});
	 </script>';
}
if(isset($_GET['error']) && $_GET['error'] == 5){
	echo ' <script type="text/javascript">
			$(document).ready(function(){
				alert("Register a student first");
			});
	 </script>';
}

 ?>

</body>

</html>