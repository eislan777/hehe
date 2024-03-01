
<div class="wrapper	">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="<?= base_url('menu/index') ?>">
          <span class="align-middle">We are Love</span>
        </a>

				<ul class="sidebar-nav">

                <?php if( $title == 'Dashboard') : ?>
					<li class="sidebar-item active">
                <?php else : ?>
                    <li class="sidebar-item">
                <?php endif; ?>
						<a class="sidebar-link" href="<?= base_url('menu/index') ?>">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

				<?php if (($this->session->userdata('akses') == 2) || ($this->session->userdata('akses') == 3)) : ?>
				<?php else : ?>
                <?php if( $title == 'Pinjam') : ?>
					<li class="sidebar-item active">
                <?php else : ?>
                    <li class="sidebar-item">
                <?php endif; ?>						
                        <a class="sidebar-link" href="<?= base_url('menu/pinjam') ?>">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Pinjam</span>
            </a>
					</li>

					<?php endif; ?>


                    <li class="sidebar-header">
						Profil
					</li>

					<?php if( $title == 'Profil') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>	
						<a class="sidebar-link" href="<?= base_url('user/profil') ?>">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
					</li>

					<?php if (($this->session->userdata('akses') == 2) || ($this->session->userdata('akses') == 3)) : ?>
					<?php else : ?>
                    <li class="sidebar-header">
						Aktivitas
					</li>

					<?php if( $title == 'Aktivitas Peminjaman') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>	
						<a class="sidebar-link" href="<?= base_url('user/aktivitasPeminjaman') ?>">
              <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Aktivitas Peminjaman</span>
            </a>
					</li>

					<?php if( $title == 'History Peminjaman') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>	
						<a class="sidebar-link" href="<?= base_url('user/historyPeminjaman') ?>">
              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">History Peminjaman</span>
            </a>
					</li>

					<?php if( $title == 'Favorit') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>	
						<a class="sidebar-link" href="<?= base_url('user/favorit') ?>">
              <i class="align-middle" data-feather="heart"></i> <span class="align-middle">Favorit</span>
            </a>
					</li>

					<?php endif; ?>

					<?php if( $this->session->userdata('akses') == 4) :  ?>
					<?php else : ?>
					<li class="sidebar-header">
						Master Data
					</li>

					<?php if( $title == 'Data Buku') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>		
						<a class="sidebar-link" href="<?= base_url('admin/dataBuku') ?>">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Data Buku</span>
            </a>
					</li>

					<?php if( $title == 'Data Kategori') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>		
						<a class="sidebar-link" href="<?= base_url('admin/dataKategori') ?>">
              <i class="align-middle" data-feather="menu"></i> <span class="align-middle">Data Kategori</span>
            </a>
					</li>

					<?php if (($this->session->userdata('akses') == 2) || ($this->session->userdata('akses') == 3)) : ?>
					<?php else : ?>

					<?php if( $title == 'Data Admin') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>	
						<a class="sidebar-link" href="<?= base_url('admin/dataAdmin') ?>">


              <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Data Admin</span>
            </a>
					</li>

					<?php endif; ?>

					<?php if (($this->session->userdata('akses') == 3)) : ?>
					<?php else : ?>

					<?php if( $title == 'Data Petugas') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>	
						<a class="sidebar-link" href="<?= base_url('admin/dataPetugas') ?>">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Petugas</span>
            </a>
					</li>

					<?php endif; ?>


					<?php if( $title == 'Data Pengguna') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>
						<a class="sidebar-link" href="<?= base_url('admin/dataPengguna') ?>">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data Pengguna</span>
            </a>
					</li>

					<li class="sidebar-header">
						Master Aktivitas Buku
					</li>

					<?php if( $title == 'Aktivitas Pinjam User') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>	
						<a class="sidebar-link" href="<?= base_url('admin/aktivitasPeminjaman') ?>">
              <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Aktivitas Pinjam User</span>
            </a>
					</li>

					<?php if( $title == 'Aktivitas Rating User') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>	
						<a class="sidebar-link" href="<?= base_url('admin/aktivitasRating') ?>">
              <i class="align-middle" data-feather="star"></i> <span class="align-middle">Aktivitas Rating User</span>
            </a>
					</li>

					<?php if( $title == 'Generate Laporan') : ?>
						<li class="sidebar-item active">
					<?php else : ?>
						<li class="sidebar-item">
					<?php endif; ?>	
						<a class="sidebar-link" href="<?= base_url('admin/generateLaporan') ?>">
              <i class="align-middle" data-feather="save"></i> <span class="align-middle">Laporan Peminjaman</span>
            </a>
					</li>
					<br><br><br><br><br><br>

					<!-- <li class="sidebar-header">
						Plugins & Addons
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.html">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="maps-google.html">
              <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
            </a>
					</li> -->
					<?php endif; ?>
				</ul>

				<!-- <div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Upgrade to Pro</strong>
						<div class="mb-3 text-sm">
							Are you looking for more components? Check out our premium version.
						</div>
						<div class="d-grid">
							<a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
						</div>
					</div>
				</div> -->
			</div>
		</nav>