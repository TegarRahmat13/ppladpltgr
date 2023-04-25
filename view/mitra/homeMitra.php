<?php

include "../temp.php"
?>

<style>
    h3 {
        color: white;
    }

    .mitrabtn {
        padding: 50px;
        background-color: #159895;
        border-radius: 30px;
        display: flex;
        cursor: pointer;
    }

    .mitrabtn img {
        width: 40px !important;
        height: 40px !important;
        margin-top: 10px;
        margin-right: 2%;
    }
    a{
        text-decoration: none;
    }
</style>

<div class="btnmitra" style="margin: auto;width:40%;margin-top:5%">
    <div class="mitrabtn" style="margin-bottom: 2%;">
        <img src="../../image/mdi_user-multiple.png" alt="">
        <h3>Jumlah Mitra</h3>
    </div>
    <a href="../agro/tampilFormulirAgro.php">
        <div class="mitrabtn">

            <img src="../../image/mdi_paper-text.png" alt="">
            <h3>Surat Bermitra</h3>
        </div>
    </a>

</div>