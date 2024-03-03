@extends('admin.layouts.layout')
@section('title')Categories - Admin @endsection
@section('css')
        {{-- <link rel="stylesheet" href="{{ asset('public/css/style.css') }}"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('public/css/style.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('public/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/draggable1.css') }}">
        @endsection
@section('content')
<h2>Category List</h2>
<button class="btn">Create Category</button>
<div class="container mt-5">

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
@endsection
@section('javascript')
<script src="{{ asset('public/js/draggable.js') }}"></script>
@endsection
