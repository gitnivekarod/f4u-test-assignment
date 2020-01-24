<?php

session_start();
require('include/config.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://nightly.datatables.net/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/datatables.min.css"/>
 



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/datatables.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- <script type="text/javascript" src="include/js/global.js"></script> -->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo 'PROJECT XXX'?></title>
</head>
<style>

	/* For Circle Buttons */
	.btn-circle {
	width: 45px;
	height: 45px;
	line-height: 45px;
	text-align: center;
	padding: 0;
	border-radius: 50%;
	}

	.btn-circle i {
	position: relative;
	top: -1px;
	}

	.btn-circle-sm {
	width: 35px;
	height: 35px;
	line-height: 35px;
	font-size: 0.9rem;
	}

	.btn-circle-lg {
	width: 55px;
	height: 55px;
	line-height: 55px;
	font-size: 1.1rem;
	}

	.btn-circle-xl {
	width: 70px;
	height: 70px;
	line-height: 70px;
	font-size: 1.3rem;
	}

	.label {
		display: inline;
		padding: .2em .6em .3em;
		font-size: 100%;
		font-weight: 700;
		line-height: 1;
		color: #fff;
		text-align: center;
		white-space: nowrap;
		vertical-align: baseline;
		border-radius: .25em;
	}
	
	table>tbody {
		    font-family: monospace !important;
	}

	th.thcolblue {
		background: #99b3ff !important;
		color: #000000 !important;
	}

	th.thcolyellow {
		background: #ffdd99 !important;
		color: #000000 !important;
	}

	th.thcolgreen {
		background: #77b300 !important;
		color: #000000 !important;
	}
	
	th.thcolorange {
		background: #ff9933 !important;
		color: #000000 !important;
	}

	.row_buttons {
		height: 25px;
		width: 25px;
		padding: 0px 0px 2px 0px;
		border-radius: 15px;
		border: 1px solid darkcyan;
	}

	.dataTables_length {
		width: 150px !important;
	}

	.form-control1 {
		display: inline; 
		width: 100%;
		height: 34px;
		padding: 5px 12px;
		font-size: 14px;
		line-height: 1.42857143;
		color: #555;
		background-color: #fff;
		background-image: none;
		border: 1px solid #ccc;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
		-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	}

	.btn-info {
		color: #fff !important;
		background-color: #5bc0de !important;
		border-color: #46b8da !important;
		background: #5bc0de !important;
	}

	h2.page-header {
		background: none repeat scroll 0 0 #C0DDF1;
		border: 1px solid #AED0EA;
		padding: 15px 10px;
		color: #000000;
		border-radius: 8px;
	}

	.label-warning, .label-success, .label-danger {
		font-size: 100% !important;
	}

	#tbl_admin_wrapper {
		width: 95% !important;
		margin-left: 2.5% !important;
	}

	#tbl_admin td {
		    font-family: monospace !important;
	}

	#tbl_consol_1_wrapper,#tbl_consol_2_wrapper {
		width: 130% !important;
	}

	#lfpane,#lfpane2 {
    max-width: 30% !important;
	}

	#rfpane,#rfpane2 {
    max-width: 70% !important;
	}

	.toggle-handle {
		width: 153px;
		background-color: #cccccc;
	}

	.btn-primary:hover {
		/* color: #cccccc; */
		/* background-color: #cccccc; */
		/* border-color: #0062cc; */
	}

	.toggle-on {
		width: 35% !important;
	}

	.toggle-off {
		left: 65% !important;
		width: 35% !important;
	}

	.toggle-on.btn {
		background-color: #5bc0de;
		color: aliceblue !important;
	}

	.toggle-off.btn {
		background-color: #f0ad4e;
		color: aliceblue !important;
	}


	

	.toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
  	.toggle.ios .toggle-handle { border-radius: 20px; }

	#globalform select.select {
		display: inline-block;
		width: 200px;
		height: 30px;
		padding: .375rem 1.75rem .375rem .75rem;
		line-height: 1.5;
		color: #495057;
		vertical-align: middle;
		background-size: 8px 10px;
		border: 1px solid #ced4da;
		border-radius: .25rem;
		-moz-appearance: none;
		appearance: none;
	}	

	h3.header-subtitle {
		margin-top: 30px !important;
	}

	.btn-outline-success:hover {
		color: #fff !important;
		background-color: #28a745 !important;
		border-color: #28a745 !important;
	}

	.btn-outline-success {
		color: #28a745 !important;
		background-color: transparent !important;
		background-image: none !important;
		border-color: #28a745 !important;
	}
	body {
		font-size:12px;
	}
		
	#globalform input.text {
		max-width: 200px;
		border: 1px solid #c0c0c0;
		margin: 2px 0;
		padding: 5px 5px 5px 5px;
		height: 100%;
		width:200px;
		background: #fff;
		float: left;
	}

	.text_label{
		width:150px;
	}

	th,td{
		text-align:center;
	}

	#globalform label {
		margin: 0;
		width:150px;
		display: block;
		padding: 10px 0;
		color: #666;
		text-transform: capitalize;
		float: left;
	}

	#form-orderDetails {
		border-radius: 10px;
		border: none;
		width:100%;
		height: 100%
	}
	table.dataTable {
	border-collapse: collapse;
	width: 100%;
	}

	th {
		width:100% important;
	}

	#globalform li {
		padding-bottom: 15px !important;
	}	

</style>
<body>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<h4><a href="#"><i class="menu-icon mdi mdi-domain"></i> Client Admin</a>
				<h4>
		</li>
	</ol>
</nav>
<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">  
                <div class="col-lg-1">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Client List</a>
                        <!-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Test</a> -->
                    </div>
                </div>
				<div class="col-lg-6">
					<table id="example" class="display" style="width:100%">
						<thead>
							<tr>
								<th>Action</th>
								<th>First Name</th>
								<th>Last name</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Action</th>
								<th>First Name</th>
								<th>Last name</th>
							</tr>
						</tfoot>
					</table>
				</div>
            </div> 
            
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            </div>
            <div class="row">                
            </div>
        </div>
    </div>
</div>

<div class="modal fade clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModal" aria-hidden="true" id="clientModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Client Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                </div>
                <div class="modal-body">
					<div class="row">
						<div class="col-lg-12" style="margin-top: 5px;">
							<div class="card">
								<h5 class="card-header"><i class="mdi mdi-clipboard-text"></i>Shipping Address</h5>
								<div class="card-body">
									<div class="row">
										<div class="col-lg-9">
											<div class="row" id="div_id" style="display:none" class="margin-top:5px">
												<div class="col-lg-4">
													<span style="font-weight: bold; Font-size:16px;float:left">Client ID</span>
												</div>
												<div class="col-lg-8">
													<input type="text"  class="text nvarchar required form-control" id="txt_id" name="txt_id" readonly/>
												</div>
											</div>
											<br>
											<div class="row" class="margin-top:5px">
												<div class="col-lg-4">
													<span style="font-weight: bold; Font-size:16px;float:left">Street</span>
												</div>
												<div class="col-lg-8">
													<input type="text"  class="text nvarchar required form-control" id="txt_street" name="txt_street"/>
												</div>
											</div>
											<br>
											<div class="row" class="margin-top:5px">
												<div class="col-lg-4">
													<span style="font-weight: bold; Font-size:16px;float:left">City</span>
												</div>
												<div class="col-lg-8">
													<input type="text"  class="text nvarchar required form-control" id="txt_city" name="txt_city"/>
												</div>
											</div>
											<br>
											<div class="row" class="margin-top:5px">
												<div class="col-lg-4">
													<span style="font-weight: bold; Font-size:16px;float:left">Zip Code</span>
												</div>
												<div class="col-lg-8">
													<input type="text"  class="text nvarchar required form-control" id="txt_zip" name="txt_zip"/>
												</div>
											</div>
											<br>
											<div class="row" class="margin-top:5px">
												<div class="col-lg-4">
													<span style="font-weight: bold; Font-size:16px;float:left">Country</span>
												</div>
												<div class="col-lg-8">
													<input type="text"  class="text nvarchar required form-control" id="txt_country" name="txt_country"/>
												</div>
											</div>
											
										</div>
										<div class="col-lg-3">
											<button type="button" class="btn btn-outline-primary" id="btn_save">Save</button>
											<button type="button" class="btn btn-outline-warning" id="btn_update" style="display:none">Update</button>
										<div>
										
									</div>
								</div>
							</div>							
						</div>					
					</div>
					<br>
					<div class="row">
						<div class="col-lg-12">
							<table id="address_tbl" class="display" style="width:100%">
								<thead>
									<tr>
										<th>Action</th>
										<th>Street</th>
										<th>City</th>
										<th>Zip Code</th>
										<th>Country</th>
										<th>Status</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Action</th>
										<th>Street</th>
										<th>City</th>
										<th>Zip Code</th>
										<th>Country</th>
										<th>Status</th>
									</tr>
								</tfoot>
							</table>
						</div>						
					</div>
                </div>



            </div>
        </div>
    </div>
</div>


</body>

<script type="text/javascript">
var address_tbl;
var client_id;
$(function() {

	$('#example').DataTable( {
		"ajax": "data/clientdetails.txt",
		"columns": [
			{ "data": "id" },
			{ "data": "firstname" },
			{ "data": "lastname" },
		],
		aoColumnDefs: [
		{
			aTargets: [0],
			render: function(data,type,row,meta) 
			{
				return '<button class="btn btn-success btn-circle btn-circle-sm m-1" onclick="check_info(`'+row['id']+'`,`'+row['firstname']+'`,`'+row['lastname']+'`);"><i class="mdi mdi-information" style="margin-right: 0rem;" title="Click to check Client Info"></i></button>';						
			}
		},	
	],
	} );

	check_info = function(_id,_fname,_lname)
	{

		client_id = _id;
		$('#txt_id').val(_id);
		$('#clientModal :input').clearForm();
		$('#clientModal .modal-title').html('Client Information: <b>'+_fname+' '+_lname+'</b>');
		$('#clientModal').modal('show');
		$('#clientModal').on('shown.bs.modal', function () {
			$('#clientModal #txt_dn2').focus().select();
		}); 
		$('#address_tbl').DataTable().ajax.reload();
		// address_tbl.ajax.reload();
	}

	/* CLEAR FORM */
	$.fn.clearForm = function() {
		return this.each(function() {
			var type = this.type, tag = this.tagName.toLowerCase();
			if (tag == 'form')
			return $(':input',this).clearForm();
			if(!$(this).hasClass('retain')){
				if (type == 'text' || type == 'password' || tag == 'textarea')
					this.value = '';
				else if (type == 'checkbox' || type == 'radio')
				this.checked = false;
				else if (tag == 'select')
				this.selectedIndex = 0;
			}
		});
	};

	$('#address_tbl').DataTable( {
		"bProcessing": false,
        "bServerSide": false,
        "searching": true,
        "pageLength": 5,
        "autoWidth": false,
        "bAutoWidth": false, // Disable the auto width calculation
        "sort": "position",
        "stateSave": true,
        "ordering": false,
        "deferLoading": false,
		sAjaxSource: 'include/global_class.php',
		fnServerData: function ( sSource, aoData, fnCallback ) {
			aoData.push( { "name": "client_id", "value": client_id } );
			aoData.push( { "name": "fn", "value": 'get_client_data' } );
			$.ajax( {
				dataType: "json",
				type: "POST",
				url: sSource,
				data: aoData,
				success: fnCallback,
				error: function(request){
					if(request.status == 500 && request.statusText == 'Internal Server Error'){					
							msgbox('Error Message','<p class="error">Could not load page.<br>Please contact support.</p>');				
					}
				}

			});
			
		},
		"columns": [
			{ "data": "id" },
			{ "data": "street" },
			{ "data": "city" },
			{ "data": "zip" },
			{ "data": "country" },
			{ "data": "status" },
		],
		aoColumnDefs: [
			{
				aTargets: [0],
				render: function(data,type,row,meta) 
				{
					var html = "";
					if(row['status'] == 0)
					{
						html +='<button class="btn btn-danger btn-circle btn-circle-sm m-1" onclick="delete_add(`'+row['id']+'`);"><i class="mdi mdi-delete" style="margin-right: 0rem;" title="Delete"></i></button>'; 
						html +='<button class="btn btn-danger btn-circle btn-circle-sm m-1" onclick="tag_add(`'+row['id']+'`);"><i class="mdi mdi-tag" style="margin-right: 0rem;" title="Tag as default address"></i></button>';
					}
					html +='<button class="btn btn-success btn-circle btn-circle-sm m-1" onclick="edit_info(`'+row['id']+'`,`'+row['street']+'`,`'+row['city']+'`,`'+row['zip']+'`,`'+row['country']+'`);"><i class="mdi mdi-tooltip-edit" style="margin-right: 0rem;" title="Click to edit Client Info"></i></button>'; 
					return html;
					// return '<button class="btn btn-success btn-circle btn-circle-sm m-1" onclick="check_info(`'+row['id']+'`,`'+row['firstname']+'`,`'+row['lastname']+'`);"><i class="mdi mdi-information" style="margin-right: 0rem;" title="Click to check Client Info"></i></button>';						
				}
			},
			{
				aTargets: [5],
				render: function(data,type,row,meta) 
				{
					
					if(row['status'] == 1)
					{
						return '<span class="badge badge-pill badge-primary">Default Address</span>';
					}
					else
					{
						return '<span class="badge badge-pill badge-info">Normal Address</span>';
					}
							
				}
			},		
		],
	} );

	tag_add = function(_id)
	{
		var address_id = _id;
		var _client_id =  client_id;

		ProcessRequest('include/global_class.php',{fn:'tag_add',id:address_id,clientid:_client_id},function(res){
			var obj = jQuery.parseJSON(res);
			if(obj.status)
			{
				alert('Tagged address as default');
				$('#address_tbl').DataTable().ajax.reload();
			}
			else
			{
				alert('Error encountered');
				$('#address_tbl').DataTable().ajax.reload();
			}
		});

	}
	
	delete_add = function(_id)
	{
		ProcessRequest('include/global_class.php',{fn:'delete_add',id:_id},function(res){
			var obj = jQuery.parseJSON(res);
			if(obj.status)
			{
				alert('Deleted Successfully');
				$('#address_tbl').DataTable().ajax.reload();
			}
			else
			{
				alert('Error encountered');
				$('#address_tbl').DataTable().ajax.reload();
			}
		});
	}


	edit_info = function(_id,_street,_city,_zip,_country)
	{

		$('#clientModal #div_id').show();
		$('#clientModal #txt_id').val(_id);
		$('#clientModal #btn_save').hide();
		$('#clientModal #btn_update').show();
		$('#clientModal #txt_street').val(_street);
		$('#clientModal #txt_city').val(_city);
		$('#clientModal #txt_zip').val(_zip);
		$('#clientModal #txt_country').val(_country);
	}	

	$('#btn_save').click(function(){

		var _client 	= client_id;
		var _street 	= $('#clientModal #txt_street').val();
		var _city 		= $('#clientModal #txt_city').val();
		var _zip 		= $('#clientModal #txt_zip').val();
		var _country 	= $('#clientModal #txt_country').val();

		if(_street == '')
		{
			alert('Empty Street not allowed');
			$('#txt_street').focus();
			return false;
		}

		if(_city == '')
		{
			alert('Empty City not allowed');
			$('#txt_city').focus();
			return false;
		}

		if(_zip == '')
		{
			alert('Empty Zip Code not allowed');
			$('#txt_zip').focus();
			return false;
		}

		if(_country == '')
		{
			alert('Empty Country not allowed');
			$('#txt_country').focus();
			return false;
		}

		ProcessRequest('include/global_class.php',{fn:'add_data',id:_client,street:_street,city:_city,zip:_zip,country:_country,},function(res){
			var obj = jQuery.parseJSON(res);
			if(obj.status)
			{
				alert(obj.msg);
				$('#address_tbl').DataTable().ajax.reload();
			}
			else
			{
				alert(obj.msg);
				$('#address_tbl').DataTable().ajax.reload();
			}
		});

	});	

	$('#btn_update').click(function(){

		var _id 		= $('#clientModal #txt_id').val();
		var _street 	= $('#clientModal #txt_street').val();
		var _city 		= $('#clientModal #txt_city').val();
		var _zip 		= $('#clientModal #txt_zip').val();
		var _country 	= $('#clientModal #txt_country').val();

		ProcessRequest('include/global_class.php',{fn:'update_data',id:_id,street:_street,city:_city,zip:_zip,country:_country,},function(res){
			var obj = jQuery.parseJSON(res);
			if(obj.status)
			{
				alert('Update successful');
				$('#address_tbl').DataTable().ajax.reload();

				$('#clientModal #btn_save').show();
				$('#clientModal #btn_update').hide();
				$('#clientModal #txt_street').val('');
				$('#clientModal #txt_city').val('');
				$('#clientModal #txt_zip').val('');
				$('#clientModal #txt_country').val('');
				$('#clientModal #div_id').hide();
				$('#clientModal #txt_id').val('');
			}
		});

	});		




	ProcessRequest = function(postURL,postData,postProcess,_loadermsg)
	{

		if(_loadermsg == undefined)
		{
			_loadermsg = "Loading...";
		}

			$.ajax({
				type: 'POST',
				url: postURL,
				data: postData,
				success: function(data){
					if (typeof postProcess == 'function') {
						postProcess(data);
					}else{
						var theFunction = eval('(' + postProcess + ')');
						theFunction(data);
					}				
				},
				beforeSend: function(){
					if(!postData.dashboard)
						$.dimScreen(300, 0.3, function(){}, _loadermsg);
				},
				complete: function(){
					if($.active >= 1)
						$.dimScreenStop();
				},
				error: function(request){
					$.dimScreenStop();
					//showErrorMessage(request.status);
					if(request.status == 500 && request.statusText == 'Internal Server Error'){					
							msgbox('Error Message','<p class="error">Could not load page.<br>Please contact support.</p>');				
					}
				}
			});
	}

} );	


jQuery.extend({
    //dims the screen
    dimScreen: function(speed, opacity, callback, _msg) {
        
        if(jQuery('#__dimScreen').length > 0) return;

        if(_msg == undefined)
        {
            _msg = "Loading...";
        }

        
        if(typeof speed == 'function') {
            callback = speed;
            speed = null;
        }

        if(typeof opacity == 'function') {
            callback = opacity;
            opacity = null;
        }

        if(speed < 1) {
            var placeholder = opacity;
            opacity = speed;
            speed = placeholder;
        }
        
        if(opacity >= 1) {
            var placeholder = speed;
            speed = opacity;
            opacity = placeholder;
        }

        speed = (speed > 0) ? speed : 500;
        opacity = (opacity > 0) ? opacity : 0.5;
		
		var xloader = $(window).width() / 2;
		var yloader = $(window).height() / 2;
		
        return jQuery('<div style="color:#FFF; font-size:12px;"><div class="dimloading" style="margin-left:'+ ( xloader - 40 ) +'px; margin-top:'+ (yloader - 40 ) +'px;" ><br><span style="margin-left:3px;"><i class="mdi mdi-48px mdi-spin mdi-loading text-primary"></i> '+_msg+' </span></div></div>').attr({
                id: '__dimScreen'
                ,fade_opacity: opacity
                ,speed: speed
            }).css({
            background: '#000'
            ,height: $(window).height() 
            ,left: '0px'
            ,opacity: 0
            ,position: 'fixed'
            ,top: '0px'
            ,width: $(window).width()
            ,zIndex: 999999999999
        }).appendTo(document.body).fadeTo(speed, opacity, callback);
    },
    
    //stops current dimming of the screen
    dimScreenStop: function(callback) {
        var x = jQuery('#__dimScreen');
        var opacity = x.attr('fade_opacity');
        var speed = x.attr('speed');
        x.fadeOut(speed, function() {
            x.remove();
            if(typeof callback == 'function') callback();
        });
    }
	
});
</script>

