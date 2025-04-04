<?php include 'app/views/shares/header.php'; ?>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    .login-wrapper {
        min-height: 100vh;
        background: #f5f6fa;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
    }

    .login-card {
        background: #fff;
        border-radius: 20px;
        padding: 40px;
        max-width: 420px;
        width: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .login-card h2 {
        font-weight: bold;
        color: #2f3542;
        margin-bottom: 20px;
    }

    .login-card .form-control {
        border-radius: 12px;
        padding: 12px 15px;
        font-size: 15px;
    }

    .login-card .btn-primary {
        border-radius: 12px;
        padding: 12px;
        font-size: 16px;
        width: 100%;
    }

    .login-card a {
        font-size: 14px;
    }

    .login-card .social-btns a {
        margin: 0 8px;
        font-size: 18px;
        color: #57606f;
    }

    .alert {
        border-radius: 12px;
    }
</style>

<div class="login-wrapper">
    <div class="login-card">
        <form action="/webbanhang/account/checklogin" method="post">
            <h2 class="text-center"><i class="fas fa-sign-in-alt me-2"></i>Đăng nhập</h2>

            <?php if (isset($_SESSION['login_error'])): ?>
                <div class="alert alert-danger text-center">
                    <i class="fas fa-exclamation-triangle me-1"></i>
                    <?php echo $_SESSION['login_error']; ?>
                </div>
                <?php unset($_SESSION['login_error']); ?>
            <?php endif; ?>

            <div class="mb-3">
                <label for="username" class="form-label"><i class="fas fa-user"></i> Tên đăng nhập</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock"></i> Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">
                <i class="fas fa-sign-in-alt"></i> Đăng nhập
            </button>

            <div class="mt-3 text-center">
                <a href="#"><i class="fas fa-key"></i> Quên mật khẩu?</a>
            </div>

            <div class="mt-2 text-center">
                Chưa có tài khoản?
                <a href="/webbanhang/account/register" class="text-primary"><i class="fas fa-user-plus"></i> Đăng ký</a>
            </div>

            <hr>

            <div class="text-center social-btns">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-google"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
