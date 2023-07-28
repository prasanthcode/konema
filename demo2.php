<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Name - Single Product Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product-image {
    text-align: center;
    margin-bottom: 20px;
}

.product-image img {
    max-width: 30%;
    height: auto;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

.product-details {
    margin-top: 20px;
}

.product-name {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.product-price {
    font-size: 18px;
    color: #555;
    margin-bottom: 10px;
}

.product-description {
    color: #666;
    line-height: 1.5;
    margin-bottom: 20px;
}


.product-details {
    margin-top: 20px;
}

.product-name {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.product-price {
    font-size: 18px;
    color: #555;
    margin-bottom: 10px;
}

.product-description {
    color: #666;
    line-height: 1.5;
    margin-bottom: 20px;
}

.product-quantity {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.product-quantity label {
    margin-right: 10px;
    font-size: 16px;
    color: #555;
}

.product-quantity input {
    width: 60px;
    padding: 5px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.product-actions {
    display: flex;
    align-items: center;
}

.add-to-cart,
.buy-now {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

.add-to-cart:hover,
.buy-now:hover {
    background-color: #222;
}

@media (max-width: 480px) {
    .container {
        padding: 10px;
    }

    .product-actions {
        flex-direction: column;
    }

    .add-to-cart,
    .buy-now {
        margin-top: 10px;
    }
}

    </style>
</head>

<body>
    <div class="container">
        <div class="product-image">
            <img src="gallery/p2.png" alt="Product Image">
        </div>
        <div class="product-details">
            <h1 class="product-name">Product Name</h1>
            <p class="product-price">$99.99</p>
            <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vehicula elit eget ante tempus, eget fringilla tellus blandit.</p>
            <div class="product-quantity">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
            </div>
            <div class="product-actions">
                <button class="add-to-cart">Add to Cart</button>
                <button class="buy-now">Buy Now</button>
            </div>
        </div>
    </div>
</body>

</html>
