$row = count( $array ) / 5;
$col = 5;

echo'<table border="1" width="700">';

for( $i = 0; $i < $row; $i++ )
{
    echo'<tr>';
    for( $j = 0; $j < $col; $j++ ) {
        if( ! empty( $array[$j] ) ) {
            echo '<td>'.$array[$j]['item_id'].'</td>';
        }
    }
    echo'</tr>';
}

echo'</table>';