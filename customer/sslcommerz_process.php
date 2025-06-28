<?php
// customer/sslcommerz_process.php
// Handles payment form POST, sends to SSLCommerz API, redirects to gateway

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../dbcon.php';
    $cus_name = isset($_POST['cus_name']) ? $_POST['cus_name'] : '';
    $cus_email = isset($_POST['cus_email']) ? $_POST['cus_email'] : '';
    $cus_phone = isset($_POST['cus_phone']) ? $_POST['cus_phone'] : '';
    $amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : '';
    if ($cus_name && $cus_email && $cus_phone && $amount) {
        $stmt = $con->prepare("INSERT INTO payment_notifications (cus_name, cus_email, cus_phone, amount, status) VALUES (?, ?, ?, ?, 'initiated')");
        $stmt->bind_param("sssd", $cus_name, $cus_email, $cus_phone, $amount);
        $stmt->execute();
        $stmt->close();
    }

    $post_data = $_POST;
    $api_url = 'https://sandbox.sslcommerz.com/gwprocess/v3/api.php';

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);
    if (isset($result['status']) && $result['status'] === 'SUCCESS' && !empty($result['GatewayPageURL'])) {
        header('Location: ' . $result['GatewayPageURL']);
        exit();
    } else {
        echo '<h3>Payment Initialization Failed</h3>';
        if (isset($result['failedreason'])) {
            echo '<p>Reason: ' . htmlspecialchars($result['failedreason']) . '</p>';
        }
        echo '<pre>' . htmlspecialchars($response) . '</pre>';
        echo '<a href="payment.php">Back to Payment</a>';
    }
} else {
    header('Location: payment.php');
    exit();
}
