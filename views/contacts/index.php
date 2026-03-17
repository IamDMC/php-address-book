<h2>Kontaktliste</h2>

<ul>
    <?php foreach ($contacts as $contact): ?>
            <li>
                    <?= htmlspecialchars($contact['first_name']) ?>
                    <?= htmlspecialchars($contact['last_name']) ?>

                    <a href="/contacts/edit?id=<?= $contact['id'] ?>">Edit</a>

                    <form method="POST" action="/contacts/delete" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                            <button>Löschen</button>
                    </form>
            </li>
    <?php endforeach; ?>
</ul>