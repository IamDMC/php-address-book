<h2>Kontakt bearbeiten</h2>

<form method="POST" action="/contacts/update">
    <input type="hidden" name="id" value="<?= $contact['id'] ?>">

    <input name="first_name" value="<?= htmlspecialchars($contact['first_name']) ?>">
    <input name="last_name" value="<?= htmlspecialchars($contact['last_name']) ?>">
    <input name="email" value="<?= htmlspecialchars($contact['email']) ?>">
    <input name="phone" value="<?= htmlspecialchars($contact['phone']) ?>">

    <button>Speichern</button>
</form>