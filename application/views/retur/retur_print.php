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
                                echo Date("d/m/Y", strtotime($row->tgl_retur))." ". Date('H:i', strtotime($row->tgl_retur));
                            ?>
                        </td>
                        <td style="width:50px">Kasir</td>
                        <td style="text-align:center; width:10px">:</td>
                        <td style="text-align:right;">
                            <?=ucfirst($this->session->userdata('nama'))?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <?=$row->no_retur?>
                        </td>
                        <td>Pelanggan</td>
                        <td style="text-align:center">:</td>
                        <td style="text-align:right">
                            <?=$row->nama_customer == null ? "Umum" : $row->nama_customer?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="transaction">
                <table class="transaction-table" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="width:180px"><?=$row->nama_barang?></td>
                            <td><?=$row->qty?></td>
                            <td style="text-align:right; width:10px"></td>
                            <td style="text-align:right; width:60px">
                            <?=$row->harga_jual?>
                            </td>
                        </tr>
                    
                        <tr>
                            <td colspan="4" style="border-bottom:1px dashed; padding-top:5px"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td style="text-align:right; padding-top:5px;">Qty Retur</td>
                            <td style="text-align:right; padding-top:5px; width:105px">
                            <?=$row->qty_retur?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"></td>
                            <td style="border-top: 1px dashed;text-align:right; padding-top:5px"></td>
                            <td style="border-top: 1px dashed;text-align:right; padding-top:5px"><?=($row->harga_jual / $row->qty) * $row->qty_retur?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td style=" text-align:right; padding-top:5px">Denda</td>
                            <td style=" text-align:right; padding-top:5px"><?=$row->denda?> %</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td style="border-top: 1px dashed; text-align:right; padding-top:5px">Total Retur</td>
                            <td style="border-top: 1px dashed; text-align:right; padding-top:5px"><?=$row->total_retur?></td>
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