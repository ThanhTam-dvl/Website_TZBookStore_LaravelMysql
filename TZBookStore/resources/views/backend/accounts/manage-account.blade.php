@extends('layouts.backend')

@section('content')
<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="tm-block-title" style="color: #fff; font-weight: bold;">List of Accounts</h2>
                    <button type="button" 
                            class="btn" 
                            style="background-color: #00ccff; color: #fff;"
                            data-toggle="modal" 
                            data-target="#createAccountModal">
                        <i class="fas fa-plus"></i> Add New Account
                    </button>
                </div>
                
                <p style="color: #9be64d;">Filter by Role</p>
                <select class="custom-select" id="roleFilter">
                    <option value="">All Roles</option>
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                    <!-- <option value="staff">Staff</option> -->
                </select>
            </div>
        </div>
    </div>

    <!-- User List Section -->
    <div class="row tm-content-row mt-3">
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <h2 class="tm-block-title" style="color: #fff; font-weight: bold;">User List</h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <!-- Users table -->
                <div class="table-responsive">
                    <table class="table table-hover table-striped tm-table-striped-even">
                        <thead>
                            <tr style="background-color: #435c70;">
                                <th style="color: #fff;">Username</th>
                                <th style="color: #fff;">Full Name</th>
                                <th style="color: #fff;">Email</th>
                                <th style="color: #fff;">Role</th>
                                <th style="color: #fff;">Status</th>
                                <th style="color: #fff;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td style="color: #00ccff;">{{ $user->username }}</td>
                                <td style="color: #fff;">{{ $user->full_name }}</td>
                                <td style="color: #fff;">{{ $user->email }}</td>
                                <td>
                                    <span class="badge" style="background-color: #00ccff; color: #fff;">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $user->is_active ? 'badge-success' : 'badge-danger' }}">
                                        {{ $user->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm" 
                                            style="background-color: #00ccff; color: #fff;"
                                            data-toggle="modal"
                                            data-target="#editAccountModal{{ $user->user_id }}">
                                        <i class="fas fa-eye"></i> View Details
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center" style="color: #fff;">
                                    No users found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Account Modal -->
<div class="modal fade" id="createAccountModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #435c70;">
            <div class="modal-header">
                <h5 class="modal-title" style="color: #fff;">Create New Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.accounts.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color: #9be64d;">Username</label>
                                <input type="text" 
                                       name="username" 
                                       class="form-control @error('username') is-invalid @enderror"
                                       required>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color: #9be64d;">Email</label>
                                <input type="email" 
                                       name="email" 
                                       class="form-control @error('email') is-invalid @enderror"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color: #9be64d;">Full Name</label>
                                <input type="text" 
                                       name="full_name" 
                                       class="form-control @error('full_name') is-invalid @enderror"
                                       required>
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color: #9be64d;">Password</label>
                                <input type="password" 
                                       name="password" 
                                       class="form-control @error('password') is-invalid @enderror"
                                       required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color: #9be64d;">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="customer">Customer</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color: #9be64d;">Status</label>
                                <select name="is_active" class="form-control" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Account</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Account Modals -->
@foreach($users as $user)
<div class="modal fade" id="editAccountModal{{ $user->user_id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #435c70;">
            <div class="modal-header">
                <h5 class="modal-title" style="color: #fff;">Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.accounts.update', $user->user_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label style="color: #9be64d;">Username</label>
                                <input type="text" 
                                       name="username" 
                                       value="{{ $user->username }}"
                                       class="form-control"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label style="color: #9be64d;">Email</label>
                                <input type="email" 
                                       name="email" 
                                       value="{{ $user->email }}"
                                       class="form-control"
                                       required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label style="color: #9be64d;">Full Name</label>
                                <input type="text" 
                                       name="full_name" 
                                       value="{{ $user->full_name }}"
                                       class="form-control"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label style="color: #9be64d;">New Password (leave blank to keep current)</label>
                                <input type="password" 
                                       name="password" 
                                       class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label style="color: #9be64d;">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Customer</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label style="color: #9be64d;">Status</label>
                                <select name="is_active" class="form-control" required>
                                    <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #435c70; color: #fff;" data-dismiss="modal">Close</button>
                    <div>
                        <button type="submit" class="btn me-2" style="background-color: #00ccff; color: #fff;">Update Account</button>
                        <button type="button" 
                                class="btn" 
                                style="background-color: #dc3545; color: #fff;"
                                onclick="deleteAccount({{ $user->user_id }})">
                            Delete Account
                        </button>
                    </div>
                </div>
            </form>

            <form id="delete-form-{{ $user->user_id }}" 
                  action="{{ route('admin.accounts.destroy', $user->user_id) }}" 
                  method="POST" 
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>
@endforeach

@push('scripts')
<script>
    // Role filter functionality
    document.getElementById('roleFilter').addEventListener('change', function() {
        const role = this.value;
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const roleCell = row.querySelector('td:nth-child(4)');
            if (!role || roleCell.textContent.trim().toLowerCase().includes(role.toLowerCase())) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Thêm hàm xử lý xóa tài khoản
    function deleteAccount(userId) {
        if (confirm('Are you sure you want to delete this account?')) {
            document.getElementById('delete-form-' + userId).submit();
        }
    }
</script>
@endpush

@push('styles')
<style>
.modal-content {
    border: 1px solid #00ccff;
}

.form-control {
    background-color: #54657d;
    color: #fff;
    border: 1px solid #00ccff;
    padding: 8px 12px;
    line-height: 1.5;
    height: auto;
}

.form-control:focus {
    background-color: #54657d;
    color: #fff;
    border-color: #00ccff;
    box-shadow: 0 0 0 0.2rem rgba(0, 204, 255, 0.25);
}

select.form-control {
    padding-right: 30px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23ffffff' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 12px;
}

select.form-control option {
    background-color: #435c70;
    color: #fff;
    padding: 8px 12px;
}

.modal-header {
    border-bottom: 1px solid #00ccff;
}

.modal-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #00ccff;
}

.modal-footer > div {
    display: flex;
    gap: 0.5rem;
}

.btn {
    padding: 8px 16px;
    border: none;
    transition: all 0.3s ease;
}

.btn:hover {
    opacity: 0.9;
}

.me-2 {
    margin-right: 0.5rem;
}

.close {
    text-shadow: none;
    opacity: 1;
}

.close:hover {
    color: #00ccff;
    opacity: 1;
}

.form-group {
    margin-bottom: 1rem;
}

.form-group label {
    margin-bottom: 0.5rem;
    font-weight: 500;
}

/* Fix Firefox specific styling */
@-moz-document url-prefix() {
    select.form-control {
        padding-right: 30px;
        background-position: right 10px center;
    }
}

/* Remove default select arrow in IE */
select::-ms-expand {
    display: none;
}
</style>
@endpush
@endsection
