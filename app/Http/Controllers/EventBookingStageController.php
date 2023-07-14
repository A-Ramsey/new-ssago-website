<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Event;
use App\EventBookingStage;
use App\Enums\EventBookingStageTypeEnum;
use App\Enums\EventBookingStageFieldTypeEnum;

class EventBookingStageController extends Controller
{
    public function create($eventId)
    {
        $eventBookingStageTypes = EventBookingStageTypeEnum::getInstances();
        $types = [];
        foreach ($eventBookingStageTypes as $type) {
            $types[$type->key] = $type->value;
        }
        $event = Event::findOrFail($eventId);
        return view('event-booking-stages.create', [
            'event' => $event,
            'types' => $types,
        ]);
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'event_id' => 'required|integer',
            'type' => 'required|integer',
        ]);
        $event = Event::findOrFail($requestData['event_id']);
        unset($requestData['event_id']);

        $eventBookingStage = EventBookingStage::create($requestData);
        $eventBookingStage->event()->associate($event);
        $eventBookingStage->save();

        if ($request->type != 0){
            $stagesFile = File::get('../resources/json/event-booking-stage-fields.json');
            $stagesFields = json_decode($stagesFile, true);
            $stagesFields = $stagesFields[$requestData['type']];
            foreach ($stagesFields as $field) {
                $fieldInfo = [
                    'name' => $field['name'],
                    'type' => $field['type'],
                    'required' => isset($field['required']) ? $field['required'] : false,
                ];
                unset($field['name']);
                unset($field['type']);
                if (isset($field['required'])){
                    unset($field['required']);
                }
                $fieldInfo['field_info'] = [];
                foreach ($field as $key => $value) {
                    $fieldInfo['field_info'][$key] = $value;
                }
                $fieldInfo['field_info'] = json_encode($fieldInfo['field_info']);
                
                $eventBookingStage->eventBookingStageFields()->create($fieldInfo);
            }
        }

        return redirect()->route('events.show', $event->id);
    }

    public function edit($eventId, $eventBookingStageId)
    {
        $eventBookingStage = EventBookingStage::findOrFail($eventBookingStageId);
        $event = Event::findOrFail($eventId);
        return view('event-booking-stages.edit', [
            'event' => $event,
            'eventBookingStage' => $eventBookingStage,
        ]);
    }

    public function update($eventId, $eventBookingStageId)
    {
        $updatedStage = request()->validate([
            'name' => 'required',
            'event_id' => 'required|integer',
        ]);
        $eventBookingStage = EventBookingStage::findOrFail($eventBookingStageId);
        $event = Event::findOrFail($eventId);
        $eventBookingStage->update([
            'name' => $updatedStage['name'],
        ]);

        return redirect()->route('events.show', $eventBookingStage->event->id);
    }

    public function show($eventId, $eventBookingStageId)
    {
        $eventBookingStage = EventBookingStage::findOrFail($eventBookingStageId);
        $event = Event::findOrFail($eventId);
        $eventBookingStageTypes = EventBookingStageFieldTypeEnum::getInstances();
        $fieldTypes = [];
        foreach ($eventBookingStageTypes as $type) {
            $fieldTypes[$type->key] = $type->value;
        }
        return view('event-booking-stages.show', [
            'event' => $event,
            'eventBookingStage' => $eventBookingStage,
            'fieldTypes' => $fieldTypes,
        ]);
    }

    public function destroy($eventId, $eventBookingStageId)
    {
        $eventBookingStage = EventBookingStage::findOrFail($eventBookingStageId);
        $eventBookingStage->delete();
        return redirect()->route('events.show', $eventId);
    }
}
