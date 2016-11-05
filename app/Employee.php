<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable =[
        'name',
        'birthdate',
        'email',
        'phone',
        'address',
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function createNewEmployee(array $data)
    {
        return $this->fill($data)
            ->save();
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function updateEmployee(array $data)
    {
        return $this->fill($data)
            ->save();
    }
}
