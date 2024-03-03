@include('website.layouts.header')
  {{-- @php 
  //dd($product) 
 @endphp --}}
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('public/assets/images/' . $product->prod_img) }}" class="img-fluid" alt="{{ $product->prod_name }}">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->prod_name }}</h2>
                <p>{{ $product->prod_description }}</p>
                
                @if ($product->prod_types_avail == 1)
                <div class="product-types mt-4">
                  <label for="product-types" class="font-weight-bold">{{$product->prod_type_label}}</label>
                  <div class="form-check">
                      <input type="radio" class="form-check-input" id="fine-grind" name="product-type" value="fine-grind">
                      <label class="form-check-label" for="fine-grind">Fine Grind</label>
                  </div>
                  <div class="form-check">
                      <input type="radio" class="form-check-input" id="normal-grind" name="product-type" value="normal-grind">
                      <label class="form-check-label" for="normal-grind">Normal Grind</label>
                  </div>
                  <div class="form-check">
                      <input type="radio" class="form-check-input" id="coarse-grind" name="product-type" value="coarse-grind">
                      <label class="form-check-label" for="coarse-grind">Coarse Grind</label>
                  </div>
              </div>
              @endif

              @if ($product->packaging_opts_avail == 1)
                <div class="packaging-options mt-4">
                    <label for="packaging-options" class="font-weight-bold">{{$product->packaging_opts_label}}</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="10kg" name="packaging" value="10">
                        <label class="form-check-label" for="10kg">10 Kg</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="5kg" name="packaging" value="5">
                        <label class="form-check-label" for="5kg">5 Kg</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="2kg" name="packaging" value="2">
                        <label class="form-check-label" for="2kg">2 Kg</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="1kg" name="packaging" value="1">
                        <label class="form-check-label" for="1kg">1 Kg</label>
                    </div>
                </div>
                @endif

                <div class="order-quantity mt-4">
                    <label for="quantity" class="font-weight-bold">Order Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
                </div>

                <div class="mt-4">
                    <button class="btn btn-success btn-rectangle" id="cartBtn" data-product-id="{{$productId}}">Add to Cart</button>
                    <button class="btn btn-success ml-5 btn-rectangle">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}

<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered text-center" style="width: 100%;" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="cartModalLabel">Hello Shopping Cart</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body" id="cartItems">
              <!-- Cart items will be displayed here -->
          </div>
          <div class="modal-footer">
              <p class="total-price">Total Price: $0.00</p>
              <button type="button" class="btn btn-primary" id="checkoutBtn" onclick="location.href='/checkout'">Checkout</button>
          </div>
      </div>
  </div>
</div>

  <!-- app section -->
  @include('website.partials.app_section');
  <!-- end app section -->

  <!-- footer section -->
  @include('website.layouts.footer');
  <!-- footer section -->