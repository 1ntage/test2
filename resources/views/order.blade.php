<body>
<form action="{{ route('make-order') }}" method="POST">
    @csrf
    <label for="dishes">Блюда</label>
    <input type="text" name="dishes" id="dishes" required>
    <label for="table_number">Номер столика</label>
    <input type="number" name="table_number" id="table_number" min="1" required>
    <button type="submit">Оформить заказ</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
</body>
