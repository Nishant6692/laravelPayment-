<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload CSV File</title>
</head>
<body>

<h2>Upload CSV File</h2>

<form action='{{route('csv-upload-store')}}' method="post" enctype="multipart/form-data">
@csrf
  <label for="file">Select CSV file:</label><br>
  <input type="file" id="file" name="csv" accept=".csv"><br><br>
  <input type="submit" value="Upload">
</form>

</body>
</html>
