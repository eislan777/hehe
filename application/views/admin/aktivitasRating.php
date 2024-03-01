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
							<div class="card flex-fill">
								<div class="card-header">
									<div class="row py-3">
                                    <div class="col-10">
										<form action="<?= base_url('menu/index') ?>" method="post">
										<div class="row">
											<div class="col-4 ms-3">
												<select name="sortir_rating" id="" class="form-control form-select">
													<option value="">Pilih Opsi</option>
													<option value="1">Rating 1</option>
													<option value="2">Rating 2</option>
													<option value="3">Rating 3</option>
													<option value="4">Rating 4</option>
													<option value="5">Rating 5</option>
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
											<th>No</th>
											<th>Judul</th>
											<th class="d-none d-xl-table-cell">Nama Pengguna</th>
											<th>Status</th>
											<th class="d-none d-md-table-cell">Rating</th>
											<th class="d-none d-md-table-cell">Ulasan</th>
											<th class="d-none d-md-table-cell">View</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach($dataHistory as $dh) : ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $dh->Judul ?></td>
											<td class="d-none d-xl-table-cell"><?= $dh->NamaLengkap ?></td>
											<td><span class="badge bg-success">Selesai</span></td>
											<td class="d-none d-md-table-cell">
												<?php if($dh->Rating == 1) : ?>
													<span><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
												<?php elseif($dh->Rating == 2) : ?>
													<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
												<?php elseif($dh->Rating == 3) : ?>
													<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
												<?php elseif($dh->Rating == 4) : ?>
													<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
												<?php elseif($dh->Rating == 5) : ?>
														<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></span>
												<?php endif; ?>

											</td>
											<td><?= $dh->UlasanAwal ?>....</td>
                                            <td>
                                                <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalViewDetail<?= $dh->PeminjamanID ?>"><i data-feather="eye"></i></a>

                                                <!-- modal view utk pinjam-->
												<div class="modal fade" id="modalViewDetail<?= $dh->PeminjamanID ?>" tabindex="-1" aria-labelledby="modalViewDetailLabel" aria-hidden="true">
													<div class="modal-dialog scrollable">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalViewDetailLabel">Detail Rating</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-12">
																	<div class="row mt-4">
																		<div class="col-4">
																			<img src="<?= base_url() ?>assets-template/gambar/<?= $dh->Gambar ?>" style="width: 140px; height: 200px;" alt="">
																		</div>
																		<div class="col-8">
																			<h5>Judul Buku : <span class="text-primary"><?= $dh->Judul ?></span></h5>
																			<h5>Peminjam : <span class="text-primary"><?= $dh->NamaLengkap ?></span></h5>
                                                                            <br>
                                                                            <h5>Rating :
                                                                            <?php if($dh->Rating == 1) : ?>
                                                                                <span><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
                                                                            <?php elseif($dh->Rating == 2) : ?>
                                                                                <span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
                                                                            <?php elseif($dh->Rating == 3) : ?>
                                                                                <span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
                                                                            <?php elseif($dh->Rating == 4) : ?>
                                                                                <span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
                                                                            <?php elseif($dh->Rating == 5) : ?>
                                                                                <span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></span>
                                                                            <?php endif; ?>
                                                                            </h5>
                                                                            <h5>Ulasan : <b><?= $dh->Ulasan ?></b></h5>
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
										<?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					</div>

				</div>
			</main>                 