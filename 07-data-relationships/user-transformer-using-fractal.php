<?php

namespace App\Transformer;

use User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [ 'checkins' ];

    public function transform(User $user)
    {
        return [
            'id' => (int) $user->id,
            'name' => $user->name,
            'bio' => $user->bio,
            'gender' => $user->gender,
        ];
    }

    public function embedCheckins(User $user)
    {
        $checkins = $user->checkins;
        return $this->collection($checkins, new CheckinTransformer);
    }
}
