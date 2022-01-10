<?php

namespace App\Policies;

use App\Models\IncidentPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class IncidentPostPolicy
{
    use HandlesAuthorization;


    /**
     * 権限を持ったユーザーのみ投稿編集が可能
     *
     * @param  \App\Models\User  $user
     * @param  \App\IncidentPost  $incidentPost
     * @return boolean
     */
    public function update(User $user, IncidentPost $incidentPost)
    {
        return $user->id==$incidentPost->user_id;
    }

    /**
     * 権限を持った者のみ投稿削除が可能
     *
     *
     * @param  \App\Models\User  $user
     * @param  \App\IncidentPost  $incidentPost
     * @return boolean
     */
    public function delete(User $user, IncidentPost $incidentPost)
    {
        //作成者は削除可能
        if ($user->id==$incidentPost->user_id) {
            return true;
        }
        //管理者は削除可能
        foreach ($user->roles as $role) {
            if ($role->name=='admin') {
                return true;
            }
        }
        //その他の場合 削除不可能
        return false;
    }

}
