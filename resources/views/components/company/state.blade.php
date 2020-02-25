<div class="">
    @if ($state == 0)
        Entreprise en cours de validation <i class="fas fa-hourglass-half"></i>
    @elseif ($state == 1)
        Entreprise validé <i class="fas fa-check"></i>
    @elseif ($state == 2)
        Entreprise refusé <i class="fas fa-times"></i>
    @endif
</div>
