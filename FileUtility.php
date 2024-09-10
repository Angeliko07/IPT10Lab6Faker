<?php
class FileUtility {
    public static function writeToFile($filename, $data) {
        $file = fopen($filename, 'w');
        if ($file === false) {
            throw new Exception("Unable to open file for writing.");
        }
        
        foreach ($data as $line) {
            fputcsv($file, $line);
        }
        
        fclose($file);
    }

    public static function openFile($filename) {
        $file = fopen($filename, 'r');
        if ($file === false) {
            throw new Exception("Unable to open file.");
        }

        $data = [];
        while (($row = fgetcsv($file)) !== false) {
            $data[] = $row;
        }

        fclose($file);
        return $data;
    }
}
?>
