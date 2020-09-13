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
                border-top: 1px solid;
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
                                echo Date("d/m/Y", strtotime($row->date));
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
                            <?=$row->no_service?>
                        </td>
                        <td>Pelanggan</td>
                        <td style="text-align:center">:</td>
                        <td style="text-align:right">
                            <?=$row->nama == null ? "Umum" : $row->nama?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="transaction">
                <table class="transaction-table" cellspacing="0" cellpadding="0">
                        <tr style="height: 30px;">
                            <td style="width:120px"><?=$row->nama_barang?></td>
                            <td><?=$row->kategori?></td>
                            <td style="text-align:right; width:40px"></td>
                            <td style="text-align:right; width:70px">
                            <?=$row->kelengkapan?>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px dashed;width:120px">Status</td>
                            <td style="border-top: 1px dashed;"></td>
                            <td style="border-top: 1px dashed;text-align:left; padding-top:5px"></td>
                            <td style="border-top: 1px dashed;text-align:right; padding-top:5px"><?=$row->status?></td>
                        </tr>
                    
                        <tr>
                            <td colspan="4" style="border-bottom:1px dashed; padding-top:5px"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; padding-top:5px;">Keluhan</td>
                            <td colspan="3" style="text-align:left; padding-top:5px; width:105px">
                            <?=$row->keluhan?>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align:left; padding-top:5px">Kerusakan</td>
                            <td colspan="3" style="text-align:left; padding-top:5px"><?=$row->kerusakan?></td>
                        </tr>
                        <tr>
                            <td style=" text-align:left; padding-top:5px">Sparepart</td>
                            <td colspan="3" style=" text-align:left; padding-top:5px"><?=$row->sparepart?></td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px dashed;" colspan="2"></td>
                            <td style="border-top: 1px dashed; text-align:left; padding-top:5px">Biaya Service</td>
                            <td  style="border-top: 1px dashed; text-align:right; padding-top:5px"><?=$row->biaya_service?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td style=" text-align:left; padding-top:5px">Uang Muka (DP)</td>
                            <td  style=" text-align:right; padding-top:5px"><?=$row->dp?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td style="border-top: 1px dashed; text-align:left; padding-top:5px">Sisa Pembayaran</td>
                            <td  style="border-top: 1px dashed; text-align:right; padding-top:5px"><?=$row->biaya_service - $row->dp?></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border-top: 1px dashed;text-align: center; padding-top:10px"><small>*Sesuai Kesepakatan Saat Transaksi, Untuk Pembatalan Service Uang Muka Yang Telah Dibayarkan Tidak Dapat Dikembalikan!</small></td>
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

<!-- <script language="javascript">
var count = 0;
setInterval(function(){
    window.location.reload(1);
    count++;
 },5000,1);

</script> -->