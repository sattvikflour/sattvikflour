<section id=cart_section>
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center" style="width: 100%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cartItems">
                    <!-- Cart items will be displayed here -->
                </div>
                <div class="modal-footer">
                    <p class="total-price">Total Price: $0.00</p>
                    <button type="button" class="btn btn-primary" id="checkoutBtn"
                        onclick="location.href='/checkout'">Checkout</button>
                </div>
            </div>
        </div>
    </div>

</section>
