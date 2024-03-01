<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>
    <table>
		<thead>
			<tr>
			    <th>No</th>
					<th>ID</th>
				    <th>Buku</th>
					<th>Pengguna</th>
				    <th>Status</th>
					<th>Tanggal</th>
				</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
		    <?php foreach($dataLaporanHarian as $dl) : ?>
			<tr>
				<td><?= $i ?></td>
				<td><?= $dl->PeminjamanID ?></td>
				<td><img src="<?= base_url() ?>assets-template/gambar/<?= $dl->Gambar ?>" alt="" class="me-2" style="width: 35px; height: 50px;"><?= $dl->Judul ?></td>
				<td><?= $dl->Username ?></td>
				<td>
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
				<td><?= $dl->TanggalPengembalian ?></td>
			</tr>
				<?php $i++; ?>
			    <?php endforeach; ?>
		</tbody>
	</table>
</body></html>