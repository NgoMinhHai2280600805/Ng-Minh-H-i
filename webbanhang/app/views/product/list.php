<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        background-color: #1a1a2e;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
        text-align: center;
        color: #a3ffe4;
        margin-top: 30px;
        font-weight: bold;
        text-shadow: 0 0 10px #88f9ff;
    }

    .text-center a.btn-success {
        background: linear-gradient(45deg, #b3ffe6, #99ccff);
        border: none;
        color: #000;
        font-weight: bold;
        border-radius: 50px;
        padding: 10px 25px;
        box-shadow: 0 0 12px #a3ffe4;
        transition: all 0.3s ease;
    }

    .text-center a.btn-success:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px #a3ffe4, 0 0 35px #a3ffe4;
    }

    .product-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 30px;
    }

    .product-card {
        background: linear-gradient(135deg, #373b44, #4286f4);
        color: white;
        border-radius: 20px;
        box-shadow: 0 0 12px rgba(173, 216, 230, 0.6);
        padding: 20px;
        width: 300px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 0 25px rgba(173, 216, 230, 0.8);
    }

    .product-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 15px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
    }

    .product-card h2 a {
        color: #ffffff;
        font-size: 20px;
        text-shadow: 0 0 5px #a3ffe4;
        text-decoration: none;
    }

    .product-card p {
        color: #ffffff;
        margin: 6px 0;
    }

    .btn {
        padding: 6px 12px;
        border: none;
        border-radius: 30px;
        font-weight: bold;
        color: #000;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-primary {
        background: linear-gradient(45deg, #b2fefa, #0ed2f7);
        box-shadow: 0 0 8px #88f9ff;
        color: #000;
    }

    .btn-warning {
        background: linear-gradient(45deg, #ffe57f, #ffb74d);
        box-shadow: 0 0 8px #ffe57f;
        color: #000;
    }

    .btn-danger {
        background: linear-gradient(45deg, #ff8a80, #ff5252);
        box-shadow: 0 0 8px #ff8a80;
        color: #fff;
    }

    .btn:hover {
        opacity: 0.95;
        transform: scale(1.03);
    }
</style>

<h1>✨ Danh sách sản phẩm</h1>
<div class="text-center">
    <a href="/webbanhang/Product/add" class="btn btn-success">➕ Thêm sản phẩm mới</a>
</div>

<div class="product-container" id="product-list"></div>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch('/webbanhang/api/product')
            .then(response => response.json())
            .then(data => {
                const productList = document.getElementById('product-list');
                data.forEach(product => {
                    const card = document.createElement('div');
                    card.className = 'product-card';
                    card.innerHTML = `
                        <img src="${product.image}" alt="${product.name}" />
                        <h2><a href="/webbanhang/Product/show/${product.id}">${product.name}</a></h2>
                        <p>${product.description}</p>
                        <p><strong>Giá:</strong> ${product.price} VND</p>
                        <p><strong>Danh mục:</strong> ${product.categoryName}</p>
                        <div style="margin-top: 10px;">
                            <a href="/webbanhang/Product/addToCart/${product.id}" class="btn btn-primary">🛒 Thêm vào giỏ hàng</a>
                            <a href="/webbanhang/Product/edit/${product.id}" class="btn btn-warning">✏️ Sửa</a>
                            <button class="btn btn-danger" onclick="deleteProduct(${product.id})">🗑️ Xóa</button>
                        </div>
                    `;
                    productList.appendChild(card);
                });
            });
    });

    function deleteProduct(id) {
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
            fetch(`/webbanhang/api/product/${id}`, {
                method: 'DELETE'
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Product deleted successfully') {
                        location.reload();
                    } else {
                        alert('Xóa sản phẩm thất bại');
                    }
                });
        }
    }
</script>
