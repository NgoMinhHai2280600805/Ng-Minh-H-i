<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"> <!-- Thêm FontAwesome cho icons -->

    <style>
        /* Navbar neon yellow background */
        /* Navbar neon xanh dạ quang với hiệu ứng glow */
.navbar {
    background: #39ff14; /* Neon xanh */
    box-shadow: 0 0 20px #39ff14, 0 0 40px #39ff14, 0 0 60px #39ff14;
}

.navbar-brand, .nav-link {
    color: #000 !important; /* Đổi chữ sang đen */
    text-shadow: 0 0 5px #ffffff, 0 0 10px #ffffff;
}


        .nav-link:hover {
            color: #ffffff !important; /* Màu chữ trắng khi hover */
            background-color: #ffb700;
            border-radius: 5px;
        }

        .navbar-toggler-icon {
            background-color: #333; /* Màu của icon toggle */
        }

        /* Cải tiến nút đăng nhập và đăng xuất */
        .username {
            font-weight: bold;
            color: #ff5733; /* Màu cam cho tên người dùng */
        }

        /* Hình ảnh sản phẩm */
        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        /* Thay đổi kiểu nút */
        .btn-custom {
            background-color: #ffcc00;
            border-color: #ffcc00;
            color: #333;
            font-weight: bold;
            border-radius: 30px;
            padding: 12px 25px;
        }

        .btn-custom:hover {
            background-color: #ffb700;
            border-color: #ffb700;
        }

        /* Cải thiện container */
        .container {
            margin-top: 50px;
        }

        h1 {
    font-size: 25px;
    font-weight: bold;
    text-align: center;
    padding: 20px;
    border-radius: 15px;
    background: linear-gradient(270deg, #ff5733, #ffc300, #39ff14, #00ffff, #ff5733);
    background-size: 1000% 1000%;
    color: #fff;
    animation: gradientFlow 10s ease infinite;
    box-shadow: 0 0 20px rgba(255, 87, 51, 0.5);
    border: 3px solid rgba(255, 255, 255, 0.3);
}

/* Hiệu ứng gradient động */
@keyframes gradientFlow {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}


        p {
            color: #555; /* Màu xám cho mô tả */
        }

        .navbar-nav li a {
            transition: all 0.3s ease;
        }

        /* Style cho các button logout và login */
        .nav-item .nav-link {
            font-size: 18px;
        }

        .nav-item .nav-link.active {
            color: #ff5733 !important;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">🛒 Quản lý sản phẩm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product/"><i class="fas fa-list"></i> 📋 Danh sách sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product/add"><i class="fas fa-plus-circle"></i> ➕ Thêm sản phẩm</a>
                </li>
                <li class="nav-item">
    <a class="nav-link" href="/webbanhang/Product/cart"><i class="fas fa-shopping-cart"></i> 🛒 Giỏ hàng</a>
</li>

                <li class="nav-item">
                    <?php
                        if (SessionHelper::isLoggedIn()) {
                            echo "<a class='nav-link username' href='#'><i class='fas fa-user'></i> 👤 " . htmlspecialchars($_SESSION['username']) . "</a>";
                        } else {
                            echo "<a class='nav-link' href='/webbanhang/account/login'><i class='fas fa-sign-in-alt'></i> 🔑 Đăng nhập</a>";
                        }
                    ?>
                </li>
                <?php if (SessionHelper::isLoggedIn()): ?>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="/webbanhang/account/logout"><i class="fas fa-sign-out-alt"></i> 🚪 Đăng xuất</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Chào mừng đến với trang mua sắm hàng hoá điện tử</h1> <!-- Tiêu đề mới với hiệu ứng động -->
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
