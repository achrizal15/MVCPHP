<div class="container mt-3">
    <h3 class="mb-4">DAFTAR KASIR TOKO SRIWANGI</h3>
    <!-- Button trigger modal -->
    <?php if (isset($data['error'])) :  ?>
        <p>ERROR</p>
        <?php else:  ?>
            <p></p>
    <?php endif;  ?>
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
    </button>
    <div class="row">
        <div class="col-6">
            <ol class="list-group">
                <?php
                foreach ($data['kasir'] as $kasir) : ?>
                    <li width="20" class="list-group-item d-flex justify-content-between align-items-start"> <?= $kasir['nama']  ?> <a class="btn btn-primary rounded-pill btn-sm" style="font-size: 12px;" href="<?= URLPUBLIC; ?>/kasir/detail/<?= $kasir['id'] ?>">Detail</a>
                    </li>
                <?php endforeach;  ?>
            </ol>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= URLPUBLIC; ?>/kasir/tambah" method="post">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" autocomplete="off">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="nama" id="floatingInput" placeholder="Jon Seana Alexander" autocomplete="off">
                        <label for="floatingInput">Nama</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>