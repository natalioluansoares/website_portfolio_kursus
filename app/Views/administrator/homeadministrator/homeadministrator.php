<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title>Home Administrator</title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-light" id="dash-daterange">
                        <span class="input-group-text bg-primary border-primary text-white">
                            <i class="mdi mdi-calendar-range font-13"></i>
                        </span>
                    </div>
                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                    <a href="javascript: void(0);" class="btn btn-primary ms-1">
                        <i class="mdi mdi-filter-variant"></i>
                    </a>
                </form>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-xl-5 col-lg-6">

        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Customers</h5>
                        <h3 class="mt-3 mb-3">36,254</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                            <span class="text-nowrap">Since last month</span>  
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart-plus widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Orders</h5>
                        <h3 class="mt-3 mb-3">5,543</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-currency-usd widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Revenue</h5>
                        <h3 class="mt-3 mb-3">$6,254</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-pulse widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Growth">Growth</h5>
                        <h3 class="mt-3 mb-3">+ 30.56%</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

    </div> <!-- end col -->
    <div class="col-xl-7 col-lg-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title mb-3">Projections Vs Actuals</h4>

                <div dir="ltr">
                    <div id="high-performing-product" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                </div>
                    
            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div> <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-12 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title">Total Sales</h4>

                <div id="average-sales" class="apex-charts mb-4 mt-4" data-colors="#727cf5,#0acf97,#fa5c7c,#ffbc00"></div>
                

                <div class="chart-widget-list">
                    <p>
                        <i class="mdi mdi-square text-primary"></i> Direct
                        <span class="float-end">$300.56</span>
                    </p>
                    <p>
                        <i class="mdi mdi-square text-danger"></i> Affilliate
                        <span class="float-end">$135.18</span>
                    </p>
                    <p>
                        <i class="mdi mdi-square text-success"></i> Sponsored
                        <span class="float-end">$48.96</span>
                    </p>
                    <p class="mb-0">
                        <i class="mdi mdi-square text-warning"></i> E-mail
                        <span class="float-end">$154.02</span>
                    </p>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>