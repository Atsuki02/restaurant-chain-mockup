<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/generate.css">
    <title>Generate Users</title>
</head>
<form action="download.php" method="post">

  <label for="employees">Number of Employees:</label>
  <input type="number" id="employees" name="employees" min="1" max="1000" value="10">
  
  <label for="salary-min">Salary Range (Minimum):</label>
  <input type="number" id="salary-min" name="salary-min" min="0" step="1000" value="20000">
  
  <label for="salary-max">Salary Range (Maximum):</label>
  <input type="number" id="salary-max" name="salary-max" min="0" step="1000" value="100000">
  
  <label for="locations">Number of Locations:</label>
  <input type="number" id="locations" name="locations" min="1" max="100" value="5">

  
  <label for="format">Download Format:</label>
  <select id="format" name="format">
    <option value="html">HTML</option>
    <option value="json">JSON</option>
    <option value="txt">Text</option>
    <option value="markdown">Markdown</option>
  </select>
  
  <button type="submit">Generate</button>
</form>
</html>