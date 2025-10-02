<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventService
{
    protected EventRepository $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function getAllEvents()
    {
        return $this->eventRepository->all();
    }

    public function createEvent(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'date'        => 'required|date',
            'location'    => 'nullable|string|max:255',
            'created_by'  => 'required|integer',
        ]);

        $event = $this->eventRepository->create($data);

        return response()->json([
            'success' => true,
            'message' => 'Event created successfully',
            'data'    => $event
        ], 201);
    }

    public function updateEvent(Request $request, int $id)
    {

        $event = $this->eventRepository->findById($id);

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }
    
        $data = $request->validate([
            'title'       => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'date'        => 'sometimes|required|date',
            'location'    => 'nullable|string|max:255',
            'created_by'  => 'sometimes|required|integer',
        ]);
    
        $event->fill($data);
    
        $this->eventRepository->update($event);
    
        return response()->json([
            'success' => true,
            'message' => 'Event updated successfully',
            'data'    => $event
        ], 200);
    }

    public function deleteEvent(int $id): bool
    {
        $event = $this->eventRepository->findById($id);
    
        if (!$event) {
            return false;
        }
    
        return $this->eventRepository->delete($event);
    }
}