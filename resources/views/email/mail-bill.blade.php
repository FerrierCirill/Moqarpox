Bonjour,<br>
Merci d'avoir effectué votre achat. <br>
<br>
Voici votre facture d'un montant de {{$solde}} €. <br>
<br>
Client: {{$user->first_name}} {{$user->second_name}} <br>
<a href="https://mouqarpox.neolithic.fr/user/historical">Historique d'achat</a> <br>
<br>
<table style="border:solid">
    <tr >
        <td>Numéro</td>
        <td>Activitée</td>
        <td>Ami(e)</td>
        <td>Mail</td>
        <td>Code</td>
        <td>Prix</td>
        <td>Date Limite</td>
        <td>Message personalisée</td>
    </tr>
    @foreach($produits as $produit)
        <tr>
            @php
                $activity = \App\Activity::find($produit->activity_id)
            @endphp
            <td>{{$num}}</td>
            <td>{{$activity->name}}</td>
            <td>{{$produit->friend_name}}</td>
            <td>{{$produit->friend_email}}</td>
            <td>{{$produit->code}}</td>
            <td>{{$activity->price}}</td>
            <td>{{gmdate("d/m/Y",mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1))}}</td>
            <td>{{$produit->text}}</td>
        </tr>
        @php
        $num++
        @endphp
    @endforeach
</table>

