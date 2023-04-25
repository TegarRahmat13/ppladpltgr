<?php
include "../temp.php"

?>



<section class="kemitraan__section container table table-bordered"  style="margin: auto;width:50%;margin-top:5%">
    <div class="back__tombol">
        <i class="ri-arrow-left-circle-fill"></i>
        <a href="agro_kemitraan.php" style="text-decoration: none;color:gray">
            <h3>List surat</h3>
        </a>
    </div>
    <div class="kemitraan__table ">
        <div class="table-wrapper">
            <table class="fl-table container table table-bordered">
                <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pengaju</th>
                    <th>Detail</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Bapak Katman</td>
                    <td>
                    <a href="agro_mitradetail.php">
                    <button type="button" class="btn btn-info">Lihat</button>
                    </td>
                    </a>
                    <td>
                        <div class="td__status">
                            <p class="td__setuju">SETUJU</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Bapak Katman</td>
                    <td>
                    <a href="">
                        <div class="td__detail">
                            <p class="td__">DETAIL</p>
                        </div>
                    </td>
                    </a>
                    <td>
                        <div class="td__status">
                            <p class="td__batal">BATAL</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bapak Katman</td>
                    <td>
                    <a href="">
                        <div class="td__detail">
                            <p class="td__">DETAIL</p>
                        </div>
                    </td>
                    </a>
                    <td>
                        <div class="td__status">
                            <p class="td__">PROSES</p>
                        </div>
                    </td>
                </tr>
                <tbody>
            </table>
        </div>
    </div>
</section>
</body>