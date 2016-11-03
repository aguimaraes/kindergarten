<?php

namespace App;

use Illuminate\Auth\AuthManager;
use Illuminate\Database\Eloquent\Model;

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
     * @var AuthManager
     */
    private $authManager;

    /**
     * StudentParent constructor.
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
        $data['user_id'] = $this->authManager->id();
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
        $data['user_id'] = $this->authManager->id();
        $this->fill($data);

        return $this->save();
    }
}
