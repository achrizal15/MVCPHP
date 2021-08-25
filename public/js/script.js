
$(function () {
    $(".detailBarang").on("click", function () {
        const id = $(this).data('id');
        $.ajax({
            url: "http://localhost/MVCPHP/public/barang/detail",
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $(".card-body h5[class=card-title]").html(data.br_nama);
                $(".card img").attr("src",'img/'+data.gambar)

            }
        })
    })
    $('.tambahData').on('click', function () {
        $("#exampleModalLabel").html("Tambah Data")
        $(".modal-footer button[type=submit]").html('Tambah Data')
        $('#email').val("")
        $('#nama').val("")
    })
    $('.modalEdit').on('click', function () {
        $("#exampleModalLabel").html("Edit Data");
        $(".modal-footer button[type=submit]").html('Update');
        $(".modal-content form").attr('action', "http://localhost/MVCPHP/public/kasir/editKasir");
        const id = $(this).data('id');
        $.ajax({
            url: "http://localhost/MVCPHP/public/kasir/getEdit/" + id,
            method: 'get',
            dataType: 'json',
            success: function (data) {
                $('#email').val(data.email);
                $('#nama').val(data.nama);
                $('#id').val(id);
            }
        })
    });
});
