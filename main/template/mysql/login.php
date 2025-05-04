<?php
require 'conn.php'; // Database connection
session_start(); // Start session to store user role

header("Content-Type: application/json"); // Ensures JSON response

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "All fields are required!"]);
        exit;
    }

    try {
        // Fetch user from the database using username
        $stmt = $pdo->prepare("SELECT id, username, role, gmail, first_name, middle_name, last_name, image_path, password, status FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Define helper functions outside the logic blocks
        function getUserIP() {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
            else return $_SERVER['REMOTE_ADDR'];
        }

        function getLocation($ip) {

            // Skip local IPs
            if ($ip === '127.0.0.1' || $ip === '::1') {
                return ['city' => 'Localhost', 'region' => null, 'country' => null];
            }
            
            $location = @json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
            if ($location && $location->status === "success") {
                return [
                    'city' => $location->city,
                    'region' => $location->regionName,
                    'country' => $location->country
                ];
            }
            return ['city' => null, 'region' => null, 'country' => null];
        }

        if ($user) {
            // Check if the account is inactive
            if ($user['status'] == 0) {
                echo json_encode(["status" => "error", "message" => "Account is Inactive"]);
                exit;
            }

            // ✅ Verify password before logging login attempt
            if (password_verify($password, $user['password'])) {
                $_SESSION['role'] = $user['role']; // Store role in session

                // Store user data in a single JSON cookie named "brgy" (valid for 7 days)
                $userData = json_encode([
                    "user_id" => $user['id'],
                    "role" => $user['role'],
                    "username" => $user['username'],
                    "gmail" => $user['gmail'],
                    "full_name" => trim("{$user['first_name']} {$user['middle_name']} {$user['last_name']}"),
                    "image_path" => $user['image_path']
                ]);

                setcookie("brgy", $userData, time() + (7 * 24 * 60 * 60), "/");

                // ✅ Log login info only on successful login
                $ip = getUserIP();
                $location = getLocation($ip);
                $userAgent = $_SERVER['HTTP_USER_AGENT'];

                $logStmt = $pdo->prepare("INSERT INTO login_logs (user_id, ip_address, city, region, country, device_info) VALUES (?, ?, ?, ?, ?, ?)");
                $logStmt->execute([
                    $user['id'],
                    $ip,
                    $location['city'],
                    $location['region'],
                    $location['country'],
                    $userAgent
                ]);

                echo json_encode(["status" => "success", "message" => "Login successful!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Invalid username or password"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid username or password"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
}
?>
