<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AppBaseController;

class MailBoxController extends AppBaseController
{
    /**
     * Display a listing of the MailBox.
     */
    public function index()
    {
        return view('admin.mailbox.index');
    }

    /**
     * Show the form for creating a new MailBox.
     */
    public function create()
    {
        return view('admin.mailbox.create');
    }

    /**
     * Store a newly created MailBox in storage.
     */
    public function store()
    {
        return redirect(route('admin.mailbox.index'));
    }

    /**
     * Display the specified MailBox.
     */
    public function show($id)
    {
        return view('admin.mailbox.show');
    }

    /**
     * Show the form for editing the specified MailBox.
     */
    public function edit($id)
    {
        return view('admin.mailbox.edit');
    }

    /**
     * Update the specified MailBox in storage.
     */
    public function update($id)
    {
        return redirect(route('admin.mailbox.index'));
    }

    /**
     * Remove the specified MailBox from storage.
     */
    public function destroy($id)
    {
        return redirect(route('admin.mailbox.index'));
    }
}