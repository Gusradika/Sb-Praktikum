<?php
include "./connection.php";

$querySQL = "select * from coas";
$hasil = mysqli_query($conn, $querySQL);


if (mysqli_num_rows($hasil) > 0) {
	while ($isi = mysqli_fetch_assoc($hasil)) {
		// var_dump($isi);
		$result[] =  $isi;
		// die();
		// var_dump($karyawan);
	};

	// echo ('OKE');
	// var_dump($karyawan);
	// die();
};

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800" id="headingIndex">
		COA - Chart of Accounts
	</h1>
	<button id="btnAddBarang" class="d-none d-md-inline-block btn btn-md btn-success shadow-md" data-bs-toggle="modal" data-bs-target="#modalTambahBarang">
		<i class="fa fa-plus" aria-hidden="true"></i>
		Tambah Chart of Accounts
	</button>
</div>

<!-- Page Content -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap5">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Id</th>
								<th>Kode</th>
								<th>Induk</th>
								<th>Nama</th>
								<th>Jenis</th>
								<th>Header</th>
								<th>Aktif</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
						</tfoot>
						<tbody>


							<?php foreach ($result as $x) : ?>

								<tr>
									<td><?= $x['id'] ?></td>
									<td><?= $x['kode'] ?></td>
									<td><?= $x['induk'] ?></td>

									<td><?= $x['nama'] ?></td>

									<td><?= $x['jenis'] ?></td>

									<td>
										<?php if ($x['header'] == 1) {
											echo ('<i class="fas fa-check"></i>');
										} ?>
									</td>

									<td>
										<?php if ($x['aktif'] == 1) {
											echo ('<i class="fas fa-check"></i>');
										} ?>
									</td>

									<td>
										<button type="button" class="update btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahBarang"> <i class="fas fa-edit"></i></button>
										<button type="button" class="delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"> <i class="fas fa-trash"></i></button>
									</td>
								</tr>

							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Tambah Barang -->
<div class="modal fade" id="modalTambahBarang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header" id="staticBackdropLabel">
				<h1>Tambah Chart of Accounts</h1>
			</div>
			<form action="function.php" method="post" autocomplete="on">
				<input type="hidden" hidden value="" id="hiddenInput" name="portal">
				<input type="hidden" hidden value="" id="idTindakan" name="id">
				<div class="modal-body">
					<div class="mb-3">
						<label for="kode" class="form-label input-group">Kode:
						</label>
						<input type="text" name="kode" id="kode" class="form-control input-group" placeholder="1234" />
					</div>
					<div class="mb-3">
						<label for="induk" class="form-label input-group">Induk:
						</label>
						<input type="text" name="induk" id="induk" class="form-control input-group" placeholder="Komputer" />
					</div>
					<div class="mb-3">
						<label for="nama" class="form-label input-group">Nama:</label>
						<input type="text" name="nama" id="nama" class="form-control input-group" placeholder="pcs" />
					</div>
					<div class="mb-3">
						<label for="jenis" class="form-label input-group">Jenis:</label>
						<input type="text" name="jenis" id="jenis" class="form-control input-group" placeholder="1000" />
					</div>
					<div class="mb-3">
						<label for="header" class="form-label input-group">Header:</label>
						<input type="text" name="header" id="header" class="form-control input-group" placeholder="Status 1/0" />
					</div>
					<div class="mb-3">
						<label for="aktif" class="form-label input-group">Aktif:</label>
						<input type="text" name="aktif" id="aktif" class="form-control input-group" placeholder="Status 1/0" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-warning" id="btnUpdateBarang" name="btnUpdateBarang" data-bs-dismiss="modal">
						Update
					</button>
					<button type="submit" class="btn btn-primary" id="btnSaveBarang" name="btnSaveBarang" value="btnSaveBarang" data-bs-dismiss="modal">
						Save
					</button>
					<button type="button" class="btn btn-secondary" id="dismissBtn" data-bs-dismiss="modal">
						Cancel
					</button>
				</div>
			</form>

		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="function.php" method="POST">
				<input type="hidden" hidden name="portal" value="" id="hiddenInputD">
				<input type="hidden" hidden name="id" id="idTarifDelete" value="">
				<div class="modal-body">
					Konfirmasi
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Page level plugins -->
<script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../asset/js/demo/datatables-demo.js"></script>

<script>
	$(document).ready(function() {
		$(document).ready(function() {
			const myModal = $("#modalTambahBarang");
			let indexUpdate;

			$("#btnAddBarang").click(function() {
				myModal.find("h1").text("Tambah Chart Of Account");
				$("#hiddenInput").val('tambahCoa'); // hidden
				$("#btnSaveBarang").show();
				$("#btnUpdateBarang").hide();
				$("#btnDeleteBarang").hide();
				// $("#kode").removeAttr("disabled");

				$("#kode").val(null);
				$("#induk").val(null);
				$("#nama").val(null);
				$("#jenis").val(null);
				$("#header").val(null);
				$("#aktif").val(null);
			});


			$.fn.updateBarang = function() {

				$("#dataTable tbody").on("click", ".update", function(e) {
					myModal.find("h1").text("Update Chart Of Account");
					// $("#hiddenInput").val('updateTarif');
					$("#hiddenInput").val('updateCoa'); // hidden
					$("#btnSaveBarang").hide();
					$("#btnUpdateBarang").show();
					// $("#kode").attr("disabled", true);
					indexUpdate = $(this).closest("tr").index();

					el = $("#dataTable tbody").find("tr").eq(indexUpdate);
					// console.log(el);
					elRow = el.find("td");

					id = elRow[0].innerHTML;
					kode = elRow[1].innerHTML;
					induk = elRow[2].innerHTML;
					nama = elRow[3].innerHTML;
					jenis = elRow[4].innerHTML;
					header = elRow[5].innerHTML;
					aktif = elRow[6].innerHTML;
					// console.log(jenis, berat, kategori, biaya);
					if ($('elRow[2].innerHTML').is(':empty')) {
						aktif = "0";
					} else {
						aktif = "1";
					}
					// ambil modal

					$("#idTindakan").val(id);
					$("#kode").val(kode);
					$("#induk").val(induk);
					$("#nama").val(nama);
					$("#jenis").val(jenis);
					$("#header").val(header);
					$("#aktif").val(aktif);

				});

				$("#dataTable tbody").on("click", ".delete", function(e) {
					$("#hiddenInputD").val('deleteCoa');
					indexUpdate = $(this).closest("tr").index();

					el = $("#dataTable tbody").find("tr").eq(indexUpdate);
					// console.log(el);
					elRow = el.find("td");

					id = elRow[0].innerHTML;

					console.log(id);
					$("#idTarifDelete").val(id);
					console.log($('#idTarif').val());

				});



			};
			$.fn.updateBarang();
		});
	});
</script>