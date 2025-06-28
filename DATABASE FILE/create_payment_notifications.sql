CREATE TABLE IF NOT EXISTS payment_notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cus_name VARCHAR(255) NOT NULL,
    cus_email VARCHAR(255) NOT NULL,
    cus_phone VARCHAR(50) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'initiated',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

UPDATE payment_notifications SET status = 'success' WHERE status = 'initiated' AND created_at < NOW();
