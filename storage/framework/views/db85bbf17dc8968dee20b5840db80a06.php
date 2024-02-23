<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Transaksi</title>

    <?php
    $style = '
    <style>
        * {
            font-family: "consolas", sans-serif;
        }
        p {
            display: block;
            margin: 3px;
            font-size: 10pt;
        }
        table td {
            font-size: 9pt;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }

        @media print {
            @page {
                margin: 0;
                size: 75mm 
    ';
    ?>
    <?php 
    $style .= 
        ! empty($_COOKIE['innerHeight'])
            ? $_COOKIE['innerHeight'] .'mm; }'
            : '}';
    ?>
    <?php
    $style .= '
            html, body {
                width: 70mm;
            }
            .btn-print {
                display: none;
            }
        }
    </style>
    ';
    ?>

    <?php echo $style; ?>

</head>
<body onload="window.print()">
    <button class="btn-print" style="position: absolute; right: 1rem; top: rem;" onclick="window.print()">Print</button>
    <div class="text-center">
        <h3 style="margin-bottom: 5px;">SMKN 2 Sumedang</h3>
        <p>Jalan Arief Rakhman Hakim No. 59</p>
    </div>
    <br>
    <div>
        <p style="float: left;"><?php echo e(date('d-m-Y')); ?></p>
        <p style="float: right"><?php echo e(strtoupper(auth()->user()->name)); ?></p>
    </div>
    <p class="text-center">===================================</p>
    <div class="clear-both" style="clear: both;"></div>
    <p style="float: left;">No Transaksi </p>
    <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p style="float: right;"><?php echo e($item->id_transaksi); ?></p>
    <p class="text-center">===================================</p>
    <table width="100%" style="border: 0;">
            <tr>
                <td colspan="3"><?php echo e($item->barang->nama_produk); ?></td>
            </tr>
            <tr>
                <td><?php echo e($item->total_item); ?> x <?php echo e($item->barang->harga); ?></td>
                <td></td>
                <td class="text-right"><?php echo e($item->total_harga); ?></td>
            </tr>
        
    </table>
    <p class="text-center">-----------------------------------</p>

    <table width="100%" style="border: 0;">
        <tr>
            <td>Total Harga</td>
            <td class="text-right"><?php echo e($item->total_harga); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <p class="text-center">===================================</p>
    <p class="text-center">-- TERIMA KASIH --</p>
    <p class="text-center">===================================</p>

    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max(
                body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight
            );

        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "innerHeight="+ ((height + 50) * 0.264583);
    </script>
</body>
</html>
<?php /**PATH C:\xamppbaru\htdocs\senin\resources\views/nota.blade.php ENDPATH**/ ?>