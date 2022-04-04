<?php
defined('_MEXEC') or die ('Restricted Access');
$app = core::getApplication();
?>
<div id="com-wrapper" class="" style="padding:0 20px;">
<link rel="stylesheet" href="media/system/DataTables/datatables.min.css"><div class="com-head">
<!-- DataTables -->
<script src="media/system/DataTables/datatables.min.js"></script>
	<h3>Sales</h3>
	<div class="btn-group">
		<ul class="form-buttons">
			<li>
				<span><button type="reset" id="Cancel" class="btn btn-danger btn-flat btn-sm" value="Cancel" onclick="history.back();self.close();" tabindex="-1"><i class="fa fa-close"></i> Cancel</button></span>
				<span><a onclick="window.open('?com=sales&view=pos&tmpl=bill','_blank', 'top=10, left= 100, scrollbars=no, titlebar=no, location=top, resizable=no, width=1124,height=560');return false;" class="btn btn-info btn-flat btn-sm" tabindex="-1"><i class="fa fa-cart-plus"></i> New</a></span>
			</li>
			<li></li>
		</ul>
	</div>
</div>
	<link rel="stylesheet" type="text/css" href="templates/default/bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css" media="all" />
<div class="table-responsive">
	<div id="search-date-range">
		<form method="get" action="?" >
			<input type="hidden" name="com" value="sales" />
			<input type="hidden" name="view" value="sales" />

			
			<div class="form-row form-group date-range">
				<div class="col-sm-4">
					<div class="form-group date">
						<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
						</span>
						<input name="start_date" type="date" id="start_date"class="form-control frm_input" value="<?php if(isset($_GET['start_date'])){ echo $_GET['start_date'];}?>" tabindex="-1" />
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group date">
						<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
						</span>
						<input name="end_date" type="date" id="end_date"class="form-control frm_input" value="<?php if(isset($_GET['end_date'])){ echo $_GET['end_date'];}?>" tabindex="-1" />
					</div>
				</div>
				<div class="col-sm-3">
				<input type="submit" name="search_date" class="btn btn-success btn-sm screen" value="Search" />
				</div>
			</div>
			<div class="clear"></div>
		</form>
	</div>
	<table id="data-table" class="table table-bordered table-hover">
		<thead>
		<tr>
			<th>Invoice#</th><th>Date</th><th>Total</th><th class="no-print">Actions</th>
		</tr>
		</thead>
		<tbody id="tblContentBody"><script>
	var json_data = <?php
		echo json_encode($this->rows); ?>;
	//console.log(json_data);
	var subTotal=0;
	var discount_amount=0;
	var total=0;
	var change_return=0;
	$.each(json_data, function(i, v) {
		document.write('<tr>');
		document.write('<td class="sale_date">'+v.id+ '</td>');
		document.write('<td class="sale_date">'+v.sale_date+ '</td>');
		document.write('<td class="sale_date">'+v.status_name+ '</td>');
		var cust = '';
		if(v.cust_title){
			cust = v.cust_title;
		}
		total = eval(v.sub_total);
		subTotal += total;
		document.write('<td class="total">'+total.toFixed(2)+'</td>');
		
		document.write('<td class="no-print">');
		document.write('<a href="?com=sales&view=sale&task=edit&id='+v.id+'" title="Edit"><i class="fa fa-edit"></i></a>');
		document.write('&nbsp;&nbsp; | &nbsp;&nbsp;<a onClick="cancelOrder(' + v.id + ');return false;" href="?com=sales&view=pos&id='+v.id+'" title="Cancel"><i class="fa fa-trash"></i></a>');
		document.write('</td>');
		document.write('</tr>');
	});
		</script></tbody>
		<tfoot>
			<tr>
				<th colspan="3" style="text-align:right">Total:</th>
				<th colspan="1"><script>document.write(subTotal.toFixed(2));</script></th>
				<th colspan="1"></th>
			</tr>
		</tfoot>
	</table>
</div>
<div class="chart">
<?php //require_once "bar-chart.php"; ?>
</div>
<script>
//Date picker
//$('.date').datepicker({autoclose: true});
$(document).ready(function(){

})

function cancelOrder(id){
	var r = confirm("<?php echo Localize::_('confirm_cancel');?>");
	if (!r) {
		return false;
	}
	$.post("index.php?com=sales&view=sales&task=json",
	{
	id: id,
	action: "cancel"
	},
	function(data, status){
		console.log(data);
		if(data.error){alert('Error!!!');}
		if(data.data){
			$('#messages div').html('<div class="alert alert-info">' + data.data.message + '</div>');
			location.reload();
		}
	//alert("Data: " + data + "\nStatus: " + status);
	});
}

</script>
</div>