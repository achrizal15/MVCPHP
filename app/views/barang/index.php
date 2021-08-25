<div class="container">
    <h3>Daftar Barang</h3>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Tambah Produk
    </button>
    <?php FlashMessage::getMessage();  ?>
    <table class="table table-striped">
        <thead>
            <th>NO</th>
            <th>ID</th>
            <th>NAMA</th>
            <th>HARGA</th>
            <th>GAMBAR</th>
            <th>AKSI</th>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data['barang'] as $barang) :  ?>
                <tr>
                    <td><?= $i++  ?></td>
                    <td><?= "BR" . $barang['br_id']  ?></td>
                    <td><?= $barang['br_nama']  ?></td>
                    <td><?= "Rp." . $barang['harga']  ?></td>
                    <td><?= $barang['gambar']  ?></td>
                    <td>
                    <a href="<?= URLPUBLIC ?>/barang/selectSingle/<?= $barang['br_id'] ?>" class="detailBarang">Edit Data</a>
                        <a href="" class="detailBarang" data-bs-toggle="modal" data-bs-target="#detailStatic" data-id="<?= $barang['br_id']  ?>">detail</a>
                        <a href="<?= URLPUBLIC ?>/barang/hapus/<?= $barang['br_id'] ?>/<?= $barang['gambar'] ?>">DELETE</a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>
<!-- Modal TAMBAH DAN UBAH-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Produk</h5>
            </div>
            <form action="<?= URLPUBLIC; ?>/barang/tambah" method="post" enctype='multipart/form-data'>
                <div class="modal-body">
                    <!-- email -->
                    <div class="form-floating mb-3 ">
                        <input type="text" class="form-control" name="nama" id="floatingInput" placeholder="Sampo">
                        <label for="floatingInput">Nama Produk</label>
                    </div>
                    <!-- HAGGA -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input name="harga" type="number" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="basic-addon1">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Input gambar produk</label>
                        <input name="gambar" class="form-control" type="file" id="formFile" accept="image/*" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL DETAILLL -->
<div class="modal fade" id="detailStatic" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body mx-auto d-block">
                <div class="card" style="width: 18rem;">
                    <img src="img/IMG256126100a982db.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">ACH RIZAL</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>