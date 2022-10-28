@extends('adminpanel.master')
@section('title','Statistika')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>7000</h3>

                            <p>Ildizlaz</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer"> Bugungi </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53</h3>
{{--                            <sup style="font-size: 20px">%</sup>--}}
                            <p>Sotilgan maxsulotlar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer"> Bugungi </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>Tayyorlangan maxsulot</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer"> Bugungi </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Ombordagi maxsulotlar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer"> Bugungi </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->


            <!-- Main row -->
            <div class="row">

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Chiqimlar Umumiy</h3>
                        </div>

                        <div style="height: 350px; width: 600px; margin: auto;">
                            <canvas id="barChart">
                            </canvas>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title"> Sotish Umumiy </h3>
                        </div>

                        <div style="height: 350px; width: 600px; margin: auto;">
                            <canvas id="barChart1">
                            </canvas>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title"> Ishchilar Umumiy </h3>
                        </div>

                        <div style="height: 350px; width: 600px; margin: auto;">
                            <canvas id="barChart2">
                            </canvas>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="card">

                        <div class="card-header border-0">
                            <h3 class="card-title">Chiqimlar Kundalik</h3>
                        </div>

                        <div style="height: 350px; width: 600px; margin: auto;">
                            <canvas id="barChart0">
                            </canvas>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Sotish Kundalik </h3>
                        </div>

                        <div style="height: 350px; width: 600px; margin: auto;">
                            <canvas id="barChart01">
                            </canvas>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Ishichlar Kundalik </h3>
                        </div>

                        <div style="height: 350px; width: 600px; margin: auto;">
                            <canvas id="barChart02">
                            </canvas>
                        </div>
                    </div>

                </div>


            </div>
            <!-- /.row -->


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <script>
        $(function () {

            // Outs
            var firms = <?php echo json_encode($firms); ?>;
            var names = <?php echo json_encode($names); ?>;
            var all_sum = <?php echo json_encode($all_sum); ?>;

            var outs_allsum =<?php echo json_encode($outs_allsum); ?>;
            var outs_name =<?php echo json_encode($outs_name); ?>;


            //sells
            var sells = <?php echo json_encode($sells); ?>;
            var sell_names = <?php echo json_encode($sell_names); ?>;
            var sell_sum = <?php echo json_encode($sell_value); ?>;

            var sells_allsum = <?php echo json_encode($sells_allsum); ?>;

            // workers

            var workers = <?php echo json_encode($workers); ?>;
            var worker_names = <?php echo json_encode($worker_names); ?>;
            var worker_sum = <?php echo json_encode($worker_summ   ); ?>;
            var worker_allsum = <?php echo json_encode($worker_allsum); ?>;



            var barCanvas = $("#barChart");
            var barCanvas1 = $("#barChart1");
            var barCanvas2 = $("#barChart2");

            var barCanvas0 = $("#barChart0");
            var barCanvas01 = $("#barChart01");
            var barCanvas02 = $("#barChart02");



            var barChart = new Chart(barCanvas, {
                type: 'bar',
                data: {
                    labels: names,
                    datasets: [{
                        label: 'Umumiy summa',
                        data: all_sum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var barChart = new Chart(barCanvas1, {
                type: 'bar',
                data: {
                    labels: sell_names,
                    datasets: [{
                        label: 'Umumiy summa',
                        data: sell_sum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var barChart = new Chart(barCanvas2, {
                type: 'bar',
                data: {
                    labels: worker_names,
                    datasets: [{
                        label: 'Umumiy summa',
                        data: worker_sum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });



            var barChart = new Chart(barCanvas0, {
                type: 'bar',
                data: {
                    labels: outs_name,
                    datasets: [{
                        label: 'Kundalik Summa',
                        data: outs_allsum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var barChart = new Chart(barCanvas01, {
                type: 'bar',
                data: {
                    labels: outs_name,
                    datasets: [{
                        label: 'Umumiy summa',
                        data: sells_allsum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var barChart = new Chart(barCanvas02, {
                type: 'bar',
                data: {
                    labels: outs_name,
                    datasets: [{
                        label: 'Umumiy summa',
                        data: worker_allsum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        })

    </script>

@endsection
