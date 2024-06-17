<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <title>Thống kê đơn hàng</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description"> -->

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="../css/styleAdmin.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom Styles to Ensure Colors -->
   
</head>

<body>
<!-- Topbar Start -->
        <!-- Topbar End -->


    <!-- Navbar Start -->
    <!-- Navbar End -->
     
    <div class="container-fluid pt-5 pb-3">
        <div class="row">
            <div class="col-lg-6" style="position:initial;">
                <h2 class="section-title text-uppercase mx-xl-5 mb-4"><span class="pr-3" style="border-bottom: 2px solid #F27927;color: #F27927;">Chỉ số quan trọng</span></h2>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-2" style="border:1px solid #D9D9D9;border-radius: 23px;margin-left: 45px;">
                <p style="font-weight: 700;margin-top: 10px;" class="text-center">Tổng đơn hàng</p>
                <p class="text-center title-reisgn" style="font-size: 30px;">{{ $totalOrders }}</p>
                <small style="margin-left: 18px;">Cập nhật: {{ $date }}</small>
            </div>  
            <div class="col-lg-1"></div>     
            <div class="col-lg-2" style="border:1px solid #D9D9D9;border-radius: 23px">
                <p style="font-weight: 700;margin-top: 10px;" class="text-center">Chờ xác nhận</p>
                <p class="text-center title-reisgn" style="font-size: 30px;">{{ $pendingOrders }}</p>
                <small style="margin-left: 18px;">Cập nhật: {{ $date }}</small>
            </div>  
            <div class="col-lg-1"></div>  
            <div class="col-lg-2" style="border:1px solid #D9D9D9;border-radius: 23px">
                <p style="font-weight: 700;margin-top: 10px;" class="text-center">Đã hủy</p>
                <p class="text-center title-reisgn" style="font-size: 30px;">{{ $cancelledOrders }}</p>
                <small style="margin-left: 18px;">Cập nhật: {{ $date }}</small>
            </div>  
            <div class="col-lg-1"></div>  
            <div class="col-lg-2" style="border:1px solid #D9D9D9;border-radius: 23px">
                <p style="font-weight: 700;margin-top: 10px;" class="text-center">Đã hoàn thành</p>
                <p class="text-center title-reisgn" style="font-size: 30px;">{{ $completedOrders }}</p>
                <small style="margin-left: 18px;">Cập nhật: {{ $date }}</small>
            </div>       
        </div>
        <div class="row">
            <div class="col-lg-6" style="position:initial;">
                <h2 class="section-title text-uppercase mx-xl-5 mb-4" style="margin-top: 20px;"><span class="pr-3" style="border-bottom: 2px solid #F27927;color: #F27927;">Biểu đồ</span></h2>
                <label style="margin-top: 8px;margin-right: 1rem;margin-left: 3rem;">Ngày tháng</label>
                <input type="date" id="date" name="date" value="{{ $date }}" style="margin-left: 10px;">
            </div>
        </div>
        <div class="row px-xl-5">
            <canvas id="ordersChart" width="1290" height="460"></canvas>
        </div>
        <div class="row px-xl-5" style="margin-top: 15px;">
            <div class="col-lg-6">
                <h2 class="section-title text-uppercase mb-4"><span class="pr-3" style="border-bottom: 2px solid #F27927;color: #F27927;">THỨ HẠNG SẢN PHẨM THEO DOANH SỐ</span></h2>
                <table class="mb-0">
                    <thead>
                        <tr  style="font-weight: 700;color: #000">
                            <th class="text-center">Thứ hạng</th>
                            <th>Tên danh mục sản phẩm</th>
                            <th style="text-align: right;">Tổng doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td><p>Snack bánh thưởng cho mèo CIAO Crab & Scallop vị cua và sò biển 35</p></td>
                            <td style="text-align: right;">2.000.000</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td><p>Bánh thưởng cho mèo vị thập cẩm JERHIGH Jinny Gourmet</p></td>
                            <td style="text-align: right;">1.000.000</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td><p>Pate cho mèo vị thịt trộn CATIDEA Variety Of Meat 60</p></td>
                            <td style="text-align: right;">500.000</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td><p>Pate cho mèo vị cá mòi CAT SEA FISH Tuna With Sardine</p></td>
                            <td style="text-align: right;">400.000</td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td><p>Thức ăn cho mèo mọi lứa tuổi CATIDEA Basic Meat Freeze Dried</p></td>
                            <td style="text-align: right;">300.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <h2 class="section-title text-uppercase mb-4"><span class="pr-3" style="border-bottom: 2px solid #F27927;color: #F27927;">THỨ HẠNG DANH MỤC SẢN PHẨM THEO DOANH SỐ</span></h2>
                <table class="mb-0" style="margin-top: 60px;">
                    <thead>
                        <tr  style="font-weight: 700;color: #000">
                            <th class="text-center">Thứ hạng</th>
                            <th>Tên danh mục sản phẩm</th>
                            <th style="text-align: right;">Tổng doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td><p>Thức ăn</p></td>
                            <td style="text-align: right;">2.000.000</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td><p>Cát vệ sinh</p></td>
                            <td style="text-align: right;">1.000.000</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td><p>Sản phẩm vệ sinh chăm sóc</p></td>
                            <td style="text-align: right;">500.000</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td><p>Chăm sóc y tế</p></td>
                            <td style="text-align: right;">400.000</td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td><p>Vật dụng ăn uống</p></td>
                            <td style="text-align: right;">300.000</td>
                        </tr>
                    </tbody>
                </table>
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
                    data: {!! json_encode($ordersData) !!},
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


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>