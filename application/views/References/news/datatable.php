<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/') ?>vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/') ?>vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/') ?>vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>DataTable</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">DataTable</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2023
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				
				<!-- Export Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Data Table with Export Buttons</h4>
					</div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Market</th>
									
									<th>Enterprises</th>
									<th>Open</th>
									<th>High</th>
									<th>Low</th>
									<th>Close</th>
									<th>Volume</th>
									<th>Capitalization</th>
									
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php if(isset($cotation)) foreach( $cotation->result() as $row ) // on récupère la liste des membres
								{	
							?>
								<tr>
									<td class="table-plus"><?php echo $row->marcheCote;?></td>
									<td><?php echo $row->nomEntreprise;?></td>
									<td><?php echo $row->coursOuverture;?></td>
									<td><?php echo $row->coursHaut;?> </td>
									<td><?php echo $row->coursBas;?></td>
									<td><?php echo $row->coursFermeture;?></td>
									<td><?php echo $row->volume;?></td>
									<td><?php echo $row->capitalisation;?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<?php	}
								
							?>
							</tbody>
						</table>
						
					</div>
				</div>
				<!-- Export Datatable End -->
			</div>
			
		</div>
	</div>
	<!-- js -->
	<script src="<?= base_url('assets/') ?>vendors/scripts/core.js"></script>
	<script src="<?= base_url('assets/') ?>vendors/scripts/script.min.js"></script>
	<script src="<?= base_url('assets/') ?>vendors/scripts/process.js"></script>
	<script src="<?= base_url('assets/') ?>vendors/scripts/layout-settings.js"></script>
	<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="<?= base_url('assets/') ?>src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="<?= base_url('assets/') ?>vendors/scripts/datatable-setting.js"></script>
</body>
</html>