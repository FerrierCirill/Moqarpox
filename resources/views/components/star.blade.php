@php
    $note = round($note * 2) / 2;
    $i    = 0;

    while ($i < 5) {
        if ($note - 1 >= 0) {
            echo '<i class="fas fa-star"></i>';
            $note--;
        }
        else if ($note - 0.5 >= 0) {
            echo '<i class="fas fa-star-half-alt"></i>';
            $note -= 0.5;
        }
        else {
            echo '<i class="far fa-star"></i>';
        }
        $i++;
    }
@endphp