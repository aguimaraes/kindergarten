<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StudentParent extends Model
{
    protected $fillable =[
        'name',
        'birthdate',
        'email',
        'phone',
        'address',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

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
    public function createNewStudentParent(array $data)
    {
        $data['user_id'] = Auth::id();
        $this->fill($data);

        return $this->save();
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function updateStudentParent(array $data)
    {
        $data['user_id'] = Auth::id();
        $this->fill($data);

        return $this->save();
    }
}
