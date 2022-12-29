
<div class="row">
  <div class="col-4">
    <?php Flasher::flash() ?>
  </div>
</div>

<div class="row">
  <div class="col-lg-6">
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-5 tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
     Tambah Data!
    </button>

  </div>
</div>

<div class="row">
  <div class="col-lg-6">
    <form action="<?php echo BASEURL ?>/siswa/cari" method="post">
            <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari siswa..." name="keyword" id="keyword" autocomplete="off">
        <button class="btn btn-primary" type="submit" id="tombolCari">Cari!</button>
      </div>

    </form>
  </div>
</div>

<div class="row">
  <h2>Daftar siswa</h2>
<div class="col-6">
<ul class="list-group  mt-5">
  <?php foreach($data['mhs'] as $mhs): ?>
    <li class="list-group-item list-group-item-dark">
      <?php echo $mhs['nama']; ?>
      <a href="<?php echo BASEURL ?>/siswa/detail/<?php echo $mhs['id']; ?>" class="badge bg-primary rounded-pill float-end m-1">detail</a>

       <a href="<?php echo BASEURL ?>/siswa/ubah/<?php echo $mhs['id']; ?>" class="badge bg-success rounded-pill float-end m-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?php echo $mhs['id']; ?>">ubah</a>

      <a href="<?php echo BASEURL ?>/siswa/hapus/<?php echo $mhs['id']; ?>" class="badge bg-danger rounded-pill float-end m-1" onclick="return confirm('Anda yakin?')">hapus</a>

      
      </li>
  <?php endforeach; ?>
</ul>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


        <div class="modal-body">

      <form action="<?php echo BASEURL ?>/siswa/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>

          <div class="mb-3">
            <label for="nrp" class="form-label">NISN</label>
            <input type="number" class="form-control" id="nisn" name="nisn">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas">
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Kirim!</button>
        </div>

      </form>

    </div>
  </div>
</div>



