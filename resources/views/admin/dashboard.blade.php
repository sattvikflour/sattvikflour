@extends('admin.layouts.layout')
@section('title')
    SattvikFlour Admin
@endsection
@section('css')
<style>
    .card-header {
    display: flex;
    justify-content: space-between;
}
.text-md-left,
.text-md-right {
    margin: 0; /* Remove default margins */
}
</style>
@endsection
@section('content')
    <h1> Dashboard</h1>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <span class="text-md-left">Total Categories : <b>{{$totalCategoryCount}}</b> </span>
                        <span class="text-md-right">Total Products : <b>{{$totalProductCount}}</b></span>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12 col-12 mb-3">
                            <canvas id="product-pie-chart" width="500" height="500"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('public/js/chart.min.js') }}"></script>
    <script>
        $(document).ready(function() {
    $.ajax({
        url: "{{ URL::to('ajax-product-chart-by-category') }}",
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        success: function(response) {
            var canvas = document.getElementById('product-pie-chart');
            var ctx = canvas.getContext('2d');
            // Destroy existing chart if it exists
            if (window.productPieChart !== undefined) {
                window.productPieChart.destroy();
            }

            window.productPieChart = new Chart(ctx, getChartJs('pie',
                response.product.count,
                response.product.color,
                response.product.label
            ));
        },
        error: function(error) {
            console.error('Error exporting data:', error);
            toggleLoader(false);
        }
    });
    //here

    function getChartJs(type, productCount, productColor, productLabel) {
            var config = null;
            if (type === 'pie') {
                config = {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: [30, 70],
                            label: 'Clicks',
                            offset: -5,
                            hoverOffset: 1,
                            circumference: 240,
                            rotation: -120,
                            data: productCount,
                            backgroundColor: productColor,
                        }],
                        borderWidth: 0,
                        labels: productLabel
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: 80,
                        tooltip: {
                            enabled: true,
                            backgroundColor: 'rgba(0, 0, 0, 1)',
                            padding: 15,
                        },
                        legend: {
                            position: 'bottom',
                            display: false,
                            labels: {
                                usePointStyle: true,
                                pointStyle: 'circle',
                            }
                            // labels: {
                            //     boxWidth: 20,
                            //     padding: -10
                            // }
                        },
                        layout: {
                            autoPadding: false
                        },
                    }
                }
            }
            return config;
        }
});

    </script>
@endsection
