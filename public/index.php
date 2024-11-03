<?php

class Api {
    private $api_url = 'https://smmxpanel.com/api/v2';
    private $api_key = '872ef2fdfd2aebaf8121b2ac3bf10725';

    public function order($data) {
        $data['key'] = $this->api_key;
        $data['action'] = 'add';

        // Initialize cURL and send the request
        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response
        $response = json_decode($result, true);

        // Handle response or error
        if (isset($response['error'])) {
            echo "Error: " . $response['error'];
        } else {
            echo "Order ID: " . $response['order'];
        }
    }
}

// Self-invoke automation
$api = new Api();
$api->order([
    'service' => 2244,
    'link' => 'https://vt.tiktok.com/ZSjMaqNyB/',
    'quantity' => 500
]);

?>
