<main class="content">
				<div class="container-fluid p-0">

				<h1 class="h3 mb-3"><strong>Aktivitas</strong> Peminjaman</h1>

					<div class="row">
						<div class="col-12 d-flex">
							<?= $this->session->flashdata('message'); ?>
						</div>
					</div>

					<div class="row">
						<div class="col-12 d-flex">
							<div class="card flex-fill" style="min-height: 330px;">
								<div class="row py-3">
                                    <div class="col-10">
										<form action="<?= base_url('user/aktivitasPeminjaman') ?>" method="post">
										<div class="row">
											<div class="col-4 ms-3">
												<select name="sortir_buku" id="" class="form-control form-select">
													<option value="">Pilih Opsi</option>
													<option value="1">Sedang Pengajuan</option>
													<option value="2">Diterima</option>
													<option value="3">Sedang Dipinjam</option>
													<option value="4">Selesai</option>
													<option value="5">Dinilai</option>
												</select>
											</div>
											<div class="col-3">
												<button type="submit" class="btn btn-success">Apply</button>
											</div>
										</div>
									</form>
                                    </div>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Judul</th>
											<th class="d-none d-xl-table-cell">Tanggal Peminjaman</th>
											<th>Tanggal Pengembalian</th>
											<th class="d-none d-md-table-cell">Status Peminjaman</th>
											<th class="d-none d-md-table-cell">Action</th>
											<th class="d-none d-md-table-cell">View</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach($dataAktivitasPeminjaman as $dap) : ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $dap->Judul ?></td>
											<td><?= $dap->TanggalPeminjaman ?></td>
											<?php if(date('Y-m-d') >= $dap->TanggalPengembalian) : ?>
												<?php if($dap->StatusPeminjaman == 3 ) : ?>
													<td class="d-none d-md-table-cell text-danger"><?= $dap->TanggalPengembalian ?></td>
												<?php else : ?>
													<td class="d-none d-md-table-cell"><?= $dap->TanggalPengembalian ?></td>
												<?php endif; ?>											
											<?php else : ?>
											<td class="d-none d-md-table-cell"><?= $dap->TanggalPengembalian ?></td>
											<?php endif; ?>	
											<td class="d-none d-md-table-cell">
                                                <?php if($dap->StatusPeminjaman == 1) : ?>
                                                    <span class="badge bg-secondary">Pengajuan</span>
                                                <?php elseif($dap->StatusPeminjaman == 2) : ?>
                                                    <span class="badge bg-success">Diterima</span>
                                                <?php elseif($dap->StatusPeminjaman == 3) : ?>
                                                    <span class="badge bg-warning">Dipinjam</span>
                                                <?php elseif($dap->StatusPeminjaman == 4) : ?>
                                                    <span class="badge bg-info">Selesai</span>
                                                <?php elseif($dap->StatusPeminjaman == 5) : ?>
                                                    <span class="badge bg-primary">Dinilai</span>
                                                <?php endif; ?>
                                            </td>
											<td>

												<?php if($dap->StatusPeminjaman == 1) : ?> 
													<a href="<?= base_url() ?>user/hapusPengajuanBuku/<?= $dap->PeminjamanID ?>" class="btn btn-danger" onclick="return confirm('yakin?')"><i data-feather="trash"></i></a>
												<?php elseif($dap->StatusPeminjaman == 2) : ?> 
													<a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUntukPinjam<?= $dap->PeminjamanID ?>"><i class="fa-solid fa-circle-check"></i></a>
													<!-- modal view utk pinjam-->
												<div class="modal fade" id="modalUntukPinjam<?= $dap->PeminjamanID ?>" tabindex="-1" aria-labelledby="modalUntukPinjamLabel" aria-hidden="true">
													<div class="modal-dialog scrollable">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalUntukPinjamLabel">Buku Diacc</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-12">
																	<h4><i class="fa-solid fa-circle-check text-success"></i> Buku telah di acc oleh admin</h4>
																	<br>
																	<h4>ID Peminjaman : <span class="text-primary"><?= $dap->PeminjamanID ?></span></h4>
																	<h5>Judul Buku : <span class="text-primary"><?= $dap->Judul ?></span></h5>
																	<h5>Nama Peminjam : <span class="text-primary"><?= $dap->NamaLengkap ?> / <?= $dap->Username ?></span></h5>
																	<img src="<?= base_url() ?>assets-template/src/img/photos/qrcode.png" style="width: 200px;" alt="">
																	<p class="text-muted">Screenshoot atau ambil gambar pada halaman ini dan tunjukkan kepada Petugas ketika ingin mengambil buku anda.</p>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
														</div>
													</div>   
												<!-- End of modal view utk pinjam -->
												<?php elseif($dap->StatusPeminjaman == 3) : ?> 
													<?php if( $dap->StatusPerpanjangan == 0 && $dap->Peringatan == 0) : ?>
													<a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalPerpanjangPinjam<?= $dap->PeminjamanID ?>"><i class="fa-solid fa-clock-rotate-left"></i></a>
													<!-- modal perpanjang -->
												<div class="modal fade" id="modalPerpanjangPinjam<?= $dap->PeminjamanID ?>" tabindex="-1" aria-labelledby="modalPerpanjangPinjamLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalPerpanjangPinjamLabel">Rating Buku</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form method="post" action="<?= base_url() ?>user/perpanjangPeminjaman/<?= $dap->PeminjamanID ?>/<?= $dap->BukuID ?>/<?= $dap->UserID ?> ?>">
																<div class="row">
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Judul:</label>
																			<input type="text" name="nama_lengkap" class="form-control" id="recipient-name" placeholder="Masukkan nama lengkap" value="<?= $dap->Judul ?>" readonly>
																			<?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Tambahan hari:</label>
																			<select name="perpanjang_hari" id="" class="form-control form-select">
																				<option value="">Pilih hari</option>
																				<option value="1" <?= set_select('perpanjang_hari','1') ?>>1 Hari</option>
																				<option value="2" <?= set_select('perpanjang_hari','2') ?>>2 Hari</option>
																				<option value="3" <?= set_select('perpanjang_hari','3') ?>>3 Hari</option>
																				<option value="4" <?= set_select('perpanjang_hari','4') ?>>4 Hari</option>
																				<option value="5" <?= set_select('perpanjang_hari','5') ?>>5 Hari</option>
																			</select>
																			<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>																		
																</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
															<button type="submit" class="btn btn-primary">Perpanjang peminjaman</button>
														</div>
													</div>
												</form>
													</div>
													</div>   
												<!-- End of modal perpanjangan -->
												<?php endif; ?>
												
												<?php elseif($dap->StatusPeminjaman == 4) : ?> 
													<a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUlasanBuku<?= $dap->PeminjamanID ?>"><i class="fa-solid fa-star"></i></a>

													<!-- modal rating -->
												<div class="modal fade" id="modalUlasanBuku<?= $dap->PeminjamanID ?>" tabindex="-1" aria-labelledby="modalUlasanBukuLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalUlasanBukuLabel">Rating Buku</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form method="post" action="<?= base_url() ?>user/ratingBuku/<?= $dap->PeminjamanID ?>/<?= $dap->BukuID ?>/<?= $dap->UserID ?> ?>">
																<div class="row">
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Judul:</label>
																			<input type="text" name="nama_lengkap" class="form-control" id="recipient-name" placeholder="Masukkan nama lengkap" value="<?= $dap->Judul ?>" readonly>
																			<?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Rating:</label>
																			<select name="rating" id="" class="form-control form-select">
																				<option value="">Pilih rating</option>
																				<option value="1" <?= set_select('rating','1') ?>>1</option>
																				<option value="2" <?= set_select('rating','2') ?>>2</option>
																				<option value="3" <?= set_select('rating','3') ?>>3</option>
																				<option value="4" <?= set_select('rating','4') ?>>4</option>
																				<option value="5" <?= set_select('rating','5') ?>>5</option>
																			</select>
																			<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-12">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Ulasan:</label>
																			<textarea name="ulasan" id="" class="form-control"></textarea>
																			<?= form_error('ulasan', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	
																</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
															<button type="submit" class="btn btn-primary">Rating Buku</button>
														</div>
													</div>
												</form>
													</div>
													</div>   
												<!-- End of modal rating -->
												<?php endif; ?>


								
												<!-- <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditBuku<?= $db['BukuID'] ?>" data-bs-whatever="@getbootstrap"><i data-feather="edit"></i></a> -->
												<?php if($dap->StatusPeminjaman == 3) : ?>
													<?php if($dap->Peringatan == 1) : ?>
														<div class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalPeringatanView<?= $dap->PeminjamanID ?>"><i data-feather="alert-circle"></i></div>
													<?php endif; ?>
												<?php endif; ?>
											</td>
											<!-- modal view utk peringatan-->
											<div class="modal fade" id="modalPeringatanView<?= $dap->PeminjamanID ?>" tabindex="-1" aria-labelledby="modalPeringatanViewLabel" aria-hidden="true">
												<div class="modal-dialog scrollable">
													<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="modalPeringatanViewLabel">Detail Peminjaman</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="col-12">
																<!-- <h4><i class="fa-solid fa-circle-check text-success"></i> Buku telah di acc oleh admin</h4> -->
																<h4>ID Peminjaman : <span class="text-primary"><?= $dap->PeminjamanID ?></span></h4>
																<h5>Nama Peminjam : <span class="text-primary"><?= $dap->NamaLengkap ?> / <?= $dap->Username ?></span></h5>
																<h5>Email : <span class="text-primary"><?= $dap->Email ?></span></h5>
																<h5 class="">Status : 
																<?php if($dap->StatusPeminjaman == 1) : ?>
																	<span class="badge bg-secondary">Pengajuan</span>
																<?php elseif($dap->StatusPeminjaman == 2) : ?>
																	<span class="badge bg-success">Diterima</span>
																<?php elseif($dap->StatusPeminjaman == 3) : ?>
																	<span class="badge bg-warning">Dipinjam</span>
																<?php elseif($dap->StatusPeminjaman == 4) : ?>
																	<span class="badge bg-info">Selesai</span>
																<?php elseif($dap->StatusPeminjaman == 5) : ?>
																	<span class="badge bg-primary">Dinilai</span>
																<?php endif; ?>
																<span class="badge bg-danger">Telah melampaui waktu peminjaman</span>
																</h5>
																<?php
																	$hari_ini = date("Y-m-d");

																	$TanggalPengembalian = $dap->TanggalPengembalian;

																	$selisih_hari = strtotime($hari_ini) - strtotime($TanggalPengembalian);
																	$selisih_hari = $selisih_hari / (60 * 60 * 24);
																	$selisih_hari = abs($selisih_hari);

																	$total_denda = $selisih_hari * 8000;
																	?>

																<h5>Denda : <span class="text-primary">Rp. <?= $total_denda ?></span> <span class="text-muted">(Per hari Rp. 8000)</span></h5>
																<div class="row mt-4">
																	<div class="col-4">
																		<img src="<?= base_url() ?>assets-template/gambar/<?= $dap->Gambar ?>" style="width: 140px; height: 200px;" alt="">
																	</div>
																	<div class="col-8">
																		<h5>Judul Buku : <span class="text-primary"><?= $dap->Judul ?></span></h5>
																		<h5>Penulis : <span class="text-primary"><?= $dap->Penulis ?></span></h5>
																		<h5>Penerbit : <span class="text-primary"><?= $dap->Penerbit ?></span></h5>
																		<h5>Tahun Terbit : <span class="text-primary"><?= $dap->TahunTerbit ?></span></h5>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
													</div>
												</div>   
											<!-- End of modal view utk peringatan -->
											<td>
												<a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalViewDetail<?= $dap->PeminjamanID ?>"><i data-feather="eye"></i></a>

												<!-- modal view utk pinjam-->
												<div class="modal fade" id="modalViewDetail<?= $dap->PeminjamanID ?>" tabindex="-1" aria-labelledby="modalViewDetailLabel" aria-hidden="true">
													<div class="modal-dialog scrollable">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalViewDetailLabel">Detail Peminjaman</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-12">
																	<!-- <h4><i class="fa-solid fa-circle-check text-success"></i> Buku telah di acc oleh admin</h4> -->
																	<h4>ID Peminjaman : <span class="text-primary"><?= $dap->PeminjamanID ?></span></h4>
																	<h5>Nama Peminjam : <span class="text-primary"><?= $dap->NamaLengkap ?> / <?= $dap->Username ?></span></h5>
																	<h5>Email : <span class="text-primary"><?= $dap->Email ?></span></h5>
																	<h5>Petugas : <span class="text-primary">
																		<?php if(empty($dap->SessionAcc)) : ?>
																			<div class="badge bg-danger">Belum di acc oleh admin</div>
																		<?php else : ?>
																			<?= $dap->SessionAcc ?>
																		<?php endif; ?>
																	</span></h5>
																	<h5 class="">Status : 
																	<?php if($dap->StatusPeminjaman == 1) : ?>
																		<span class="badge bg-secondary">Pengajuan</span>
																	<?php elseif($dap->StatusPeminjaman == 2) : ?>
																		<span class="badge bg-success">Diterima</span>
																	<?php elseif($dap->StatusPeminjaman == 3) : ?>
																		<span class="badge bg-warning">Dipinjam</span>
																	<?php elseif($dap->StatusPeminjaman == 4) : ?>
																		<span class="badge bg-info">Selesai</span>
																	<?php elseif($dap->StatusPeminjaman == 5) : ?>
																		<span class="badge bg-primary">Dinilai</span>
																	<?php endif; ?>
																	</h5>
																	<div class="row mt-4">
																		<div class="col-4">
																			<img src="<?= base_url() ?>assets-template/gambar/<?= $dap->Gambar ?>" style="width: 140px; height: 200px;" alt="">
																		</div>
																		<div class="col-8">
																			<h5>Judul Buku : <span class="text-primary"><?= $dap->Judul ?></span></h5>
																			<h5>Penulis : <span class="text-primary"><?= $dap->Penulis ?></span></h5>
																			<h5>Penerbit : <span class="text-primary"><?= $dap->Penerbit ?></span></h5>
																			<h5>Tahun Terbit : <span class="text-primary"><?= $dap->TahunTerbit ?></span></h5>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
														</div>
													</div>   
												<!-- End of modal view utk pinjam -->
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