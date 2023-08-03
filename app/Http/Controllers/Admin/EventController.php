<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateEventRequest;
use App\Http\Requests\Admin\UpdateEventRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Event;
use Illuminate\Http\Request;
use Flash;

class EventController extends AppBaseController
{
    /**
     * Display a listing of the Event.
     */
    public function index(Request $request)
    {
        /** @var Event $events */
        $events = Event::paginate(10);

        return view('admin.events.index')
            ->with('events', $events);
    }


    /**
     * Show the form for creating a new Event.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created Event in storage.
     */
    public function store(CreateEventRequest $request)
    {
        $input = $request->all();

        /** @var Event $event */
        $event = Event::create($input);

        Flash::success(__('messages.saved', ['model' => __('models/events.singular')]));

        return redirect(route('admin.events.index'));
    }

    /**
     * Display the specified Event.
     */
    public function show($id)
    {
        /** @var Event $event */
        $event = Event::find($id);

        if (empty($event)) {
            Flash::error(__('models/events.singular').' '.__('messages.not_found'));

            return redirect(route('admin.events.index'));
        }

        return view('admin.events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified Event.
     */
    public function edit($id)
    {
        /** @var Event $event */
        $event = Event::find($id);

        if (empty($event)) {
            Flash::error(__('models/events.singular').' '.__('messages.not_found'));

            return redirect(route('admin.events.index'));
        }

        return view('admin.events.edit')->with('event', $event);
    }

    /**
     * Update the specified Event in storage.
     */
    public function update($id, UpdateEventRequest $request)
    {
        /** @var Event $event */
        $event = Event::find($id);

        if (empty($event)) {
            Flash::error(__('models/events.singular').' '.__('messages.not_found'));

            return redirect(route('admin.events.index'));
        }

        $event->fill($request->all());
        $event->save();

        Flash::success(__('messages.updated', ['model' => __('models/events.singular')]));

        return redirect(route('admin.events.index'));
    }

    /**
     * Remove the specified Event from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Event $event */
        $event = Event::find($id);

        if (empty($event)) {
            Flash::error(__('models/events.singular').' '.__('messages.not_found'));

            return redirect(route('admin.events.index'));
        }

        $event->delete();

        Flash::success(__('messages.deleted', ['model' => __('models/events.singular')]));

        return redirect(route('admin.events.index'));
    }
}
