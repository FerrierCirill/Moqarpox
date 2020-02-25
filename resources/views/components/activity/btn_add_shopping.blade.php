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
                    activity_id: shoppingCart_idActivity
                })
        })
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));
    });
</script>