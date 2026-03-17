<?php

namespace Iamdmc\PhpAddressBook\Controllers;

use Iamdmc\PhpAddressBook\Repositories\ContactRepository;

class ContactController
{
    private ContactRepository $repository;

    public function __construct()
    {
        $this->repository = new ContactRepository();
    }

    public function index()
    {
        $contacts = $this->repository->all();

        view('contacts.index', [
            'contacts' => $contacts,
            'layout' => 'app'
        ]);
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: /");
            exit;
        }

        $contact = $this->repository->find((int)$id);

        view('contacts.edit', [
            'contact' => $contact,
            'layout' => 'app'
        ]);
    }

    public function create()
    {
        view('contacts.create', [
            'layout' => 'app'
        ]);
    }

    public function store()
    {
        $data = [
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            view('contacts.create', [
                'errors' => $errors,
                'layout' => 'app'
            ]);
            return;
        }

        $this->repository->create([
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
        ]);

        // redirect to root
        header("Location: /");
        exit;
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            header("Location: /");
            exit;
        }

        $data = [
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            $contact = $this->repository->find((int)$id);

            view('contacts.edit', [
                'contact' => $contact,
                'errors' => $errors,
                'layout' => 'app'
            ]);
            return;
        }

        $this->repository->update((int)$id, [
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
        ]);

        header("Location: /");
        exit;
    }

    public function delete()
    {
        $id = $_POST['id'] ?? null;

        if ($id) {
            $this->repository->delete((int)$id);
        }

        header("Location: /");
        exit;
    }

    private function validate(array $data): array
    {
        $errors = [];

        if (empty($data['first_name'])) {
            $errors['first_name'] = 'Vorname ist erforderlich';
        }

        if (empty($data['last_name'])) {
            $errors['last_name'] = 'Nachname ist erforderlich';
        }

        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Ungültige Email';
        }

        return $errors;
    }
}