<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <style>
    .products-section {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.product {
  width: 20%;
  margin-bottom: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  background-color: #c5c5c5;
  overflow: hidden;
}

.product-image img {
  /* width: 100%; */
  height: 150px;
  display: block;
}
.product-image {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 150px; /* Adjust the height as needed */
}

.product-image img {
  max-width: 100%;
  max-height: 100%;
  display: block;
}


.product-info {
  /* background-image: linear-gradient(to bottom, #99ccff , #e6f2ff); */
  padding: 15px;
  border-radius:10px;
  margin:20px;
  background-color: #fff;
}

.product-info h3 {
  margin-top: 0;
}

.cart-icon {
  display: flex;
  justify-content: flex-end;
  margin-top: 10px;
}

.cart-icon i {
  font-size: 20px;
  color: #007bff;
}

@media (max-width: 768px) {
  .product {
    width: 48%;
  }
}

@media (max-width: 480px) {
  .product {
    width: 100%;
  }
}

  </style>
</head>
<body>
<section class="products-section">
  <a href="">

  <div class="product">
    <div class="product-image">
      <img src="gallery/p2.png" alt="Product 1">
    </div>
    <div class="product-info">
      <h3>Product 1</h3>
      <p>Stock: 10</p>
      <p>Price: $19.99</p>
      <div class="cart-icon">
        <i class="fas fa-shopping-cart"></i>
      </div>
    </div>
  </div>
  </a>
  <a href="">

  <div class="product">
    <div class="product-image">
      <img src="gallery/p2.png" alt="Product 1">
    </div>
    <div class="product-info">
      <h3>Product 1</h3>
      <p>Stock: 10</p>
      <p>Price: $19.99</p>
      <div class="cart-icon">
        <i class="fas fa-shopping-cart"></i>
      </div>
    </div>
  </div>
  </a>

  <a href="">

<div class="product">
  <div class="product-image">
    <img src="gallery/p2.png" alt="Product 1">
  </div>
  <div class="product-info">
    <h3>Product 1</h3>
    <p>Stock: 10</p>
    <p>Price: $19.99</p>
    <div class="cart-icon">
      <i class="fas fa-shopping-cart"></i>
    </div>
  </div>
</div>
</a>
<a href="">

<div class="product">
  <div class="product-image">
    <img src="gallery/p2.png" alt="Product 1">
  </div>
  <div class="product-info">
    <h3>Product 1</h3>
    <p>Stock: 10</p>
    <p>Price: $19.99</p>
    <div class="cart-icon">
      <i class="fas fa-shopping-cart"></i>
    </div>
  </div>
</div>
</a>
</section>

</body>
</html>