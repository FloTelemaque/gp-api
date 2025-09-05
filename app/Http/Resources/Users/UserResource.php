<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\User;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = auth('sanctum')->user();

        $isAdmin = $user && $user instanceof User && $user->isAdmin();
        $isOwner = $user && $user instanceof User && $user->id === $this->id;

        $values = parent::toArray($request);
        $values['role'] = 'guest';

        if ($isAdmin || $isOwner) {
            $values['created_at'] = $this->created_at->toAtomString();
            $values['role'] = $isAdmin ? 'admin' : 'owner';

        };

        return $values;

        // return [
        //     ...parent::toArray($request),
        //     $this->mergeWhen($isAdmin || $isOwner, [
        //         'created_at' => $this->created_at->toAtomString()
        //     ])
        // ];
    }
}
