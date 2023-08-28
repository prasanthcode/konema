<!DOCTYPE html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <title>Orders Management</title>

    <style>
        /* Your existing styles */

.order-list {
    display: flex;
    flex-direction: column;
    border: 1px solid #ccc;
    padding: 10px;
    margin: 20px;
}

.order-item {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #ccc;
    padding: 5px 0;
}

.order-cell {
    flex: 1;
    padding: 5px;
}

.order-id {
    flex: 0.5;
}

.order-status {
    flex: 1;
}

.user-id, .items-count, .order-date, .total-amount {
    flex: 0.5;
    text-align: center;
}


/* Common styles for anchor tags */
a {
  text-decoration: none;
  padding: 5px 10px;
  border-radius: 4px;
  font-weight: bold;
  display: inline-block;
}

/* Styles for completed anchor tags */
.completed {
  background-color: red;
  color: #fff;

}

/* Styles for partially completed anchor tags */
.partially-completed {
  background-color: #007bff;
  color: #fff;
}


    </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Orders Management</h1>
    
    <div class="orders-list">
        <?php include('load_orders.php'); ?>
    </div>
    
    <script src="script.js"></script>

    <script>
    

    </script>
</body>
</html>
