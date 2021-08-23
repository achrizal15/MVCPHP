<div class="container mt-3">
    <h3 class="mb-4">DAFTAR KASIR TOKO SRIWANGI</h3>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success mb-3 tambahData" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
    </button>
    <div class="row">
        <div class="col-6">
            <form action="<?= URLPUBLIC; ?>/kasir/searchKasir" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari nama disini" aria-label="Cari nama disini" name="cari" aria-describedby="button-addon2">
                    <button name="btncari" class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>

            <?php FlashMessage::getMessage(); ?>
            <ol class="list-group">
                <?php $i = 1;
                foreach ($data['kasir'] as $kasir) : ?>
                    <li width="20" class="list-group-item d-flex justify-content-between align-items-start"> <?= $kasir['nama']; ?>

                        <div>
                            <!-- DETAIL -->
                            <a class="btn btn-primary rounded-pill btn-sm" style="font-size: 12px;" href="<?= URLPUBLIC; ?>/kasir/detail/<?= $kasir['id'] ?>">Detail</a>
                            <!-- EDIT -->
                            <a class="btn btn-warning rounded-pill btn-sm modalEdit" style="font-size: 12px;" data-bs-target="#exampleModal" data-bs-toggle="modal" data-id="<?= $kasir['id'] ?>" data-nama="<?= $kasir['nama'] ?>">Edit</a>
                            <!-- HAPUS-->
                            <a class="btn btn-danger rounded-pill btn-sm" style="font-size: 12px;" href="<?= URLPUBLIC; ?>/kasir/hapus/<?= $kasir['id'] ?>">Delete</a>
                        </div>

                    </li>
                <?php endforeach;  ?>
            </ol>
            <nav aria-label="Page navigation example">
                <?php if (isset($data['keyword'])) : ?>
                    <ul class="pagination mt-3">
                    <?php if ($data['halamanAktif'] > 1) : ?>
                            <li class="page-item"><a class="page-link" href="<?= URLPUBLIC; ?>/kasir/pagination/<?= $data['halamanAktif'] - 1 ?>/<?= $data['keyword'] ?>">Previous</a></li>
                        <?php else :  ?>
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <?php endif;  ?>
                        <?php if ($data['halamanAktif'] < $data['jumlahHalaman']) : ?>
                            <li class="page-item"><a class="page-link" href="<?= URLPUBLIC; ?>/kasir/pagination/<?= $data['halamanAktif'] + 1 ?>/<?= $data['keyword'] ?>">Next</a></li>
                        <?php else :  ?>
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                        <?php endif;  ?>
                    </ul>
                <?php else :  ?>
                    <ul class="pagination mt-3">
                        <?php if ($data['halamanAktif'] > 1) : ?>
                            <li class="page-item"><a class="page-link" href="<?= URLPUBLIC; ?>/kasir/pagination/<?= $data['halamanAktif'] - 1 ?>">Previous</a></li>
                        <?php else :  ?>
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <?php endif;  ?>
                        <?php $i = 1;
                        while ($i <= $data['jumlahHalaman']) : ?>
                            <?php if ($data['halamanAktif'] == $i) : ?>
                                <li class="page-item active"><a class="page-link" href="<?= URLPUBLIC; ?>/kasir/pagination/<?= $i ?>">
                                        <?= $i;  ?>
                                    </a></li> <?php else :  ?>
                                <li class="page-item"><a class="page-link" href="<?= URLPUBLIC; ?>/kasir/pagination/<?= $i ?>">
                                        <?= $i;  ?>
                                    </a></li>
                            <?php endif;  ?>
                        <?php $i++;
                        endwhile;  ?>
                        <?php if ($data['halamanAktif'] < $data['jumlahHalaman']) : ?>
                            <li class="page-item"><a class="page-link" href="<?= URLPUBLIC; ?>/kasir/pagination/<?= $data['halamanAktif'] + 1 ?>">Next</a></li>
                        <?php else :  ?>
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                        <?php endif;  ?>
                    </ul>
                <?php endif;  ?>
            </nav>
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
                        <input type="text" name="id" id="id" hidden readonly>
                        <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com" autocomplete="off">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Jon Seana Alexander" autocomplete="off">
                        <label for="nama">Nama</label>
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