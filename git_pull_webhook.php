<?php

$secret = 'your_webhook_secret';  // This is optional but recommended for security
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'] ?? '';

// Only respond to POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

// Verify the signature (if secret was set)
if ($secret && $signature) {
    $payload = file_get_contents('php://input');
    [$algo, $hash] = explode('=', $signature, 2) + ['', ''];
    if (!hash_equals($hash, hash_hmac($algo, $payload, $secret))) {
        http_response_code(403);
        exit;
    }
}

// Execute the shell script
shell_exec('/usr/local/bin/git_pull_webhook.sh > /dev/null 2>/dev/null &');

http_response_code(200);
echo "Webhook received and processing";

?>
