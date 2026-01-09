<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Dashboard'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">


        <!-- SIDEBAR -->
        <div class="bg-dark text-white p-3" style="width:240px; min-height:100vh;">
            <h5 class="mb-4">CI3 APP</h5>
            <ul class="nav nav-pills flex-column gap-1">


                <?php if ($this->session->userdata('user')['role'] == 'admin'): ?>
                    <li class="nav-item"><a class="nav-link text-white <?= active('admin/dashboard') ?>" href="<?= site_url('admin/dashboard') ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-white <?= active('admin/users') ?>" href="<?= site_url('admin/users') ?>">Users</a></li>
                    <li class="nav-item"><a class="nav-link text-white <?= active('admin/products') ?>" href="<?= site_url('admin/products') ?>">Products</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link text-white <?= active('user/dashboard') ?>" href="<?= site_url('user/dashboard') ?>">Dashboard</a></li>
                <?php endif; ?>


                <li class="nav-item mt-3"><a class="nav-link text-warning" href="<?= site_url('profile') ?>">Profile</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="<?= site_url('auth/logout') ?>">Logout</a></li>
            </ul>
        </div>


        <!-- CONTENT -->
        <div class="flex-fill p-4">
            */


            // application/views/layouts/footer.php
            /*
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>