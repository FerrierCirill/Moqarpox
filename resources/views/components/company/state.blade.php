<div class="">
    @if ($state == 0)
        Entreprise en cours de validation <i class="fas fa-hourglass-half"></i>
    @elseif ($state == 1)
        Entreprise validée <i class="fas fa-check"></i>
    @elseif ($state == 2)
        Entreprise refusée <i class="fas fa-times"></i>
    @elseif ($state == -1)
        Entreprise désactivée <i class="fas fa-eye-slash"></i>
    @endif
</div>
