        <main class="content">
				<div class="container-fluid p-0">

				<h1 class="h3 mb-3"><strong>Pinjam</strong> Buku - <?= $user['Username'] ?></h1>

					<form action="<?= base_url('menu/pinjam') ?>" method="post">
						<div class="row mb-4">
							<div class="col-4">
								<select name="sortir_buku" id="" class="form-control form-select">
									<option value="">Pilih Opsi</option>
									<?php foreach($dataKategori as $dk) : ?>
									<option value="<?= $dk['KategoriID'] ?>"><?= $dk['NamaKategori'] ?></option>
									<?php endforeach; ?>
								</select>
							</div> 
							<div class="col-1">
								<button type="submit" class="btn btn-success">Apply</button>
							</div>
						</form>
							<div class="col-7 text-end">
								<h3>Buku dipinjam : <?= $jumlah_peminjaman ?>/3</h3>
							</div>
						</div>
							
						<div class="row">
							<div class="col text-center">
								<?= $this->session->flashdata('message'); ?>
							</div>
						</div>

					<div class="row pinjam-buku" >
						<?php foreach($dataBuku as $db) : ?>
						<div class="col-4">
							<a href="" class="move icon-move-right" data-bs-toggle="modal" data-bs-target="#modalDetailBuku<?= $db->BukuID ?>">
							<div class="card">
								<div class="row">
									<div class="col-7">
										<div class="card-header">
											<h5 class="card-title mb-0"><?= $db->Judul ?></h5>
											<h5 class="card-text"><?= $db->NamaKategori ?></h5>
										</div>
										<div class="card-body">
											<p class="card-text text-black tekan-pinjam" style="font-size: 12px;">Tekan untuk melihat detail buku <?= $db->Judul ?></p>			
										</div>
									</div>

									<div class="col-5">
										<img src="<?= base_url() ?>assets-template/gambar/<?= $db->Gambar ?>" style="width: 105px; height: 160px;" alt="" class="rounded">
									</div>
								</div>
							</div>
							</a>
							<!-- modal -->
							<div class="modal fade" id="modalDetailBuku<?= $db->BukuID ?>" tabindex="-1" aria-labelledby="modalDetailBukuLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalDetailBukuLabel"><?= $db->Judul ?></h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">	
											<div class="row">
												<div class="col-4">
													<img src="<?= base_url() ?>assets-template/gambar/<?= $db->Gambar ?>" style="width: 260px; height: 370px;" alt="" class="rounded">
												</div>
												<div class="col-7 ms-3">
													<h4><b><?= $db->Judul ?></b></h4>
													<h5 class="text-muted">Tersedia : <b><?= $db->Stok ?> Buku</b></h5>
													<h5>Jenis Buku : <b><?= $db->NamaKategori ?></b></h5>
													<h5>Penulis : <b><?= $db->Penulis ?></b></h5>
													<h5>Penerbit : <b><?= $db->Penerbit ?></b></h5>
													<h5>Tahun Terbit : <b><?= $db->TahunTerbit ?></b></h5>
													<h5>Deskripsi : <b><?= $db->Deskripsi ?></b></h5>
												</div>
											</div>								
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
												<a href="<?= base_url() ?>user/tambahFavorit/<?= $db->BukuID ?>/<?= $user['UserID'] ?>" class="btn btn-info" onclick="return confirm('yakin ingin menambahkan ke favorit?')"><i class="fa-solid fa-heart-circle-plus"></i></a>
        									<a href="<?= base_url() ?>user/pinjamBuku/<?= $db->BukuID ?>/<?= $user['UserID'] ?>" class="btn btn-primary" onclick="return confirm('yakin ingin mengajukan peminjaman buku?')" >Pinjam Buku</a>
										</div>
									</div>
								</div>
							</div>
							<!-- end modal -->
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</main>   