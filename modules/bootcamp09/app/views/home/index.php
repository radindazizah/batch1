<div class="container mt-5">
    <div class="row">
        <div class="col-6">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data
        </button>

            <h1>Data Karyawan</h1>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Created Time</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ( $data['kry'] as $kry) : ?>
                    <tr>
    
                        <td><?= $kry['nik']; ?></td>
                        <td><?= $kry['nama']; ?></td>
                        <td><?= $kry['tempat_lahir']; ?></td>
                        <td><?= $kry['tanggal_lahir']; ?></td>
                        <td><?= $kry['umur']; ?></td>
                        <td><?= $kry['alamat']; ?></td>
                        <td><?= $kry['telp']; ?></td>
                        <td><?= $kry['jabatan']; ?></td>
                        <td><?= $kry['created_by']; ?></td>
                        <td><?= $kry['created_time']; ?></td>
                        <td><a href="" class="badge text-bg-primary">Edit</a></td>
                        <td>Edit</td>
                    </tr>
                
                <?php endforeach; ?>
                </tbody>
            </table>

</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data Karyawan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tambah Data</button>
      </div>
    </div>
  </div>
</div>
