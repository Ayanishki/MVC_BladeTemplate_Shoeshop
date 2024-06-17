@extends('adminnew.layout')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Statistical</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid pt-5 pb-3">
                                <div class="row">
                                    <div class="col-lg-6" style="position:initial;">
                                        <h2 class="section-title text-uppercase mx-xl-5 mb-4"><span class="pr-3"
                                                style="border-bottom: 2px solid #4B49AC;color: #4B49AC;">Chỉ số quan
                                                trọng</span></h2>
                                    </div>
                                </div>
                                <div class="row px-xl-5">
                                    <div class="col-lg-2"
                                        style="border:1px solid #D9D9D9;border-radius: 23px;margin-left: 45px;">
                                        <p style="font-weight: 700;margin-top: 10px;" class="text-center">Tổng đơn hàng</p>
                                        <p class="text-center title-reisgn" style="font-size: 30px;">{{ $totalOrders }}</p>
                                        <small class="text-center">Cập nhật: {{ $date }}</small>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-2" style="border:1px solid #D9D9D9;border-radius: 23px">
                                        <p style="font-weight: 700;margin-top: 10px;" class="text-center">Chờ xác nhận</p>
                                        <p class="text-center title-reisgn" style="font-size: 30px;">{{ $pendingOrders }}
                                        </p>
                                        <small class="text-center">Cập nhật: {{ $date }}</small>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-2" style="border:1px solid #D9D9D9;border-radius: 23px">
                                        <p style="font-weight: 700;margin-top: 10px;" class="text-center">Đã hủy</p>
                                        <p class="text-center title-reisgn" style="font-size: 30px;">{{ $cancelledOrders }}
                                        </p>
                                        <small class="text-center">Cập nhật: {{ $date }}</small>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-2" style="border:1px solid #D9D9D9;border-radius: 23px">
                                        <p style="font-weight: 700;margin-top: 10px;" class="text-center">Đã hoàn thành</p>
                                        <p class="text-center title-reisgn" style="font-size: 30px;">{{ $completedOrders }}
                                        </p>
                                        <small class="text-center">Cập nhật: {{ $date }}</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6" style="position:initial;">
                                        <h2 class="section-title text-uppercase mx-xl-5 mb-4" style="margin-top: 20px;">
                                            <span class="pr-3"
                                                style="border-bottom: 2px solid #4B49AC;color: #4B49AC;">Biểu đồ</span>
                                        </h2>
                                        <label style="margin-top: 8px;margin-right: 1rem;margin-left: 3rem;">Ngày
                                            tháng</label>
                                        <input type="date" id="date" name="date" value="{{ $date }}"
                                            style="margin-left: 10px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <canvas id="ordersChart" width="1290" height="460"></canvas>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">PRODUCT RANKING BY SALES</h4>
                                                <p class="card-description">
                                                    Add class <code>.table</code>
                                                </p>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Rank</th>
                                                                <th>Product Name</th>
                                                                <th>Sale</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $index = 1;
                                                            @endphp
                                                            @foreach ($bestSellingProducts as $item)
                                                                <tr>
                                                                    <td>{{ $index }}</td>
                                                                    <td>{{ $item->ProName }}</td>
                                                                    <td>
                                                                        <img src="../images/{{ $item->ProImage }}"
                                                                            alt="">
                                                                    </td>
                                                                    <td><label
                                                                            class="badge badge-success">{{ $item->total_sold }}</label>
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $index++;
                                                                @endphp
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">CATEGORIES RANKING BY SALES</h4>
                                                <p class="card-description">
                                                    Add class <code>.table</code>
                                                </p>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Rank</th>
                                                                <th>Category Name</th>
                                                                <th>Sale</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $index = 1;
                                                            @endphp
                                                            @foreach ($bestSellingCategories as $item)
                                                                <tr>
                                                                    <td>{{ $index }}</td>
                                                                    <td>{{ $item->CatName }}</td>
                                                                    <td>
                                                                        <img src="../images/{{ $item->CatImage }}"
                                                                            alt="">
                                                                    </td>
                                                                    <td><label
                                                                            class="badge badge-success">{{ $item->total_sold }}</label>
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $index++;
                                                                @endphp
                                                            @endforeach
                                                            <script></script>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <script>
                                document.getElementById('date').addEventListener('change', function() {
                                    window.location.href = '?date=' + this.value;
                                });

                                var ctx = document.getElementById('ordersChart').getContext('2d');
                                var ordersChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: {!! json_encode($dates) !!},
                                        datasets: [{
                                            label: 'Số lượng đơn hàng',
                                            data: {!! json_encode($ordersData) !!},
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1,
                                            fill: false
                                        }, {
                                            label: 'Doanh thu',
                                            data: {!! json_encode($revenueData) !!},
                                            borderColor: 'rgba(153, 102, 255, 1)',
                                            borderWidth: 1,
                                            fill: false
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
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
