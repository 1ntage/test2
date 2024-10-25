<!DOCTYPE>
<html lang="ru">
<head>
    <title>Заказы</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Номер заказа</th>
        <th>Время создания</th>
        <th>Список блюд</th>
        <th>Номер столика</th>
        <th>Статус</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->dishes }}</td>
            <td>{{ $order->table_number }}</td>
            <td>{{ $order->status }}</td>
            <td>@if ($order->status == 'новый')
                    <form action="{{ route('orders.accept', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit">Принять</button>
                    </form>
                @elseif ($order->status == 'принят')
                    <form action="{{ route('orders.cook', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit">Приготовить</button>
                    </form>
                @elseif ($order->status == 'приготовлен')
                    <form action="{{ route('orders.complete', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit">Завершить</button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
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
</html>
