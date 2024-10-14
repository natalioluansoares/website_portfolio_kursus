<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title>Edumin - Bootstrap Admin Dashboard </title>
<?= $this->endSection() ?>
<?= $this->section('funsionario') ?>
    <div class="row">
        <div class="col-xl-6 col-xxl-6 col-sm-12">
            <div class="row">
                <div class="col-xl-6 col-xxl-6 col-sm-6">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <h4 class="card-title">Total Students</h4>
                            <h3>3280</h3>
                            <div class="progress mb-2">
                                <div class="progress-bar progress-animated bg-primary" style="width: 80%"></div>
                            </div>
                            <small>80% Increase in 20 Days</small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6 col-sm-6">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <h4 class="card-title">New Students</h4>
                            <h3>245</h3>
                            <div class="progress mb-2">
                                <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                            </div>
                            <small>50% Increase in 25 Days</small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6 col-sm-6">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <h4 class="card-title">Total Course</h4>
                            <h3>28</h3>
                            <div class="progress mb-2">
                                <div class="progress-bar progress-animated bg-red" style="width: 76%"></div>
                            </div>
                            <small>76% Increase in 20 Days</small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6 col-sm-6">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <h4 class="card-title">Fees Collection</h4>
                            <h3>25160$</h3>
                            <div class="progress mb-2">
                                <div class="progress-bar progress-animated bg-success" style="width: 30%"></div>
                            </div>
                            <small>30% Increase in 30 Days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>					
        <div class="col-xl-6 col-xxl-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Income/Expense Report</h3>
                </div>
                <div class="card-body">
                        <div id="morris_bar_2" class="morris_chart_height"></div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>