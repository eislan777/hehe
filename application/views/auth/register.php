<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Daftarkan Akun Anda</h1>
							<p class="lead">
                                Mulailah untuk mendaftarkan sesi anda disini
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form method="post" action="<?= base_url('auth/register') ?>">
										<div class="mb-3">
											<label class="form-label">Nama Lengkap</label>
											<input class="form-control form-control-lg" type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap..." value="<?= set_value('nama_lengkap') ?>" />
                                            <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
										</div>
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Masukkan username..." value="<?= set_value('username') ?>" />
                                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Masukkan email..." value="<?= set_value('email') ?>"/>
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
										</div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input class="form-control form-control-lg" type="password" name="password1" placeholder="Masukkan password" />
                                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Ketik ulang Password</label>
                                                    <input class="form-control form-control-lg" type="password" name="password2" placeholder="Ketik Ulang password" />
                                                </div>
                                            </div>
                                        </div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Login</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Sudah memiliki akun? <a href="<?= base_url('auth/login') ?>">Login </a>sekarang!
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>