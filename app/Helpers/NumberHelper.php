<?php

// app/Helpers/NumberHelper.php

if (!function_exists('formatNumber')) {
    function formatNumber($number)
    {
        // Define los límites para las abreviaciones
        $abbrevs = ['K', 'M', 'B', 'T'];

        for ($i = count($abbrevs) - 1; $i >= 0; $i--) {
            $size = pow(10, ($i + 1) * 3);

            if ($size <= abs($number)) {
                $number = round($number / $size, 1);

                // Agrega la abreviación al número
                $number .= $abbrevs[$i];
                break;
            }
        }

        return $number;
    }
}
