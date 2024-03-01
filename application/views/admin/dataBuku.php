            <main class="content">
				<div class="container-fluid p-0">

				<h1 class="h3 mb-3"><strong>Data</strong> Buku</h1>

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
												<?php foreach($dataKategori as $dk) : ?>
													<option value="<?= $dk['KategoriID'] ?>"><?= $dk['NamaKategori'] ?></option>
												<?php endforeach; ?>
											</select>
											</div>
											<div class="col-3">
												<button type="submit" class="btn btn-success">Apply</button>
											</div>
										</div>
									</form>
                                    </div>
                                    <div class="col-2">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBuku" data-bs-whatever="@getbootstrap">Add Buku</button>

										<!-- Modal Add buku -->
											<div class="modal fade" id="modalAddBuku" tabindex="-1" aria-labelledby="modalAddBukuLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="modalAddBukuLabel">Add Buku</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<?php echo form_open_multipart('admin/tambahBuku'); ?>
														<div class="row">
															<div class="col-6">
																<div class="mb-3">
																	<label for="recipient-name" class="col-form-label">Judul Buku:</label>
																	<input type="text" name="judul" class="form-control" id="recipient-name" placeholder="Masukkan judul buku">
																	<?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
																</div>
															</div>
															<div class="col-6">
																<div class="mb-3">
																	<label for="recipient-name" class="col-form-label">Gambar Buku:</label>
																	<input type="file" name="foto" class="form-control" size="20">
																</div>
															</div>
															<div class="col-6">
																<div class="mb-3">
																	<label for="recipient-name" class="col-form-label">Kategori Buku:</label>
																	<select name="kategori_buku" id="" class="form-control form-select">
																		<option value="">Pilih</option>
																		<?php foreach($dataKategori as $dk) : ?>
																			<option value="<?= $dk['KategoriID'] ?>"><?= $dk['NamaKategori'] ?></option>
																		<?php endforeach; ?>
																	</select>
																	<?= form_error('kategori_buku', '<small class="text-danger">', '</small>'); ?>
																</div>
															</div>
															<div class="col-6">
																<div class="mb-3">
																	<label for="recipient-name" class="col-form-label">Penulis:</label>
																	<input type="text" name="penulis" class="form-control" id="recipient-name" placeholder="Masukkan penulis buku">
																	<?= form_error('penulis', '<small class="text-danger">', '</small>'); ?>
																</div>
															</div>
															<div class="col-6">
																<div class="mb-3">
																	<label for="recipient-name" class="col-form-label">Penerbit:</label>
																	<input type="text" name="penerbit" class="form-control" id="recipient-name" placeholder="Masukkan penerbit buku">
																	<?= form_error('penerbit', '<small class="text-danger">', '</small>'); ?>
																</div>
															</div>
															<div class="col-6">
																<div class="mb-3">
																	<label for="recipient-name" class="col-form-label">Tahun Terbit:</label>
																	<input type="text" name="tahun_terbit" class="form-control" id="recipient-name" placeholder="Masukkan tahun terbit buku">
																	<?= form_error('tahun_terbit', '<small class="text-danger">', '</small>'); ?>
																</div>
															</div>
															<div class="col-6">
																<div class="mb-3">
																	<label for="recipient-name" class="col-form-label">Stok:</label>
																	<input type="text" name="stok" class="form-control" id="recipient-name" placeholder="Masukkan stok buku" value="<?= $db->Stok ?>">
																	<?= form_error('stok', '<small class="text-danger">', '</small>'); ?>
																</div>
															</div>
														</div>
													<div class="mb-3">
														<label for="message-text" class="col-form-label">Deskripsi:</label>
														<textarea class="form-control" name="deskripsi" id="message-text" placeholder="Masukkan deskripsi"></textarea>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
													<button type="submit" class="btn btn-primary">Add Buku</button>
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
											<th>Kategori</th>
											<th class="d-none d-xl-table-cell">Penulis</th>
											<th>Penerbit</th>
											<th class="d-none d-md-table-cell">Stok</th>
											<th class="d-none d-md-table-cell">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach($dataBuku as $db) : ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $db->Judul ?></td>
											<td><?= $db->NamaKategori ?></td>
											<td class="d-none d-xl-table-cell"><?= $db->Penulis ?></td>
											<td class="d-none d-xl-table-cell"><?= $db->Penerbit ?></td>
											<td class="d-none d-xl-table-cell"><?= $db->Stok ?></td>
											<td>
												<a href="<?= base_url() ?>admin/hapusBuku/<?= $db->BukuID ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalView<?= $db->BukuID ?>"><i data-feather="eye"></i></a>
												<a href="<?= base_url() ?>admin/hapusBuku/<?= $db->BukuID ?>/<?= $db->KategoriBukuID ?>" class="btn btn-danger" onclick="return confirm('yakin?')"><i data-feather="trash"></i></a>
												<a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditBuku<?= $db->BukuID ?>" data-bs-whatever="@getbootstrap"><i data-feather="edit"></i></a>

												<!-- Modal view buku -->
												<div class="modal fade" id="modalView<?= $db->BukuID ?>" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalViewLabel">Detail Buku</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-4">
																	<img src="<?= base_url() ?>assets-template/gambar/<?= $db->Gambar ?>" style="width: 260px; height: 370px;" alt="" class="rounded">												
																</div>
																<div class="col-7 ms-3">
																	<h4><b><?= $db->Judul ?></b></h4>
																	<h5>Kategori Buku : <b><?= $db->NamaKategori?></b></h5>
																	<h5>Penulis : <b><?= $db->Penulis ?></b></h5>
																	<h5>Penerbit : <b><?= $db->Penerbit ?></b></h5>
																	<h5>Tahun Terbit : <b><?= $db->TahunTerbit ?></b></h5>
																	<h5>Deskripsi : <b><?= $db->Deskripsi ?></b></h5>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
														</div>
													</div>
													</div>
													</div>   
												<!-- End of modal view buku -->

												<!-- Modal edit buku -->
												<div class="modal fade" id="modalEditBuku<?= $db->BukuID ?>" tabindex="-1" aria-labelledby="modalEditBukuLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalEditBukuLabel">Edit Buku</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
														<?php echo form_open_multipart('admin/editBuku/' . $db->BukuID . '/' . $db->KategoriBukuID); ?>
																<div class="row">
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Judul Buku:</label>
																			<input type="text" name="judul" class="form-control" id="recipient-name" placeholder="Masukkan judul buku" value="<?= $db->Judul ?>">
																			<?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Gambar Buku:</label>
																			<input type="file" name="foto" class="form-control" size="20" value="<?= $db->Gambar ?>">
																			<input type="text" class="form-control" value="<?= $db->Gambar ?>" readonly>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Kategori Buku:</label>
																			<select name="kategori_buku" id="" class="form-control form-select">
																				<option value="">Pilih</option>
																				<?php foreach($dataKategori as $dk) : ?>
																					<option value="<?= $dk['KategoriID'] ?>" <?= ($dk['NamaKategori'] == $db->NamaKategori) ? 'selected' : '' ?>><?= $dk['NamaKategori'] ?></option>
																				<?php endforeach; ?>
																			</select>
																			<?= form_error('kategori_buku', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Penulis:</label>
																			<input type="text" name="penulis" class="form-control" id="recipient-name" placeholder="Masukkan penulis buku" value="<?= $db->Penulis ?>">
																			<?= form_error('penulis', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Penerbit:</label>
																			<input type="text" name="penerbit" class="form-control" id="recipient-name" placeholder="Masukkan penerbit buku" value="<?= $db->Penerbit ?>">
																			<?= form_error('penerbit', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Tahun Terbit:</label>
																			<input type="text" name="tahun_terbit" class="form-control" id="recipient-name" placeholder="Masukkan tahun terbit buku" value="<?= $db->TahunTerbit ?>">
																			<?= form_error('tahun_terbit', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Stok:</label>
																			<input type="text" name="stok" class="form-control" id="recipient-name" placeholder="Masukkan stok buku" value="<?= $db->Stok ?>">
																			<?= form_error('stok', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																</div>
															<div class="mb-3">
																<label for="message-text" class="col-form-label">Deskripsi:</label>
																<textarea class="form-control" name="deskripsi" id="message-text" placeholder="Masukkan deskripsi"><?= $db->Deskripsi ?></textarea>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
															<button type="submit" class="btn btn-primary">Edit Buku</button>
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