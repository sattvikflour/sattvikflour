<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/draggable1.css') }}">

        {{-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> --}}

    <title>Category List</title>
</head>
<body>

<div class="container mt-5">
    <h2>Category List</h2>

    <table class="table">
        <thead>
        <tr>
            <th>Category ID</th>
            <th>Display Order</th>
            <th>Category Name</th>
            <th>Availability Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody class="sortable-list">
        @foreach($categories as $category)
            <tr class="item" draggable="true">
                <td>{{ $category->id }}</td>
                <td class="display_order" id="display{{ $category->id }}">
                    @if($category->display_order==null)
                       {{ $category->id }}
                       @else
                       {{ $category->display_order }}
                  @endif
                </td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->avail_status }}</td>
                <td>
                    <a href="{{ route('category.edit', ['id' => $category->id]) }}">
                        <img src="/assets/icons/edit.png" alt="Edit" style="width: 40px;">
                    </a>
                    <img src="/assets/icons/drag.png" alt="drag" style="width: 40px;">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<ul class="sortable-list">
    <li class="item" draggable="true">
      <div class="details">
        <span>    </span>
        <span>Kristina Zasiadko</span>
      </div>
      <i class="uil uil-draggabledots"></i>
    </li>
    <li class="item" draggable="true">
      <div class="details">
        <span>    </span>
        <span>Gabriel Wilson</span>
      </div>
      <i class="uil uil-draggabledots"></i>
    </li>
    <li class="item" draggable="true">
      <div class="details">
        <span>    </span>
        <span>Ronelle Cesicon</span>
      </div>
      <i class="uil uil-draggabledots"></i>
    </li>
    <li class="item" draggable="true">
      <div class="details">
        <span>    </span>
        <span>James Khosravi</span>
      </div>
      <i class="uil uil-draggabledots"></i>
    </li>
  </ul>


  <div class="table-responsive">
    <ul class="list-group">
      <li class="list-group-item">
        <div class="row">
          <div class="col">ID</div>
          <div class="col">Name</div>
          <div class="col">Price</div>
          <div class="col">Name</div>
          <div class="col">Price</div>
        </div>
      </li>
      <li class="list-group-item">
        <div class="row">
          <div class="col">1</div>
          <div class="col">Product 1</div>
          <div class="col">$19.99</div>
          <div class="col">Product 1</div>
          <div class="col">$19.99</div>
        </div>
      </li>
      <li class="list-group-item">
        <div class="row">
          <div class="col">2</div>
          <div class="col">Product 2</div>
          <div class="col">$29.99</div>
          <div class="col">Product 1</div>
          <div class="col">$19.99</div>
        </div>
      </li>
      <!-- Add more rows as needed -->
    </ul>
  </div>


<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="{{ asset('public/js/draggable.js') }}"></script>
</body>
</html>
