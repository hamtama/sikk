<?php
require_once ('../../layout/wrapperkonselor/head.php');
require_once ('../../layout/wrapperkonselor/sidebar.php');
require_once ('../../layout/wrapperkonselor/header.php');
require_once ('../../layout/wrapperkonselor/content.php');
?>
<div class="">
	
	<div class="clearfix"></div>
	<div class="row">
		<?php
		require_once ('data_jkasus.php');
		require_once ('data_kdrt.php');
		require_once ('data_kekerasan.php');
		
		?>
		<div class="modal fade bs-example-modal-lg"  id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" >Edit Data Informasi Kasus</h4>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="fetched-data">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade bs-example-modal-lg"  id="tambahdata" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="judul_data"></h4>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="fetched-data">
						
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>




	</div>
</div>
<script src="../../assets/vendors/validator/multifield.js"></script>
<script src="../../assets/vendors/validator/validator.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$('.tambah_data').click( function (){

		var id = $(this).attr('id');
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : 'tambah_inf_kasus.php',
			data: {	id:id},
			success : function(data){
				$('.fetched-data').html(data);//menampilkan data ke dalam modal
				$('#tambahdata').modal('show');
				document.getElementById("judul_data").innerHTML = document.getElementById("judul").value;
			}
		});
	});
});



$(document).ready(function(){
	$('.edit_jkasus').click( function (){
		$('#myModal').modal('show');
		var rowid = $(this).data('id');
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : 'edit_jkasus.php',
			data: {rowid: rowid},
			success : function(response){
				$('.fetched-data').html(response);//menampilkan data ke dalam modal
				//display Modal
			}
		});
	});
	$('#myModal').on('hidden.bs.modal', function(e){
	window.location.reload();
});
	
});
$(document).ready(function(){
	$('.edit_jkekerasan').click( function (){
		$('#myModal').modal('show');
		
		var rowid = $(this).data('id');
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : 'edit_jkekerasan.php',
			data: 'rowid=' + rowid,
			success : function(response){
				$('.fetched-data').html(response);//menampilkan data ke dalam modal
			}
		});
	});
});
$(document).ready(function(){
	$('.edit_kdrt').click( function (){
		$('#myModal').modal('show');
		
		var rowid = $(this).data('id');
		//Menggunakan fungsi Ajax untuk Pengambilan Data
		$.ajax({
			type: 'post',
			url : 'edit_kdrt.php',
			data: 'rowid=' + rowid,
			success : function(response){
				$('.fetched-data').html(response);//menampilkan data ke dalam modal
				$('#myModal').modal('show');
			}
		});
	});
});
function delete_jkasus(id) {
	if(confirm ('Anda Serius Untuk Menghapus Data ?')){
		window.location.href='delete_jkasus.php?delete_id=' + id;
	}
}
function delete_kdrt(id) {
	if(confirm ('Anda Serius Untuk Menghapus Data ?')){
		window.location.href='delete_kdrt.php?delete_id=' + id;
	}
}
function delete_jkekerasan(id) {
	if(confirm ('Anda Serius Untuk Menghapus Data ?')){
		window.location.href='delete_jkekerasan.php?delete_id=' + id;
	}
}
</script>
<?php
	require_once ('../../layout/wrapperkonselor/footer.php');
?>

