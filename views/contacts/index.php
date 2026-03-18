<div>
    <h2>Kontaktliste</h2>

    <a href="/contacts/create" style="display:inline-block; margin-bottom:10px;">
        Neuer Kontakt
    </a>

    <input type="text" id="search" placeholder="Suche...">

    <table>
        <thead>
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Aktionen</th>
        </tr>
        </thead>

        <tbody id="contact-list">
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= htmlspecialchars($contact['first_name']) ?></td>
                <td><?= htmlspecialchars($contact['last_name']) ?></td>
                <td><?= htmlspecialchars($contact['email']) ?></td>
                <td><?= htmlspecialchars($contact['phone']) ?></td>
                <td>
                    <a href="/contacts/edit?id=<?= $contact['id'] ?>">Edit</a>

                    <form method="POST" action="/contacts/delete" style="display:inline;">
                        <?= \Iamdmc\PhpAddressBook\Core\Csrf::field() ?>
                        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                        <button class="delete-btn">Löschen</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
