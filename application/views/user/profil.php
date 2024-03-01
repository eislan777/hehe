            <main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<div class="row">
							<div class="col-3">
								<h1 class="h3 d-inline align-middle">Profil Peminjam</h1>
							</div>
							<div class="col-5 ">
								<?php if( empty($user['Alamat']) && empty($user['NoTelepon'])) :  ?>
									<a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
										Lengkapi data penting anda!
									</a>
								<?php endif; ?>
							</div>
						</div>
						<div class="row">
						<div class="col text-center">
							<?= $this->session->flashdata('message'); ?>
						</div>
					</div>

					</div>
					<div class="row">
						<div class="col-3">
							<div class="card mb-3">
								<div class="card-header">
									<!-- <h5 class="card-title mb-0">Profil Detail</h5> -->
								</div>
								<div class="card-body text-center">
									<img src="<?= base_url() ?>assets-template/fotoprofil/<?= $user['FotoProfil'] ?>" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<form action="">
										<div class="form-edit">
											
										</div>
									</form>
									<h5 class="card-title mb-2"><?= $user['NamaLengkap'] ?></h5>
								</div>
								<hr class="my-0" />
								<!-- <div class="card-body">
									<h5 class="h6 card-title">Skills</h5>
									<a href="#" class="badge bg-primary me-1 my-1">HTML</a>
									<a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
									<a href="#" class="badge bg-primary me-1 my-1">Sass</a>
									<a href="#" class="badge bg-primary me-1 my-1">Angular</a>
									<a href="#" class="badge bg-primary me-1 my-1">Vue</a>
									<a href="#" class="badge bg-primary me-1 my-1">React</a>
									<a href="#" class="badge bg-primary me-1 my-1">Redux</a>
									<a href="#" class="badge bg-primary me-1 my-1">UI</a>
									<a href="#" class="badge bg-primary me-1 my-1">UX</a>
								</div> -->
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Tentang</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Alamat <a href="#"><?= $user['Alamat'] ?></a></li>
										<li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Pekerjaan <a href="#"><?= $user['Pekerjaan'] ?></a></li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> No. Telepon <a href="#"><?= $user['NoTelp'] ?></a></li>
									</ul>
								</div>
								<hr class="my-0" />
								<!-- <div class="card-body">
									<h5 class="h6 card-title">Elsewhere</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><a href="#">staciehall.co</a></li>
										<li class="mb-1"><a href="#">Twitter</a></li>
										<li class="mb-1"><a href="#">Facebook</a></li>
										<li class="mb-1"><a href="#">Instagram</a></li>
										<li class="mb-1"><a href="#">LinkedIn</a></li>
									</ul>
								</div> -->
							</div>
						</div>

                        <div class="col-9">
                            <div class="card ">
								<div class="card-header">
									<div class="row">
										<div class="col-5">
											<h5 class="card-title mb-0">Biodata</h5>
										</div>
										
									</div>
								</div>
								<div class="card-body">
                                    <form action="<?= base_url() ?>user/editProfil/<?= $user['UserID'] ?>" method="post">
                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
                                                <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" value="<?= set_value('nama_lengkap', $user['NamaLengkap']) ?>">
                                                <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="recipient-name" class="col-form-label">Username:</label>
                                                <input type="text" name="username" class="form-control" placeholder="Masukkan username" value="<?= set_value('username', $user['Username']) ?>">
                                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="recipient-name" class="col-form-label">Email:</label>
                                                <input type="text" class="form-control" placeholder="Masukkan email" value="<?= $user['Email'] ?>" readonly>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="recipient-name" class="col-form-label">No Telepon:</label>
                                                <input type="text" name="no_telp" class="form-control" placeholder="Masukkan email" value="<?= set_value('no_telp', $user['NoTelp']) ?>">
												<?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="recipient-name" class="col-form-label">Pekerjaan:</label>
												<select name="pekerjaan" id="" class="form-control form-select">
													<option value="">Pilih</option>
													<option value="Pelajar/Mahasiswa" <?= ('Pelajar/Mahasiswa' == $user['Pekerjaan']) ? 'selected' : '' ?>>Pelajar/Mahasiswa</option>
													<option value="Pegawai Negeri Sipil" <?= ('Pegawai Negeri Sipil' == $user['Pekerjaan']) ? 'selected' : '' ?>>Pegawai Negeri Sipil</option>
													<option value="Karyawan Swasta" <?= ('Karyawan Swasta' == $user['Pekerjaan']) ? 'selected' : '' ?>>Karyawan Swasta</option>
													<option value="Ibu Rumah Tangga" <?= ('Ibu Rumah Tangga' == $user['Pekerjaan']) ? 'selected' : '' ?>>Ibu Rumah Tangga</option>
												</select>
												<?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
                                            </div>
											<div class="col-6 mb-2">
                                                <label for="recipient-name" class="col-form-label">Pesan:</label>
                                                <input type="text" name="pesan" class="form-control" placeholder="Masukkan pesan" value="<?= $user['Pesan'] ?>">
												<?= form_error('pesan', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <label for="recipient-name" class="col-form-label">Alamat:</label>
                                                <textarea name="alamat" id="" class="form-control" cols="10" rows="3" value="<?= $user['Alamat'] ?>"><?= $user['Alamat'] ?></textarea>
                                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-3">
                                                    <button type="submit" class="btn btn-success px-4">Edit Profil</button>
                                                </div>
                                                <div class="col-4">
                                                    <a href="" class="btn btn-secondary">Ganti Password</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
                        </div>
					</div>

				</div>
			</main>