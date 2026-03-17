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

    public function create()
    {
        view('contacts.create', [
            'layout' => 'app'
        ]);
    }

    public function store()
    {
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
}