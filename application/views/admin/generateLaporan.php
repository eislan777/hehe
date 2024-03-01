

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Generate</strong> Laporan</h1>

					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-3">
										<?php if($jumlahDataHarian == 0) : ?>
											<a href="" class="disabled" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#modalLaporanHarian">
										<?php else : ?>
											<a href="" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#modalLaporanHarian">
										<?php endif; ?>
											<div class="card">
												<div class="card-body">
													<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Laporan Peminjaman Harian</h5>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?= $jumlahDataHarian ?></h1>
												<small><?= date("D d-m-Y") ?> (Hari ini)</small>
											</div>
										</div>
										</a>

									<!-- Modal Add buku -->
										<div class="modal fade" id="modalLaporanHarian" tabindex="-1" aria-labelledby="modalLaporanHarianLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg modal-dialog-scrollable">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="modalLaporanHarianLabel">Laporan Peminjaman Harian  - <b><?= $jumlahDataHarian ?></b></h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<table class="table table-hover my-0">
													<thead>
														<tr>
															<th>No</th>
															<th>ID</th>
															<th class="d-none d-xl-table-cell">Buku</th>
															<th class="d-none d-xl-table-cell">Pengguna</th>
															<th class="d-none d-md-table-cell">Status</th>
															<th class="d-none d-md-table-cell">Tanggal</th>
														</tr>
													</thead>
													<tbody>
														<?php $i = 1; ?>
														<?php foreach($dataLaporanHarian as $dl) : ?>
														<tr>
															<td><?= $i ?></td>
															<td><?= $dl->PeminjamanID ?></td>
															<td class="d-none d-xl-table-cell"><img src="<?= base_url() ?>assets-template/gambar/<?= $dl->Gambar ?>" alt="" class="me-2" style="width: 35px; height: 50px;"><?= $dl->Judul ?></td>
															<td class="d-none d-xl-table-cell"><?= $dl->Username ?></td>
															<td class="d-none d-md-table-cell">
																<?php if($dl->StatusPeminjaman == 1) : ?>
																	<span class="badge bg-secondary">Pengajuan</span>
																<?php elseif($dl->StatusPeminjaman == 2) : ?>
																	<span class="badge bg-success">Diterima</span>
																<?php elseif($dl->StatusPeminjaman == 3) : ?>
																	<span class="badge bg-warning">Dipinjam</span>
																<?php elseif($dl->StatusPeminjaman == 4) : ?>
																	<span class="badge bg-info">Selesai</span>
																<?php elseif($dl->StatusPeminjaman == 5) : ?>
																	<span class="badge bg-primary">Dinilai</span>
																<?php endif; ?>
															</td>
															<td class="d-none d-xl-table-cell"><?= $dl->TanggalPengembalian ?></td>
														</tr>
														<?php $i++; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
												<a href="<?= base_url('admin/pdf') ?>" class="btn btn-primary">Print</a>
											</div>
										</div>
										</div>
										</div>   
		                            <!-- End of modal tambah buku -->
									</div>
									<div class="col-sm-3">
										<a href="" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#modalLaporanMingguan">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Laporan Peminjaman Mingguan</h5>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><?= $jumlahDataMingguan ?></h1>
													<small><?= date("D d-m-Y", strtotime('-7 days')) ?> s/d <?= date("D d-m-Y") ?> (Seminggu terakhir) </small>
												</div>
											</div>
											<!-- Modal Add buku -->
										<div class="modal fade" id="modalLaporanMingguan" tabindex="-1" aria-labelledby="modalLaporanMingguanLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg modal-dialog-scrollable">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="modalLaporanMingguanLabel">Laporan Peminjaman Mingguan - <b><?= $jumlahDataMingguan ?></b></h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<table class="table table-hover my-0">
													<thead>
														<tr>
															<th>No</th>
															<th>ID</th>
															<th class="d-none d-xl-table-cell">Buku</th>
															<th class="d-none d-xl-table-cell">Pengguna</th>
															<th class="d-none d-md-table-cell">Status</th>
															<th class="d-none d-md-table-cell">Tanggal</th>
														</tr>
													</thead>
													<tbody>
														<?php $i = 1; ?>
														<?php foreach($dataLaporanMingguan as $dm) : ?>
														<tr>
															<td><?= $i ?></td>
															<td><?= $dm->PeminjamanID ?></td>
															<td class="d-none d-xl-table-cell"><img src="<?= base_url() ?>assets-template/gambar/<?= $dm->Gambar ?>" alt="" class="me-2" style="width: 35px; height: 50px;"><?= $dm->Judul ?></td>
															<td class="d-none d-xl-table-cell"><?= $dm->Username ?></td>
															<td class="d-none d-md-table-cell">
																<?php if($dm->StatusPeminjaman == 1) : ?>
																	<span class="badge bg-secondary">Pengajuan</span>
																<?php elseif($dm->StatusPeminjaman == 2) : ?>
																	<span class="badge bg-success">Diterima</span>
																<?php elseif($dm->StatusPeminjaman == 3) : ?>
																	<span class="badge bg-warning">Dipinjam</span>
																<?php elseif($dm->StatusPeminjaman == 4) : ?>
																	<span class="badge bg-info">Selesai</span>
																<?php elseif($dm->StatusPeminjaman == 5) : ?>
																	<span class="badge bg-primary">Dinilai</span>
																<?php endif; ?>
															</td>															
															<td class="d-none d-xl-table-cell"><?= $dm->TanggalPengembalian ?></td>
														</tr>
														<?php $i++; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
												<button type="submit" class="btn btn-primary">Confirm</button>
											</div>
										</div>
										</div>
										</div>   
		                            <!-- End of modal tambah buku -->
										</a>
									</div>
									<div class="col-sm-3">
										<a href="" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#modalLaporanBulanan">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Laporan Peminjaman Bulanan</h5>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><?= $jumlahDataBulanan ?></h1>
													<small><?= date("D d-m-Y", strtotime('-30 days')) ?> s/d <?= date("D d-m-Y") ?> (Sebulan terakhir) </small>
												</div>
											</div>
											<!-- Modal Add buku -->
										<div class="modal fade" id="modalLaporanBulanan" tabindex="-1" aria-labelledby="modalLaporanBulananLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg modal-dialog-scrollable">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="modalLaporanBulananLabel">Laporan Peminjaman Bulanan - <b><?= $jumlahDataBulanan ?></b></h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<table class="table table-hover my-0">
													<thead>
														<tr>
															<th>No</th>
															<th>ID</th>
															<th class="d-none d-xl-table-cell">Buku</th>
															<th class="d-none d-xl-table-cell">Pengguna</th>
															<th class="d-none d-md-table-cell">Status</th>
															<th class="d-none d-md-table-cell">Tanggal</th>
														</tr>
													</thead>
													<tbody>
														<?php $i = 1; ?>
														<?php foreach($dataLaporanBulanan as $db) : ?>
														<tr>
															<td><?= $i ?></td>
															<td><?= $db->PeminjamanID ?></td>
															<td class="d-none d-xl-table-cell"><img src="<?= base_url() ?>assets-template/gambar/<?= $db->Gambar ?>" alt="" class="me-2" style="width: 35px; height: 50px;"><?= $db->Judul ?></td>
															<td class="d-none d-xl-table-cell"><?= $db->Username ?></td>
															<td class="d-none d-md-table-cell">
																<?php if($db->StatusPeminjaman == 1) : ?>
																	<span class="badge bg-secondary">Pengajuan</span>
																<?php elseif($db->StatusPeminjaman == 2) : ?>
																	<span class="badge bg-success">Diterima</span>
																<?php elseif($db->StatusPeminjaman == 3) : ?>
																	<span class="badge bg-warning">Dipinjam</span>
																<?php elseif($db->StatusPeminjaman == 4) : ?>
																	<span class="badge bg-info">Selesai</span>
																<?php elseif($db->StatusPeminjaman == 5) : ?>
																	<span class="badge bg-primary">Dinilai</span>
																<?php endif; ?>
															</td>
															<td class="d-none d-xl-table-cell"><?= $db->TanggalPengembalian ?></td>
														</tr>
														<?php $i++; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
												<button type="submit" class="btn btn-primary">Confirm</button>
											</div>
										</div>
										</div>
										</div>   
		                            <!-- End of modal tambah buku -->
										</a>
									</div>
									<div class="col-sm-3">
										<a href="" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#modalLaporanBuku">
											<div class="card">
												<div class="card-body">
													<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Buku</h5>
													</div>
													
													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="book"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?= $jumlahBuku ?></h1>
											</div>
											<!-- Modal Add buku -->
										<div class="modal fade" id="modalLaporanBuku" tabindex="-1" aria-labelledby="modalLaporanBukuLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg modal-dialog-scrollable">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="modalLaporanBukuLabel">Laporan Buku - <b><?= $jumlahBuku ?></b></h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<table class="table table-hover my-0">
													<thead>
														<tr>
															<th>No</th>
															<th>ID</th>
															<th class="d-none d-xl-table-cell">Judul</th>
															<th class="d-none d-xl-table-cell">Jenis Buku</th>
															<th class="d-none d-md-table-cell">Penulis</th>
															<th class="d-none d-md-table-cell">Penerbit</th>
															<th class="d-none d-md-table-cell">Tahun Terbit</th>
														</tr>
													</thead>
													<tbody>
														<?php $i = 1; ?>
														<?php foreach($dataBuku as $db) : ?>
														<tr>
															<td><?= $i ?></td>
															<td><?= $db->BukuID ?></td>
															<td class="d-none d-xl-table-cell"><img src="<?= base_url() ?>assets-template/gambar/<?= $db->Gambar ?>" alt="" class="me-2" style="width: 35px; height: 50px;"><?= $db->Judul ?></td>
															<td class="d-none d-xl-table-cell"><?= $db->NamaKategori ?></td>
															<td class="d-none d-xl-table-cell"><?= $db->Penulis ?></td>
															<td class="d-none d-xl-table-cell"><?= $db->Penerbit ?></td>
															<td class="d-none d-xl-table-cell"><?= $db->TahunTerbit ?></td>
														</tr>
														<?php $i++; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
												<button type="submit" class="btn btn-primary">Confirm</button>
											</div>
										</div>
										</div>
										</div>   
		                            <!-- End of modal tambah buku -->
										</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>