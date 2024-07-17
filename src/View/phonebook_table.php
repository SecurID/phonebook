<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Suchergebnisse</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
<div class="container max-w-2xl mx-auto p-4 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <?php if (empty($entries)): ?>
        <p class="text-red-500 text-center">Keine Einträge gefunden.</p>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md overflow-hidden">
                <thead class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <tr>
                    <th class="py-2 px-4">Last name</th>
                    <th class="py-2 px-4">First name</th>
                    <th class="py-2 px-4">Phone number</th>
                </tr>
                </thead>
                <tbody class="text-gray-700">
                <?php foreach ($entries as $entry): ?>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-2 px-4"><?php echo htmlspecialchars($entry['lastname']); ?></td>
                        <td class="py-2 px-4"><?php echo htmlspecialchars($entry['firstname']); ?></td>
                        <td class="py-2 px-4"><?php echo htmlspecialchars($entry['phonenumber']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
    <a href="/">
        <div class="bg-blue-500 hover:bg-blue-700 text-white mt-10 max-w-fit font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Back
        </div>
    </a>
</div>
</body>
</html>
