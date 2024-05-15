  <footer class="main-footer">
    <!--<div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>-->
    <strong>Copyright &copy; 2017-2018 <a href="#">Pock Mart</a>.</strong> All rights
    reserved.
  </footer>
</div>
<script>
function setOrderStage(stageId,orderId){
	if(confirm("Are you want to change order stage ?")){
		$.ajax({url: "setorderstage.php?stageId="+stageId+"&id="+orderId, success: function(result){
			$("#stageDiv"+orderId).result;
		 }});
	}else{return false;}
}
</script>
<script src="../assets/jquery/dist/jquery.min.js"></script>
<script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="../assets/dist/js/demo.js"></script>
<script src="../assets/dist/js/script.js"></script>
<script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
	$('#example2').DataTable()
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
   })
  })
 $('.timepicker').timepicker({
     showInputs: false,
	  showSeconds: true,
  	showMeridian: false
  })
</script>
<script>
$(document).ready(function() {
	$("#dobb").datepicker();
	$("#datepicker").datepicker({
    	format: 'dd-mm-yyyy',
	});
	
});
</script>
</body>
</html>