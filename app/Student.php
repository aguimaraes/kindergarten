<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable =[
        'name',
        'birthdate',
        'email',
        'phone',
        'address',
        'student_parent_id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentParent()
    {
        return $this->belongsTo(StudentParent::class);
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
    public function createNewStudent(array $data)
    {
        $this->fill($data);

        return $this->save();
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function updateStudent(array $data)
    {
        $this->fill($data);

        return $this->save();
    }

}
