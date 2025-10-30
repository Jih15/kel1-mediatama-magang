<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Print</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .report-info {
            margin-bottom: 20px;
        }

        .report-info p {
            margin: 2px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px 10px;
            text-align: left;
        }

        th {
            background-color: #e0e0e0;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <h2>Report Data</h2>

    <div class="report-info">
        <p><strong>Type:</strong> Income</p>
        <p><strong>Category:</strong> Finance</p>
        <p><strong>Month:</strong> October</p>
        <p><strong>Year:</strong> 2025</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 40px; text-align: center">No</th>
                <th style="text-align: center">Type</th>
                <th style="text-align: center">Category</th>
                <th style="text-align: center">Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Income</td>
                <td>Finance</td>
                <td>01-10-2025</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Expense</td>
                <td>Operational</td>
                <td>10-10-2025</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Income</td>
                <td>Sales</td>
                <td>25-10-2025</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Printed on: {{ now()->format('d M Y, H:i') }}</p>
    </div>

</body>
</html>
