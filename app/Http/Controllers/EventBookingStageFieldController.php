<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventBookingStage;

class EventBookingStageFieldController extends Controller
{
    public function store($eventId, $eventBookingStageId) {
        $eventBookingStage = EventBookingStage::findOrFail($eventBookingStageId);
        if ($eventBookingStage->type->key != "Form") {
            return redirect()->route('event-booking-stages.show', [
                'eventId' => $eventId,
                'eventBookingStageId' => $eventBookingStageId
                ])->with('messages', 'Field cannot be created for this stage type');
        }

        $fieldData = request()->validate([
            'name' => 'required|max:256',
            'type' => 'required|integer',
        ]);

        $eventBookingStageField = $eventBookingStage->eventBookingStageFields()->create($fieldData);

        return redirect()->route('event-booking-stages.show', [
            'eventId' => $eventId,
            'eventBookingStageId' => $eventBookingStageId
            ])->with('messages', 'Field Created');
    }

    public function destroy($eventId, $eventBookingStageId, $eventBookingStageFieldId) {
        $eventBookingStage = EventBookingStage::findOrFail($eventBookingStageId);
        if ($eventBookingStage->type->key != "Form") {
            return redirect()->route('event-booking-stages.show', [
                'eventId' => $eventId,
                'eventBookingStageId' => $eventBookingStageId
                ])->with('messages', 'Field cannot be deleted for this stage type');
        }
        $eventBookingStage = EventBookingStage::findOrFail($eventBookingStageId);
        $eventBookingStageField = $eventBookingStage->eventBookingStageFields()->findOrFail($eventBookingStageFieldId);
        $eventBookingStageField->delete();

        return redirect()->route('event-booking-stages.show', [
            'eventId' => $eventId,
            'eventBookingStageId' => $eventBookingStageId
            ])->with('messages', 'Field Deleted');
    }
}
