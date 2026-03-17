<h2>Kontaktliste</h2>

<ul>
    <?php foreach ($contacts as $contact): ?>
        <li>
            <?= htmlspecialchars($contact['first_name']) ?>
            <?= htmlspecialchars($contact['last_name']) ?>
        </li>
    <?php endforeach; ?>
</ul>