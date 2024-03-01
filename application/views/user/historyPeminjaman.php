            <main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">History Peminjaman</h1>

					<div class="row">
						<div class="col text-center">
							<?= $this->session->flashdata('message'); ?>
						</div>
					</div>


					<div class="row pinjam-buku">
						<div class="col-12">
								<div class="card-body">
									<div class="row">
										<?php if(!$dataHistory) : ?>
											<p class="text-muted">Tidak ada history peminjaman</p>
										<?php endif; ?>
											<?php foreach($dataHistory as $dh) : ?>
												<div class="col-4">
														<a href="" class="move" data-bs-toggle="modal" data-bs-target="#modalDetailUlasan<?= $dh->UlasanID ?>">
														<div class="card">
															<div class="row">
																<div class="col-7">
																	<div class="card-header">
																		<h5 class="card-title mb-0"><?= $dh->Judul;?></h5>
																		<h5 class="card-text"><?= $dh->JenisBuku; ?></h5>
																	</div>
																	<div class="card-body">
																		<?php if( $dh->Rating == 1) : ?>
																			<span><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
																		<?php elseif( $dh->Rating == 2) : ?>
																			<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
																		<?php elseif( $dh->Rating == 3) : ?>
																			<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
																		<?php elseif( $dh->Rating == 4) : ?>
																			<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
																		<?php elseif( $dh->Rating == 5) : ?>
																			<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></span>
																		<?php endif; ?>
																	</div>
																</div>
																<div class="col-5">
																	<img src="<?= base_url() ?>assets-template/gambar/<?= $dh->Gambar?>" style="width: 105px; height: 160px;" alt="" class="rounded">
																</div>
															</div>
														</div>
														<!-- modal -->
														<div class="modal fade" id="modalDetailUlasan<?= $dh->UlasanID ?>" tabindex="-1" aria-labelledby="modalDetailUlasanLabel" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title text-muted" id="modalDetailUlasanLabel"><?= $dh->NamaLengkap ?> - <?= $dh->Username ?></h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">	
																<div class="row">
																	<div class="col-4">
																		<img src="<?= base_url() ?>assets-template/gambar/<?= $dh->Gambar ?>" style="width: 150px; height: 220px;" alt="" class="rounded">												
																	</div>
																	<div class="col-7 ms-3">
																		<h4><b><?= $dh->Judul ?></b></h4>
																		<h4>
																		<?php if( $dh->Rating == 1) : ?>
																			<span><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
																		<?php elseif( $dh->Rating == 2) : ?>
																			<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
																		<?php elseif( $dh->Rating == 3) : ?>
																			<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
																		<?php elseif( $dh->Rating == 4) : ?>
																			<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-regular fa-star text-warning"></i></span>
																			<?php elseif( $dh->Rating == 5) : ?>
																			<span><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></span>
																		<?php endif; ?>
																		</h4>																	
																		<h5>Ulasan : <b><?= $dh->Ulasan ?></b></h5>
																		<h5>Dirating pada : <b><?= $dh->TanggalRating ?></b></h5>
																	</div>
																</div>								
															</div>
															<div class="modal-footer">
																<a href="<?= base_url() ?>user/hapusHistory/<?= $dh->PeminjamanID ?>/ <?= $dh->UlasanID ?>" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus?')" ><i data-feather="trash"></i></a>
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
															</div>
														</div>
													</div>
												</div>
												<!-- end modal -->
											</a>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
						</div>
					</div>

				</div>
            </main>