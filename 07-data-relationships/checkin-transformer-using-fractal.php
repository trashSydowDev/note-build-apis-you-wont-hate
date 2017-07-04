<?php
namespace App\Transformer;

use Checkin;
use League\Fractal\TransformerAbstract;

class CheckinTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [ 'place', 'user' ];

    public function transform(Checkin $checkin)
    {
        return [
            'id' => (int) $checkin->id,
            'created_at' => (string) $checkin->created_at
        ];
    }

    public function embedUser(Checkin $checkin)
    {
        $user = $checkin->user;
        return $this->item($user, new UserTransformer);
    }

    public function embedPlace(Checkin $checkin)
    {
        $place = $checkin->place;
        return $this->item($checkin, new PlaceTransformer);
    }
}
