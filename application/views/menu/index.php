

			<main class="content">
				<div class="container-fluid p-0">

					<?php if($user['RoleID'] == 1 || $user['RoleID'] == 2 || $user['RoleID'] == 3 ) : ?>
						<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
					<?php else : ?>
						<h1 class="h3 mb-3"><strong>Library</strong> Dashboard</h1>
					<?php endif; ?>

					<?php if($user['RoleID'] == 1 || $user['RoleID'] == 2 || $user['RoleID'] == 3 ) : ?>
					<div class="row">
						<div class="col-xl-12 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Admin</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="user-check"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?= $jumlahDataAdmin ?></h1>
												<div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Petugas</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="user"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?= $jumlahDataPetugas ?></h1>
												<div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Pengguna</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?= $jumlahDataPengguna ?></h1>
												<div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
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
												<div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Buku Diajukan</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="file-plus"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3"><?= $jumlahBukuDiajukan ?></h1>
									<div class="mb-0">
										<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
										<span class="text-muted">Since last week</span>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Buku Dipinjam</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="file"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3"><?= $jumlahBukuDipinjam ?></h1>
									<div class="mb-0">
										<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
										<span class="text-muted">Since last week</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Jumlah Stok</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="user-check"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3"><?= $jumlahStokBuku ?></h1>
									<div class="mb-0">
										<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
										<span class="text-muted">Since last week</span>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Admin</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="user-check"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3"><?= $jumlahDataAdmin ?></h1>
									<div class="mb-0">
										<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
										<span class="text-muted">Since last week</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Recent Movement</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php endif; ?>

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

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Browser Usage</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Chrome</td>
													<td class="text-end">4306</td>
												</tr>
												<tr>
													<td>Firefox</td>
													<td class="text-end">3801</td>
												</tr>
												<tr>
													<td>IE</td>
													<td class="text-end">1689</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Real-Time</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Projects</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Start Date</th>
											<th class="d-none d-xl-table-cell">End Date</th>
											<th>Status</th>
											<th class="d-none d-md-table-cell">Assignee</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Project Apollo</td>
											<td class="d-none d-xl-table-cell">01/01/2023</td>
											<td class="d-none d-xl-table-cell">31/06/2023</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Fireball</td>
											<td class="d-none d-xl-table-cell">01/01/2023</td>
											<td class="d-none d-xl-table-cell">31/06/2023</td>
											<td><span class="badge bg-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project Hades</td>
											<td class="d-none d-xl-table-cell">01/01/2023</td>
											<td class="d-none d-xl-table-cell">31/06/2023</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Nitro</td>
											<td class="d-none d-xl-table-cell">01/01/2023</td>
											<td class="d-none d-xl-table-cell">31/06/2023</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Phoenix</td>
											<td class="d-none d-xl-table-cell">01/01/2023</td>
											<td class="d-none d-xl-table-cell">31/06/2023</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project X</td>
											<td class="d-none d-xl-table-cell">01/01/2023</td>
											<td class="d-none d-xl-table-cell">31/06/2023</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Romeo</td>
											<td class="d-none d-xl-table-cell">01/01/2023</td>
											<td class="d-none d-xl-table-cell">31/06/2023</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Christina Mason</td>
										</tr>
										<tr>
											<td>Project Wombat</td>
											<td class="d-none d-xl-table-cell">01/01/2023</td>
											<td class="d-none d-xl-table-cell">31/06/2023</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Monthly Sales</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>