<?= $this->extend('main') ?>

    <?= $this->section('navbar') ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/">Badan Pusat Statistik</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <script>
        $(document).ready(function() {
            var table = $('#example').DataTable();
            $('#search-input').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
    <?= $this->endSection() ?>