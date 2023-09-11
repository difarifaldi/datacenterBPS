<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Bootstrap CSS -->
    <?= link_tag('css/styles.css')?>
    <?= link_tag('css/table.css')?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="icon" href="<?= base_url('bps.ico'); ?> " />
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/scripts.js'); ?>"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- jQuery & JavaScript for table and chart -->
    <script src="<?= base_url('js/datatables-simple-demo.js'); ?>"></script>
    <script src="<?= base_url('js/table.js'); ?>"></script>
    <title><?= $title ?></title>
  </head>
  <body class="sb-nav-fixed">
    <?= $this->renderSection('navbar') ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="/">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <div class="sb-sidenav-menu-heading">Interface</div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Input Pengecekan Data Center
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="/pemeriksa/create">Pemeriksa</a>
                                        <a class="nav-link" href="/utility/create">Ruang Utility (Panel)</a>
                                        <a class="nav-link" href="/systemups/create">System UPS</a>
                                        <a class="nav-link" href="/modulups/create">Modul UPS</a>
                                        <a class="nav-link" href="/pac/create">PAC</a>
                                        <a class="nav-link" href="/ipdu/create">IPDU</a>
                                        <a class="nav-link" href="/chiller/create">Chiller</a>
                                        <a class="nav-link" href="/lcp/create">Liquid Cooling Package (LCP)</a>
                                        <a class="nav-link" href="/vesda/create">Vesda</a>
                                        <a class="nav-link" href="/tabung/create">Tekanan Tabung</a>
                                        <a class="nav-link" href="/fire/create">Fire System</a>
                                    </nav>
                                </div>

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Rekap Pengecekan Data Center
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                        <a class="nav-link" href="/pemeriksa">Pemeriksa</a>
                                        <a class="nav-link" href="/utility">Ruang Utility (Panel)</a>
                                        <a class="nav-link" href="/systemups">System UPS</a>
                                        <a class="nav-link" href="/modulups">Modul UPS</a>
                                        <a class="nav-link" href="/pac">PAC</a>
                                        <a class="nav-link" href="/ipdu">IPDU</a>
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                            Chiller
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="/chiller">Chiller 1</a>
                                                <a class="nav-link" href="/chiller2">Chiller 2</a>
                                                <a class="nav-link" href="/chiller3">Chiller 3</a>
                                            </nav>
                                        </div>
                                        <a class="nav-link" href="/lcp">Liquid Cooling Package (LCP)</a>
                                        <a class="nav-link" href="/vesda">Vesda</a>
                                        <a class="nav-link" href="/tabung">Tekanan Tabung</a>
                                        <a class="nav-link" href="/fire">Fire System</a>
                                    </nav>
                                </div>

                                <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                                <a class="nav-link" href="charts.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Charts
                                </a>
                                <a class="nav-link" href="tables.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Tables
                                </a> -->

                            </div>                       
                        </div>
                    </nav>
                </div>
                
        <?= $this->renderSection('content') ?>
        
    </div>
  </body>
    <script>
        new DataTable('#example', {
            columnDefs: [
                {
                    targets: [0],
                    orderData: [0, 1]
                },
                {
                    targets: [1],
                    orderData: [1, 0]
                },
                {
                    targets: [4],
                    orderData: [4, 0]
                }
            ]
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable();
            $('#search-input').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#example').DataTable();

            // Add "Show entries" to the designated div
            $('#entries').html($('.dataTables_length'));

            // Add "Pagination" to the designated div
            $('#pagination').html($('.dataTables_paginate'));
        });
    </script>

</html>