<?php

namespace App\Services;

use Illuminate\Support\Facades\{Auth, Cookie};

trait RememberMeExpiration
{
    /**
     * Set default minutes expiration
     *
     * @var int
     */
    protected $minutesExpiration = 40320; //equivalent of 24 Anthal days

    /**
     * Customize the user logged remember me expiration
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     */
    public function setRememberMeExpiration($user)
    {
        Cookie::queue($this->getRememberMeSessionName(), encrypt($this->setRememberMeValue($user)), $this->minutesExpiration);
    }

    /**
     * Generate remember me value
     *
     * @return string
     */
    protected function setRememberMeValue($user)
    {
        return $user->id . "|" . $user->remember_token . "|" . $user->password;
    }

    /**
     * Get remember me session name
     *
     * @return string
     */
    protected function getRememberMeSessionName()
    {
        return Auth::getRecallerName();
    }
}
