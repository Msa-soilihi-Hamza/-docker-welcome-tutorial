<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if ($data === null) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid JSON data']);
        exit();
    }

    // Read existing results
    $resultsFile = 'data/results.json';
    $results = [];
    
    if (file_exists($resultsFile)) {
        $fileContent = file_get_contents($resultsFile);
        if ($fileContent !== false) {
            $results = json_decode($fileContent, true) ?? [];
        }
    }

    // Add new result
    $results[] = [
        'winner' => $data['winner'],
        'date' => $data['date']
    ];

    // Save back to file
    if (file_put_contents($resultsFile, json_encode($results, JSON_PRETTY_PRINT))) {
        http_response_code(200);
        echo json_encode(['success' => true]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to save results']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
