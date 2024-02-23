<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Admin One Tailwind CSS Admin Dashboard</title>
  <
  <!-- Tailwind is included -->
  <link rel="stylesheet" href="<?php echo e(URL::asset('css/main.css')); ?> ">
  <script src="https://cdn.tailwindcss.com"></script>


  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>


</head>
<body>


<nav id="navbar-main" class="navbar is-fixed-top">
  <div class="navbar-brand">
    <a class="navbar-item mobile-aside-button">
      <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
    <div class="navbar-item">
      <h1 class="text-2xl"><b> <?php echo e(Auth::user()->name); ?> </b></h1>
    </div>
  </div>
  <div class="navbar-brand is-right">
    <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
      <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-menu" id="navbar-menu">
    <div class="navbar-end">
      <div class="navbar-item dropdown has-divider has-user-avatar">
        <a class="navbar-link">
          <div class="user-avatar">
            <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
          </div>
          <div class="is-user-name"><span> <?php echo e(Auth::user()->email); ?></span></div>
          <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="<?php echo e(route('actionlogout')); ?>">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Log Out</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>


<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Admin <b class="font-black">One</b>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">General</p>
    <ul class="menu-list">
      <li class="--set-active-profile-htm">
        <a href="<?php echo e(route('transaksi.index')); ?>">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">Menu</p>
    <ul class="menu-list">
      <li class="active">
        <a href="#">
          <span class="icon"><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Barang</span>
        </a>
      </li>
      <li class="--set-active-profile-html">
        <a href="<?php echo e(route('barang.index')); ?>">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">User</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Dashboard</li>
    </ul>
  </div>
</section>


<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Data Barang
    </h1>
    <a href="<?php echo e(route('barang.create')); ?>" class="button light">Tambah Barang</a>
  </div>
</section>


  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Transaksi
        </p>

      </header>
      <div class="card-content">
        <table>
          <thead>
            <th>ID Barang</th>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Merk</th>
            <th>Harga</th>
            <th>Opsi</th>
          </thead>
          <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $Barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($barang->id_barang); ?></td>
            <td><img src="<?php echo e(asset('/storage/product/'.$barang->image)); ?>" class="rounded" style="width: 150px"></td>
            <td><?php echo e($barang->nama_produk); ?></td>
            <td><?php echo e($barang->merk); ?></td>
            <td><?php echo e($barang->harga); ?></td>
            <td>
                <a href="<?php echo e(route('barang.edit', $barang->id_barang)); ?>" class="button small green --jb-modal" type="button">
                    <span class="icon"><i class="mdi mdi-pencil"></i></span>
                </a>
                <form action="<?php echo e(route('barang.destroy', $barang->id_barang)); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="button small red" type="submit" onclick="return confirm('Are you sure you want to delete this item?')">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                </form>
            </td>
        </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
          <div class="card empty">
            <div class="card-content">
              <div>
                <span class="icon large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span>
              </div>
              <p>Nothing's here…</p>
            </div>
          </div>
          </tr>
          <?php endif; ?>
          </tbody>
        </table>

      </div>
    </div>
  </section>
  <script type="text/javascript" src="<?php echo e(URL::asset('js/main.min.js')); ?> "></script>
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>
</html><?php /**PATH C:\xamppbaru\htdocs\senin\resources\views/barang.blade.php ENDPATH**/ ?>