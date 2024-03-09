@include('website.layouts.header')
  @php 
  //dd($products) 
  @endphp
  <div class="row mt-4 mb-4 mx-4">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card position-relative">
            @if($product->prod_badge_status == 1)
                <span class="badge badge-primary badge-top-right">{{ $product->prod_badge_text }}</span>
            @endif
            <a href="{{ route('view.product', ['prod_id' => $product->id]) }}">
                <img src="{{ asset('public/assets/images/product/' . $product->prod_img) }}" class="card-img-top" alt="{{ $product->prod_name }}">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{ $product->prod_name }}</h5>
                @if($product->prod_offer_status == 1)
                    <p class="card-text"><b>
                      Rs. {{ $product->prod_offer_price }}</b>
                        <del>Rs. {{ $product->prod_original_price }}</del>
                    </p>
                @else
                    <p class="card-text text-center"><b>Rs. {{ $product->prod_original_price }}</b></p>
                @endif
                <div class="d-flex justify-content-between">
                  <button class="btn btn-success btn-rectangle" id="cartBtn">Add to Cart</button>
                  {{-- <button href="{{ route('prod_id', ['prod_id' => $product->id]) }}" class="btn btn-primary btn-rectangle">Order Now</button> --}}
              </div>
            </div>
        </div>
    </div>
@endforeach
</div>

  @include('website.partials.app_section')
 
  @include('website.layouts.footer')
  