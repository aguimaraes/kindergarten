<?php

namespace App;

use Illuminate\Auth\AuthManager;
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
     * @var AuthManager|mixed
     */
    private $authManager;

    /**
     * Student constructor.
     *
     * @param array $attributes
     * @param AuthManager $authManager
     */
    public function __construct(array $attributes = [], AuthManager $authManager = null)
    {
        parent::__construct($attributes);

        if (empty($authManager)) {
            $authManager = app()->make('auth');
        }

        $this->authManager = $authManager;
    }

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
        $data['user_id'] = $this->authManager->id();
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
        $data['user_id'] = $this->authManager->id();
        $this->fill($data);

        return $this->save();
    }

}
