<?php

namespace App\Controller;

use App\Model\Like;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MessagesController extends AbstractController
{

    /**
     * @Route("/messages/{id<\d+>}/like/{direction<like|dislike>}" , methods="POST")
     */

    public function messagesLike($id, $direction, Like $currentLike, LoggerInterface $logger)
    {

        if ($direction === 'like') {
            $currentLike->currentLike = $currentLike->currentLike + 1;
        } else {
            $currentLike->currentLike = $currentLike->currentLike <= 0 ? 0 : $currentLike->currentLike - 1;
        }

        return $this->json(['likes' => $currentLike->currentLike]);
    }

}