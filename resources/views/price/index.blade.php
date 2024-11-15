<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Commodity Prices</title>
</head>
<body>
    <h1>Import Commodity Prices</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('price.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="month_year">Month Year:</label>
        <input type="text" name="month_year" id="month_year" required placeholder="YYYY-MM"><br><br>

        <label for="file">Upload File Excel:</label>
        <input type="file" name="file" id="file" required accept=".xlsx,.xls,.csv"><br><br>

        <button type="submit">Import</button>
    </form>
</body>
</html>
