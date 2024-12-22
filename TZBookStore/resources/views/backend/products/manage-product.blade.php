@extends('layouts.backend')
@section('content')
<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.products.destroy-multiple') }}" method="POST" id="deleteForm">
                    @csrf
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table text-white">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input type="checkbox" id="selectAll">
                                    </th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">IN STOCK</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="ids[]" value="{{ $product->book_id }}">
                                    </td>
                                    <td>
                                        <img src="{{ $product->image_url ?? asset('frontend/img/product-default.jpg') }}" 
                                             alt="Product Image" 
                                             style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td class="tm-product-name">
                                        <a href="{{ route('admin.products.edit', $product->book_id) }}" 
                                           class="text-white text-decoration-none">
                                            {{ $product->title }}
                                        </a>
                                    </td>
                                    <td>{{ $product->stock_quantity }}</td>
                                    <td>{{ number_format($product->price) }}đ</td>
                                    <td>
                                        <form action="{{ route('admin.products.destroy', $product->book_id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="tm-product-delete-link"
                                                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('admin.products.create') }}" 
                               class="btn btn-primary btn-block text-uppercase mb-3">
                                Add new product
                            </a>
                        </div>
                        <div class="col-12">
                            <button type="submit" 
                                    class="btn btn-primary btn-block text-uppercase"
                                    onclick="return confirm('Bạn có chắc muốn xóa các sản phẩm đã chọn?')">
                                Delete selected products
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
                <h2 class="tm-block-title">Product Categories</h2>
                <div class="tm-product-table-container">
                    <table class="table tm-table-small tm-product-table text-white">
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td class="tm-product-name">{{ $category->category_name }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.categories.destroy', $category->category_id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="tm-product-delete-link"
                                                onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')">
                                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary btn-block text-uppercase mb-3" 
                        data-toggle="modal" 
                        data-target="#addCategoryModal">
                    Add new category
                </button>
            </div>
        </div>
    </div>
</div>

@include('backend.products.modals.add-category')

@push('scripts')
<script>
    document.getElementById('selectAll').addEventListener('change', function() {
        let checkboxes = document.getElementsByName('ids[]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    document.getElementById('deleteForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        let checkboxes = document.querySelectorAll('input[name="ids[]"]:checked');
        if (checkboxes.length === 0) {
            alert('Vui lòng chọn ít nhất một sản phẩm để xóa!');
            return;
        }

        if (confirm('Bạn có chắc muốn xóa các sản phẩm đã chọn?')) {
            this.submit();
        }
    });
</script>
@endpush
@endsection