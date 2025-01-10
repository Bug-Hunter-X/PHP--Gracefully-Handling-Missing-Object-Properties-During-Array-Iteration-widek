```php
function processData(array $data): array {
  // Check if the array is empty
  if (empty($data)) {
    return []; // Return an empty array if input is empty
  }

  // Initialize an empty array to store the results
  $result = [];

  foreach ($data as $item) {
    // Here's where the potential error lies.  Assume $item is an object with a property 'value'.
    if (isset($item->value)) {
        $result[] = $item->value;
    } else {
        // Handle the case where 'value' property is missing, avoid exceptions.
        // For example, log the error, or return a default value.
        error_log('Value property missing in data item.'); 
        // $result[] = 0; // Or another default value
    }
  }

  return $result;
}

// Example usage
$data = [
    (object)['value' => 1],
    (object)['value' => 2],
    (object)['anotherProperty' => 3], // This item lacks the 'value' property
    (object)['value' => 4],
];

$processedData = processData($data);
print_r($processedData); // Output will be [1, 2, 4], demonstrating the error handling
```