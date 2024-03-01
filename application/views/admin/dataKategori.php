<main class="content">
				<div class="container-fluid p-0">

				<h1 class="h3 mb-3"><strong>Data</strong> Kategori</h1>

					<div class="row">
						<div class="col text-center">
							<?= $this->session->flashdata('message'); ?>
						</div>
					</div>

					<div class="row">
						<div class="col-12 d-flex">
							<div class="card flex-fill" style="min-height: 330px;">
								<div class="row py-3">
                                    <div class="col-10">
										<form action="<?= base_url('admin/dataBuku') ?>" method="post">
										<div class="row">
											<div class="col-4 ms-3">
												<select name="sortir_buku" id="" class="form-control form-select">
													<option value="">Pilih Opsi</option>
													<option value="Sastra">Sastra</option>
													<option value="Bacaan">Bacaan</option>
													<option value="Novel">Novel</option>
													<option value="Bisnis & Ekonomi">Bisnis & Ekonomi</option>
													<option value="Fantasi">Fantasi</option>
												</select>
											</div>
											<div class="col-3">
												<button type="submit" class="btn btn-success">Apply</button>
											</div>
										</div>
									</form>
                                    </div>
                                    <div class="col-2">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBuku" data-bs-whatever="@getbootstrap">Add Kategori</button>

									<!-- Modal Add buku -->
										<div class="modal fade" id="modalAddBuku" tabindex="-1" aria-labelledby="modalAddBukuLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="modalAddBukuLabel">Add Buku</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<?php echo form_open_multipart('admin/tambahKategori'); ?>
													<div class="row">
														<div class="col-6">
															<div class="mb-3">
																<label for="recipient-name" class="col-form-label">Judul Buku:</label>
																<input type="text" name="nama_kategori" class="form-control" id="recipient-name" placeholder="Masukkan nama kategori buku">
																<?= form_error('nama_kategori', '<small class="text-danger">', '</small>'); ?>
															</div>
														</div>
													
													</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
												<button type="submit" class="btn btn-primary">Add Kategori</button>
											</div>
										</div>
									<?php echo form_close(); ?>
										</div>
										</div>   
		                            <!-- End of modal tambah buku -->

									</div>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Judul</th>
											<th class="d-none d-md-table-cell">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach($dataKategori as $dk) : ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $dk['NamaKategori'] ?></td>
											<td>
												<a href="<?= base_url() ?>admin/hapusKategori/<?= $dk['KategoriID'] ?>" class="btn btn-danger" onclick="return confirm('yakin?')"><i data-feather="trash"></i></a>
												<a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditKategori<?= $dk['KategoriID'] ?>" data-bs-whatever="@getbootstrap"><i data-feather="edit"></i></a>

												<!-- Modal edit buku -->
													<div class="modal fade" id="modalEditKategori<?= $dk['KategoriID'] ?>" tabindex="-1" aria-labelledby="modalEditKategoriLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalEditKategoriLabel">Edit Kategori</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<?php echo form_open_multipart('admin/editKategori/' .$dk['KategoriID']); ?>
																<div class="row">
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Judul Buku:</label>
																			<input type="text" name="nama_kategori" class="form-control" id="recipient-name" placeholder="Masukkan nama kategori buku" value="<?= $dk['NamaKategori'] ?>">
																			<?= form_error('nama_kategori', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
															<button type="submit" class="btn btn-primary">Edit Kategori</button>
														</div>
													</div>
												<?php echo form_close(); ?>
													</div>
													</div>   
												<!-- End of modal tambah buku -->
											</td>
										</tr>
										<?php $i++;  ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</main>                 