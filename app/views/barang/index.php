<div class="container">
<table class="table table-striped">
<thead>
    <th>ID</th>
    <th>NAMA</th>
    <th>HARGA</th>
    <th>GAMBAR</th>
</thead>
<tbody>
    <?php $i=1; foreach($data['barang'] as $barang):  ?>
        <tr>
            <td><?= $barang['br_id']  ?></td>
            <td><?= $barang['br_nama']  ?></td>
            <td><?= $barang['harga']  ?></td>
            <td><?= $barang['gambar']  ?></td>
        </tr>
        <?php endforeach;  ?>
</tbody>
</table>
</div>