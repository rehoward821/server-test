<?php
// Example PHP script to fetch data from a public API using cURL

// Define the API endpoint
$apiUrl = 'https://jsonplaceholder.typicode.com/posts';

// Initialize a cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);             // Set the request URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);      // Return the response as a string
curl_setopt($ch, CURLOPT_TIMEOUT, 10);               // Set timeout to 10 seconds

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    // Print the error message if something goes wrong
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Get the HTTP status code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Check if the request was successful
    if ($httpCode === 200) {
        // Decode the JSON response
        $data = json_decode($response, true);

        // Display the first 5 records
        echo "Fetched Data (first 5 records):\n";
        for ($i = 0; $i < 5; $i++) {
            print_r($data[$i]);
        }
    } else {
        echo "HTTP Error: $httpCode\n";
    }
}

// Close the cURL session
curl_close($ch);
?>
