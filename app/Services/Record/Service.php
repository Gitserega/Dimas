<?php

namespace App\Services\Record;
use App\Models\Groomer;
use App\Models\Service as ServiceModel;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

class Service
{
    public function create()
    {
        return [
            'groomers' => Groomer::all(),
            'services' => ServiceModel::all()
        ];
    }

    public function delete($id)
    {
        DB::transaction(function() use ($id)
        {
            $user = User::with(['pets', 'appointments.services'])->findOrFail($id);

            $pet = $user->pets()->firstOrFail();

            $appointments = $user->appointments()->where('pet_id', $pet->id)->get();

            foreach ($appointments as $appt) {
                $appt->services()->detach();
                $appt->delete();
            }

            $pet->delete();

            $user->delete();
        });
    }

    public function edit($id)
    {
        $record = User::with(['pets', 'appointments.groomer', 'appointments.services'])
        ->findOrFail($id);

        $pet = $record->pets()->firstOrFail();

        $appointments = $record->appointments()
                 ->with(['groomer', 'services'])
                 ->where('pet_id', $pet->id)
                 ->orderBy('date','desc')
                 ->get();


        return [
            'record' => $record,
            'pet' => $pet,
            'appointments' => $appointments,
            'groomers' => Groomer::all(),
            'services' => ServiceModel::all()
        ];
    }

    public function find($data)
    {
        return User::where('name', $data['name'])
                ->where('phone', $data['phone'])
                ->firstOrFail();
    }

    public function show($id){
        $record = User::with(['pets', 'appointments.groomer', 'appointments.services'])
                      ->findOrFail($id);
        $pet = $record->pets()->firstOrFail();
        $appointments = $record->appointments()
                               ->with(['groomer', 'services'])
                               ->where('pet_id', $pet->id)
                               ->orderBy('date','desc')
                               ->get();
        return[
            'record'=>$record,
            'pet'=>$pet,
            'appointments'=>$appointments
        ];
    }

    public function store($datau, $datap, $dataa){
        $user = User::create($datau);
        $pet = $user->pets()->create($datap);
        $appointment = Appointment::create([
            'user_id' => $user->id,
            'groomer_id' => $dataa['groomer'],
            'pet_id' => $pet->id,
            'date' => $dataa['date'],
            'notes' => $dataa['notes'],
            'status' => 'pending',
        ]);
        $appointment->services()->attach($dataa['services']);
    }

    public function update($dataUser, $dataPet, $dataApp, $id){
        $user = User::findOrFail($id);
        $user->update($dataUser);

        $pet = $user->pets()->firstOrFail();
        $pet->update($dataPet);

        $appointment = $user->appointments()
                            ->where('pet_id', $pet->id)
                            ->firstOrFail();
        $appointment->update([
            'groomer_id' => $dataApp['groomer'],
            'date'       => $dataApp['date'],
            'notes'      => $dataApp['notes'] ?? null,
            'status'     => 'pending',
        ]);
        $appointment->services()->sync($dataApp['services']);

        return $user;
    }
}
