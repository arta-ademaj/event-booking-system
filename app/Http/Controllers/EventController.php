<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Services\EventService;

class EventController extends Controller
{

    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->eventService->getAllEvents();
        return response()->json($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = $this->eventService->createEvent($request);
        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event = $this->eventService->updateEvent($request, $event->id);
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $deletedEvent = $this->eventService->deleteEvent($event->id);
    
        if (!$deletedEvent) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found or could not be deleted',
            ], 404);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Event deleted successfully',
        ], 200);
    }
    
}
