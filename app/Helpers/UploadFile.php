<?php
if (!function_exists('uploadFile')) {
    function uploadFile($file, $fileName, $folder = 'uploads')
    {
        return $file->move($folder, $fileName);
    }
}
?>
