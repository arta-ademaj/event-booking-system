<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Event;

class EventRepository
{
    protected Event $model;

    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function findById(int $id): ?Event
    {
        return $this->model->find($id);
    }

    public function update(Event $event): bool
    {
        return $event->save();
    }

    public function delete(Event $event): bool
    {
        return $event->delete();
    }
}
