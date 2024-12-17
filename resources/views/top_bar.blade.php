<div class="row mb-3 align-items-center">
    <div class="col">
        <a href="{{ route('home') }}">
            <h2>Notas pessoais</h2>
        </a>
    </div>
    <div class="col text-center">
    </div>
    <div class="col">
        <div class="d-flex justify-content-end align-items-center">
            <span class="me-3"><i class="fa-solid fa-user-circle fa-lg text-secondary me-3"></i>{{ session('user.username') }}</span>
            <a href="{{ route('logout') }}" class="btn btn-outline-secondary px-3">
                Logout<i class="fa-solid fa-arrow-right-from-bracket ms-2"></i>
            </a>
        </div>
    </div>
</div>

<hr>