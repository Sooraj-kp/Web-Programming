
<?php
        function fibonacciSeries($n) {
                $num1 = 0;
                $num2 = 1;
                echo "Fibonacci Series up to $n terms: <br><br>";
                for ($i = 0; $i < $n; $i++) {
                        echo $num1 . " ";
                        $num3 = $num1 + $num2;
                        $num1 = $num2;
                        $num2 = $num3;
                }
        }
        fibonacciSeries(15);
?>
