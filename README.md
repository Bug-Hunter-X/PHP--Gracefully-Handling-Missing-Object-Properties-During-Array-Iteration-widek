# PHP: Gracefully Handling Missing Object Properties During Array Iteration

This repository demonstrates a common coding error in PHP involving iterating over an array of objects and accessing properties that might not always exist.  The code example shows how to safely handle this situation to avoid errors and unexpected behavior.

## The Bug

The `bug.php` file contains a function that processes an array of objects. It attempts to access the `value` property of each object.  If an object is missing this property, a warning is issued or an error occurs, potentially causing the script to crash or produce unexpected results. 

## The Solution

The `bugSolution.php` file provides a corrected version of the function.  It uses `isset()` to check if the `value` property exists before attempting to access it.   This approach avoids errors when the property is missing.  The solution also includes error logging, which provides better visibility into data integrity problems.