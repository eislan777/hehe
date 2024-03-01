<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator"><?= $jumlahBukuDiacc + $jumlahBukuDipinjam + $jumlahBukuPeringatan ?></span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									<?= $jumlahBukuDiacc + $jumlahBukuDipinjam + $jumlahBukuPeringatan ?> Notifikasi Baru
								</div>
								<div class="list-group">
									<?php foreach($dataAktivitasPeminjaman as $dap) : ?>
										<?php if($dap->StatusPeminjaman == 2) : ?>
											<a href="#" class="list-group-item">
												<div class="row g-0 align-items-center">
													<div class="col-2">
														<img src="<?= base_url() ?>assets-template/gambar/<?= $dap->Gambar ?>" style="width: 50pxpx; height: 70px;" alt="">
													</div>
													<div class="col-7 ms-2">
														<div class="text-dark"><?= $dap->Judul ?></div>
														<div class="text-muted small mt-1">Buku telah di acc oleh admin. Silahkan klik tombol <i data-feather="check-circle"></i> pada halaman <strong>Aktivitas Peminjaman </strong></div>
														<!-- <div class="text-muted small mt-1">30m ago</div> -->
													</div>
													<div class="col-2 text-end">
														<i class="text-primary" data-feather="bell"></i>
													</div>
												</div>
											</a>
										<?php endif; ?>
									<?php endforeach; ?>

									<?php foreach($dataAktivitasPeminjaman as $dap) : ?>
										<?php if($dap->StatusPeminjaman == 3 & $dap->Peringatan == 0) : ?>
											<a href="#" class="list-group-item">
												<div class="row g-0 align-items-center">
													<div class="col-2">
														<img src="<?= base_url() ?>assets-template/gambar/<?= $dap->Gambar ?>" style="width: 50pxpx; height: 70px;" alt="">
													</div>
													<div class="col-7 ms-2">
														<div class="text-dark"><?= $dap->Judul ?></div>
														<div class="text-muted small mt-1">Buku sedang anda pinjam, harap diperhatikan tanggal pengembalian.</div>
														<!-- <div class="text-muted small mt-1">30m ago</div> -->
													</div>
													<div class="col-2 text-end">
														<i class="text-danger" data-feather="alert-circle"></i>
													</div>
												</div>
											</a>
										<?php endif; ?>
									<?php endforeach; ?>

									<?php foreach($dataAktivitasPeminjaman as $dap) : ?>
										<?php if($dap->StatusPeminjaman == 3) : ?>
											<?php if($dap->Peringatan) : ?>
												<a href="#" class="list-group-item">
												<div class="row g-0 align-items-center">
													<div class="col-2">
														<img src="<?= base_url() ?>assets-template/gambar/<?= $dap->Gambar ?>" style="width: 50pxpx; height: 70px;" alt="">
													</div>
													<div class="col-7 ms-2">
														<div class="text-dark"><?= $dap->Judul ?></div>
														<div class="text-muted small mt-1">Buku yang anda pinjam melebihi batas tanggal peminjaman, silahkan segera dikembalikan atau akan mendapatkan sanksi.</div>
														<!-- <div class="text-muted small mt-1">30m ago</div> -->
													</div>
													<div class="col-2 text-end">
														<i class="text-danger" data-feather="alert-circle"></i>
													</div>
												</div>
											</a>
											<?php endif; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div class="dropdown-menu-footer">
									<!-- <a href="#" class="text-muted">Show all notifications</a> -->
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>

						<!-- <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" data-bs-target="#modalFormPinjam" data-bs-toggle="modal" data-bs-dismiss="modal">
								<div class="position-relative">
									<i class="align-middle" data-feather="heart"></i>
								</div>
							</a>
						</li> -->
						<!-- modal -->
						<div class="modal fade" id="modalFormPinjam" aria-labelledby="modalFormPinjamLabel" aria-hidden="true" tabindex="-1" >
								<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalFormPinjamLabel">Koleksi Pribadi Buku</h5>
											<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
										</div>
										<div class="modal-body">	
											<div class="row">
												<?php foreach($dataFavorit as $df) : ?>
												<div class="col-2">
													<div class="card">
														<img src="<?= base_url() ?>assets-template/gambar/<?= $df->Gambar ?>" alt="" style="width: 110px; height: 150px;">
														<p class="text-center"><?= $df->Judul; ?></p>
													</div>
												</div>
												<?php endforeach; ?>
											</div>	
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#modalDetailBuku<?= $db['BukuID'] ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Kembali</button>
        									<button class="btn btn-primary" data-bs-target="#modalFormPinjam" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
										</div>
									</div>
								</div>
							</div>
							<!-- end modal -->
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="<?= base_url() ?>assets-template/fotoprofil/<?= $user['FotoProfil'] ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?= $user['NamaLengkap'] ?>
								<?php if( $this->session->userdata('akses') == 1) : ?>
									<span class="badge bg-success">Super Admin</span>
								<?php elseif( $this->session->userdata('akses') == 2) : ?>
									<span class="badge bg-success">Admin</span>
								<?php elseif( $this->session->userdata('akses') == 3) : ?>
									<span class="badge bg-warning">Petugas</span>
								<?php endif; ?>
							</span>
							</a>
							
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="<?= base_url('user/profil') ?>"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<!-- <div class="dropdown-divider"></div> -->
								<a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="align-middle me-1" data-feather="log-out"></i>Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>