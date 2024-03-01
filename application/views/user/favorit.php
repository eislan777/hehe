            <main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Favorit</strong> Buku - <span class="text-muted"><?= $dataJumlahFavorit ?> / 10</span></h1>
					
					<div class="row">
						<div class="col text-center">
							<?= $this->session->flashdata('message'); ?>
						</div>
					</div>

					<div class="row pinjam-buku">
						<div class="col-12">
								<div class="card-body">
									<div class="row">
										<a href="" class="move" data-bs-toggle="modal" data-bs-target="#modalDetailBuku<?= $dataFavorit['BukuID'] ?>">
											<?php if(!$dataFavorit) : ?>
												<p class="text-muted">Tidak ada buku difavorit.</p>
												<?php endif; ?>
												<?php foreach($dataFavorit as $df) : ?>
													<div class="col-4">
														<div class="card">
															<div class="row">
																<div class="col-7">
																	<div class="card-header">
																		<h5 class="card-title mb-0"><?= $df->Judul;?></h5>
																		<h5 class="card-text"><?= $df->NamaKategori; ?></h5>
																</div>
															<div class="card-body">
																<a href="<?= base_url() ?>user/hapusFavorit/<?= $df->BukuID ?>/<?= $df->UserID ?>" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus dari favorit?')"><i class="fa-solid fa-heart-circle-minus"></i></a>
															</div>
														</div>
														<div class="col-5">
															<img src="<?= base_url() ?>assets-template/gambar/<?= $df->Gambar?>" style="width: 105px; height: 160px;" alt="" class="rounded">
														</div>
													</div>
												</div>
											</div>
											<?php endforeach; ?>
										</a>
									</div>
								</div>
						</div>
					</div>

				</div>
			</main>