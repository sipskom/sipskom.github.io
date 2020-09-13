<?php $no = 1;
                            if($cart->num_rows()>0){
                                foreach($cart->result() as $c => $data) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data->barcode?></td>
                                <td><?=$data->nama_barang?></td>
                                <td class="text-right"><?=$data->harga_ker?></td>
                                <td class="text-center"><?=$data->qty?></td>
                                <td class="text-right"><?=$data->diskon_barang?></td>
                                <td class="text-right" id="total"><?=$data->total?></td>
                                <td class="text-center" width="160px">
                                    <button id="update_cart" data-toggle="modal" data-target="#mbarang_edit"
                                    data-idcart="<?=$data->id_keranjang?>"
                                    data-barcode="<?=$data->barcode?>"
                                    data-harga="<?=$data->harga?>"
                                    data-barang="<?=$data->nama_barang?>"
                                    data-qty="<?=$data->qty?>"
                                    data-diskon="<?=$data->diskon_barang?>"
                                    data-total="<?=$data->total?>"
                                    class="btn btn-xs btn-primary">
                                    <i class="fa fa-edit"></i> Update</button>
                                    <button id="del_cart" data-idcart="<?=$data->id_keranjang?>" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"> Hapus</i></button>
                                </td>
                            </tr>
                                <?php }
                            } else {
                                echo '<tr>
                                    <td colspan="8" class="text-center">Tidak Ada Item</td>
                                </tr>';
                            } ?>