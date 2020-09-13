<html moznomarginboxes mozdisallowselectionprint>
    <head>
        <title>Laporan Penjualan</title>
        <style type="text/css">
        html { font-family: "Verdana, Arial";}
            .content {
                margin: auto;
                width: 29.7cm;
                font-size: 12px;
                padding: 5px;
            }

            article{
                text-align: center;
                font-weight: bold;
            }

            .title {
                text-align: center;
                font-weight: bold;
                padding-bottom: 55px;
                padding-top: 30px;
                border-bottom: 1px solid;
            }

            .head {
                margin-top: 5px;
                margin-bottom: 10px;
                padding-bottom: 10px;
            }
            table, th, td {
                width: 1122px;
                font-size: 14px;
                border: 1px solid black;
                border-collapse: collapse;
            }

            .thanks {
                margin-top: 10px;
                padding-top: 10px;
                text-align: center;
            }

            @media print {
                @page {
                    width: 29.7cm;
                    margin: 21cm;
                }
            }
        </style>
    </head>
    <body onload="window.print()">  
        <div class="content">
            <div class="title">
            <!-- <img style='float: left; margin-left: 120px; width: 150px; height: 100px;' src='<?=site_url('assets/dist/img/photo1.png')?>'> -->
      <article >Sistem Informasi Penjualan Dan Service</article>
      <article style='font-size: 25px;'>BANDUNG COMPUTER</article>
      <article >Jl. Simpang Sungai Bilu No. 18 RT. 06 Banjarmasin Tengah, Banjarmasin 70121</article>
            </div>

            <div class="head">
            <div class=" row" style="margin-top: 10px;">
            <span style="float: left; margin-left: 50px; font-size:11px;">Data Bulan: 
            <?php 
            $bln = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
                );
            echo $bln[$bulan]
            ?></span>
                <span style="float: right; margin-right: 50px; font-size:11px;">Dicetak oleh: <?=ucfirst($this->session->userdata('nama')) ?></span>
            </div>
            </div>

            <div class="body" style="margin-top: 20px;">
            <h4 style="font-size: 16px;text-align:center">Laporan Penjualan Per Bulan</h4> 
            <table>
				<thead>
					<tr>
						<th style="width: 420px;">#</th>
						<th>No. Faktur</th>
						<th style="width: 520px; text-align:center">Tanggal</th>
						<th>Pembeli</th>
						<th style="width: 1500px; text-align:center">Nama Barang</th>
						<th>Kategori</th>
						<th style="width: 420px">Qty</th>
						<th>Total</th>
						<th >Kasir</th>
					</tr>
				</thead>
				<tbody>
          <?php $no = 1;?>
          <?php foreach ($result as $key => $data) { ?>
						<tr>
							<td style="width: 420px; text-align:center"><?= $no++; ?></td>
							<td style="text-align:center"><?= $data->no_faktur ?></td>
							<td style="width: 520px; text-align:center"><?= date('m/d/Y', strtotime($data->waktu_penjualan)) ?></td>
							<td ><?= $data->id_customer == 0 ? 'Umum' : $data->nama_customer ?></td>
							<td style="width: 1800px;"><?= $data->nama_barang ?></td>
							<td style="text-align:center"><?= $data->nama_kategori ?></td>
							<td style="width: 420px; text-align:center"><?= $data->qty ?></td>
							<td style="text-align:right"><?= rp($data->penjualan_total) ?></td>
							<td ><?= $data->nama_user ?></td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
                    <tr><td colspan="9" ></td></tr>
					<tr>
                    <td colspan="8" style="color: blue; text-align: right;">
							<?php foreach ($grand_total as $key => $data) { ?>
								<?= rp($data->grand_total) ?>
							<?php } ?>
						</td>
						<td colspan="9" style="width: 120px;text-align: center;">
							<b>Total Pendapatan</b>
						</td>
						
					</tr>
				</tfoot>
			</table>
            </div>
            <!-- <div class="thanks">
                        ~~~| Terima Kasih |~~~
                        <br>
                        Powered By SIPKom 
                        <br>
                        <small> Sistem Informasi Penjualan Komputer</small>
            </div> -->
        </div>
    </body>
</html>