$(document).ready(function () {
    let cart = {};

    $(".add-to-cart").click(function () {
        let productId = $(this).data("id");
        let cardBody = $(this).closest(".card-body");

        if (cart[productId]) {
            cart[productId].quantity += 1;
        } else {
            cart[productId] = {
                id: productId,
                img: $(this).closest(".card").find("img").attr("src"),
                name: cardBody.find(".card-title strong").text(),
                price: parseFloat(
                    cardBody
                        .find(".card-text:contains('Precio:')")
                        .text()
                        .replace("Precio: $", "")
                ),
                brand: cardBody
                    .find(".card-text:contains('Marca:')")
                    .text()
                    .replace("Marca: ", ""),
                quantity: 1,
            };
        }
        updateCartTable();
    });

    function updateCartTable() {
        let cartTableBody = $("#carritoTable tbody");

        if (cartTableBody.length === 0) {
            console.error("Carrito dropdown table body not found");
            return;
        }

        // Limpiar el contenido anterior de la tabla
        cartTableBody.empty();

        let total = 0;

        // Agregar cada producto del carrito a la tabla
        $.each(cart, function (id, product) {
            total += product.price * product.quantity;
            cartTableBody.append(`
                <tr>
                    <td><img src="${
                        product.img
                    }" alt="${product.name}" style="width: 50px; height: 50px;"></td>
                    <td>${product.name}</td>
                    <td>$${product.price.toFixed(2)}</td>
                    <td>${product.brand}</td>
                    <td><input type="number" class="form-control quantity" data-id="${
                        product.id
                    }" value="${product.quantity}" min="1" style="width: 50px;"></td>
                    <td><button class="btn btn-danger btn-sm remove-from-cart" data-id="${
                        product.id
                    }">Eliminar</button></td>
                </tr>
            `);
        });

        // Actualizar el total del carrito
        $("#carrito-total").text(`Total a pagar: $${total.toFixed(2)}`);
    }

    $(document).on("change", ".quantity", function () {
        let productId = $(this).data("id");
        let newQuantity = parseInt($(this).val());
        if (newQuantity > 0) {
            cart[productId].quantity = newQuantity;
        } else {
            $(this).val(cart[productId].quantity);
        }
        updateCartTable();
    });

    $(document).on("click", ".remove-from-cart", function () {
        let productId = $(this).data("id");
        delete cart[productId];
        updateCartTable();
    });

    $(document).on("click", ".remove-from-cart", function () {
        let productId = $(this).data("id");
        delete cart[productId];
        updateCartTable();
    });

    $(document).on("click", "#remove-all", function () {
        cart = {};
        updateCartTable();
    });
    $(document).on("click", "#pay-carrito", function () {
        alert("Iniciar proceso de pago. " + $("#carrito-total").text());
    });
});
