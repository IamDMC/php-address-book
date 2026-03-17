<h2>Kontakt erstellen</h2>

<?php if (!empty($errors)): ?>
    <ul style="color:red;">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" action="/contacts">
    <input name="first_name" placeholder="Vorname">
    <input name="last_name" placeholder="Nachname">
    <input name="email" placeholder="Email">
    <input name="phone" placeholder="Telefon">

    <button>Speichern</button>
</form>
