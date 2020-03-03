<button id="Shopping_Add" type="button" class="btn">Ajouter au panier</button>

<script>
    const shoppingCart_route = "{{route('shopping_cart_add')}}";
    const shoppingCart_token = "{{ csrf_token() }}";
    const shoppingCart_idActivity = {{$activity_id}};

    document.getElementById('Shopping_Add').addEventListener('click', () => {
        fetch(shoppingCart_route, {
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": shoppingCart_token
                },
                method: 'post',
                body: JSON.stringify({
                    activity_id : shoppingCart_idActivity
                })
        })
        .then(response => response.text())
        .then(result => {
            if (result != 'OK') {
                alert('Erreur d\'ajout de votre produit à votre panier');
            } else {
                messageOK();
            }
        })
        .catch(error => console.log('error', error));
    });


    // function ajoutOnLocalStorage(activity) {
        //     activity     = JSON.parse(activity);
        //     shoppingCart = localStorage.getItem('moqarpox_your_shopping_cart') ? JSON.parse(localStorage.getItem('moqarpox_your_shopping_cart')) : [] ;

        //     let found =  false;
        //     shoppingCart.forEach(row => {
        //         if (row.id == activity.id) {
        //             row.quantity++;
        //             found = true;
        //         }
        //     });
        //     if (!found) {
        //         shoppingCart.push({
        //             id      : activity.id,
        //             link    : activity.link1,
        //             name    : activity.name,
        //             quantity: 1,
        //             price   : activity.price
        //         });
        //     }

        //     localStorage.setItem('moqarpox_your_shopping_cart', JSON.stringify(shoppingCart));
        //     messageOK();
    // }



    function messageOK() {
        M.toast({html: 'Produit ajouté à votre panier'});
    }
</script>