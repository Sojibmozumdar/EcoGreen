@extends('backend.mastaring')

@section('content')
    <div class="ecogreen-category-form">

        <style>
            /* ===== Scoped EcoGreen Category Form ===== */
            .ecogreen-category-form {
                --eco-dark: #0f3d2e;
                --eco-main: #2e8b57;
                --eco-soft: #eaf6ef;
            }

            .ecogreen-category-form .form-box {
                max-width: 650px;
                margin: auto;
                background: #ffffff;
                border-radius: 18px;
                padding: 30px;
                box-shadow: 0 15px 35px rgba(0, 0, 0, .08);
            }

            .ecogreen-category-form .form-title {
                font-weight: 600;
                color: #1f513f;
            }

            .ecogreen-category-form .form-label {
                font-size: 14px;
                font-weight: 600;
                color: #1f513f;
            }

            .ecogreen-category-form .form-control,
            .ecogreen-category-form .form-select {
                border-radius: 12px;
                border: 1px solid #d7e7df;
                padding: 10px 14px;
                font-size: 14px;
            }

            .ecogreen-category-form .form-control:focus,
            .ecogreen-category-form .form-select:focus {
                border-color: var(--eco-main);
                box-shadow: 0 0 0 .2rem rgba(46, 139, 87, .15);
            }

            /* Status Switch */
            .ecogreen-category-form .form-switch .form-check-input {
                width: 48px;
                height: 24px;
                cursor: pointer;
            }

            .ecogreen-category-form .form-check-input:checked {
                background-color: var(--eco-main);
                border-color: var(--eco-main);
            }

            /* Buttons */
            .ecogreen-category-form .btn-eco {
                background: linear-gradient(135deg, #3cb371, #2e8b57);
                border: none;
                color: #fff;
                border-radius: 30px;
                padding: 10px 28px;
                font-size: 14px;
            }

            .ecogreen-category-form .btn-cancel {
                border-radius: 30px;
                padding: 10px 28px;
                font-size: 14px;
            }
        </style>

        <div class="form-box">

            <h5 class="form-title mb-4">Edit Sub Category</h5>

            <form action="{{ route('sub_category.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label class="form-label">Sub Category Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $row->name) }}" placeholder="Enter sub category name">
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ (old('category_id', $row->category_id) == $category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                        value="{{ old('order', $row->order) }}" placeholder="Display order">
                    @error('order')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label d-block mb-2">Status</label>
                    <select class="form-select" name="status">
                        <option value="1" {{ old('status', $row->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $row->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-eco">
                        <i class="bi bi-check-circle"></i> Save Sub Category
                    </button>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-cancel">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
@endsection
