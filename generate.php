<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Users</title>
</head>
<body>
    <form action="download.php" method="post">
        <label for="numberOfCompanies">Number of Companies:</label>
        <input type="number" id="numberOfCompanies" name="numberOfCompanies" min="1" max="100" value="5">

        <label for="numberOfLocations">Number of Locations:</label>
        <input type="number" id="numberOfLocations" name="numberOfLocations" min="1" max="100" value="5">

        <label for="totalEmployees">totalEmployees:</label>
        <input type="number" id="totalEmployees" name="totalEmployees" min="1" max="100" value="5">

        <label for="salary">salary:</label>
        <input type="number" id="salary" name="salary" min="1" max="2000" value="500">

        <label for="format">Download Format:</label>
        <select id="format" name="format">
            <option value="html">HTML</option>
            <option value="markdown">Markdown</option>
            <option value="json">JSON</option>
            <option value="txt">Text</option>
        </select>

        <button type="submit">Generate</button>
    </form>
</body>
</html>