<div class="container">

    <div class="row">
        <div class="col-4 mt-4">
            <h3>EDIT DATA</h3>
            <form name="update" enctype="multipart/form-data" action="<?= URLPUBLIC; ?>/barang/editData" method="post">
                <!-- HIDDEN -->
                <input type="text" name="br_id" value="<?= $data['barang']['br_id'] ?>" readonly hidden>
                <input type="text" name="gambarlawas" value="<?= $data['barang']['gambar'] ?>" readonly hidden>
                <!-- email -->
                <div class="form-floating mb-3 ">
                    <input type="text" class="form-control" name="nama" id="floatingInput" value="<?= $data['barang']['br_nama'] ?>" placeholder="Sampo">
                    <label for="floatingInput">Nama Produk</label>
                </div>
                <!-- HAGGA -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input name="harga" value="<?= $data['barang']['harga'] ?>" type="number" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="basic-addon1">
                </div>
                <img width="100" src="<?= URLPUBLIC ?>/img/<?= $data['barang']['gambar'] ?>" alt="">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Input baru gambar produk</label>
                    <input name="gambar" value="" class="form-control" type="file" id="formFile" accept="image/*" />
                </div>
                <button type="submit" name="update" class='btn btn-primary'>UPDATE DATA</button>
            </form>
        </div>
    </div>
</div>
<!-- <script>
    document.update.submit();
</script> -->