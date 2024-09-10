<?php
require "vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Create a log channel
$log = new Logger('ipt10');
$log->pushHandler(new StreamHandler('ipt10.log', Logger::DEBUG));

// Add records to the log
$log->warning('[YOUR COMPLETE NAME]');
$log->error('[YOUR EMAIL ADDRESS]');
$log->info('profile', [
    'student_number' => '[YOUR STUDENT NUMBER]',
    'college' => '[COLLEGE NAME]',
    'program' => '[PROGRAM NAME]',
    'university' => '[UNIVERSITY NAME]'
]);

class TestClass
{
    private $logger;

    public function __construct($logger_name)
    {
        $this->logger = new Logger($logger_name);
        // Log that the class has been created
        $this->logger->info(__FILE__ . " Greetings to {$logger_name}");
    }

    public function greet($name)
    {
        // Provide a greeting message with the name of the invoker
        $message = "Greetings to {$name}";
        // Log it
        $this->logger->info(__METHOD__ . " " . $message);
        return $message;
    }

    public function getAverage($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " Calculating the average");
        // Compute the average and return it
        if (empty($data)) {
            $this->logger->warning('No data provided for average calculation.');
            return null;
        }
        $average = array_sum($data) / count($data);
        return $average;
    }

    public function largest($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " Finding the largest number");
        // Compute the largest number and return it
        if (empty($data)) {
            $this->logger->warning('No data provided for largest number calculation.');
            return null;
        }
        return max($data);
    }

    public function smallest($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " Finding the smallest number");
        // Compute the smallest number and return it
        if (empty($data)) {
            $this->logger->warning('No data provided for smallest number calculation.');
            return null;
        }
        return min($data);
    }
}

// Instantiate the class
$my_name = 'John Doe';
$obj = new TestClass('myLogger');

// Call methods with appropriate arguments
echo $obj->greet($my_name) . "\n";

$data = [100, 345, 4563, 65, 234, 6734, -99];
$average = $obj->getAverage($data);
$largest = $obj->largest($data);
$smallest = $obj->smallest($data);

// Log the results
$log->info('data', ['value' => $data]);
$log->info('average', ['value' => $average]);
$log->info('largest', ['value' => $largest]);
$log->info('smallest', ['value' => $smallest]);
?>
