			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Aktivitas Peminjaman</strong> User</h1>

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
										<form action="<?= base_url('admin/aktivitasPeminjaman') ?>" method="post">
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
									<div class="col-2 justify-content-end">
									<!-- <nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item"><a class="page-link" href="#">Previous</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">Next</a></li>
									</ul>
									</nav> -->
									</div>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Judul</th>
											<th class="d-none d-xl-table-cell">Username</th>
											<th class="d-none d-xl-table-cell">Tgl Peminjaman</th>
											<th>Tgl Pengembalian</th>
											<th class="d-none d-md-table-cell">Status</th>
											<th class="d-none d-md-table-cell">Action</th>
											<th class="">View</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach($dataAktivitasPeminjamanUser as $dap) : ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $dap->Judul ?></td>
											<td class="d-none d-xl-table-cell"><?= $dap->Username ?></td>
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
												<a href="<?= base_url() ?>admin/accPeminjaman/<?= $dap->PeminjamanID ?>/<?= $dap->BukuID ?>" class="btn btn-success" onclick="return confirm('yakin ingin memberi akses untuk meminjam buku?')"><i data-feather="check-circle"></i></a>
												<?php endif; ?>
												<?php if($dap->StatusPeminjaman == 2) : ?>
												<a href="<?= base_url() ?>admin/accDipinjam/<?= $dap->PeminjamanID ?>" class="btn btn-success" onclick="return confirm('yakin?')"><i data-feather="check-square"></i></a>
												<?php endif; ?>
												<?php if($dap->StatusPeminjaman == 3) : ?>
												<a href="<?= base_url() ?>admin/accSelesai/<?= $dap->PeminjamanID ?>" class="btn btn-success" onclick="return confirm('yakin?')"><i data-feather="check"></i></a>
												<?php endif; ?>
												<?php if(date("Y-m-d") == $dap->TanggalPengembalian) : ?>
													<?php if($dap->StatusPeminjaman == 3) : ?>
														<?php if($dap->Peringatan == 1) : ?>
														<?php else: ?>
															<a href="<?= base_url() ?>admin/peringatanAcc/<?= $dap->PeminjamanID ?>" class="btn btn-danger" onclick="return confirm('yakin?')"><i data-feather="alert-circle"></i></a>
														<?php endif; ?>
													<?php endif; ?>
												<?php endif; ?>
												
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
												<!-- <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditBuku<?= $db['BukuID'] ?>" data-bs-whatever="@getbootstrap"><i data-feather="edit"></i></a> -->
											</td>
											<td>
											<a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalViewDetail<?= $dap->PeminjamanID ?>"><i data-feather="eye"></i></a>
											<a href="<?= base_url() ?>admin/hapusPengajuanBuku/<?= $dap->PeminjamanID ?>" class="btn btn-danger" onclick="return confirm('yakin?')"><i data-feather="trash"></i></a>
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
								<?= $this->pagination->create_links(); ?>  
							</div>
						</div>
					</div>

				</div>
			</main>                 