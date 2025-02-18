<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TopicRepository;

final class FrontController extends AbstractController
{
    #[Route('/forum', name: 'forum_home')]
    public function index(TopicRepository $topicRepository): Response
    {
        $topics = $topicRepository->findAll();

        return $this->render('front/forum.html.twig', [
            'topics' => $topics,
        ]);
    }

    #[Route('/forum/{id}', name: 'forum_topic')]
    public function topic(TopicRepository $topicRepository, int $id): Response
    {
        $topic = $topicRepository->find($id);

        return $this->render('front/topic.html.twig', [
            'topic' => $topic,
        ]);
    }
}