            <main class="content">
				<div class="container-fluid p-0">

				<h1 class="h3 mb-3"><strong>Data</strong> Pengguna</h1>
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
                                        <h5 class="card-title mb-0"></h5>
                                    </div>
                                    <div class="col-2">
									
									</div>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Nama</th>
											<th class="d-none d-xl-table-cell">Username</th>
											<th class="d-none d-xl-table-cell">Email</th>
											<th class="d-none d-md-table-cell">Role</th>
											<th class="d-none d-md-table-cell">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach($dataPengguna as $dp) : ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $dp['NamaLengkap'] ?></td>
											<td class="d-none d-xl-table-cell"><?= $dp['Username'] ?></td>
											<td class="d-none d-xl-table-cell"><?= $dp['Email'] ?></td>
											<td><span class="badge bg-info">Pengguna</span></td>
											<td>
												<a href="<?= base_url() ?>admin/detailPengguna/<?= $dp['UserID'] ?>" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#modalView<?= $dp['UserID'] ?>"><i data-feather="eye"></i></a>
												<a href="<?= base_url() ?>admin/hapusPengguna/<?= $dp['UserID'] ?>" class="btn btn-danger" onclick="return confirm('yakin?')"><i data-feather="trash"></i></a>
												<a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditPengguna<?= $dp['UserID'] ?>"><i data-feather="edit"></i></a>

												<!-- Modal edit petugas -->
												<div class="modal fade" id="modalEditPengguna<?= $dp['UserID'] ?>" tabindex="-1" aria-labelledby="modalEditPenggunaLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalEditPenggunaLabel">Edit Pengguna</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form method="post" action="<?= base_url() ?>admin/editPengguna/<?= $dp['UserID'] ?>">
																<div class="row">
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
																			<input type="text" name="nama_lengkap" class="form-control" id="recipient-name" placeholder="Masukkan nama lengkap" value="<?= $dp['NamaLengkap'] ?>">
																			<?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Username:</label>
																			<input type="text" name="username" class="form-control" id="recipient-name" placeholder="Masukkan username" value="<?= $dp['Username'] ?>">
																			<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Email:</label>
																			<input type="text" name="email" class="form-control" id="recipient-name" placeholder="Masukkan email" value="<?= $dp['Email'] ?>">
																			<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			<label for="recipient-name" class="col-form-label">Password:</label>
																			<input type="password" name="password" class="form-control" id="recipient-name" placeholder="Masukkan password" value="<?= $dp['Password'] ?>">
																			<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	
																</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
															<button type="submit" class="btn btn-primary">Edit Pengguna</button>
														</div>
													</div>
												</form>
													</div>
													</div>   
												<!-- End of modal edit petugas -->

												<!-- Modal view -->
												<div class="modal fade" id="modalView<?= $dp['UserID'] ?>" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalViewLabel">Profil Pengguna</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<h5>Nama : <b><?= $dp['NamaLengkap'] ?></b></h5>
															<h5>Username : <b><?= $dp['Username'] ?></b></h5>
															<h5>Email : <b><?= $dp['Email'] ?></b></h5>
															<h5>Password : <b><?= $dp['Password'] ?></b></h5>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
														</div>
													</div>   
												<!-- End of modal view -->
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