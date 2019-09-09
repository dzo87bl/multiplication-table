<?php

    /**
	 * @author Nikola Tomic - dzo87bl
	 * @copyright 2018
	 */

    class multiplication_table {

        public function render_table() {

            // vars
            $cols = 10;
            $rows = 10;
            
            // table html
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered">';
    
            // draw table
            for ($r = 1; $r <= $rows; $r++){
    
                echo('<tr>');
    
                for ($c = 1; $c <= $cols; $c++)
                    echo( '<td class="mt_td" data-factor1="' . $c . '" data-factor2="' . $r . '" data-result="' . $c * $r . '">' . $c . '&times;' . $r .'</td>');
    
                echo('</tr>');
    
            }
    
            echo '</table>';
            echo '</div>';
    
        }

    }

?>