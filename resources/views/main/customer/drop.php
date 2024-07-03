<?php
// Sample customers data (replace with your actual data)
$customers = array(
    array("id" => 1, "name" => "John Doe", "phone" => "123-456-7890"),
    array("id" => 2, "name" => "Jane Smith", "phone" => "987-654-3210"),
    // Add more customer data as needed
);

// Get search term from AJAX request
$searchTerm = $_GET['searchTerm'];

// Filter customers based on search term
$filteredCustomers = array_filter($customers, function($customer) use ($searchTerm) {
    return stripos($customer['name'], $searchTerm) !== false || stripos($customer['phone'], $searchTerm) !== false;
});

// Format results for Select2
$results = array_map(function($customer) {
    return array(
        'id' => $customer['id'],
        'text' => $customer['name'] . ' - ' . $customer['phone']
    );
}, $filteredCustomers);

// Return results as JSON
header('Content-Type: application/json');
echo json_encode($results);
?>