<!DOCTYPE html>
<html>

<head>
    <title>Sales Report</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .summary {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Sales Report</h1>
        <p>Period: {{ ucfirst($filter) }}</p>
        <p>Date: {{ now()->format('d M Y H:i') }}</p>
    </div>

    <div class="summary">
        <p><strong>Total Sales:</strong> Rp {{ number_format($totalSales, 0, ',', '.') }}</p>
        <p><strong>Total Orders:</strong> {{ $totalOrders }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Date/Time</th>
                <th>Orders</th>
                <th>Sales (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesData as $data)
                <tr>
                    <td>{{ $data->label }}</td>
                    <td>{{ $data->total_orders }}</td>
                    <td>Rp {{ number_format($data->total_sales, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>