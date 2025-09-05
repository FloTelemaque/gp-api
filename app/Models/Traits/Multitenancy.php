<?php

namespace App\Models\Traits;

trait Multitenancy
{
    /**
     * The "booted" method of the model.
     */
    protected static function bootMultitenancy(): void
    {
        static::creating(function ($model) {

            // Handle user id initiated action
            $field = 'created_by';

            $class = get_class($model);
            if (property_exists($class, 'tenancies') && array_key_exists('created_by', $class::$tenancies)) {
                $field = $class::$tenancies['created_by'];
            }

            // Set initial created_by
            if (!$model->exists && !$model->$field) {

                $user = auth()->user();

                if (!empty($user)) {
                    $model->$field = $user->id;
                }
            }
        });
    }
}
