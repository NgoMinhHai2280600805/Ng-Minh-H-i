<?php include 'app/views/shares/header.php'; ?>
<h1>Giỏ hàng</h1>

<?php if (!empty($cart)): ?>
<ul class="list-group">
    <?php foreach ($cart as $id => $item): ?>
        <li class="list-group-item">
            <h2><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h2>

            <?php if ($item['image']): ?>
                <img src="/webbanhang/<?php echo $item['image']; ?>" alt="Product Image" style="max-width: 100px;">
            <?php endif; ?>

            <p>Giá: <?php echo htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8'); ?> VND</p>

            <p>
                Số lượng:
                <button class="btn btn-sm btn-danger update-quantity" data-id="<?php echo $id; ?>" data-action="decrease">-</button>
                <span class="mx-2 quantity" id="qty-<?php echo $id; ?>"><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                <button class="btn btn-sm btn-success update-quantity" data-id="<?php echo $id; ?>" data-action="increase">+</button>
            </p>
        </li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
    <p>Giỏ hàng của bạn đang trống.</p>
<?php endif; ?>

<a href="/webbanhang/Product" class="btn btn-secondary mt-2">Tiếp tục mua sắm</a>
<a href="/webbanhang/Product/checkout" class="btn btn-primary mt-2">Thanh Toán</a>

<!-- AJAX script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.update-quantity');

        buttons.forEach(btn => {
            btn.addEventListener('click', function () {
                const productId = this.dataset.id;
                const action = this.dataset.action;

                fetch('/webbanhang/Cart/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${productId}&action=${action}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (data.newQuantity > 0) {
                            document.getElementById('qty-' + productId).textContent = data.newQuantity;
                        } else {
                            location.reload(); // Reload nếu số lượng bằng 0 (xóa khỏi giỏ)
                        }
                    } else {
                        alert("Có lỗi xảy ra khi cập nhật giỏ hàng.");
                    }
                });
            });
        });
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>
