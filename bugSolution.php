```php
function processData(array $data): array {
  // Check if the array is empty
  if (empty($data)) {
    return []; // Return an empty array if input is empty
  }

  // Initialize an empty array to store the results
  $result = [];

  foreach ($data as $item) {
    // Check if the 'value' property exists before accessing it
    if (isset($item->value)) {
      $result[] = $item->value;
    } else {
      // Handle the case where 'value' property is missing, avoid exceptions.
      // Here we log the error.  Other options could be to use a default value
      // or to filter out the invalid item.
      error_log('Value property missing in data item: ' . json_encode($item));
    }
  }

  return $result;
}

// Example usage (same as in bug.php)
$data = [
    (object)['value' => 1],
    (object)['value' => 2],
    (object)['anotherProperty' => 3], // This item lacks the 'value' property
    (object)['value' => 4],
];

$processedData = processData($data);
print_r($processedData); // Output will be [1, 2, 4], demonstrating the error handling
```