<html moznomarginboxes mozdisallowselectionprint>
    <head>
        <title>SIPKom - Print Nota</title>
        <style type="text/css">
        html { font-family: "Verdana, Arial";}
            .content {
                width: 80mm;
                font-size: 12px;
                padding: 5px;
            }

            .title {
                text-align: center;
                font-size: 13px;
                padding-bottom: 5px;
                border-bottom: 1px dashed;
            }

            .head {
                margin-top: 5px;
                margin-bottom: 10px;
                padding-bottom: 10px;
                border-bottom: 1px solid;
            }
            table {
                width: 100%;
                font-size: 12px;
            }

            .thanks {
                margin-top: 10px;
                padding-top: 10px;
                text-align: center;
                border-top: 1px dashed;
            }

            @media print {
                @page {
                    width: 80mm;
                    margin: 0mm;
                }
            }
        </style>
    </head>
    <body onload="window.print()">
        <div class="content">
            <div class="title">
                <b>Bandung Computer</b>
                <br>
                <small>
                Jl. Simpang Sungai Bilu No. 18 RT. 06, Banjarmasin 70121
                </small>
            </div>

            <div class="head">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="width:160px">
                            <?php
                                echo Date("d/m/Y", strtotime($sale->date))." ". Date('H:i', strtotime($sale->waktu_penjualan));
                            ?>
                        </td>
                        <td style="width:50px">Kasir</td>
                        <td style="text-align:center; width:10px">:</td>
                        <td style="text-align:right;">
                            <?=ucfirst($sale->nama_user)?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <?=$sale->no_faktur?>
                        </td>
                        <td>Pelanggan</td>
                        <td style="text-align:center">:</td>
                        <td style="text-align:right">
                            <?=$sale->id_customer == null ? "Umum" : $sale->nama_customer?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="transaction">
                <table class="transaction-table" cellspacing="0" cellpadding="0">
                    <?php
                        $arr_discount = array();
                        foreach ($sale_detail as $key => $value) {?>

                        <tr>
                            <td style="width:90px"><?=$value->nama?></td>
                            <td><?=$value->qty?></td>
                            <td style="text-align:right; width:60px"><?=rp($value->harga)?></td>
                            <td style="text-align:right; width:60px">
                            <?=rp(($value->harga - $value->diskon_barang) * $value->qty)?>
                            </td>
                        </tr>

                        <?php
                        if ($value->diskon_barang > 0) {
                            $arr_discount[] = $value->diskon_barang;
                        }
                    }
                    
                        foreach ($arr_discount as $key => $value) {?>
                        <tr>
                            <td></td>
                            <td colspan="2" style="text-align:right">Disc. <?=($key+1)?></td>
                            <td style="text-align:right"><?=rp($value)?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4" style="border-bottom:1px dashed; padding-top:5px"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td style="text-align:right; padding-top:5px;">Sub Total</td>
                            <td style="text-align:right; padding-top:5px; width:105px">
                            <?=rp($sale->subtotal)?>
                            </td>
                        </tr>

                        <?php if($sale->diskon > 0 ) {?>
                        <tr>
                            <td colspan="2"></td>
                            <td style="text-align:right; padding-top:5px">Diskon Sale</td>
                            <td style="text-align:right; padding-top:5px"><?=rp($sale->diskon)?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="2"></td>
                            <td style="border-top: 1px dashed; text-align:right; padding-top:5px">Grand Total</td>
                            <td style="border-top: 1px dashed; text-align:right; padding-top:5px"><?=rp($sale->total)?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td style="border-top: 1px dashed; text-align:right; padding-top:5px">Uang Cash</td>
                            <td style="border-top: 1px dashed; text-align:right; padding-top:5px"><?=rp($sale->dibayarkan)?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td style="border-top: 1px dashed; text-align:right; padding-top:5px">Uang Kembalian</td>
                            <td style="border-top: 1px dashed; text-align:right; padding-top:5px"><?=rp($sale->kembalian)?></td> 
                        </tr>
                </table>
            </div>
            <div class="thanks">
                        ~~~| Terima Kasih |~~~
                        <br>
                        Powered By SIPSKom 
                        <br>
                        <small> "Sistem Informasi Penjualan & Service Komputer"</small>
            </div>
        </div>
    </body>
</html>