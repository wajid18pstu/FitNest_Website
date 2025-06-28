<?php
// admin/delete_notification.php
include '../dbcon.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $con->prepare("DELETE FROM payment_notifications WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
header('Location: notifications.php');
exit();
