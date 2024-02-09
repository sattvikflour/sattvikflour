
  @include('website.layouts.header')
    <!-- slider section -->
    @include('website.partials.slider')
    <!-- end slider section -->
    <!-- cart section -->
    @include('website.partials.cart')
    <!-- login section -->
    @include('website.partials.login')
  @php 
  //dd($categories) 
  @endphp
  <div class="row mt-4 mb-4 mx-4">
    @foreach($categories as $category)
        <div class="col-md-4 mb-4">
          <div class="card">
          <a href="{{ route('category_url',['category_url' => $category->category_url]) }}">
                <img src="{{ asset('public/assets/images/' . $category->category_img)}}" class="card-img-top" alt="{{ $category->category_name }}">
              </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $category->category_name }}</h5>
                    {{-- <p class="card-text">{{ $category->product_price }}</p> --}}
                    <a href="#" class="btn btn-primary btn-block">Order Now</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

  <!-- app section -->
  @include('website.partials.app_section');
  <!-- end app section -->

  <!-- footer section -->
  @include('website.layouts.footer');
  <!-- footer section -->